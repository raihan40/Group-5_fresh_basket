<!DOCTYPE html>
<html lang="en">
<head>
    <title>FBasket | Area Stock Manager</title>
	
	<link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/x-icon" href="../imgs/favicon.png">
</head>
<body>
    <header>
        <hi class="logo">FreshBasKet</hi>
        <input type="checkbox" id="nav-toggle" class="nav-toggle" />
        <nav>
            <ul>
				<li><a href="../index.php">Home</a></li>
                <li><a href="../frontend/stockManager_dashboard.php">Dashboard</a></li>
                <li><a href="../frontend/maintenance.php">Notices</a></li>
                <li><a href="../frontend/maintenance.php">Contact Us</a></li>
            </ul>
        </nav>
        <!-- ------------------ Logout drop down added here ------------------>
        <div class="login">
            <ul>
                <li><a href="#/"><img class="profile-icon" src="../imgs/Profile-icon.png" alt="NO img"></a>
                    <div class="dropdown">
                        <ul>
                            <li><a href="logout.php" class="logout-btn"><img class="logout-icon" src="../imgs/Logout.png" alt="NO img"> Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <label for="nav-toggle" class="nav-toggle-lable"> 
            <span></span>
        </label>
    </header>

    <main>
        <section class="container-color-tables">
            <h1>Area Stock Manager List</h1>
            <div class="container">
                <!-------------------- This is the Backend code [Unmodified Code] ------------------>
                <?php
                    include ("dbconnection.php");

                    if (isset($_POST['find-asm'])) {
                        $asm_name =  $_POST['asm-name'];

                        session_start();
                        $sm_id = $_SESSION['id'];

                        $query = "select * from `area_stock_manager` where `asm_name`='$asm_name';";
                        $res = mysqli_query($con, $query);
                        if(mysqli_fetch_assoc($res)<=0){
                            echo "<h2>The Name not found!</h2>";
                        }
                        else{
                            $res2 = mysqli_query($con, $query);
                            $str = "<table><tr><th>Asm Id</th><th>ASM Password</th><th>ASM Name</th><th>ASM Pincode</th></tr>";
                            while ($row = mysqli_fetch_assoc($res2)) {
                                $str .= "<tr><td>{$row['asm_id']}</td><td>{$row['asm_password']}</td><td>{$row['asm_name']}</td><td>{$row['asm_pincode']}</td></tr>";
                            }
                            $str.="</table>";
                            echo $str;
                        }
                    }
                ?>
            </div>
        </section>
        <hr>
    </main>

    <script type="text/javascript" src="../js/main.js"></script>
    </body>
</html>