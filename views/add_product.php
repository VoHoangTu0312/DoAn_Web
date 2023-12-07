<?
include('models/product.php')
?>

<div class="main-content">
  <div class="container">
    <h1 class="mb-4">Thêm Sản Phẩm</h1>

    <?php
    if (isset($_SESSION['upload'])) {
      echo '<div class="alert alert-warning">' . $_SESSION['upload'] . '</div>';
      unset($_SESSION['upload']);
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">

      <div class="row">
        <div class="col-md-6">
          <div class="mb-3">
            <label for="product_name" class="form-label">Tên Sản Phẩm:</label>
            <input type="text" class="form-control" name="product_name" placeholder="Tên sản phẩm" required>
          </div>

          <div class="mb-3">
            <label for="categoryID" class="form-label">Danh Mục:</label>
            <select class="form-select" name="categoryID" required>
              <?php
              // Gọi phương thức để lấy danh sách các danh mục từ CSDL
              $product = new Product();
              $product->populateCategoriesDropdown($conn, 0); // 0 là giá trị mặc định
              ?>
            </select>
          </div>

          <div class="mb-3">
            <label for="price" class="form-label">Giá:</label>
            <input type="number" class="form-control" name="price" required>
          </div>

          <div class="mb-3">
            <label for="product_img" class="form-label">Chọn Hình Ảnh:</label>
            <input type="file" class="form-control" name="product_img" required>
          </div>
        </div>

        <div class="col-md-6">
          <!-- Các phần khác giữ nguyên như bạn cần -->

          <?php include('forms/featured.php'); ?>

          <?php include('forms/active.php'); ?>
        </div>
      </div>

      <div class="mb-3">
        <input type="submit" name="submit" value="Thêm Sản Phẩm" class="btn btn-primary">
      </div>

    </form>

    <?php

    if (isset($_POST['submit'])) {
      $product_name = $_POST['product_name'];
      $categoryID = $_POST['categoryID'];
      $price = $_POST['price'];
      $stock_quantity = $_POST['stock_quantity'];

    
      $product = new Product($product_name, $categoryID, $price,$stock_quantity,''); // Chú ý giá trị null cho productID và 0 cho stock_quantity

      if (isset($_FILES['product_img']['name'])) {
        $product->uploadImage('product_img');
      }

      // Insert into the database
      $result = $product->insertProduct($conn);

      if ($result) {
        $_SESSION['add'] = "<div class='success'>Sản Phẩm Đã Được Thêm Thành Công.</div>";
        header('location:' . SITEURL . 'admin/manage-products.php');
      } else {
        $_SESSION['add'] = "<div class='error'>Không thể thêm sản phẩm.</div>";
        header('location:' . SITEURL . 'admin/manage-products.php');
      }
    }
    ?>

  </div>
</div>

<?php include('partials/footer.php'); ?>
