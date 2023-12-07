<?
include('models/product.php')
?>

<div class="main-content">
  <div class="container">
    <h1 class="mb-4">Thêm Sản Phẩm</h1>

    <form action="process_add_product.php" method="post" enctype="multipart/form-data">
        <!-- productName -->
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required><br>

        <!-- categoryID -->
        <label for="categoryID">Category ID:</label>
        <input type="text" id="categoryID" name="categoryID" required><br>

        <!-- price -->
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required><br>

        <!-- stockQuantity -->
        <label for="stockQuantity">Stock Quantity:</label>
        <input type="text" id="stockQuantity" name="stockQuantity" required><br>

        <!-- image -->
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br>

        <input type="submit" value="Add Product">
    </form>

    

  </div>
</div>
