<?php
//header('Content-Type: text/html; charset=utf-8');
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', "covid","123456", 'htdieuphoibncovid') or die ('Lỗi kết nối'); mysqli_set_charset($conn, "utf8");

// Dùng isset để kiểm tra Form
if(isset($_POST['dangky'])){
$user = trim($_POST['txtuser']);
$password = trim($_POST['txtpass']);
$password = md5($password );



if (empty($user)) {
array_push($errors, "Username is required"); 
}
if (empty($password)) {
array_push($errors, "Two password do not match"); 
}

// Kiểm tra username hoặc email có bị trùng hay không
$sql = "SELECT * FROM taikhoanbn WHERE SoDienThoai = '$user'";

// Thực thi câu truy vấn
$result = mysqli_query($conn, $sql);

// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
if (mysqli_num_rows($result) > 0)
{
echo '<script language="javascript">alert("Số điện thoại đã được sử dụng!"); window.location="../DangKy.php";</script>';

// Dừng chương trình
die ();
}
else {
$sql = "INSERT INTO taikhoanbn (SoDienThoai, password) VALUES ('$user','$password')";
echo '<script language="javascript">alert("Thêm thành công!");</script>';

if (mysqli_query($conn, $sql)){
//echo "Mã tài khoản: ".$_POST['txtMaTaiKhoan']."<br/>";
//echo "Mật khẩu: " .$_POST['txtMatKhau']."<br/>";
//echo "Phân quyền: ".$_POST['txtPhanquyen']."<br/>";
}
else {
echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="../DangKy.php";</script>';
}
}
}
?>