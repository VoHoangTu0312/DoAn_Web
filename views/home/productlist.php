
<!DOCTYPE html>
<html>

    <body>
    <h1>Product List</h1>
        <table border="1">
        <tr>
            <th>productName</th>
            <th>categoryID</th>
            <th>price</th>
            <th>stockQuantity</th>
            <th>image</th>

        </tr>
    <?php
        foreach($products as $product)
        echo "
        <tr>
            <td><a href='index.php?productid=".$product->getproductID()."'>".$product->getproduct_name()."</a></td>
            <td>".$product->getcategoryID()."</td>
            <td>".$product->getprice()."</td>
            <td>".$product->getstock_quantity()."</td>
            <td>
            <img style='height: 150px;' src='".$product->getproduct_img()."'/>
            </td>
            
        </tr>
        ";
    ?>
        </table>
    </body>
</html>