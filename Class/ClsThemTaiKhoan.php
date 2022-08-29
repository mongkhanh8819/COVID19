<?php
//header('Content-Type: text/html; charset=utf-8');
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', "covid","123456", 'htdieuphoibncovid') or die ('Lỗi kết nối'); mysqli_set_charset($conn, "utf8");

// Dùng isset để kiểm tra Form
if(isset($_POST['themtaikhoan'])){
$Matk = trim($_POST['txtMaTaiKhoan']);
$password = trim($_POST['txtMatKhau']);
$password = md5($password );
$PhanQuyen = trim($_POST['txtPhanquyen']);



if (empty($Matk)) {
array_push($errors, "Username is required"); 
}
if (empty($PhanQuyen)) {
array_push($errors, "Quyen is required"); 
}
if (empty($password)) {
array_push($errors, "Two password do not match"); 
}

// Kiểm tra username hoặc email có bị trùng hay không
$sql = "SELECT * FROM taikhoancv WHERE MaTK = '$Matk'";

// Thực thi câu truy vấn
$result = mysqli_query($conn, $sql);

// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
if (mysqli_num_rows($result) > 0)
{
echo '<script language="javascript">alert("Mã tài khoản đã được sử dụng!"); window.location="../QuanTriHeThong/QuanLyTaiKhoan.php";</script>';

// Dừng chương trình
die ();
}
else {
$sql = "INSERT INTO taikhoancv (MaTK, password, phanquyen) VALUES ('$Matk','$password','$PhanQuyen')";
echo '<script language="javascript">alert("Thêm thành công!");</script>';

if (mysqli_query($conn, $sql)){
//echo "Mã tài khoản: ".$_POST['txtMaTaiKhoan']."<br/>";
//echo "Mật khẩu: " .$_POST['txtMatKhau']."<br/>";
//echo "Phân quyền: ".$_POST['txtPhanquyen']."<br/>";
}
else {
echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="../QuanTriHeThong/QuanLyTaiKhoan.php";</script>';
}
}
}
?>