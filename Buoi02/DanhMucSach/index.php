<?php

$danhSachDanhMuc = [];
$thongBao = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $tenDanhMuc = trim($_POST['ten_danh_muc']);
    $moTa = trim($_POST['mo_ta']);
    $trangThai = $_POST['trang_thai'];

    // Kiểm tra tên danh mục
    if ($tenDanhMuc == '') {

        $thongBao = "Tên danh mục không được để trống!";

    } else {

        // Tạo một danh mục
        $danhMuc = [
            'ten' => $tenDanhMuc,
            'mo_ta' => $moTa,
            'trang_thai' => $trangThai
        ];

        // Thêm danh mục vào mảng
        $danhSachDanhMuc[] = $danhMuc;

        $thongBao = "Thêm danh mục thành công!";
    }
}


// Hàm hiển thị trạng thái
function hienThiTrangThai($trangThai)
{
    if ($trangThai == 1) {
        return "Đang sử dụng";
    } else {
        return "Ngừng sử dụng";
    }
}

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý danh mục sách</title>
</head>

<body>

    <h1>Quản lý danh mục sách</h1>
    <?php if ($thongBao != ""): ?>

    <p><?php echo $thongBao; ?></p>

<?php endif; ?>

    <h2>Thêm danh mục sách</h2>

    <form method="post">

        <label>Tên danh mục:</label>
        <input type="text" name="ten_danh_muc">

        <br><br>

        <label>Mô tả:</label>
        <textarea name="mo_ta"></textarea>

        <br><br>

        <label>Trạng thái:</label>
        <select name="trang_thai">
            <option value="1">Đang sử dụng</option>
            <option value="0">Ngừng sử dụng</option>
        </select>

        <br><br>

        <button type="submit">Thêm danh mục</button>

    </form>
    <h2>Danh sách danh mục sách</h2>

<table border="1">

    <tr>
        <th>STT</th>
        <th>Tên danh mục</th>
        <th>Mô tả</th>
        <th>Trạng thái</th>
    </tr>

    <?php foreach ($danhSachDanhMuc as $index => $danhMuc): ?>

        <tr>

            <td>
                <?php echo $index + 1; ?>
            </td>

            <td>
                <?php echo $danhMuc['ten']; ?>
            </td>

            <td>
                <?php echo $danhMuc['mo_ta']; ?>
            </td>

            <td>
                <?php echo hienThiTrangThai($danhMuc['trang_thai']); ?>
            </td>

        </tr>

    <?php endforeach; ?>

</table>

</body>

</html>