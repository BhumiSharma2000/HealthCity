<?php include("header.php");
	session_start();	
	$log = $_SESSION['log'];
?>
            <!-- Page Container START -->
            <div class="page-container">
                <!-- Content Wrapper START -->
                <div class="main-content">
                        <?php
                        $sql1="SELECT * FROM user_master WHERE email='$log'";
                        $res=mysqli_query($con,$sql1);
        				$row1=mysqli_fetch_array($res);
        				$no=$row1['card_id'];
        				$name=$row1['fname'];
        				$sql2="SELECT * FROM record_master WHERE card_id='$no' AND Report LIKE '%tcs%'";
        				$res1=mysqli_query($con,$sql2);
                        ?>
                        <div class="table-responsive">
						    <table class="table table-hover">
						        <thead>
						            <tr>
						                <th scope="col">Sr.no</th>
						                <th scope="col">Report</th>
						                <th scope="col">Report_Details</th>
						            	<th scope="col">Time</th>
						            </tr>
						    	</thead>
						    	<tbody>
						<?php
						$a=1;
                        while($row = mysqli_fetch_array($res1))
                        {
                        	
                ?>      
						            <tr>
						                <th scope="row"><?php echo $a; ?></th>
						                <td><a href="view_report2.php?id=<?php echo $row['file_upload']; ?>&&lab=<?php echo $row['lab'];?>">View Report</td>						                <td><?php echo $row['file_description'];?></td>
						                <td><?php echo $row['upload_time'];?></td>
						            </tr>
						           <?php
						           $a++;
						       }
						   
						       ?>
						        </tbody>
						    </table>
						</div>
                	</div>
                </div>
            </div>
                <!-- Content Wrapper END -->
<?php include("footer.php"); ?>
