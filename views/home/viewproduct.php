<!DOCTYPE html>
<html>
    <body>
    <h1>product info</h1>
    <?php
    echo "<b>ProductName:</b> ".$product->getproduct_name()."<br/>";
    echo "<b>CategoryID: </b>".$product->getcategoryID()."<br/>";
    echo "<b>Price: </b>".$product->getprice()."<br/>";
    echo "<b>Stock Quantity: </b>".$product->getstock_quantity()."<br/>";

    echo "<b>Image: </b> 
    <br/><img src='".$product->getproduct_img()."'/><br/>"
    ?>
    </body>
</html>