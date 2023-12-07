<?php
require_once("models/product_model.php");
class product_Controller{ 
    public $product_model;
    public function __construct()
    {
    $this->product_model = new product_Model();
    }
    public function invoke()
    {
        if(!isset($_GET["productid"])){
            $products = $this->product_model->getproductlist();
            include "views/home/productlist.php";
        }
        else
        {
            $product = $this->product_model->getproduct($_GET["productid"]); 
            include "views/home/viewproduct.php";
        }
    }
}
?>