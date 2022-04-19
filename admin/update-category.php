<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br/><br/><br/>

        <?php
        if (isset($_GET['id'])) {
            $id=$_GET['id'];
         $sql="SELECT * FROM `tbl_category` WHERE id=$id";
         $result=mysqli_query($conn,$sql);

         if ($result) {
            $count=mysqli_num_rows($result);
            if ($count==1) {
                 $row=mysqli_fetch_assoc($result);
                 
                 $title=$row['title'];
                 $current_image=$row['image_name'];
                 $featured=$row['featured'];
                 $active=$row['active'];
            }
            else {
                $_SESSION['no-category-found']='<div class="warning">Category not found !</div>';
                header('Location:http://localhost/food-order/admin/manage-category.php');
            }
         }
        }
        else {
            header('Location:http://localhost/food-order/admin/manage-category.php');
        }
         
        ?>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" value="<?php echo $title; ?>"></td>
                </tr>
                <tr>
                <td>Current Image</td>
                    <td> 
                        <?php
                        if ($current_image!="") {
                           ?>
                           <img src="http://localhost/food-order/images/category/<?php echo $current_image; ?>" alt="image" width=150px>
                           <?php
                        }
                        else {
                           echo '<div class="warning">Image not added</div>';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                <td>New Image</td>
                    <td> <input type="file" name="image" id="image" value="<?php echo $image_name; ?>"></td>
                </tr>
                <tr>
                   <td>Featured:</td>
                   <td>
                     <input <?php if ($featured=="Yes") { echo 'checked';} ?> type="radio" name="featured" value="<?php echo $featured; ?>"> Yes
                     <input <?php if ($featured=="No") { echo 'checked';} ?> type="radio" name="featured" value="<?php echo $featured; ?>"> No
                   </td>
                  </tr>  
                  <tr>
                      <td>Active:</td>
                      <td>
                          <input <?php if ($active=="Yes") { echo 'checked';} ?> type="radio" name="active" value="<?php echo $active; ?>">Yes
                          <input <?php if ($active=="No") { echo 'checked';} ?> type="radio" name="active" value="<?php echo $active; ?>">No
                      </td>
                  </tr>
                <tr>
                <td colspan="2">
                    <input type="hidden" name="current_image"value="<?php echo $current_image; ?>">
                    <input type="hidden" name="id"value="<?php echo $id; ?>">
                    <input type="submit" value="Update category" name="submit" class="btn-secondary">
                </td>
                </tr>
            </table>
        </form> 
    </div>
</div>

<?php
   if (isset($_POST['submit'])) {
      $id=$_POST['id'];
      $title=$_POST['title'];
      $current_image=$_POST['current_image'];
      if (isset($_FILES['image']['name'])) {
          $image_name=$_FILES['image']['name'];
          if ($image_name!="") {
            $extension=end(explode('.',$image_name));
            $image_name="food_category_".rand(000,999).'.'.$extension; //food_category_897.jpg
            $source_path=$_FILES['image']['tmp_name'];
            $destination_path="../images/category/".$image_name;
            $upload=move_uploaded_file($source_path,$destination_path);
            if ($upload==false) {
                $_SESSION['upload']="<div class='warning'>failed to upload image</div>";
                header("Location:http://localhost/food-order/admin/manage-category.php");
                die();
            }
            if ($current_image!="") {
                $remove_path="../images/category/".$current_image;
                $remove=unlink($remove_path);
                if ($remove==false) {
                    $_SESSION['failed-remove']='<div class="error">failed to remove image</div>';
                    header('Location:http://localhost/food-order/admin/manage-category.php');
                    die();
                }
            }
            
          }
          else {
            $image_name=$current_image;
        }
      }else {
          $image_name=$current_image;
      }
      $featured=$_POST['featured'];
      $active=$_POST['active'];

      $sql2="UPDATE `tbl_category` SET title='$title',image_name='$image_name',featured='$featured',active='$active' WHERE id='$id'";
      $result2=mysqli_query($conn,$sql2);
      if ($result2) {
        $_SESSION['update']="<div class='success'>Category Updated Successfully</div>";
        header('Location:http://localhost/food-order/admin/manage-category.php');
      }else {
        $_SESSION['update']="<div class='success'>Failed to update Category</div>";
        header('Location:http://localhost/food-order/admin/manage-category.php');
      }
   }
?>

<?php include('partials/footer.php') ?>