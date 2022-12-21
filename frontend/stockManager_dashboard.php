<!------------------------ Declarations -----------------------
    A. Search Product Form -
        Input Names :
            1. "product-name"

        Button Names :
            1. "find-item"

    B. Add Product Form -
        Input Names :
            1. "s_name"
            2. "brand"
            3. "country_of_origin"
            4. "quantity"
            5. "amount"
            6. "discount"
            7. "pack_size"
            8. "s_pincode"

        Button Names :
            1. "add_item"
        
    C. Update Product Form -
        Input Names :
            1. "s_id"
            2. "s_name"
            3. "brand"
            4. "country_of_origin"
            5. "quantity"
            6. "amount"
            7. "discount"
            8. "pack_size"
            9. "s_pincode"

        Button Names :
            1. "update_item"

    D. Search Area Stock Manager Form -
        Input Names :
            1. "asm-name"

        Button Names :
            1. "find-asm"
--------------------------------------------------------------->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>FBasket | Stock Manager</title>
	
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
                <li><a href="maintenance.php">About</a></li>
                <li><a href="maintenance.php">Notices</a></li>
                <li><a href="maintenance.php">Contact Us</a></li>
            </ul>
        </nav>
        <!-- ------------------ Logout drop down added here ------------------>
        <div class="login">
            <ul>
                <li><a href="#/"><img class="profile-icon" src="../imgs/Profile-icon.png" alt="NO img"></a>
                    <div class="dropdown">
                        <ul>
                            <li><a href="../backend/logout.php" class="logout-btn"><img class="logout-icon" src="../imgs/Logout.png" alt="NO img"> Logout</a></li>
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
        <section class="breadcrumbs">
            <div class="breadcrumbs-title">
                <!-- This part is added by Debjyoti use for session details [Modification Done] -->
                <?php
                    include ("../backend/dbconnection.php");
                    session_start();
                    $id = $_SESSION['id'];
                    $ar = $con->query("SELECT `sm_name` FROM `stock_manager` WHERE `sm_id` = '$id' LIMIT 1");
                    $userData = $ar->fetch_assoc(); 

                    if($userData == 0){
                        echo "<script>alert('Login Failed. Reenter Log In Credentials.');window.location.href='../index.php'</script>"; 
                    }
                    // You can add any class or id [Modification Done]
                    echo "  <h2>Welcome ".$userData['sm_name']." </h2>
                            <h2>User Id. - ".$id."</h2>";
                ?>           
            </div>
        </section>
        <hr class="breadcrumbs-hr"> 

        <section>
            <h1>Welcome</h1>  
            <div class="container">
                <div class="tabs">
                    <!-- ---------------------- Search Product Tab --------------------- -->
                    <input type="radio" id="tab-view-client" name="tabs-clients" checked="checked">
                    <label class="tab-label label-view" for="tab-view-client">Search Product</label>
                    <div class="tab-content tab-content-view">
                        <h2>Search Product</h2>
                        <!-------------------- Add form address here ----------------------->
                        <form action="../backend/stock_manager_search_product.php" method="post" class="search-control">   
                            <input type="text" class="search-bar" name="product-name" placeholder="Enter Product Name" required/>
                            <button class="btn btn-find" name="find-item" type="submit">Find Product</button>
                        </form>
                    </div>

                    <!------------------------ Add New Product Tab ------------------------>
                    <input type="radio" id="tab-add-client" name="tabs-clients">
                    <label class="tab-label label-add" for="tab-add-client">Add Product</label>
                    <div class="tab-content tab-content-add">
                        <h2>Add New Product</h2>
                        <!-------------------- Add form address here --------------->
                        <form action="../backend/stock_manager_add_new_product.php" method="post" class="form-control">
                            <div class="col">
                                <label for="" class="form-label">Product Name</label>
                                <input type="text" name="s_name" value="" class="form-inputbar" required/>
                            </div>
                            <div class="col">
                                <label for="" class="form-label">Brand Name</label>
                                <input type="text" name="brand" value="" class="form-inputbar" required/>
                            </div>
                            <div class="col">
                                <label for="" class="form-label">Country of Origin</label>
                                <input type="text" name="country_of_origin" value="" class="form-inputbar" required/>
                            </div>
                            <div class="col">
                                <label for="" class="form-label">Quantity</label>
                                <input type="number" name="quantity" value="" class="form-inputbar" required/>
                            </div>
                            <div class="col">
                                <label for="" class="form-label">Amount (&#x20b9;)</label>
                                <input type="number" name="amount" value="" class="form-inputbar" required/>
                            </div>
                            <div class="col">
                                <label for="" class="form-label">Discount (%)</label>
                                <input type="number" name="discount" value="" class="form-inputbar" required/>
                            </div>
                            <div class="col">
                                <label for="" class="form-label">Pack Size (g)</label>
                                <input type="number" name="pack_size" value="" class="form-inputbar" required/>
                            </div>
                            <div class="col">
                                <label for="" class="form-label">Pincode</label>
                                <input type="number" name="s_pincode" value="" class="form-inputbar" required/>
                            </div>
                            <div class="col">
                            </div>
                            <div class="col">
                            </div>
                            <div class="col">
                                <button type="submit" name="add_item" class="form-inputbar btn btn-view" id="btn-form-submit">Submit</button>
                            </div>
                            <div class="col">
                                <button type="reset" class="form-inputbar btn btn-delete" id="btn-form-reset" onclick='return checkDelete()'>Reset</button>
                            </div>
                        </form>
                    </div> 

                    <!------------------------ Update Product Tab ------------------------->
                    <input type="radio" id="tab-delete-client" name="tabs-clients">
                    <label class="tab-label label-delete" for="tab-delete-client">Update Product</label>
                    <div class="tab-content tab-content-delete">
                        <h2>Update Existing Product</h2>
                        <!-------------------- Add form address here ----------------------->
                        <form action="../backend/stock_manager_update_product.php" method="post" class="form-control">
                            <div class="col">
                                <label for="" class="form-label">Product Id.</label>
                                <input type="number" name="p_id" value="" class="form-inputbar" required/>
                            </div>
                            <div class="col">
                                <label for="" class="form-label">Update Field</label>
                                <input type="text" name="field_name" value="" list="field_name" class="form-inputbar" required/>
                                <datalist id="field_name">
                                    <option value="s_name">Name of Product</option>
                                    <option value="brand">Brand of Brand</option>
                                    <option value="country_of_origin">Country of Origin</option>
                                    <option value="quantity">Quantity of Product</option>
                                    <option value="amount">Amount of Product</option>
                                    <option value="discount">Discount Rate</option>
                                    <option value="pack_size">Pack Size of Product</option>
                                </datalist>
                            </div>
                            <div class="col">
                                <label for="" class="form-label">Field Value</label>
                                <input type="text" name="field_value" value="" class="form-inputbar" required/>
                            </div>
                            <div class="col">
                                <label for="" class="form-label">Pincode</label>
                                <input type="number" name="s_pincode" value="" class="form-inputbar" required/>
                            </div>
                            <div class="col">
                            </div>
                            <div class="col">
                            </div>
                            <div class="col">
                            </div>
                            <div class="col">
                                <button type="submit" name="update_item" class="form-inputbar btn btn-view" id="btn-form-submit">Submit</button>
                            </div>
                            <div class="col">
                                <button type="reset" class="form-inputbar btn btn-delete" id="btn-form-reset" onclick='return checkDelete()'>Reset</button>
                            </div>
                        </form>
                    </div>

                    <!-- ---------------------- Search Area Stock Manager --------------------- -->
                    <input type="radio" id="tab-view2-client" name="tabs-clients">
                    <label class="tab-label label-view2" for="tab-view2-client">Search Area Stock Manager</label>
                    <div class="tab-content tab-content-view2">
                        <h2>Search Area Stock Manager</h2>
                        <!-------------------- Add form address here ----------------------->
                        <form action="../backend/stock_manager_search_asm.php" method="post" class="search-control">   
                            <input type="text" class="search-bar" name="asm-name" placeholder="Enter Area Stock Manager Name" required/>
                            <button class="btn btn-find" name="find-asm" type="submit">Find Area Stock Manager</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <hr class="breadcrumbs-hr">
    </main>

    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>