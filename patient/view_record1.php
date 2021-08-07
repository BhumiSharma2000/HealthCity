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
        				$count=$row1['access_count'];
        				$sql2="SELECT * FROM patient_master WHERE card_id='$no' AND view=1";
        				$res1=mysqli_query($con,$sql2);
                        ?><h2 style="float: right;"><?php echo "Number of Time my Card Access: ".$count; ?></h2><br/>
                        <div class="table-responsive">

						    <table class="table table-hover">
						        <thead>
						            <tr>
						                <th scope="col">Sr.no</th>
						                <th scope="col">Disease Description</th>
						                <th scope="col">Reason_Visit</th>
						            	<th scope="col">Height</th>
						                <th scope="col">Weight</th>
						                <th scope="col">Prescription</th>
						                <th scope="col">Symptoms</th>
						                <th scope="col">Hide</th>
						            </tr>
						    	</thead>
						    	<tbody>
						    		
						<?php
						$a=1;
                        while($row = mysqli_fetch_array($res1))
                        {
                        	$symptoms = $row['symptoms'];
                        	list($s1,$s2,$s3) = array_pad(explode('##', $symptoms),3,is_null($symptoms));

                        	if($s1!="" AND  $s2=="" AND $s3=="")
							{
								
								$sm = $s1;
							}
							if($s1!="" &&  $s2!="" && $s3=="")
								
							{
								
								$sm = $s1.",".$s2;
							}
							 
							if($s1!="" &&  $s2!="" && $s3!="")
							{
								
								$sm = $s1.",".$s2.",".$s3;
							}

							$ds = $row['disease_description'];
                        	list($d1,$d2,$d3) = array_pad(explode('##', $ds),3,is_null($ds));

                        	if($d1!="" AND  $d2=="" AND $d3=="")
							{
								
								$ds1 = $d1;
							}
							if($d1!="" &&  $d2!="" && $d3=="")
								
							{
								
								$ds1 = $d1.",".$d2;
							}
							 
							if($d1!="" &&  $d2!="" && $d3!="")
							{
								
								$ds1 = $d1.",".$d2.",".$d3;
							}
                        	$i=$row['login_id'];
                ?>      
						            <form action="2.php" method="POST">
						            <tr>
						                <th scope="row"><?php echo $a; ?></th>
						                <td><?php echo $ds1;?></td>
						                <td><?php echo $row['reason_visit'];?></td>
						                <td><?php echo $row['height'];?></td>
						                <td><?php echo $row['weight'];?></td>
						                <td><?php echo $row['prescription'];?></td>
						                <td><?php echo $sm;?></td>
						                <td><button name="submit">View</button>
						                <input type="hidden" name="id" value="<?php echo $row['patient_id'];?>"/></td>
						            </tr>
						              </form>
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
