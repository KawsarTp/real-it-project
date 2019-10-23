
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
 include "../class/Catagory.php";
 Session::checkSession();
 $cat = new Catagory();
 $catlist = $cat->getAllCat();
 if (isset($_GET['catdel'])) {
 	$delcat =$_GET['catdel'];
 	$result =$cat->delGetById($delcat);
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
					$catget = $cat->getAllCat();
					if ($catget) {
						$i=0;
					while($value = $catget->fetch_assoc()){
						$i++;
					?>
					<tbody>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $value['catname']; ?></td>
							<td><a href="?catedit=<?php echo $value['id'] ?>">Edit</a> || <a href="?catdel=<?php echo $value['id'] ?>">Delete</a></td>
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

