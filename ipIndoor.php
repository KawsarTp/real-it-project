<?php include "inc/header.php"; ?>
<?php 
include "class/Product.php";
$data = new Product();

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $search = $data->searchProduct($_POST); 
}


 ?>
<div class="container-fluid product">
<div class="row">



 <div class="col-md-3 sidenav ">
  <a href="#about">FDS</a>
  <a href="#services">FPS</a>
  <a href="#clients">PA</a>
  <a href="#contact">PABX</a>
  <button class="dropdown-btn"><abbr title="Vedio Surveillance System">VSS</abbr>
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#" class="dropdown-btn">IP Camera <i class="fa fa-caret-down"></i></a>
    
    <div class="dropdown-container">
      <a href="ipIndoor.php">In Door</a>
      <a href="inoutdoor.php">Outdoor</a>
    </div>
    <a href="#" class="dropdown-btn">NoN-IP Camera <i class="fa fa-caret-down"></i></a>
    <div class="dropdown-container">
      <a href="Nonindoor.php">In Door</a>
      <a href="Nonoutdoor.php">Outdoor</a>
    </div>
  </div>

  <a href="#contact">Search</a>
</div> 




        <div class="col-md-9">
         <input type="text" id="myInput" onkeyup="search()" placeholder="Search for names.." title="Type in a name">
        </div>

        <div class="col-md-9" >
          <h1>All products</h1>
          <h3>VSS</h3>


     <div id="owl-demo">
      <?php 

              $getpro = $data->getProductByIndoor();
                if ($getpro) {
                  while($result = $getpro->fetch_assoc()){
 
       ?>
      <div class="item thumbnail" >
        <img src="admin/<?php echo $result['image']; ?>">
        <p>Price:<?php echo $result['price']; ?></p>
        <a href="productpage1.php?proid=<?php echo $result['id']; ?>">View Details</a>
      </div>
      <?php }} ?>
    </div>


        </div>





</div>
</div>



<?php include "inc/footer.php"; ?>








    