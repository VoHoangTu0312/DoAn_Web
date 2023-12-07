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
}
?>