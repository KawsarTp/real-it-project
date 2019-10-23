
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
 include "../class/Product.php";

 Session::checkSession();
 $pro = new Product();
 $formate = new Format();

 if (isset($_GET['prodel'])) {
 	$data = $pro->productDelete($_GET['prodel']);
 }

 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead style="width: 100%;">
				<tr>
					<th>Sl</th>
					<th>Name</th>
					<th>Model</th>
					<th>Description</th>
					<th>Image</th>
					<th>Price</th>
					<th>Qty</th>
					<th>Brand</th>
					<th>Category</th>
					<th>Accessories</th>
					<th>Camera</th>
					<th>Type</th>
					<th>inout</th>
					<th>Edit Or Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				 $catlist = $pro->getAllProduct();
				 if ($catlist) {
				 	$i=0;
				 	while($result = $catlist->fetch_assoc()){
				 		$i++;
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['productname']; ?></td>
					<td><?php echo $result['model']; ?></td>
					<td><?php echo $result['description']; ?></td>
					<td class="center"><img src="<?php echo $result['image']; ?>" width="40px" height="40px"></td>
					<td> <?php echo $result['price']; ?></td>
					<td> <?php echo $result['quantity']; ?></td>
					<td> <?php echo $result['brandId']; ?></td>
					<td> <?php echo $result['catagoryID']; ?></td>
					<td> <?php echo $formate->textShorten($result['accesories']); ?></td>
					<td> <?php echo $result['camera']; ?></td>
					<td> <?php echo $result['indout']; ?></td>
					<td> <?php echo $result['type']; ?></td>
					<td><a href="?proedit=<?php echo $result['id'];?>">Edit</a> || <a href="?prodel=<?php echo $result['id']; ?>">Delete</a></td>
				</tr>
				<?php }} ?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
