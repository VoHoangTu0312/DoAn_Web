<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $productName = $_POST["productName"];
    $categoryID = $_POST["categoryID"];
    $price = $_POST["price"];
    $stockQuantity = $_POST["stockQuantity"];

    // Xử lý tệp hình ảnh
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

     // Include các tệp cần thiết (config, model, db_module)
     require_once "modules/config.php";
     require_once "models/product.php";
     require_once "modules/db_module.php";
 
     // Tạo kết nối đến cơ sở dữ liệu
     $link = null;
     taoKetNoi($link);
 
     // Tạo một đối tượng Product và set các giá trị
     $newProduct = new Product(null, $productName, $categoryID, $price, $stockQuantity, basename($_FILES["image"]["name"]));
 
     // Gọi hàm insertProduct để thêm sản phẩm vào cơ sở dữ liệu
     if ($newProduct->insertProduct($link)) {
         echo "Thêm sản phẩm thành công!";
     } else {
         echo "Thêm sản phẩm thất bại!";
     }
 
     // Đóng kết nối
     giaiPhongBoNho($link);
 } else {
     // Nếu dữ liệu không được gửi qua POST, chuyển hướng về trang thích hợp
     header("Location: add_product.php");
     exit();
}
?>