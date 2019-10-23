  <?php include "inc/header.php"; ?>

  <?php 
spl_autoload_register(function($classes){
  include "class/".$classes.".php";
});
  

    $data = new Product();
    $ac = new Accesories();
    $ct = new Catagory();
    $aj = new Ajax();
   ?>
  
<section class="container">
      <div class="row">
        <div class="col-sm-3 col-md-3">
           <div class="product-wrapper"><!-- product-wrapper -->
			       <div class="product-box">
                <?php 
                  if (isset($_GET['proid'])) {
                  $getpro = $data->getSingleProduct($_GET['proid']);
                    if ($getpro) {
                      while($result = $getpro->fetch_assoc()){

                 ?>
			        	<h3 class="text-center"><?php echo $result['productname']; ?></h3>
             <div class="text-center">
				        <img  src="admin/<?php echo $result['image']; ?>" alt="" width="300px" height="300px"/>
		      	    <p>List Price <?php echo $result['price']; ?> <p>
             </div>
             <div>
				        <p><b>Technical Specification</b></p>
		  		      <p class="technical-description" ><?php echo $result['description']; ?></p>
                <h4><b>Required Accessories</b></h4>
                <p><?php echo $result['accesories']; ?></p>
             </div>
       </div><!--product-box -->
     </div><!-- product-wrapper -->
    </div><!-- col -->
   
  <!--  </div>
  </div>
      

  <div class="container">
     <div class="row"> -->
      <div class="container-fluid">
      <div class="row" style="margin-top: 200px;">
            <div class="col-md-9">
              <h1 style="Color:blue;">Camera Accessories</h1>
            <form action="" method="post" id="form-search">
             
            <div class="col-md-3">
              <label for="catagory">Catagory</label>
              <select class="form-control" id="catagory" name="catagory">
                <option selected="">--Select--</option>
                <?php 
                    
                      $getct = $ct->getAllCat();
                      if ($getct) {
                        while($result = $getct->fetch_assoc()){
                 ?>
                <option value="<?php echo $result['id']; ?>"><?php echo $result['catname']; ?></option>
                <?php }} ?>
              </select>
            </div>
            <div class="col-md-3">
              <label for="">Product Name:</label>
            <select class="form-control" id="product" name="pro">
  
            </select>
            </div>
            <div class="col-md-2">
              <label for="Product">Unit Price</label>
              <input type="price" name="Uprice" readonly="readonly" value="" class="form-control" id="price">
            </div>
            <div class="col-md-1">
              <label for="Product">Quantity</label>
              <input type="text" name="quantity" min="1" class="form-control onlyNum" id="quantity">
            </div>
            <div class="col-md-2 ">
              <label for="Product">Total Price</label>
              <input type="text" name="totalprice" min="1"  class="form-control onlyNum" id="amount" readonly>
            </div>
            <div class="col-md-1" style="margin-top: 20px;float: right;">
              <input type="submit" name="submit" value="Add to Quotation" class="btn btn-primary" id="save">
            </div>
            </form>
        </div>

        <div class="col-md-8" id="output"  style="margin-top: 40px;margin-left: 15px;">
          
        </div>
   <?php }}} ?> 
      </div>
      </div>

<div class="container" style="margin-top: 30px;">
   <div class="row"> 
      
<div class="row row2 col-md-12">

 <div class="wrapper2 ">
  <?php 
    $getpro = $data->getAllProduct();
    if ($getpro) {
      while($result = $getpro->fetch_assoc()){

       ?>
<div class="col-sm-2 col-md-2 product-wrapper1">
        <div class="box1 ">
        <h3 class="text-center"><?php echo $result['productname']; ?></h3>
        <img src="admin/<?php echo $result['image']; ?>" alt=""/>
        <h4>Model: <?php echo $result['model']; ?></h4>
        <a href="?proid=<?php echo $result['id']; ?>">Click Here</a>
      </div>
     </div>
     <?php }} ?>
</div>

</section>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5><span class="glyphicon glyphicon-lock"></span>Your Information</h5>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="makequotation.php" method="post">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Compnay/ Person Name</label>
              <input type="text" class="form-control" name="Mname" id="Mname" placeholder="Enter Compnay/ Person Name" required> 
            </div>
            <div class="form-group">
              <label for="email"><span class="glyphicon glyphicon-user"></span> Email</label>
              <input type="email" class="form-control" name="Memail" id="email" placeholder="Enter Email" required>
            </div>
             <div class="form-group">
              <label for="address"><span class="glyphicon glyphicon-user"></span> Address</label>
              <textarea id="textarea" name="address" class="form-control" required></textarea>
            </div>
            <div class="form-group">
              <label for="Mobile"><span class="glyphicon glyphicon-user"></span> Mobile</label>
             <input type="text" name="mobile" placeholder="Mobile Number" class="form-control" required>
            </div>
            <?php 
                  if (isset($_GET['proid'])) {
                  $getpro = $data->getSingleProduct($_GET['proid']);
                    if ($getpro) {
                      while($result = $getpro->fetch_assoc()){

                 ?>
             <div class="form-group">
               <label for="name">Camera Name:</label>
               <input type="text" name="Cname" value="<?php echo $result['productname']; ?>" readonly class="form-control">
             </div>
             <div class="form-group">
               <label for="name">Camera Model:</label>
               <input type="text" name="Cmodel" value="<?php echo $result['model']; ?>" readonly class="form-control">
             </div>
             <div class="form-group">
               <label for="name">Camera Quantity:</label>
               <input type="text" name="Cquantity" value=""  class="form-control" id="camera-quantity" required>
             </div>
             <div class="form-group">
               <label for="name">Unit Price:</label>
               <input type="text" name="Cprice" value="<?php echo $result['price']; ?>" readonly class="form-control" id="camera-price">
             </div>
             <?php }}} ?>
             <div class="form-group">
               <label for="name">Total Price:</label>
               <input type="text" name="Ctotalprice" value="" readonly class="form-control" id="total-camera-price">
             </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Make Quotation</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          
        </div>
      </div>
      
    </div>
  </div>
  <!-- /modal -->
<?php include "inc/footer.php"; ?>

<script>

    $("#catagory").on('change', function(){
        var catid = $(this).val();
        
        if(catid){
          $.ajax({
              url: 'getprice.php',
              type: 'post',
              data:{proid:catid},

              success:function(data){
                  $("#product").html(data);
                }
          });
        }
    });   

    $("#product").on('change', function(){
        var proid = $(this).val();
      
        if(proid){
          $.ajax({
              url: 'getprice.php',
              type: 'post',
              data:{price:proid},

              success:function(data){
                  $("#price").val(data);
                }
          });
        }
    });


    $('#price, #quantity').keyup(function(){
    var rate = parseFloat($('#price').val()) || 0;
    var box = parseFloat($('#quantity').val()) || 0;
    percent1 = 5;
    percent2 = 15;
    sum = rate * box;
    if (box <= 4) {
    $('#amount').val(sum);  

    }else if( box >4 && box<=8){
        commision = (sum*percent1)/100;
      $('#amount').val(sum-commision); 
    }else{
       commision = (sum*percent2)/100;
      $('#amount').val(sum-commision); 
    }



}); 

$(function() {
  $('div').on('keydown', '.onlyNum', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||(/65|67|86|88/.test(e.keyCode)&&(e.ctrlKey===true||e.metaKey===true))&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})


  

 $(document).on('click','#save',function(e) {
  var data = $("#form-search").serialize();
  $.ajax({
         data: data,
         type: "post",
         url: "quotationprice.php",
         success: function(data){
              alert("Data Save: " + data);
         }
});
 });


$(document).ready(function() { 
      $.ajax({    
        type: "GET",
        url: "getdata.php",             
        dataType: "html",                   
        success: function(response){                    
            $("#output").html(response); 
            //alert(response);
        }

    });
});

$('#camera-price, #camera-quantity').keyup(function(){
    var rate = parseFloat($('#camera-price').val()) || 0;
    var box = parseFloat($('#camera-quantity').val()) || 0;
    percent1 = 5;
    percent2 = 15;
    sum = rate * box;
    if (box <= 4) {
    $('#total-camera-price').val(sum);  

    }else if( box >4 && box<=8){
        commision = (sum*percent1)/100;
      $('#total-camera-price').val(sum-commision); 
    }else{
       commision = (sum*percent2)/100;
      $('#total-camera-price').val(sum-commision); 
    }



}); 




</script>