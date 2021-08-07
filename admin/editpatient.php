<?php



    require 'lib/dao.php';
     $d = new dao();
      session_start();
     include "header.php";
error_reporting(E_ERROR | E_PARSE);
extract($_GET);


  
           $q5 = $d->select("user_master","login_id='$id'");
          //$data = mysqli_query($con,$q);
          $i = 0; 
          while( $result = mysqli_fetch_array($q5)){

        
        $img1 = "".$result['profile_pic'];
      
          $options = $result['blood_group'];
         
?>
            <!-- Page Container START -->
              <link type="text/css" rel="stylesheet" href="assets/css/custom.css" />
            <div class="page-container ">
                

                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="row bg-white">
                       <div class="col-lg-8 bg-white">
                    
                            <div class="col-md-8 col-lg-7 col-xl-6 mx-auto">
                                <br>
                                <h2>Edit Patient</h2>
                                <p class="m-b-30"> Edit Patient Details</p>
                                <form action="lib/controller_patient.php"  method="post"  enctype="multipart/form-data" >
                                    <input type="hidden" name="editid" value="<?php echo $id?>">
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="userName">First Name:</label>
                                        <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo $result['fname']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="userName">Last Name:</label>
                                        <input type="text" class="form-control" name="lname" placeholder="last Name" value="<?php echo $result['lname']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="email">Email:</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $result['email']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="email">Contact No:</label>
                                        <input type="text" class="form-control" name="cn" placeholder="Contact Number" value="<?php echo $result['phone_no']; ?>">
                                    </div>
                                   <div class="form-group">
                                            <label>Date Of Birth</label>
                                            <div class="input-affix m-b-10">
                                                <i class="prefix-icon anticon anticon-calendar"></i>
                                                <input type="text" class="form-control datepicker-input" name="dob" value="<?php echo $result['dob']; ?>" placeholder="Pick a date">
                                            </div>
                                        </div>
                                    <div class="form-control">
                                         <label>Gender</label>
                                        <div>
                                        <input id="radio1" name="gender" type="radio" value="male" <?php if($result['gender']=='male') {echo  "checked"; } ?>>
                                        <label for="radio1">Male</label>


                                        <input id="radio2" name="gender" type="radio" value="Female" <?php if($result['gender']=='Female') {echo  "checked"; } ?>>
                                        <label for="radio2">Female</label>
                                    </div>
                                    </div>
                                    <br>    
                                
                                   <div class="form-group ">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new img-thumbnail text-xs-center">
                                                           <img src="<?php echo $img1;?>" data-src="<?php echo $img1;?>" alt="not found" style="width: 230px; height: 170px;">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists img-thumbnail"></div>
                                                        <div class="m-t-20 text-xs-center">
                                                            <span class="btn btn-success btn-tone m-r-5 btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" id="profile-img" name="hello"  class="form-control" placeholder="" class="btn btn-warning fileinput-exists" style="width: 300px" ></span>
                                                            <a href="#" class="btn btn-danger btn-tone m-r-5 fileinput-exists"
                                                                data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                    </div>
                                     <div class="form-group" style="margin-top: 70px">
                                        <label class="font-weight-semibold" for="email">State:</label>
                                        <input type="text" class="form-control" name="state" placeholder="State" value="<?php echo $result['state']; ?>">
                                    </div>
                                     <div class="form-group">
                                        <label class="font-weight-semibold" for="email">City:</label>
                                        <input type="text" class="form-control" name="city" placeholder="City" value="<?php echo $result['city']; ?>">
                                    </div>
                                     <div class="form-group">
                                        <label class="font-weight-semibold" for="email">Address</label>
                                        <textarea class="form-control" name="add"> <?php echo $result['address']; ?> </textarea>

                                    </div>
                                 <div class="form-group">
                                    <label>Blood Group: &nbsp; </label>
            
                                        <select class="select2"  name="bg" class="form-control-lg" style="width: 100px !important;" >
                                            <option value="A+"  <?php if($options=="A+") echo "selected"; ?> >A+</option>
                                            <option value="A-" <?php if($options=="A-") echo "selected"; ?>>A-</option>
                                            <option value="B+" <?php if($options=="B+") echo "selected"; ?> >B+</option>
                                            <option value="B-" <?php if($options=="B-") echo "selected"; ?>>B-</option>
                                             <option value="O+" <?php if($options=="O+") echo "selected"; ?>>O+</option>
                                            <option value="O-"<?php if($options=="O-") echo "selected"; ?> >O-</option>
                                             <option value="AB+" <?php if($options=="AB+") echo "selected"; ?>>AB+</option>
                                            <option value="AB-" <?php if($options=="AB-") echo "selected"; ?>>AB-</option>
                                        </select>
                                    </div>          

                                   
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between p-t-15">
                                            
                                            <button class="btn btn-success btn-tone m-r-5" type="submit" name="Update" >Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>  
                    </div>
                </div>  
                
                <!-- Content Wrapper END -->

            <!-- Page Container END -->

            
        </div>
    </div>
<?php  }?>
    
    <!-- Core Vendors JS -->
<script type="text/javascript" src="assets/js/alert.js"></script>



      <?php if(isset($_SESSION['city'])){?>
        <script>
          swal("Patient Registerd SuccessFully! ","");
         
        </script>   
    <?php }
     unset($_SESSION['city']);?>



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
    <script src="assets/vendors/select2/select2.min.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/quill/quill.min.js"></script>
    <script src="assets/js/pages/form-elements.js"></script>
   <script type="text/javascript" src="assets/js/pluginjs/jasny-bootstrap.js"></script>
    <!-- Core JS -->
   
    <script src="assets/js/app.min.js"></script>

</body>


<!-- Mirrored from themenate.com/enlink-bs/dist/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Feb 2020 05:03:21 GMT -->
</html>