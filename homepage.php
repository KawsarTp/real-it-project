<?php include "inc/header.php"; ?>
<?php 
include "class/Product.php";
$data = new Product();




 ?>
<div class="container-fluid product">
<div class="row">



 <div class="col-md-3 sidenav ">
  <a href="#about">FDS</a>
  <a href="#services">FPS</a>
  <a href="#clients">PA</a>
  <a href="#contact">PABX</a>
  <button class="dropdown-btn" href="homepage.php"><abbr title="Vedio Surveillance System">VSS</abbr>
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

  <a href="#contact" >Search</a>
</div> 


  

        <div class="col-md-9">
         <input type="text"  placeholder="Search for names.." title="Type in a name" id="search" class="form-control">
        </div>

        <div class="col-md-9" >
          <h1>All products</h1>
          <h3>VSS</h3>
          
          <div id="output"></div>
          
     <div id="owl-demo">
      <?php 

              $getpro = $data->getProduct();
                if ($getpro) {
                  while($result = $getpro->fetch_assoc()){
 
       ?>
      <div class="item thumbnail" >
        <img src="admin/<?php echo $result['image']; ?>">
        <p>Name:<?php echo $result['productname']; ?></p>
        <p>Price:<?php echo $result['price']; ?></p>
        <a href="productpage1.php?proid=<?php echo $result['id']; ?>">View Details</a>
      </div>
      <?php }} ?>
    </div>


        </div>





</div>
</div>



<?php include "inc/footer.php"; ?>


<script>
  $(document).ready(function() { 
    $("#search").keyup(function(){
      var live = $(this).val();
      if (live !='') {
        $.ajax({    
          type: "get",
          url: "livesearch.php", 
          data:{live:live},            
          dataType: "html",                   
          success: function(data){                    
            $("#output").html(data); 
            
          }

        });
      }else{
        $("#output").html(""); 
      }
    }); 
  });
</script>





    