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
        $pincode =  $_POST['pincode'];

        session_start();
        $id = $_SESSION['id'];

        $query = "select asm_pincode, sm_id from area_stock_manager where asm_id=$id;";

        $res = mysqli_query($con,$query);
        $row = mysqli_fetch_assoc($res);
        $asm_pincode = (int)$row['asm_pincode'];
        $sm_id = (int)$row['sm_id'];

        $query2 = "INSERT INTO `stock` ( `s_name`,`brand`,`country_of_origin`,`quantity`,`amount`,`discount`,`pack_size`,`s_pincode`,`asm_id`,`sm_id`) VALUES ('$s_name','$brand','$country_of_origin',$quantity,$amount,$discount,$pack_size,$asm_pincode,$id,$sm_id);";
        $res2 = mysqli_query($con,$query2);
        
        if (!$res2) {
            echo "No data inserted. Error : " . mysqli_error($con); 
        } else {
            echo "<script>alert('Item added Successfully!');window.location.href='../frontend/areaStockManager_dashboard.php'</script>";   
        }
    }
?>