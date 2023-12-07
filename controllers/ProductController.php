<?php
require_once("modules/db_module.php");
require_once("models/product.php");

class ProductController {
    public function displayProducts()
    {

        $link = null;
        taoKetNoi($link);
        $query = "select * from tbl_products";
        $result = chayTruyVanTraVeDL($link, $query);


        while ($row = mysqli_fetch_assoc($result)) {

            $product = new Product($row['productID'], $row['product_name'], $row['categoryID'], $row['product_img'], $row['price'],$row['stock_quantity']);


            echo "<div class='col-sm-6 col-md-4 col-lg-3'>";

            echo "<div class='card'>";

            echo "<img src='{$product->getproduct_img()}' class=' img-fluid' alt='Image'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>{$product->getproduct_name()}</h5>";
            echo "<p class='card-text'>Price: {$product->getprice()}</p>";
            echo "<p class='card-text'>CategoryID: {$product->getcategoryID()}</p>";
            echo "<p class='card-text'>Quantity: {$product->getstock_quantity()} 👤</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

        }

        giaiPhongBoNho($link, $result);

    }
    public function displaySearchResults($searchQuery)
    {

        $link = null;
        taoKetNoi($link);

        $query = "select * from tbl_products WHERE product_name like '%$searchQuery%'";

        $result = chayTruyVanTraVeDL($link, $query);

        while ($row = mysqli_fetch_assoc($result)) {

            $product = new Product($row['productID'], $row['product_name'], $row['categoryID'], $row['product_img'], $row['price'],$row['stock_quantity']);

            echo "<div class='col-md-4'>";
            echo "<div class='card'>";
            echo "<img src='{$product->getproduct_img()}' class=' img-fluid' alt='Image'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>{$product->getproduct_name()}</h5>";
            echo "<p class='card-text'>Price: {$product->getprice()}</p>";
            echo "<p class='card-text'>CategoryID: {$product->getcategoryID()}</p>";
            echo "<p class='card-text'>Quantity: {$product->getstock_quantity()} 👤</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }

        giaiPhongBoNho($link, $result);
    }
}

?>
