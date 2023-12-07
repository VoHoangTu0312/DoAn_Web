<?php
class Product{

    private $productID ;
    private $product_name;
    private $categoryID ; 
    private $price;
    private $stock_quantity;
    private $product_img;
    public function getproductID(){return $this->productID;}
    public function getproduct_name(){return $this->product_name;}
    public function getcategoryID(){return $this->categoryID;} 
    public function getprice(){return $this->price;}
    public function getstock_quantity(){return $this->stock_quantity;}
    public function getproduct_img(){return $this->product_img;}

    public function __construct($productID, $product_name, $categoryID, $price,$stock_quantity,$product_img)
    {
    $this->productID = $productID;
    $this->product_name = $product_name; 
    $this->categoryID = $categoryID;
    $this->price = $price;
    $this->stock_quantity = $stock_quantity;
    $this->product_img = $product_img;

    }
    public function __toString()
    {
    return "Product($this->productID, $this->product_name, $this->categoryID, $this->price,$this->stock_quantity, $this->product_img)";
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

    public function updateProduct($conn) {
        $productID = $this->getproductID();
        $product_name = mysqli_real_escape_string($conn, $this->getproduct_name());
        $categoryID = mysqli_real_escape_string($conn, $this->getcategoryID());
        $price = mysqli_real_escape_string($conn, $this->getprice());
        $stock_quantity = mysqli_real_escape_string($conn, $this->getstock_quantity());
        $product_img = mysqli_real_escape_string($conn, $this->getproduct_img());

        $sql = "UPDATE products SET 
                    product_name = '$product_name',
                    categoryID = '$categoryID',
                    price = '$price',
                    stock_quantity = '$stock_quantity',
                    product_img = '$product_img'
                WHERE productID = $productID";

        return mysqli_query($conn, $sql);
    }

    public function deleteProduct($conn) {
        $productID = $this->getproductID();
        $sql = "DELETE FROM products WHERE productID = $productID";

        return mysqli_query($conn, $sql);
    }


    public function setImageName($product_img)
    {
        $this->product_img = $product_img;
    }

    public function uploadImage($input_name)
    {
        $product_img = $_FILES[$input_name]['name'];
        $image_temp_path = $_FILES[$input_name]['tmp_name'];

        $ext = pathinfo($product_img, PATHINFO_EXTENSION);
        $new_product_img = "Product-Name-" . rand(0000, 9999) . "." . $ext;

        $destination_path = "../images/product/" . $new_product_img;

        if (move_uploaded_file($image_temp_path, $destination_path)) {
        $this->setImageName($new_product_img);
        return true;
        } else {
        return false;
        }
    }

    public function removeImage()
    {
        $path = "../images/product/" . $this->getproduct_img();
        return unlink($path);
    }

    public function populateCategoriesDropdown($conn, $current_category)
  {
    $sql = "SELECT * FROM tbl_categories ";
    $res = mysqli_query($conn, $sql);

    if ($res) {
      while ($row = mysqli_fetch_assoc($res)) {
        $category_name = $row['title'];
        $categoryID = $row['id'];

        echo "<option " . (($current_category == $categoryID) ? "selected" : "") . " value='$category_name'>
                        $category_name
                      </option>";
      }
    } else {
      echo "<option value='0'>Danh Mục Không Khả Dụng.</option>";
    }
  }
}
?>