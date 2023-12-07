<?php
// require_once("modules/db_module.php");

// class Model {
//     public function addProduct($productName, $categoryID, $price, $quantity, $productImg) {
//         $link = null;
//         taoKetNoi($link);

//         // Sanitize input data before using in the query to prevent SQL injection
//         $productName = mysqli_real_escape_string($link, $productName);
//         $categoryID = (int)$categoryID;
//         $price = (float)$price;
//         $quantity = (int)$quantity;
//         $productImg = mysqli_real_escape_string($link, $productImg);

//         $query = "INSERT INTO tbl_products (product_name, categoryID, price, stock_quantity, product_img) 
//                   VALUES ('$productName', $categoryID, $price, $quantity, '$productImg')";

//         $result = chayTruyVanKhongTraVeDL($link, $query);

//         giaiPhongBoNho($link, $result);

//         return $result ? ['success' => true, 'message' => 'Product added successfully'] : ['success' => false, 'message' => 'Failed to add product'];
//     }
// }
?>
