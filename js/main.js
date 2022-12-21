// convert input text to uppercase
function upperCaseF(a) {
        a.value = a.value.toUpperCase();
}

// show warning before deleting account or reseting form
function checkDelete() {
        return confirm('Are You Sure?');
}

// show warning before exiting form edit
function checkSubmit() {
        return confirm('Are You Sure?\nAll Unsaved Changes Will Be Lost.');
}

// execute after full DOM loading
window.onload=function() {       
        // start of toggle on/off logout menu
        logout = document.querySelector(".login");
        if (logout) {
                logout.addEventListener("click", 
                        function(){
                        this.classList.toggle("active");
                });
        }

        logoutMenu = document.querySelector(".login li");
        if (logoutMenu) {
                logoutMenu.addEventListener("click", 
                        function(){
                        this.classList.toggle("active");
                });
        }        
        // end of toggle on/off logout menu    
        
    
        
        //---------------- start of currency seperators ---------------//

        // for the field is inside an input tag value property
        if (typeof balance !== 'undefined') {
                var balINR = new Intl.NumberFormat('en-IN', {
                        style: 'currency',
                        currency: 'INR',
                        // display in 'code' format since symbol doesn't print inside a form input
                        currencyDisplay: 'code'
                })                                            
                document.getElementById('balance').value = balINR.format(balance);
        }
       
        // for the field is inside an td/span etc
        if (typeof balance !== 'undefined') {
                var balINR = new Intl.NumberFormat('en-IN', {
                        style: 'currency',
                        currency: 'INR'
                })                                            
                document.getElementById('balance').innerHTML = balINR.format(balance);              
        }
        
        // for the field is inside a navigation bar
        if (typeof balanceNav !== 'undefined') {
                var balINR = new Intl.NumberFormat('en-IN', {
                        style: 'currency',
                        currency: 'INR'
                })                                            
                document.getElementById('balanceNav').innerHTML = balINR.format(balanceNav);               
        }
        //---------------- end of currency seperators ---------------//
        
}



// ------------------------ login menu/skip customer login ----------------------------//
function redirectCustomer() {
        if (typeof customerId !== 'undefined') {
                window.location.href = 'frontend/customer_dashboard.php';
        }
        else {
                loginCustomer = document.getElementById('buttonCustomer');
                if (loginCustomer) {
                        document.querySelector('.bg-modal').style.display = 'flex';
                }        

                loginMenuCustomer = document.querySelector('.close');
                if (loginMenuCustomer) {
                        loginMenuCustomer.addEventListener('click',
                        function() {
                                document.querySelector('.bg-modal').style.display = 'none';
                        });
                }        
        }
}


// ------------------------ login menu/skip employee login ----------------------------//
function redirectAreaStockManager() {
        if (typeof employeeId !== 'undefined') {
                window.location.href = 'frontend/areaStockManager_dashboard.php';
        }
        else {
                loginAreaStockManager = document.getElementById('buttonAreaStockManager');
                if (loginAreaStockManager) {
                        document.querySelector('.bg-modal-employee').style.display = 'flex';
                }        

                loginMenuAreaStockManager = document.querySelector('.close-employee');
                if (loginMenuAreaStockManager) {
                        loginMenuAreaStockManager.addEventListener('click',
                        function() {
                                document.querySelector('.bg-modal-employee').style.display = 'none';
                        });
                }         
        }
}


// ------------------------ login menu/skip manager login ----------------------------//
function redirectStockManager() {
        if (typeof managerId !== 'undefined') {
                window.location.href = 'frontend/stockManager_dashboard.php';
        }
        else {
                loginStockManager = document.getElementById('buttonStockManager');
                if (loginStockManager) {
                        document.querySelector('.bg-modal-manager').style.display = 'flex';
                }        

                loginMenuStockManager = document.querySelector('.close-manager');
                if (loginMenuStockManager) {
                        loginMenuStockManager.addEventListener('click',
                        function() {
                                document.querySelector('.bg-modal-manager').style.display = 'none';
                        });
                }         
        }
}