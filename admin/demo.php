<?php


    $city = "Ahmedabad";
    $age = 20;
    $gender = "Male";
   $command = escapeshellcmd("C:\Users\sharm\AppData\Local\Programs\Python\Python38-32\python.exe bmi.py ".$city." ".$age." ".$gender);
    $output = shell_exec($command);
echo $output;

   


?>