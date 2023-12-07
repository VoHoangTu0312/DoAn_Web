<!DOCTYPE html>
<html>
    <head>
    <title>Thông tin sản phẩm </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <h1>Thông tin sản phẩm</h1>
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