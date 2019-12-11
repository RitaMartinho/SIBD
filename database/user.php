<?php
    
    //adds user to Database with hashed password
    function createUser($firstName, $lastName, $address, $username, $password) {
        global $db;
        $options = ['cost' => 12];
        $pass_hashed = password_hash($password, PASSWORD_DEFAULT, $options);
        $stmt = $db->prepare('INSERT INTO person VALUES(NULL, 
                             ?, --first_name
                             ?, --last_name
                             ?, --address
                             ?, --username
                             ?, -- password
                             NULL -- admin
                             )');
        $stmt->execute([$firstName, $lastName, $address, $username, $pass_hashed]);
        return $stmt->fetch();  
    }
    //Returns true if theres a $username in the database with the $password
    function verifyUser($username, $password) {
        global $db;  
        $stmt = $db->prepare('SELECT * FROM person WHERE username = ?');
        $stmt->execute(array($username));
        $user = $stmt->fetch();
        return ($user !== false && password_verify($password, $user['password']));
    }
    //get client_id by client_username
    function getClientID($username){
        global $db;
        $stmt= $db->prepare('SELECT client_id
            FROM person
                JOIN
                client ON client_id = person_id
            WHERE username LIKE ? ');
        $stmt->execute(array($username));
        return $stmt->fetch;
    }
    function checkIfSendMoneyIsPossible($money, $destiny_account, $origin_account){
        global $db;
        /*first check if destiny account exists*/
        $ret=checkIfAccountExists($destiny_account);
        if( $ret === false){
            return false;
        }
        if(!is_numeric($money)){
            return false;
        }
        $stmt=$db->prepare('SELECT balance from account where account_id=?');
        $stmt->execute(array($origin_account));
        $origin_balance= $stmt->fetchColumn(); // to get a string and not an array
        $stmt=$db->prepare('SELECT balance from account where account_id=?');
        $stmt->execute(array($destiny_account));
        $destiny_balance= $stmt->fetchColumn();
        if(intval($origin_balance) >= intval($money)){
            $origin_balance= intval($origin_balance);
            $money = intval($money);
            $destiny_balance= intval($destiny_balance);
            $origin_balance= $origin_balance-$money;
            $destiny_balance= $destiny_balance+$money;
            
            $stmt1=$db->prepare('UPDATE account SET balance = ? where account_id= ?');
            $stmt1->execute(array($origin_balance,$origin_account));
            $stmt1=$db->prepare('UPDATE account SET balance = ? where account_id=?');
            $stmt1->execute(array($destiny_balance, $destiny_account));
            return true;
        }
        else{
            return false;
        }
    }
    function checkIfPaymentIsPossible($money, $origin_account, $destiny_account){
        global $db;
        if(!is_numeric($destiny_account)){ //accepts any destiny account 
            return false;
        } 
        $stmt=$db->prepare('SELECT balance from account where account_id=?');
        $stmt->execute(array($origin_account));
        $origin_balance= $stmt->fetchColumn(); // to get a string and not an array
        if(intval($origin_balance) >= intval($money)){
            $origin_balance= intval($origin_balance);
            $money = intval($money);
            $origin_balance= $origin_balance-$money;
            $stmt1=$db->prepare('UPDATE account SET balance = ? where account_id= ?');
            $stmt1->execute(array($origin_balance,$origin_account));
            return true;
        }
        else{
            return false;
        }
    }
?>