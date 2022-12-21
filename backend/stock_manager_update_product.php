<?php
    include ("dbconnection.php");

    if (isset($_POST['update_item'])) {
        session_start();
        $sm_id = $_SESSION['id'];

        $p_id = $_POST['p_id'];
        $field_name = $_POST['field_name'];
        $field_value = $_POST['field_value'];
        $s_pincode = $_POST['s_pincode'];

        $tempQuery = "select * from `stock` where `s_id`='$p_id' and `s_pincode` = $s_pincode;";
        $tempRes = mysqli_query($con, $tempQuery);
        
        if(mysqli_fetch_assoc($tempRes)<=0){
            echo "<script>alert('The Product not found!');window.location.href='../frontend/stockManager_dashboard.php'</script>";
        }
        else{
            $query = "update `stock` set `$field_name`='$field_value' where `s_pincode` = $s_pincode and `s_id` = $p_id ;";
            $res = mysqli_query($con, $query);
            echo "<script>alert('Updation Successful!');window.location.href='../frontend/stockManager_dashboard.php'</script>";
        }
    }
