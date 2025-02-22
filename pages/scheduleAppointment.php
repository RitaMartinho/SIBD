<?php 
    include_once('../templates/tpl_common.php');
    include_once('../database/connection.php');
    include_once('../database/employee.php');
    include_once('../includes/sessions.php');
    $listEmployees = getListEmployees('nata');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/HeaderLayout.css" rel="stylesheet">
    <link href="../css/HeaderStyle.css" rel="stylesheet">
    <link href="../css/AppointmentLayout.css" rel="stylesheet">
    <link href="../css/AppointmentStyle.css" rel="stylesheet"> 
    <link href="../css/ResponsiveUserHeader.css" rel="stylesheet">
    <link href="../css/ResponsiveAccount.css" rel="stylesheet">
    <title>Moneiys Bank</title>
</head>
<body>
    <?php draw_header();?>
    <div id="content">
        <img src="img/appointment.png" alt="accountlogo"> 
        <div id="AppointmentInfo">  
            <form id="form1" action="../actions/action_scheduleAppointment.php" method="get">
                    <label>Choose a day: <input type="date" name="day" required></label> 
                    <label>Choose a start-hour:<select name="startHour" required>
                        <option value="" disabled selected>--:--</option>
                        <option value="14:00">14:00</option>
                        <option value="14:30">14:30</option>
                        <option value="15:00">15:00</option>
                        <option value="15:30">15:30</option>
                        <option value="16:00">16:00</option>
                        <option value="16:30">16:30</option>
                        <option value="17:00">17:00</option>
                        <option value="17:30">17:30</option>
                    </select>
                    </label>  
                    <label>Choose an employee:
                        <select name="employee" required>
                            <option value="" disabled selected >List Employes</option>
                            <?php foreach($listEmployees as $employee) {?>
                                <option value="<?= $employee['first_name']." ".$employee['last_name']?>"><?= $employee['first_name']." ".$employee['last_name']?></option>
                            <?php } ?>
                        </select>   
                    </label>
            </form>
            <div id="button">
                <button type="submit" form="form1">Schedule</button>
            </div>                
	    <?php if (isset($_SESSION['message'])) { ?>
	    <div class="message" style="color: <?php $type=strpos($_SESSION['message'],"already");
                            if ($type !== false){ 
                                echo 'red'; 
                            } else echo 'green'; ?>">
	                       <?=$_SESSION['message']?>
                </div>
            <?php unset($_SESSION['message']); } ?> 
            <p>All appointments have a duration of 30min!</p>
            
        </div>
    </div>
    <?php draw_footer() ?>
</body>
</html>