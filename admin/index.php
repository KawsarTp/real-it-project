<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 

include '../class/quotationList.php';

$ql = new quotationList();
 $formate = new Format();


 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2> Dashbord</h2>
                <div class="block">               
                  <a href="quotationlist.php" class="btn btn-primary">Click To SEE Quotation</a>     
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