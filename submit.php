<?php

if (isset($_POST['submit'])) {
    $conn = mysqli_connect("localhost", "root", "", "db");
    if (!$conn) {
        echo "Error";
        exit;
    }
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email  = $_POST['email'];
    $job_role =$_POST['job_role'];
    $address =$_POST['address'];
    $city =$_POST['city'];
    $pincode=$_POST['pincode'];
    //files to upload
    $file=$_FILES["file"]["name"];
    $tempname=$_FILES["file"]["tmp_name"];
    $folder="images/".$file;

    
    $date=$_POST['date'];
    if (empty($fname) or empty($lname) or empty ($email) or empty($job_role) or empty($address) or empty($city) or empty($pincode)) {
            echo "Please fill all fields";
        } else {
            $sql = mysqli_query($conn, "insert into newdb (fname,lname,email,job_role,address,city,pincode,date,file) values ('$fname','$lname','$email','$job_role','$address','$city','$pincode','$date','$file')");
            move_uploaded_file($tempname,$folder);
            if (!$sql) echo "insert error";
    }
}
