<?php 
    include ("dbconnection.php");

    if (isset($_POST['areaStockManager-login'])) {
        $pincode = $_POST['pincode'];
        $password = $_POST['password'];
        $query = "SELECT asm_id FROM area_stock_manager where asm_pincode ='$pincode' and asm_password = '$password'";
        $res = mysqli_query($con,$query);  
        $numrows = mysqli_num_rows($res);  
        if ($numrows == 0) {  
            echo "<script>alert('Login Failed. Incorrect Pincode or Password.');window.location.href='../index.php'</script>"; 
        } else {
            // echo "<script>alert('Login Successful!');window.location.href='../frontend/areaStockManager_dashboard.php'</script>";
            
            session_start();
            $row = mysqli_fetch_assoc($res);
            $id = (int)$row['asm_id'];
            $_SESSION['id'] = $id;

            // --- Redirect to dashboard without alert pop up [Modified Original Code] -----
            header('location:../frontend/areaStockManager_dashboard.php');
        }
    }
?>