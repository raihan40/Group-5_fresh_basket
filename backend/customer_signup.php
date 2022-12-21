<?php include("dbconnection.php");

    if(isset($_POST['add_customer'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pincode = $_POST['pincode'];
        $password = $_POST['password'];
        $confimr_password = $_POST['cpassword'];  
        if(!preg_match("/^[a-zA-Z- ']*$/",$name)){
            echo "<script>alert('Name must contains only letter and whitespace!');window.location.href='../frontend/customer_registration.php'</script>"; 
        }
        $age_limit = 100;
        if($age > $age_limit){
            echo "<script>alert('Enter valid age!');window.location.href='../frontend/customer_registration.php'</script>"; 
        }
        if(preg_match("/^[0-9- ']*$/",$address)){
            echo "<script>alert('Please enter valid address!');window.location.href='../frontend/customer_registration.php'</script>"; 
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<script>alert('Enter valid email id!');window.location.href='../frontend/customer_registration.php'</script>"; 
        }
        if(strlen($phone) != 10){
            echo "<script>alert('Phone number must be in 10 digits.');window.location.href='../frontend/customer_registration.php'</script>"; 
        }
        echo strlen($phone);
        if(preg_match("/^[a-zA-Z- ']*$/",$phone)){
            echo "<script>alert('Please enter valid phone number!');window.location.href='../frontend/customer_registration.php'</script>"; 
        }
        if(strlen($pincode)> 6){
            echo "<script>alert('Pincode cannot be greater than 6 digits.');window.location.href='../frontend/customer_registration.php'</script>"; 
        }
        if(preg_match("/^[a-zA-Z- ']*$/",$pincode)){
            echo "<script>alert('Please enter valid pincode!');window.location.href='../frontend/customer_registration.php'</script>"; 
        }
        if(strlen($password) < 6){
            echo "<script>alert('Password must be in 6 characters.');window.location.href='../frontend/customer_registration.php'</script>"; 
        }

        $query = "SELECT phone_no FROM customer where phone_no = '$phone'";
        $res1 = mysqli_query($con,$query);  
        $numrows = mysqli_num_rows($res1);  
        if($numrows!=0)  {  
            echo "<script>alert('Number already exist!');window.location.href='../frontend/customer_registration.php'</script>"; 
         }

        if($password !=  $confimr_password){
            echo "<script>alert('Password mismatched!')</script>";             
        }
        else {                
            $sql = "INSERT INTO `customer` ( `c_name`,`age`,`c_address`,`gender`,`email_id`,phone_no,`pincode`,`c_password`) VALUES ('$name','$age','$address','$gender','$email','$phone','$pincode','$password');";
            $res = mysqli_query($con,$sql);
        }
    if (!$res) {
        echo "No data inserted. Error : " . mysqli_error($con); 
    } else {
        echo "<script>alert('Registration Successful!');window.location.href='../frontend/customer_registration.php'</script>";   
    }
}

?>