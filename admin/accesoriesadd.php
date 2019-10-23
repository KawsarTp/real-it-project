<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
spl_autoload_register(function($class_name){
    include "../class/".$class_name.".php";
});
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])){
    $product = new Accesories();
    $result = $product->productInsert($_POST);
}
$cat = new Catagory();
$brand =new Brand();
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               <?php 
               if (isset($result)) {
                
                        echo $result;
                        } 
                        ?>
                <tr>
                    <td>
                        <label>Accesories Name</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Product Name..." name="proname" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Select Category</option>
                            <?php 
                                
                                $getcat = $cat->getAllCat();
                                if ($getcat) {
                                while($result = $getcat->fetch_assoc()){

                             ?>
                            <option value="<?php echo $result['id']; ?>"><?php echo $result['catname']; ?></option>
                            <?php } } ?>
                        </select>
                            
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Select Brand</option>
                            <?php 
                                
                                $getbrand = $brand->getAllBrand();
                                if ($getbrand) {
                                while($result = $getbrand->fetch_assoc()){

                             ?>
                            <option value="<?php echo $result['id']; ?>"><?php echo $result['brandname']; ?></option>
                            <?php }} ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Price..." name="price" class="medium" />
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Model</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter model" class="medium" name="model" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Country</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter model" class="medium" name="country" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Camera</label>
                    </td>
                    <td>
                        <select id="type1" name="camera">
                            <option selected="">---Select--</option>
                            <option value="1">Ip Camera</option>
                            <option value="2">Non-Ip Camera</option>
                        </select>
                    </td>
                </tr>
				
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });

    $('#type1').change(function() {
  $('#one').prop('disabled', true);
  if ($(this).val() == 1 || $(this).val() == 2) {
    $('#one').prop('disabled', false);
  }
});

     $('#one').change(function() {
  $('#two').prop('disabled', true);
  if ($(this).val() == 1 || $(this).val() == 2) {
    $('#two').prop('disabled', false);
  }
});
    
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


`