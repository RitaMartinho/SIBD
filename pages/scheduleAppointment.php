<?php 
    include_once('../templates/tpl_common.php');
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
            <form id="form1" action="action_scheduleAppointment.php" method="post">
                    <label>Choose a day: <input type="text" name="day" required></label> 
                    <label>Choose a start-hour:<input type="text" name="startHour"required></label>    
                    <label>Choose an employee:
                        <select required>
                            <option value="" selected ></option>
                            <option value="johan">Joan</option>
                            <option value="rita">Rita</option>
                            <option value="jabier">Jabier</option>
                        </select>   
                    </label>
            </form>
            <section id="button">
                <button type="submit" form="form1">Schedule</button>
            </section>                
            <p>All appointments have a duration of 30min!</p>
            
        </section>
    </section>
    <footer>
        <p>&copy; RitaEGonçalo, 2019</p>
    </footer>
</body>
</html>