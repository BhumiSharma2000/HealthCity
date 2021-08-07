<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themenate.com/enlink-bs/dist/sign-up-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Feb 2020 05:06:56 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HealthCity</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/images/logo.png">

    <!-- page css -->

    <!-- Core css -->
    <link href="assets/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('../assets/images/patient.jpg')">
            <div class="d-flex flex-column justify-content-between w-100">
                <?php
                        if(isset($_GET['flag']))
                        {
                            if($_GET['flag']==1)
                            {
                                echo "<center><font style='color:red; text-align:center;font-size:20px'><b>OOPS!!   Incorrect Details...😐</b></font></center><br/>";
                            
                            }
                            else if($_GET['flag']==2)
                            {
                                echo "<center><font style='color:red; text-align:center;font-size:20px'><b>OOPS !! Contact Admin...😐</b></font></center><br/>";
                            
                            }
                            else if($_GET['flag']==3)
                            {
                                echo "<center><font style='color:blue; text-align:center;font-size:20px'><b>Password Changed Successfully...🙂</b></font></center><br/>";
                            
                            }
                            else if($_GET['flag']==5)
                            {
                                echo "<center><font style='color:blue; text-align:center;font-size:20px'><b>User already exists...😐</b></font></center><br/>";
                            
                            }
                            else
                            {
                            }
                        }
                    ?>  
                <div class="container d-flex h-100">
                    
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-5 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                        <img class="img-fluid" alt="" style="height: 90px"src="../assets/images/logo.png">
                                        <h2 class="m-b-0">Sign In</h2>
                                    </div>
                                    <form method="POST" action="check.php"> 
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="email">Email:</label>
                                            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password">Password:</label>
                                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                        </div>
                                        <div class="row">
                               
                                <div class="col p-l-0 m-t-10">
                                    <div class="float-right">
                                        <a href="forgot.php" class="forgottxt_clr text-black">Forgot password ?</a>
                                    </div>
                                </div>
                            </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between p-t-15">
                                                
                                                <button class="btn btn-success" name="submit">Sign In</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

</body>


<!-- Mirrored from themenate.com/enlink-bs/dist/sign-up-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Feb 2020 05:06:56 GMT -->
</html>