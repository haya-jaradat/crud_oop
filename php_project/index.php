<?php include "layout/header.php"?>
<?php include "model/category.php" ?>
<?php include "model/product.php" ?>

<?php include "config/database.php" ?>


<?php
$db =new Database();
$connection =$db->create_connection();

$product =new product($connection);
$category =new category($connection);
$categories= $category->get_categories();

$products=$product->create();
$products=$product->read();


?>



<div class="container">
    <from method="post">
        <?php
        echo "<table class='table table-hover'>
                 <tr>
                     <th>ID</th>
                     <th>Product</th>
                     <th>Description</th>
                     <th>Price</th>
                     <th>Category</th>
                     <th>Action</th>
                </tr>";


              $cat_name="";

              foreach ($products as $pro) {
                  if ($pro[category_id] == 1) {
                      $cat_name = "Fashion";
                  } elseif ($pro[category_id] == 2) {
                      $cat_name = "Electronics";
                  } elseif ($pro[category_id] == 3) {
                      $cat_name = "Motors";
                  }

                  echo "<tr>
                         <td>$pro[id]</td>
                         <td>$pro[name]</td>
                         <td>$pro[description]</td>
                         <td>$pro[price]</td>
                         <td>$cat_name</td>
                         <td>
                         <button type='button'class='btn btn-primary'name='edit'>Edit</button>
                         <button type='button'class='btn btn-danger'name='delete'>Delete</button>
                         </td>
                    </tr>";
              }
              echo "</table>";
        ?>
    </from>
</div>
<?php include "layout/footer.php"?>

