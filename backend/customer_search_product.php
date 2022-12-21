<!DOCTYPE html>
<html lang="en">
<head>
    <title>FBasket | Customer</title>
	
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
                <li><a href="../frontend/customer_dashboard.php">Dashboard</a></li>
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
            <h1>Product List</h1>
            <div class="container">
                <!-------------------- This is the Backend code [Unmodified Code] ------------------>
                <?php
                    include ("dbconnection.php");

                    if (isset($_POST['find-item'])) {
                        $p_name =  $_POST['product-name'];

                        session_start();
                        $pincode = $_SESSION['pincode'];

                        $query = "select * from `stock` where `s_name` = '$p_name' and `s_pincode` = $pincode;";
                        $res = mysqli_query($con, $query);
                        if(mysqli_fetch_assoc($res)<=0){
                            echo "<h2>The Product not found!</h2>";
                        }
                        else{
                            $res2 = mysqli_query($con, $query);
                            $str = "<table><tr><th>Stock Id</th><th>Product Name</th><th>Pack Size(gm.)</th><th>Amount(Rs.)</th><th>Discount(%)</th><th>Country of Origin</th><th>Brand</th></tr>";
                            while ($row = mysqli_fetch_assoc($res2)) {
                                $str .= "<tr><td>{$row['s_id']}</td><td>{$row['s_name']}</td><td>{$row['pack_size']}</td><td>{$row['amount']}</td><td>{$row['discount']}</td><td>{$row['country_of_origin']}</td><td>{$row['brand']}</td></tr>";
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