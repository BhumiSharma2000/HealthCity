 <?php

    require 'lib/dao.php';
      $d = new dao();
      session_start();
    include "header.php";
extract($_GET);
extract($_POST);


?>
 <div class="page-container">
                

                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Profile</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Doctor</a>
                                <a class="breadcrumb-item" href="#">Verfiy</a>
                                <span class="breadcrumb-item active">Doctor Details</span>
                            </nav>
                        </div>
                    </div>
                    <div class="container">
                    	 <?php
    
           $q5 = $d->select("user_master,doctor_master","user_master.login_id='$editid' && doctor_master.login_id='$editid' ");
        


          //$data = mysqli_query($con,$q);cd
          $i = 0; 
          while( $result = mysqli_fetch_array($q5)){




         
                    

    
        if($result['status']==0)
        {
            $label = "Unverfied"." <i class='anticon anticon-close' style='color:red !important;'></i>";
        }
        else{
            $label = "Verified"." <i class='anticon anticon-check' style='color:green !important;'></i>";
        }
      
         ?>
                        <div class="card">
                            <div class="card-body">
                            	 <form action="verify.php" method="post">
                            	 	<input type="hidden" name="editid" value="<?php echo $result['login_id']?>">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <div class="d-md-flex align-items-center">
                                            <div class="text-center text-sm-left ">
                                                <div class="avatar avatar-image" style="width: 150px; height:150px">
                                                    <img src="<?php echo $result['profile_pic']; ?>" alt="">
                                                </div>
                                            </div>
                                            <div class="text-center text-sm-left m-v-15 p-l-30">
                                                <h2 class="m-b-5"><?php echo $result['fname']." ".$result['lname'];?></h2>
                                                <p class="text-dark m-b-20">Doctor , HealthCity</p>
                                                <p class="text-dark m-b-20"><?php echo $label; ?></p>
                                                  <button type="submit" name="Update" class="btn btn-success btn-tone m-r-5" <?php if ($result['status']==1) {

                                                  	echo "disabled";
                                                  }?>>
                                                <i class="anticon anticon-check"></i>
                                                    <span class="m-l-5">Verify</span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="d-md-block d-none border-left col-1"></div>
                                            <div class="col">
                                                <ul class="list-unstyled m-t-10">
                                                    <li class="row">
                                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                            <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                                            <span>Email: </span> 
                                                        </p>
                                                        <p class="col font-weight-semibold"><?php echo $result['email']; ?></p>
                                                    </li>
                                                    <li class="row">
                                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                            <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                                            <span>Phone: </span> 
                                                        </p>
                                                        <p class="col font-weight-semibold"> <?php echo $result['phone_no']; ?></p>
                                                    </li>
                                                    <li class="row">
                                                        <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                            <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                            <span>Location: </span> 
                                                        </p>
                                                        <p class="col font-weight-semibold"> <?php echo $result['city']." , ".$result['state']; ?></p>
                                                    </li>
                                                     <li class="row">
                                                        <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                            <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                            <span>Licence No:</span> 
                                                        </p>
                                                        <p class="col font-weight-semibold"> <?php echo $result['registration_number']; ?></p>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php   }?>
                   </div>
</form>
                <!-- Content Wrapper END -->

               
<script type="text/javascript">
        

        var ld = document.getElementById('loading');


        function f1()
        {


            ld.style.display = 'none';
        }
    </script>
    
    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

</body>


<!-- Mirrored from themenate.com/enlink-bs/dist/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Feb 2020 05:06:29 GMT -->
</html>