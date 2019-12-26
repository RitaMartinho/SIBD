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
    <title>Bank System</title>
</head>
<body>
    <?php draw_header();?>
    <section id="content">
        <img src="img/appointment.png" alt="accountlogo"> 
        <section id="AppointmentInfo">  
            <form id="form1" action="../actions/action_scheduleAppointment.php" method="get">
                    <label>Choose a day: <input type="date" name="day" required></label> 
                    <label>Choose a start-hour:<input type="text" name="startHour" required></label>    
                    <label>Choose an employee:
                        <select name="employee" required>
                            <option value="" disabled selected >List Employes</option>
                            <?php foreach($listEmployees as $employee) {?>
                                <option value="<?= $employee['first_name']." ".$employee['last_name']?>"><?= $employee['first_name']." ".$employee['last_name']?></option>
                            <?php } ?>
                        </select>   
                    </label>
            </form>
            <section id="button">
                <button type="submit" form="form1">Schedule</button>
            </section>                
            <p>All appointments have a duration of 30min!</p>
            
        </section>
    </section>
    <?php draw_footer() ?>
</body>
</html>