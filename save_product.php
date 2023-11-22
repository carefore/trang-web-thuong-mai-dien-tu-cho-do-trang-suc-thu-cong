<?php
// Kết nối đến cơ sở dữ liệu (MySQL)
$servername = "localhost";
$username = "username"; // Thay bằng username của bạn
$password = "password"; // Thay bằng password của bạn
$dbname = "jewelry_store";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
  die("Kết nối không thành công: " . $conn->connect_error);
}

// Lấy thông tin từ Form
$productName = $_POST['productName'];
$description = $_POST['description'];
$price = $_POST['price'];
// Xử lý và lưu ảnh sản phẩm vào thư mục trên server
$image = $_FILES['image']['name'];
$tmp_image = $_FILES['image']['tmp_name'];
$uploads_dir = 'uploads/';

// Di chuyển ảnh vào thư mục uploads
move_uploaded_file($tmp_image, $uploads_dir.$image);

// SQL để chèn thông tin sản phẩm vào cơ sở dữ liệu
$sql = "INSERT INTO products (productName, description, price, image) VALUES ('$productName', '$description', '$price', '$image')";

if ($conn->query($sql) === TRUE) {
  echo "Sản phẩm đã được lưu thành công";
} else {
  echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
