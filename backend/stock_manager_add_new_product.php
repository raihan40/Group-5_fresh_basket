<?php
    include("dbconnection.php");

    if(isset($_POST['add_item'])){
        $s_name =  $_POST['s_name'];
        $brand =  $_POST['brand'];
        $country_of_origin =  $_POST['country_of_origin'];
        $quantity =  $_POST['quantity'];
        $amount =  $_POST['amount'];
        $discount =  $_POST['discount'];
        $pack_size =  $_POST['pack_size'];
        $pincode =  $_POST['s_pincode'];

        session_start();
        $sm_id = $_SESSION['id'];

        $query = "select asm_id from area_stock_manager where asm_pincode=$pincode;";
        $res = mysqli_query($con,$query);
        if(mysqli_fetch_assoc($res)<=0){
            echo "<script>alert('Pincode not found !');window.location.href='../frontend/stockManager_dashboard.php'</script>";    
        }
        else{
            $res = mysqli_query($con,$query);
            $row3 = mysqli_fetch_assoc($res);
            $asm_id = $row3['asm_id'];
            $query2 = "INSERT INTO `stock` ( `s_name`,`brand`,`country_of_origin`,`quantity`,`amount`,`discount`,`pack_size`,`s_pincode`,`asm_id`,`sm_id`) VALUES ('$s_name','$brand','$country_of_origin',$quantity,$amount,$discount,$pack_size,$pincode,$asm_id,$sm_id);";
            $res2 = mysqli_query($con,$query2);
            
            if (!$res2) {
                echo "<script>alert('Item could not added !');window.location.href='../frontend/stockManager_dashboard.php'</script>";    
            } else {
                echo "<script>alert('Item added Successfully!');window.location.href='../frontend/stockManager_dashboard.php'</script>";   
            }
        }
    }
?>