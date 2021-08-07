<?php include("header.php"); ?>
            <!-- Page Container START -->
            <?php
                       $k=$_GET['k'];
                    
                        $sql1="SELECT * FROM user_master WHERE login_id='$k'";
                        $res=mysqli_query($con,$sql1);
                        $row1=mysqli_fetch_array($res);
                        $no=$row1['card_id'];
                        $name=$row1['fname'];
                        $sql2="SELECT * FROM patient_master WHERE card_id='$no'";
                        $res1=mysqli_query($con,$sql2);

                        ?>
            <div class="page-container">
                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div style="margin-top: 20px;font-size: 20px"><b>Name: <?php echo $name;?></b><br/><b>Registration Number: <?php echo $no;?></b><br/><br/></div>
                        <div class="table-responsive">
						    <?php
						    $id=$_GET['id'];
						    ?>
						                <iframe src="<?php echo $id ?>" width="90%" height="600px"></iframe>						           
						       
						</div>
                	</div>
                </div>
            </div>
                <!-- Content Wrapper END -->
<?php include("footer.php"); ?>
