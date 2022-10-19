<?php
  include"connect.php";

// SQL query to select data from database
$sql = " SELECT * FROM listings ";
$result = mysqli_query($conn,$sql);

?>
<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Home</a><?=$_SESSION ['username'] ?> <a href="logout.php">Sign Out</a> /Recent Listings</span>
    <h2>Recent Listings</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 ">

  

<div class="hot-properties hidden-xs">
<h4>Hot Properties</h4>
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/5a.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">2 bedroom Madaraka</a></h5>
                  <p class="price">35,000</p> </div>
              </div>
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/6.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Bedsitter Madaraka</a></h5>
                  <p class="price">17,500</p> </div>
              </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/7.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">1 bedroom Nairobi West</a></h5>
                  <p class="price">25,000</p> </div>
                  </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/8.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">3 bedroom Madaraka</a></h5>
                  <p class="price">50,000</p> </div>
              </div>

</div>


</div>

<div class="col-lg-9 col-sm-8">
<div class="sortby clearfix">
<div class="pull-left result">Showing: 1 of 1 </div>
  
<div class="row">
<?php
        // LOOP TILL END OF DATA
        while($rows=$result->fetch_assoc())
        {
      ?>

     <!-- properties -->
      <div class="col-lg-4 col-sm-6">
      <div class="properties">
        <div class="image-holder" height="5000" width="1000"><img src="<?php echo $rows['images'];?>" height="644" width="1000" class="img-responsive" alt="properties">
        </div>
        <h4><a href="property-detail.php"><?php echo $rows['name'];?></a></h4>
        <p class="price">Price: <?php echo $rows['price'];?></p>
        <p class="price">Location: <?php echo $rows['location'];?></p>
        <p class="price">Type: <?php echo $rows['type'];?></p>
        <p class="price">Description: <?php echo $rows['description'];?></p>

        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?php echo $rows['rooms'];?></span>  </div>
        
      </div>
      </div>
      <!-- properties -->
      <?php
        }
      ?>


</div>      
      <div class="center">
<ul class="pagination">
          <li><a href="#">«</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">»</a></li>
        </ul>
</div>

     <?php
       if(isset($_POST['submit'])){
        $type=$_POST['type'];
        $price=$_POST['price'];
        $images=$_POST['images'];
        $size=$_POST['size'];
        $rooms=$_POST['rooms'];
        $description=$_POST['description'];
        $location=$_POST['location'];

        if($type!=""||$price!=""||$images!=""||$size!=""||$rooms!=""||$description!=""||$location!=""){
            
             $query="SELECT * FROM listings WHERE type='$type' OR price='$price' OR images='$images' OR size='$size' OR rooms='$rooms' OR description='$description' AND location='$location'";
             $data= mysql_query($conn,$query) or die('error');
             if(mysqli_num_rows($data)>0){
              while($row=mysqli_fetch_assoc($data)){
                $type = $row['type'];
                $price = $row['price'];
                $images = $row['images'];
                $size = $row['size'];
                $rooms = $row['rooms'];
                $description = $row['description'];
                $location = $row['location'];
                ?>
                <tr>
                  <td><?php echo $type;?></td>
                  <td><?php echo $price;?></td>
                  <td><?php echo $images;?></td>
                  <td><?php echo $size;?></td>
                  <td><?php echo $rooms;?></td>
                  <td><?php echo $description;?></td>
                  <td><?php echo $location;?></td>
                </tr>
                  <?php
              }
             
         }
      }          
        
       }

      ?>
          
</div>
</div>
</div>
</div>
</div>

<?php include'footer.php';?>
