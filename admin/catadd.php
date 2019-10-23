<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    include_once "../class/Catagory.php";

    if (isset($_POST['submit'])) {
        $catagory = new Catagory();
        $data =$catagory->catInsert($_POST['catagory']);
     }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">
                    <?php 
                    if (isset($data)) {
                        echo "<span style='color:red;font-size:20px;font-weight:800;'>{$data}<span>";
                    }

                     ?>					
                        <tr>
                            <td>
                                <input type="text" name="catagory" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>