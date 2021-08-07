
<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
require("dbconnect.php");
require 'dao.php';
require 'model.php';


$d = new dao();
$m = new model();

extract($_POST);
$counter = 1;
$role=2;
$active=1;
$status=1;


if($state == 'Gujarat')
{

  $prefix = 'GJ';
}

  $n=10; 

    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) 
    { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    $cardno =  $prefix.$randomString;

if(isset($_FILES['img1'])){


 
      $file_name = $_FILES['img1']['name'];
      $file_size = $_FILES['img1']['size'];
      $file_tmp = $_FILES['img1']['tmp_name'];
      $file_type = $_FILES['img1']['type'];
      $tmp = explode('.',$_FILES['img1']['name']);
      $file_ext = end($tmp);
    /*  $file_ext=strtolower(end(explode('.',$_FILES['profilepic']['name'])));*/
      $expensions= array("jpeg","jpg","png","PNG","JPEG","JPG");
      
      if(in_array($file_ext,$expensions) == false){
          $_SESSION['fmsg']="extension not allowed, please choose a JPEG,JPG or PNG file.";

      } 
          else {
             if($file_size > 9999999) {
              $_SESSION['fmsg'] = "File size must be less than 2 MB" ;


          }

       else {

        $counter++;
       }
        $counter++;}
   } else { $_SESSION['fmsg']="Empty not allowed";

    }




    if (isset($_POST) && !empty($_POST)) {
      
        
        if (isset($_POST['insert'])) {
          $file = $_FILES['image']['tmp_name'];
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    move_uploaded_file($_FILES["image"]["tmp_name"],"../../uploads/" . $_FILES["image"]["name"]);
    $location="../uploads/" . $_FILES["image"]["name"];


    $file1 = $_FILES['hello']['tmp_name'];
    $image1 = addslashes(file_get_contents($_FILES['hello']['tmp_name']));
    $image_name1 = addslashes($_FILES['hello']['name']);
    move_uploaded_file($_FILES["hello"]["tmp_name"],"../../assets/images/" . $_FILES["hello"]["name"]);
    $location1="../assets/images/" . $_FILES["hello"]["name"];

        function otpprog($fname,$cn,$cardno)
        {
            $authKey = "271014AgVqcYpm9kq5ca716a3";
            $senderId = "BHUMII";
            //$message = urlencode($msg);
            $postData = array(
            'authkey' => $authKey,
            'mobiles' => $cn,
            'message' => "Hello ".$fname." your Health card number is ".$cardno,
            'sender' => $senderId,
            );
            $url="http://api.msg91.com/api/sendhttp.php";
            $ch = curl_init($url);
            curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
            ));
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $response = curl_exec($ch);
            //Print error if any
            if(curl_errno($ch))
            {
                echo 'error:' . curl_error($ch);
            }
            curl_close($ch);
        }
        otpprog($fname,$cn,$cardno);

            
            $m->set_data("fname", $fname);
            $m->set_data("lname", $lname);
            $m->set_data("city", $city);
            $m->set_data("state", $state);
            $m->set_data("gender", $gender);
            $m->set_data("dob", $dob);
            $m->set_data("email", $email);
            $m->set_data("cn", $cn);
            $m->set_data("add", $add);
            $m->set_data("bg", $bg);
             $m->set_data("file_name", $location1);
                $m->set_data("cardno", $cardno);
            $m->set_data("pass", md5($pass));
            $m->set_data("role",$role);
            $m->set_data("active",$active);
            $m->set_data("aadhar",$location);
             $m->set_data("status",$status);
            
            
            $a = array(
                'fname' => $m->get_data(test_input('fname')),
                'lname' => $m->get_data(test_input('lname')),
                'city' => $m->get_data(test_input('city')),
                'state' => $m->get_data(test_input('state')),
                'gender' => $m->get_data(test_input('gender')),
                'dob' => $m->get_data(test_input('dob')),
                'email' => $m->get_data(test_input('email')),
                'phone_no' => $m->get_data(test_input('cn')),
                'blood_group' => $m->get_data(test_input('bg')),
                'password' => $m->get_data(test_input('pass')),
                 'card_id' => $m->get_data(test_input('cardno')),
                  'profile_pic' => $m->get_data(test_input('file_name')),
                'address' => $m->get_data(test_input('add')),
                'role_id' =>$m->get_data(test_input('role')),
                'active' =>$m->get_data(test_input('active')),
                'aadhar' =>$m->get_data(test_input('aadhar')),
                'status' =>$m->get_data(test_input('status'))

                
                
            );

            $q = $d->insert("user_master", $a);
            
            if ($q > 0) {
               $_SESSION['city']="ok";
               header("location:../addpatient.php");
             echo "insert";
            } else {
                echo "Something is wrong";
            }
            
        }
    }





    if (isset($_POST) && !empty($_POST)) {
      
        
        if (isset($_POST['Update'])) {


        if(isset($_FILES['hello'])){
        

             $file1 = $_FILES['hello']['tmp_name'];
    $image1 = addslashes(file_get_contents($_FILES['hello']['tmp_name']));
    $image_name1 = addslashes($_FILES['hello']['name']);
    move_uploaded_file($_FILES["hello"]["tmp_name"],"../../assets/images/" . $_FILES["hello"]["name"]);
    $location1="../assets/images/" . $_FILES["hello"]["name"];
             
             $m->set_data("file_name", $location1);
}
            
            $m->set_data("fname", $fname);
            $m->set_data("lname", $lname);
            $m->set_data("city", $city);
            $m->set_data("state", $state);
            $m->set_data("gender", $gender);
            $m->set_data("dob", $dob);
            $m->set_data("email", $email);
            $m->set_data("cn", $cn);
            $m->set_data("add", $add);
            $m->set_data("bg", $bg);
            // $m->set_data("role",$role);
            // $m->set_data("active",$active);
         
            
            
            $a = array(
                'fname' => $m->get_data(test_input('fname')),
                'lname' => $m->get_data(test_input('lname')),
                'city' => $m->get_data(test_input('city')),
                'state' => $m->get_data(test_input('state')),
                'gender' => $m->get_data(test_input('gender')),
                'dob' => $m->get_data(test_input('dob')),
                'email' => $m->get_data(test_input('email')),
                'phone_no' => $m->get_data(test_input('cn')),
                'blood_group' => $m->get_data(test_input('bg')),
                'address' => $m->get_data(test_input('add'))
                // 'role_id' =>$m->get_data(test_input('role')),
                // 'active' =>$m->get_data(test_input('active'))
                
                
            );



              if(isset($_FILES['hello'])){
                if ($_FILES['hello']['error'] == 0) {
                  $a['profile_pic'] = $m->get_data(test_input('file_name'));
                }
              }


            $q = $d->update("user_master", $a ,"login_id='$editid'");
          
            if ($q > 0) {
               $_SESSION['updatedone']="ok";
               header("location:../gen_card.php");
                echo "insert";
            } else {
                echo "Something is wrong";
            }
            
        }
    }
?>
