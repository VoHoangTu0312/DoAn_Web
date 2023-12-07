<?php
require_once("models/product.php"); 
require_once("modules/db_module.php");

class product_Model{
public function getproductlist(){
 $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "select * from tbl_products");
        $data = array();
        while($rows = mysqli_fetch_assoc($result)){
            $product = new Product(
                $rows["productID"],
                $rows["product_name"],
                $rows["categoryID"],
                $rows["price"],
                $rows["stock_quantity"],
                $rows["product_img"]
            );
            array_push($data, $product);
        }
        giaiPhongBoNho($link, $result);
        return $data;
}
public function getproduct($id){
    $allproducts = $this->getproductlist();
    foreach($allproducts as $product) 
        if($product->getproductID()===$id)
            return $product;
    return null;
}

public function insertProduct($conn) {
    $product_name = mysqli_real_escape_string($conn, $this->getproduct_name());
    $categoryID = mysqli_real_escape_string($conn, $this->getcategoryID());
    $price = mysqli_real_escape_string($conn, $this->getprice());
    $stock_quantity = mysqli_real_escape_string($conn, $this->getstock_quantity());
    $product_img = mysqli_real_escape_string($conn, $this->getproduct_img());

    $sql = "INSERT INTO tbl_products (product_name, categoryID, price, stock_quantity, product_img)
            VALUES ('$product_name', '$categoryID', '$price', '$stock_quantity', '$product_img')";

    return mysqli_query($conn, $sql);
}
}
?>