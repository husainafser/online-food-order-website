<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
         </br></br>
         <?php if (isset($_SESSION['add'])) {
                           echo $_SESSION['add'];
                           unset($_SESSION['add']);
                        } 
                        ?>
         <?php if (isset($_SESSION['upload'])) {
                           echo $_SESSION['upload'];
                           unset($_SESSION['upload']);
                        } 
                        ?>
         <form action="" method="post" enctype="multipart/form-data">
             <table class="tbl-30">
                 <tr>
                   <td>Title:</td>
                   <td>
                     <input type="text" name="title" id="title">
                   </td>
                  </tr>
                  <tr>
                   <td>Description:</td>
                   <td>
                     <input type="text" name="description" id="description">
                   </td>
                  </tr>
                  <tr>
                   <td>Price:</td>
                   <td>
                     <input type="number" name="price" id="price">
                   </td>
                  </tr>
                  <tr>
                      <td>Select Image</td>
                      <td>
                          <input type="file" name="image" id="image">
                      </td>
                  </tr>
                  <tr>
                   <td>category:</td>
                   <td>
                     <input type="text" name="category_id" id="category_id">
                   </td>
                  </tr> 
                  <tr>
                   <td>Featured:</td>
                   <td>
                     <input type="radio" name="featured" value="Yes"> Yes
                     <input type="radio" name="featured" value="No"> No
                   </td>
                  </tr>  
                  <tr>
                      <td>Active:</td>
                      <td>
                          <input type="radio" name="active" value="Yes">Yes
                          <input type="radio" name="active" value="No">No
                      </td>
                  </tr>
                  <tr>
                      <td colspan="2">
                           <input type="submit" name="submit" value="Add food" class="btn-secondary">
                      </td>
                  </tr>
             </table>
         </form>
         <?php
 if (isset($_POST['submit'])) {
     $title=$_POST["title"];
     $description=$_POST["description"];
     $price=$_POST["price"];

     if (isset($_FILES['image']['name'])) {
        $image_name=$_FILES['image']['name'];
        $extension=end(explode('.',$image_name));
        $image_name="food_name_".rand(000,999).'.'.$extension; //food_name_897.jpg
        $source_path=$_FILES['image']['tmp_name'];
        $destination_path="../images/food/".$image_name;
        $upload=move_uploaded_file($source_path,$destination_path);
        if ($upload==false) {
            $_SESSION['upload']="<div class='warning'>failed to upload image</div>";
            header("Location:http://localhost/food-order/admin/add-food.php");
            die();
        }
     }
     else {
        $image_name="";
     }
     $category_id=$_POST["category_id"];
     
     if (isset($_POST['featured'])) {
        $featured=$_POST["featured"];
     }
     else {
        $featured="No";
     }
     if (isset($_POST['active'])) {
        $active=$_POST["active"];
     }
     else {
        $active="No";
     }
    
    
 
    $sql="INSERT INTO `tbl_food` SET title='$title',description='$description',price='$price',image_name='$image_name',category_id='$category_id',featured='$featured',active='$active'";

     $result=mysqli_query($conn,$sql) or die(mysqli_error());
     if ($result){
        $_SESSION['add']="<div class='success'>Food Added successfully</div>";
        header("Location:http://localhost/food-order/admin/manage-food.php");
     }
     else {
        $_SESSION['add']="<div class='warning'>failed to add food</div>";
        header("Location:http://localhost/food-order/admin/add-food.php");
     }
 }
?>
    </div>
</div>

<?php include('partials/footer.php') ?>