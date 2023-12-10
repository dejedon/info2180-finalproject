<?php 
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Dolphin CRM</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Beginning of nav bar -->
    <header>
        <ul>
            <li><img src="dolphin.jpeg" alt="Dolphin Picture"/></li>
            <li>
                <h3>Dolphin CRM</h3>
            </li>
        </ul>
    </header>


    <!-- Beginning of sidebar -->
    <aside>
        <div id="sidebar-items">
            <ul style="display:none;">
                <li class="sidebar-item" id="home">
                    <img src="home.svg" alt="home"/>Home
                </li>
                <li style="display:none" class="sidebar-item" id="addcontact">
                    <img src="add-person.svg" alt="add-user"/>New Contact
                </li>
                <li class="sidebar-item" id="user">
                    <img src="add-circle.svg" alt="add-issue"/>Users
                </li>
                <li class="sidebar-item" id="logout">
                    <img src="power-off.svg" alt="logout"/>Logout
                </li>
            </ul>
        </div>
    </aside>

    <!-- Beginning of main display -->
    <div id="login_page">
        <main>
            <div class="inner">
                <form method="post">
                    <h2>User Login</h2>

                    <label>Email</label>
                    <input id="email" type="email" name="email" required>
                    
                    <label>Password</label>
                    <input id="password" type="password" name="password" required>
                    
                    <button id="login" name="login" type="button">Submit</button>
                </form>
            </div>
        </main>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
         $.getScript("login_check.js");
    </script>
</body>
</html>
