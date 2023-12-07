
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="style.css">

    </head>
    <body>
    <h1>Product List</h1>
        <div class="left">
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
        </div>

        <div class="right">
                <!-- Thêm nút thêm sản phẩm -->
            <button onclick="redirectToAddProduct()">Thêm sản phẩm</button>

            <!-- Đoạn mã Javascript để xử lý sự kiện khi nhấn nút -->
            <script>
                function redirectToAddProduct() {
                    // Chuyển hướng đến trang thêm sản phẩm, bạn có thể thay đổi đường dẫn theo yêu cầu của bạn
                    window.location.href = 'views/home/add_product.php';
                }
            </script>
        </div>

    </body>
</html>