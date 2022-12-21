<?php
    include ("dbconnection.php");

    if (isset($_POST['update_item'])) {
        session_start();
        $asm_id = $_SESSION['id'];

        $p_id = $_POST['p_id'];
        $field_name = $_POST['field_name'];
        $field_value = $_POST['field_value'];

        $tempQuery = "select * from `stock` where `asm_id` = $asm_id and `s_id`='$p_id';";
        $tempRes = mysqli_query($con, $tempQuery);
        
        if(mysqli_fetch_assoc($tempRes)<=0){
            echo "<script>alert('The Product not found!');window.location.href='../frontend/areaStockManager_dashboard.php'</script>";
        }
        else{
            $query = "update `stock` set `$field_name`='$field_value' where `asm_id` = $asm_id and `s_id` = $p_id ;";
            $res = mysqli_query($con, $query);
            echo "<script>alert('Updation Successful!');window.location.href='../frontend/areaStockManager_dashboard.php'</script>";
        }
    }
