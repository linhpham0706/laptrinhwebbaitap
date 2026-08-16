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

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 40px;
            color: #333;
        }

        .container {
            width: 900px;
            max-width: 100%;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        h2 {
            color: #34495e;
            border-left: 5px solid #3498db;
            padding-left: 10px;
            margin-top: 25px;
        }

        .thong-bao {
            background-color: #e8f8f0;
            color: #218c5a;
            padding: 12px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            border-left: 4px solid #2ecc71;
        }

        form {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        label {
            display: inline-block;
            width: 120px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        input,
        textarea,
        select {
            width: 70%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        textarea {
            height: 80px;
            resize: vertical;
            vertical-align: top;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 4px rgba(52, 152, 219, 0.3);
        }

        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 11px 20px;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background-color: white;
        }

        th {
            background-color: #3498db;
            color: white;
            padding: 12px;
            text-align: center;
        }

        td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #eaf4fb;
        }

        td:first-child {
            text-align: center;
            width: 60px;
        }

        td:last-child {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head> 
 
<body> 

<div class="container">

    <h1>📚 Quản lý danh mục sách</h1>

    <?php if ($thongBao != ""): ?> 
        <div class="thong-bao">
            <?php echo $thongBao; ?>
        </div>
    <?php endif; ?> 
 
    <h2>➕ Thêm danh mục sách</h2> 
 
    <form method="post"> 
 
        <label>Tên danh mục:</label> 
        <input type="text" name="ten_danh_muc" placeholder="Nhập tên danh mục..."> 
 
        <br><br> 
 
        <label>Mô tả:</label> 
        <textarea name="mo_ta" placeholder="Nhập mô tả danh mục..."></textarea> 
 
        <br><br> 
 
        <label>Trạng thái:</label> 
        <select name="trang_thai"> 
            <option value="1">Đang sử dụng</option> 
            <option value="0">Ngừng sử dụng</option> 
        </select> 
 
        <br><br> 
 
        <button type="submit">➕ Thêm danh mục</button> 
 
    </form> 

    <h2>📋 Danh sách danh mục sách</h2> 
 
    <table> 
 
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

</div>
 
</body> 
 
</html>