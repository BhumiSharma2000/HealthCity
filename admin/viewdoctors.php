 <?php

    require 'lib/dao.php';
      $d = new dao();
      //session_start();
    include "header.php";



?>
  


 <div class="page-container">
                

                <!-- Content Wrapper START -->
                <div class="main-content">
                   
                    <div class="row">
                        <div class="col-lg-11 mx-auto">
                            <!-- Card View -->
                            <div class="row" id="card-view">
                                <?php
    
           $q5 = $d->select("user_master","role_id='1'");
          //$data = mysqli_query($con,$q);
          $i = 0; 
          while( $result = mysqli_fetch_array($q5)){

        
        $img1 = "".$result['profile_pic'];
        if($result['status']==0)
        {
            $label = "Unverfied"." <i class='anticon anticon-close' style='color:red !important;'></i>";
        }
        else{
            $label = "VerifIed"." <i class='anticon anticon-check' style='color:green !important;'></i>";
        }
      
         ?>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body" style="">
                                            <div class="m-t-20 text-center">
                                                <form action="viewdetails.php" method="post">
                                                    <input type="hidden" name="editid" value="<?php echo $result['login_id']?>">
                                                <div class="avatar avatar-image" style="height: 100px; width: 100px;">
                                                    <img src="<?php echo $img1 ?>" alt="">
                                                </div>
                                                <h4 class="m-t-30"><?php echo $result['fname']." ".$result['lname'];?></h4>
                                                 <span ><b>Status : &nbsp;</b><b id="gn" style="display: inline-block;"> <?php echo  $label; ?></b></span>
                                                 <span ><b>Registration Number : &nbsp;</b><b id="gn" style="display: inline-block;"> <?php echo  "1546348"; ?></b></span>
                                            </div>
                                            
                                            <div class="text-center m-t-30">
                                                <button type="submit" name="Update" class="btn btn-success btn-tone m-r-5">
                                                <i class="anticon anticon-check"></i>
                                                    <span class="m-l-5">View Details</span></button>
                                            
                                            </div>
                                        </form>
                                        </div>
                                    </div>

                                </div>

                          <?php  } ?>
                            </div>
                            <div class="row d-none" id="list-view">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Social</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="media align-items-center">
                                                                        <div class="avatar avatar-image">
                                                                            <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                                        </div>
                                                                        <div class="media-body m-l-15">
                                                                            <h6 class="mb-0">Erin Gonzales</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>erin.gon@gmail.com</td>
                                                                <td>
                                                                    <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                                        <i class="anticon anticon-facebook"></i>
                                                                    </button>
                                                                    <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                                        <i class="anticon anticon-twitter"></i>
                                                                    </button>
                                                                    <button class="m-r-5 btn btn-icon btn-hover btn-rounded">
                                                                        <i class="anticon anticon-instagram"></i>
                                                                    </button>
                                                                </td>
                                                                <td class="text-right">
                                                                    <a href="profile.html" class="btn btn-primary btn-tone">
                                                                        <i class="anticon anticon-mail"></i>
                                                                        <span class="m-l-5">Contact</span>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
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
    <script src="assets/js/pages/profile.js"></script>

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

</body>


<!-- Mirrored from themenate.com/enlink-bs/dist/members.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Feb 2020 05:06:30 GMT -->
</html>