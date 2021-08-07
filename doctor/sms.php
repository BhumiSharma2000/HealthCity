<?php  

$no = 9898660970;
 $authKey = "271014AgVqcYpm9kq5ca716a3";
            $senderId = "BHUMII";
            //$message = urlencode($msg);
            $postData = array(
            'authkey' => $authKey,
            'mobiles' => $no,
            'message' => "Hello Bhumi is spreaded",
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

            ?>