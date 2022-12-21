<!------------------------ Declarations -----------------------
    A. Customer Registration Form -
        Input Names :
            1. "name"
            2. "age"
            3. "address"
            4. "gender"
            5. "email"
            6. "phone"
            7. "pincode"
            8. "password"
            9. "cpassword"

        Button Names :
            1. "add_customer" 
--------------------------------------------------------------->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>FBasket | Registration</title>
	
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
                <li><a href="#" class="active-link">Sign Up</a></li>
                <li><a href="maintenance.php">About</a></li>
                <li><a href="maintenance.php">Contact Us</a></li>
            </ul>
        </nav>
        <label for="nav-toggle" class="nav-toggle-lable"> 
            <span></span>
        </label>
    </header>

    <main>
        <section>
            <h1>Customer Registration</h1>
            <div class="container">
                <!----------------------------- Add form address here ------------------------------>
                <form action="../backend/customer_signup.php" method="post" class="form-control form-control-registration">
                    <div class="col">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" value="" class="form-inputbar" required/>
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Age</label>
                        <input type="number" name="age" value="" class="form-inputbar" required/>
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Address</label>
                        <input type="text" name="address" value="" class="form-inputbar" required/>
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Gender</label>
                        <input type="text" name="gender" value="" list="gender" class="form-inputbar" placeholder="Enter or select gender" required/>
                        <datalist id="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </datalist>
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Email Id.</label>
                        <input type="email" name="email" value="" class="form-inputbar" placeholder="eg. john@gmail.com" required/> 
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Phone No.</label>
                        <input type="number" name="phone" value="" class="form-inputbar" placeholder="Enter valid phone number" required/>
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Pincode</label>
                        <input type="number" name="pincode" value="" class="form-inputbar" placeholder="eg. 700144" required/>
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" value="" class="form-inputbar" minlength="5" placeholder="Enter a strong password" required/>
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Confirm Password</label>
                        <input type="password" name="cpassword" value="" class="form-inputbar" minlength="5" placeholder="Confirm your password" required/>
                    </div>
                    <div class="col">
                    </div>
                    <div class="col">
                        <button type="submit" name="add_customer" class="form-inputbar btn btn-view" id="btn-form-submit">Submit</button>
                    </div>
                    <div class="col">
                        <button type="reset" class="form-inputbar btn btn-delete" id="btn-form-reset" onclick='return checkDelete()'>Reset</button>
                    </div>
                </form>
            </div>
        </section>
        <hr class="breadcrumbs-hr"> 
    </main>

    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>