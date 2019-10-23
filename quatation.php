<?php include 'inc/header.php'; ?>
<?php 
  include 'class/Product.php';

  $pro = new Product();
  $proquantity = $nvr = $nvrprice = $nvrquantity="";
if ($_SERVER['REQUEST_METHOD']=="POST") {
      $proquantity = $_POST['proquantity'];
      $nvr = $_POST['nvr'];
      $nvrprice = $_POST['nvrprice'];
      $nvrquantity = $_POST['nvrquantity'];
    }

 ?>
<div class="quotation">
  <h2 style="text-align: center; font-weight: bolder; margin-bottom: 20px;">Make Your Quotation</h2>
 <form action="" method="post">
  
  <div class="form-group col-md-6">
    <label for="name">Customer/Company Name:</label>
    <input type="text" class="form-control" id="name">
  </div>
  <div class="form-group col-md-6">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email">
  </div>

   <div class="form-group col-md-6">
    <label for="address">Address:</label>
    <input type="text" class="form-control" id="address">
  </div>

   <div class="form-group col-md-6">
    <label for="product">Product Name:</label>
    <input type="text" class="form-control" id="product">
  </div>
   <div class="form-group col-md-6">
    <label for="model">Model:</label>
    <input type="text" class="form-control" id="model">
  </div>
   <div class="form-group col-md-6">
    <label for="brand">Brand Name:</label>
    <input type="email" class="form-control" id="brand">
  </div>
   <div class="form-group col-md-6">
    <label for="quantity">Product Quantity</label>
    <input type="text" class="form-control" id="quantity" value="<?php echo $proquantity; ?>" readonly="readonly">
  </div>
   <div class="form-group col-md-6">
    <label for="quantity">Accessories Quantity</label>
    <input type="text" class="form-control" id="quantity" value="<?php echo $nvrquantity ?>">
  </div>
   <div class="form-group col-md-6">
    <label for="unit">Unit Price</label>
    <input type="text" class="form-control" id="unit">
  </div>
   <div class="form-group col-md-6">
    <label for="price">Total Price:</label>
    <input type="text" class="form-control" id="price">
  </div>
  <div class="form-group col-md-6">
    <label for="mobile">Moblie Number:</label>
    <input type="text" class="form-control" id="mobile">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
 
</form> 
</div>

<?php include 'inc/footer.php'; ?>