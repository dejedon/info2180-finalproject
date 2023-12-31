<?php
    session_start();
    require 'config.php';
    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC)
?>

<header>
    <ul>
        <li><img src="dolphin.jpeg" alt="dolphin" /></li>
        <li>
            <h3>Dolphin_CRM</h3>
        </li>
    </ul>
</header>

<aside>
    <div id="sidebar-items">
        <ul>
            <li class="sidebar-item" id="home">
                <img src="home.svg" alt="home"/>Home
            </li>
            <li class="sidebar-item" id="addcontact">
                <img src="add-person.svg" alt="add-contact"/>New Contact
            </li>
        <?php if($_SESSION['sessionID'] == "admin@project2.compassword123"){ ?>
            
            <li class="sidebar-item" id="user">
                <img src="add-circle.svg" alt="add-issue"/>Users
            </li>
        <?php } ?>
        
            <li class="sidebar-item" id="logout">
                <img src="power-off.svg" alt="logout"/>Logout
            </li>
        </ul>
    </div>
</aside>

<div id="container">
    <main>
        <div class="inner">
            <form id="add-contact" method="post">
                <h2>New Contact</h2>
                <?php 
                    $sess= $_SESSION['ID'];
                    
                ?>
                <input class="sess_id" type="hidden" value="<?php echo $sess;?>"/>
                <label>Title</label>
                <input id = "add-contact-title" type = "text" name="tle" required>

                <label>Firstname</label>
                <input id="add-contact-fname" type="text" name="fname" required>
                
                <label>Lastname</label>
                <input id="add-contact-lname" type="text" name="lname" required>

                <label>Email</label>
                <input id="add-contact-email" type="email" name="email" required>

                <label>Telephone</label>
                <input id="add-contact-telephone" type="text" name="telephone" required>

                <label>Company</label>
                <input id="add-contact-company" type="text" name="company" required>
                
                
                <label>Type</label>
                <select id='con-type'>
                    <option value="Sales Leads">Sales Lead</option>
                    <option value="Support">Support</option>
                </select>

                <label>Assigned To</label>
                <select id = "con-assigned">
                    <?php foreach($results as $result){ ?>
                        <option value="<?php echo $result['id']?>"><?php echo $result['firstname']?></option>
                   
                    <?php }?>

                </select>
                <button id="conSubmit" name="newContact" type="button">Save</button>
            </form>
            <div>
                <div style="margin-top: 10px; color: red">
                        Ensure email is in valid format. Leave no empty fields.
                </div>    
            </div>
        </div>
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $.getScript("script.js");
</script>