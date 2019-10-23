<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../class/changepassword.php'; ?>
<?php 

if ($_SERVER['REQUEST_METHOD']=="POST") {
   $chg = new ChangePassword();
   $data = $chg->changePass($_POST);
}


 ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Change Password</h2>
        <div class="block">               
         <form>
            <table class="form" method="post">
            <?php 

                if (isset($data)) {
                    echo $data;
                }

             ?>					
                <tr>
                    <td>
                        <label>Old Password</label>
                    </td>
                    <td>
                         <input type="password" placeholder="Enter New Password..." name="newpass" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>New Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter New Password..." name="newpass" class="medium" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>