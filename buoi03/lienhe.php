<?php

$hoTen = "";
$email = "";
$chuDe = "Hỗ trợ kỹ thuật";
$noiDung = "";

$loiHoTen = "";
$loiEmail = "";
$loiNoiDung = "";
$loiAnh = "";
$thongBao = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $hoTen = trim($_POST["ho_ten"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $chuDe = $_POST["chu_de"] ?? "";
    $noiDung = trim($_POST["noi_dung"] ?? "");

    // Kiểm tra họ tên
    if ($hoTen == "") {
        $loiHoTen = "Họ tên không được để trống!";
    }

    // Kiểm tra email
    if ($email == "") {
        $loiEmail = "Email không được để trống!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $loiEmail = "Email không đúng định dạng!";
    }

    // Kiểm tra nội dung
    if ($noiDung == "") {
        $loiNoiDung = "Nội dung không được để trống!";
    }

    // Kiểm tra ảnh
    if (isset($_FILES["anh_dai_dien"]) &&
        $_FILES["anh_dai_dien"]["error"] != UPLOAD_ERR_NO_FILE) {

        $tenAnh = $_FILES["anh_dai_dien"]["name"];
        $duoiAnh = strtolower(pathinfo($tenAnh, PATHINFO_EXTENSION));

        $duoiChoPhep = ["jpg", "jpeg", "png", "gif"];

        if (!in_array($duoiAnh, $duoiChoPhep)) {
            $loiAnh = "Ảnh phải có định dạng JPG, JPEG, PNG hoặc GIF!";
        }
    }

    // Nếu không có lỗi
    if ($loiHoTen == "" &&
        $loiEmail == "" &&
        $loiNoiDung == "" &&
        $loiAnh == "") {

        // Tạo thư mục uploads nếu chưa có
        if (!is_dir("uploads")) {
            mkdir("uploads");
        }

        // Upload ảnh
        if (isset($_FILES["anh_dai_dien"]) &&
            $_FILES["anh_dai_dien"]["error"] == 0) {

            $tenAnh = $_FILES["anh_dai_dien"]["name"];

            $tenMoi = time() . "_" . basename($tenAnh);

            move_uploaded_file(
                $_FILES["anh_dai_dien"]["tmp_name"],
                "uploads/" . $tenMoi
            );
        }

        $thongBao = "Gửi liên hệ thành công!";
    }
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <title>Liên hệ</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 30px;
        }

        .container {
            width: 500px;
            max-width: 100%;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #2c5d8a;
        }

        .mo-ta {
            text-align: center;
            color: #777;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 7px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        textarea {
            height: 105px;
            resize: vertical;
        }

        .error-input {
            border: 1px solid red;
            background-color: #fff5f5;
        }

        .error {
            color: red;
            font-size: 13px;
            margin-top: 5px;
        }

        .success {
            background-color: #e8f8f0;
            color: #218c5a;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        button {
            width: 100%;
            padding: 11px;
            background-color: #2878b8;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #21669c;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>Liên hệ</h1>

    <p class="mo-ta">
        Vui lòng nhập đầy đủ thông tin bên dưới.
    </p>

    <?php if ($thongBao != "") { ?>

        <div class="success">
            <?php echo $thongBao; ?>
        </div>

    <?php } ?>


    <form method="post" enctype="multipart/form-data">

        <!-- Họ tên -->
        <div class="form-group">

            <label>Họ tên</label>

            <input
                type="text"
                name="ho_ten"
                value="<?php echo htmlspecialchars($hoTen); ?>"
                placeholder="Nhập họ tên..."
                class="<?php echo $loiHoTen != '' ? 'error-input' : ''; ?>"
            >

            <?php if ($loiHoTen != "") { ?>

                <div class="error">
                    <?php echo $loiHoTen; ?>
                </div>

            <?php } ?>

        </div>


        <!-- Email -->
        <div class="form-group">

            <label>Email</label>

            <input
                type="text"
                name="email"
                value="<?php echo htmlspecialchars($email); ?>"
                placeholder="Nhập email..."
                class="<?php echo $loiEmail != '' ? 'error-input' : ''; ?>"
            >

            <?php if ($loiEmail != "") { ?>

                <div class="error">
                    <?php echo $loiEmail; ?>
                </div>

            <?php } ?>

        </div>


        <!-- Chủ đề -->
        <div class="form-group">

            <label>Chủ đề</label>

            <select name="chu_de">

                <option value="Hỗ trợ kỹ thuật">
                    Hỗ trợ kỹ thuật
                </option>

                <option value="Góp ý">
                    Góp ý
                </option>

                <option value="Hỏi đáp">
                    Hỏi đáp
                </option>

            </select>

        </div>


        <!-- Nội dung -->
        <div class="form-group">

            <label>Nội dung</label>

            <textarea
                name="noi_dung"
                placeholder="Nhập nội dung liên hệ..."
                class="<?php echo $loiNoiDung != '' ? 'error-input' : ''; ?>"
            ><?php echo htmlspecialchars($noiDung); ?></textarea>

            <?php if ($loiNoiDung != "") { ?>

                <div class="error">
                    <?php echo $loiNoiDung; ?>
                </div>

            <?php } ?>

        </div>


        <!-- Ảnh đại diện -->
        <div class="form-group">

            <label>Ảnh đại diện</label>

            <input
                type="file"
                name="anh_dai_dien"
                accept=".jpg,.jpeg,.png,.gif"
                class="<?php echo $loiAnh != '' ? 'error-input' : ''; ?>"
            >

            <?php if ($loiAnh != "") { ?>

                <div class="error">
                    <?php echo $loiAnh; ?>
                </div>

            <?php } ?>

        </div>


        <button type="submit">
            Gửi liên hệ
        </button>

    </form>

</div>

</body>

</html>