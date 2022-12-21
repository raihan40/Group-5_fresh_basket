<?php 
    include ("dbconnection.php");

    if (isset($_POST['customer-login'])) {
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $query = "SELECT c_id , pincode FROM customer where (phone_no = '$phone' or email_id = '$phone') and c_password = '$password'";
        $res = mysqli_query($con,$query);  
        $numrows = mysqli_num_rows($res);  
        if ($numrows == 0) {  
            echo "<script>alert('Login Failed. Incorrect Phone No. / Email Id. or Password.');window.location.href='../index.php'</script>"; 
        } else {
            session_start();
            $row = mysqli_fetch_assoc($res);
            $id = (int)$row['c_id'];
            $_SESSION['id'] = $id;
            $_SESSION['pincode'] = $row['pincode'];

            // --- Redirect to dashboard without alert pop up [Modified Original Code] -----
            header('location:../frontend/customer_dashboard.php');
        }
    }
?>