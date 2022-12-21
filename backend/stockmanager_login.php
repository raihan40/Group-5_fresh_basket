<?php include("dbconnection.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock_Manager_LOG_IN</title>
    <link href = "style.css" rel="stylesheet"></link>
     <h1 text-align: center>Stock_Manager_LOG_IN</h1>
     <style> 
input[type=text] {
 
  box-sizing: border-box;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}

input[type=text]:focus {
  border: 3px solid #555;
}
</style>
</head>
<body >
    <div> 
        <form action = "" method = "post" class="form-style">
            
        <div class="input-field">

            <div class="input-field">
                <label for="Manager_Id">Manager_Id : </label>
                <input name="Manager_Id" type="text"required><br>
            </div>
            <div class="input-field">
                <label for="password">Password : </label>
                <input name="password" type="password" maxlength="6" required><br>
            </div>
            <div class="input-field">
                <input type = "submit" name = "submit" value = "Submit">
            </div>
        </form>

    </div>

    <?php

    if(isset($_POST['submit'])){
            $id = $_POST['Manager_Id'];
            $password = $_POST['password'];
            $query = "SELECT sm_id , sm_password FROM stock_manager where sm_id = '$id' and sm_password = '$password'";
            $res = mysqli_query($con,$query);  
            $numrows = mysqli_num_rows($res);  
        if($numrows==0)  
         {  
            echo '<script>alert("Incorrect id /password ")</script>';
            die();
         }
         else{
            echo '<script>alert("Successfully logged in.")</script>';
         }

    }

    ?>
    
</body>
</html>