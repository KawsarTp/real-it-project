<?php include 'inc/header.php';?>

<?php 

include '../class/quotationList.php';

$ql = new quotationList();
$formate = new Format();

if (isset($_GET['id'])) {
    $result = $ql->approvalPdf($_GET['id']);
}
 ?>
        <div class="grid_12">
            <div class="box round first grid">
                <h2> Quotation List</h2>
                <div class="block">               
                  <table class="data display datatable" id="example">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Model</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Day</th>
                            <th>Cameraname</th>
                            <th>Quantity</th>
                            <th>UnitPrice</th>
                            <th>Total</th>
                            <th>Serial</th>
                            <th>Session</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr class="odd gradeX">
                            <?php 
                                $data = $ql->getData();
                                if ($data) {
                                    $i =0;
                                    while($row = $data->fetch_assoc()){
                                        $i++;
                         ?>
                         <td><?php echo $i;?></td>
                         <td><?php echo $row['name'];?></td>
                         <td><?php echo $row['model'];?></td>
                         <td><?php echo $row['email'];?></td>
                         <td><?php echo $formate->textShorten($row['address'],$limit=10);?></td>
                         <td><?php echo $row['mobile'];?></td>
                         <td><?php echo $row['day'];?></td>
                         <td><?php echo $row['cameraname'];?></td>
                         <td><?php echo $row['quantity'];?></td>
                         <td><?php echo $row['unitprice'];?></td>
                         <td><?php echo $row['totalprice'];?></td>
                         <td><?php echo $row['serialNo'];?></td>
                         <td><?php echo $formate->textShorten($row['session'],$limit=10)?></td>
                         <td>
                            <a href="?id=<?php echo $row['id'] ?>" class="btn btn-default">Approve</a>
                         </td>

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