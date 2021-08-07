<?php include("header.php"); ?>
<?php

	include "connection.php";
	
	session_start();
	
	if(!isset($_SESSION['log']))
	{
		header("location:index.php");
	}
	
	else
	{

		$log = $_GET['id'];

		$qry = "SELECT * FROM user_master WHERE login_id='$log'";
		$result = mysqli_query($con,$qry);
		$value = mysqli_fetch_array($result);
		$id = $value['login_id'];
		$email = $value['email'];

		$sql = "SELECT otp FROM  tb1_otp WHERE otp_id = (SELECT MAX(otp_id) FROM  tb1_otp WHERE login_id='$id' )";
		$result1 = mysqli_query($con,$sql);
		$value1 = mysqli_fetch_array($result1);
		
		$otp = $value1['otp'];

?>

            <!-- Page Container START -->
            <div class="page-container">
                <!-- Content Wrapper START -->
                <div class="main-content">
                    
                    	 <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="otp_num" class="form-control" placeholder="Enter OTP" required />
        <span class="glyphicon glyphicon glyphicon-ok-circle
 form-control-feedback"></span>
      </div>
     
      <div class="row" style="margin-left: 10px">
       <div class="col-xs-12">
          <button type="submit" name="submit" class="btn btn-success btn-block btn-flat">Verify</button>
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
    </form>
<?php
    if(isset($_POST['submit']))
    {
       
        $otp_num = $_POST['otp_num'];
    	$type = $_SESSION['utype'];
		if($otp_num==$otp)
		{
			header("location:view_details.php");
		}
   		else
    	{
      		echo "<br/><font style='color:red;font-size:15px;'>OOPS!! Incorrect OTP :(</font>";
    	}
        
       }
?>
                        
						     
						        </tbody>
						    </table>
						</div>
                      </div>
            </div>
                <!-- Content Wrapper END -->
<?php include("footer.php"); ?>
<?php
	
	}

?>
