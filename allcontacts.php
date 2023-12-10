<?php
session_start();

require 'config.php';

$stmt = $conn->prepare("SELECT * FROM contacts");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<header>
    <ul>
        <li><img src="media/35fc8ef6-8194-4482-9ea1-ef8a261d84fe.jpeg" alt="dolphin" /></li>
        <li>
            <h3>Dolphin_crm</h3>
        </li>
    </ul>
</header>

<aside>
    <div id="sidebarItems">
        <ul>
            <li class="sidebarItem" id="home">
                <img src="media/home-24px.svg" alt="home"/>Home
            </li>
            <li class="sidebarItem" id="addContact">
                <img src="media/person_add-24px.svg" alt="addUser"/>New Contact
            </li>
            <?php if ($_SESSION['sessionId'] == "admin@project2.compassword123"): ?>
                <li class="sidebarItem" id="user">
                    <img src="media/add_circle-24px.svg" alt="viewUsers"/>Users
                </li>
            <?php endif; ?>

            <li class="sidebarItem" id="logout">
                <img src="media/power_settings_new-24px.svg" alt="logout"/>Logout
            </li>
        </ul>
    </div>
</aside>

<div id="container">
    <main>
        <div class="inner">
            <div>
                <h2 class="iTitle">Contacts</h2>
                <button id="newContactCreate" class="iTitle">Create New Contact</button>
            </div>
            <div class="filter-inner">
                <h5 class="filter">Filter by: </h5>    
                <button id="allFilter" class="filter active">ALL</button>
                <button id="supportFilter" class="filter">Support</button>
                <button id="salesFilter" class="filter">Sales Leads</button>
                <button id="assignedFilter" class="filter">Assigned to me</button>
            </div>
            <div>
                <table>
                    <thead id="tableHeader">
                        <tr>
                            <th id="title">Name</th>
                            <th id="type">Email</th>
                            <th id="company">Company</th>
                            <th id="assignedTo">Type</th>
                            <th id="vl"></th>
                        </tr>
                    </thead>
                    <tbody id="contactsTableBody">
                        <?php foreach ($results as $result): ?>
                            <?php
                            $classes = [];
                            if ($result["type"] == "Support") {
                                $classes[] = "Support";
                                if ($result["assigned_to"] == $_SESSION['ID']) {
                                    $classes[] = "assigned";
                                }
                            } elseif ($result["type"] == "Sales Leads") {
                                $classes[] = "Sales-Leads";
                                if ($result["assigned_to"] == $_SESSION['ID']) {
                                    $classes[] = "assigned";
                                }
                            } elseif ($result["assigned_to"] == $_SESSION['ID']) {
                                $classes[] = "assigned";
                            }
                            ?>
                            <tr class="<?= implode(' ', $classes) ?>">
                                <input class="viewsId" type="hidden" value="<?= $result['id']; ?>"/>
                                <td><?= $result["title"] . " " . htmlspecialchars_decode($result["firstname"]) . " " . htmlspecialchars_decode($result["lastname"]); ?></td>
                                <td><?= $result["email"]; ?></td>
                                <td><?= $result["company"]; ?></td>
                                <?php if ($result["type"] == "Sales Leads"): ?>
                                    <td id="contactButton"><button style="cursor: default;" id="sale">Sales Leads</button></td>
                                <?php elseif ($result["type"] == "Support"): ?>
                                    <td id="contactButton"><button style="cursor: default;" id="support">Support</button></td>
                                <?php endif; ?>
                                <td><a class="views">Views</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<div id="results"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="script.js"></script>
