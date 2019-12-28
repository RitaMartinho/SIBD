<?php 
    include_once('../templates/tpl_common.php');
    include_once('../database/connection.php');
    include_once('../includes/sessions.php');
    include_once('../database/branch.php');
    include_once('../database/user.php');

    $total_branchs=getNumberOfBranchs();
    $branchs_per_page=2;

    if(!isset($_SESSION['username']) || !verifyAdmin($_SESSION['username']) ) {
        header('Location: login.php');
    }
    
    if (isset($_GET['page']))
        $page = $_GET['page'];
    else $page = 1;
    
    if (isset($_GET['order']) && isset($_GET['criteria'])) {
        $order = $_GET['order'];
        $criteria = $_GET['criteria'];
        $branches = getBranchAdmin($criteria, $page, $order);
        
    } else {
        $branches = getAllBranches();
    }

    function drawPagination($total_branchs, $branchs_per_page, $criteria, $order){
        for( $i= 1; $i< intval($total_branchs)/intval($branchs_per_page); $i++){
            
            ?>
            <a href="?page=<?=$i?>&criteria=<?=$criteria?>&order=<?=$order?>"><?=$i?></a>
            <?php  
        }

        if((intval($total_branchs)%intval($branchs_per_page))!=0){
            ?>
            <a href="?page=<?=$i?>&criteria=<?=$criteria?>&order=<?=$order?>"><?=$i?></a>
            <?php
        }

    }
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/BranchsLayout.css" rel="stylesheet">
    <link href="../css/BranchsStyle.css" rel="stylesheet">
    <link href="../css/HeaderLayoutAdmin.css" rel="stylesheet"> 
    <link href="../css/HeaderStyleAdmin.css" rel="stylesheet">
    <link href="../css/ResponsiveAdmin.css" rel="stylesheet">
    <link href="../css/ResponsiveAdminHeader.css" rel="stylesheet">
    <title>Moneiys Bank</title>
</head>
<body>
    <?php draw_AdminHeader();?>
    <div id="content">
        <img src="img/branch.png" alt="branchlogo">
        <div id="branchs">
            <form method="GET" action="branchs.php" id="form1">
                <label>Order by:
                    <select name="criteria" id="criteria">
                        <option value="" disabled selected >None</option>
                        <option value="nrEmployees">Number of employees</option>
                        <option value="nrClients">Number of clients</option>
                        <option value="nrRooms">Number of rooms</option>
                    </select>  
                </label> 
                <select name="order" id="order">
                        <option value="" disabled selected >None</option>
                        <option value="ASC">ASC</option>
                        <option value="DESC">DESC</option>                
                </select>
                <button form="form1">See branchs</button>
            </form>
            <div id="displayed">
                <?php foreach($branches as $branch) {?>
                    <ul>
                        <li>BranchID: <?= $branch['branch_id']?></li>
                        <li>Address: <?= $branch['address']?></li>
                        <li>Number of employees: <?= $branch['nrEmployees']?></li>
                        <li>Number of clients: <?= $branch['nrClients']?></li>
                        <li>Number of rooms: <?= $branch['nrRooms']?></li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php if(isset($_GET['order']) && isset($_GET['criteria'])) {?>
        <div class="pagination">
            <?php drawPagination($total_branchs, $branchs_per_page, $criteria, $order); ?>
        </div>
    <?php } ?>
    <?php draw_footer() ?>

</body>
</html>