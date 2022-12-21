<?php 
    include ("dbconnection.php");

    if (isset($_POST['stockManager-login'])) {
        $sm_id = $_POST['sm_id'];
        $password = $_POST['password'];
        $query = "SELECT sm_id FROM stock_manager where sm_id ='$sm_id' and sm_password = '$password'";
        $res = mysqli_query($con,$query);  
        $numrows = mysqli_num_rows($res);  
        if ($numrows == 0) {  
            echo "<script>alert('Login Failed. Incorrect Id or Password.');window.location.href='../index.php'</script>"; 
        } else {
            // echo "<script>alert('Login Successful!');window.location.href='../frontend/areaStockManager_dashboard.php'</script>";
            
            session_start();
            $row = mysqli_fetch_assoc($res);
            $id = (int)$row['sm_id'];
            $_SESSION['id'] = $id;

            // --- Redirect to dashboard without alert pop up [Modified Original Code] -----
            header('location:../frontend/stockManager_dashboard.php');
        }
    }
?>