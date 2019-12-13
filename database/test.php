<?php

    $db = new PDO('sqlite:bank_db.db');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->query('PRAGMA foreign_keys = ON');
  
    if(NULL== $db){
      throw new Exception("Failed to open database");
    }

    include_once('user.php');
    include_once('branch.php');
    include_once('offers.php');
    include_once('account.php');
    include_once('employee.php');

    addEmployee("rita", "martinho","odf","123","4", "21");
?>