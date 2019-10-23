
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
 include "../class/Brand.php";
 Session::checkSession();
 $brand = new Brand();
 if (isset($_GET['branddel'])) {
 	$delbrand =$_GET['branddel'];
 	$result =$brand->delGetById($delbrand);
 }
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
                    	<?php if (isset($result)) {
                    		echo $result;
                    	} 
                    	?>
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php 
					$brandget = $brand->getAllBrand();
					if ($brandget) {
						$i=0;
					while($value = $brandget->fetch_assoc()){
						$i++;
					?>
					<tbody>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $value['brandname']; ?></td>
							<td><a href="?brandedit=<?php echo $value['id'] ?>">Edit</a> || <a href="?branddel=<?php echo $value['id'] ?>">Delete</a></td>
						</tr>
					</tbody>
					<?php }}; ?>
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

