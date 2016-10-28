<?php

require_once "DatabaseConnection.php";

$userName = $_POST['UserName'];
$password = $_POST['Password'];
$firstName = $_POST['FirstName'];
$firstName = strtolower($firstName);
$firstName = ucwords($firstName);
$lastName = $_POST['LastName'];
$lastName = strtolower($lastName);
$lastName = ucwords($lastName);
$phone = $_POST['PhoneNumber'];
$address = $_POST['Address'];
$city = $_POST['City'];
$state = $_POST['State'];
$zip = $_POST['Zip'];
$birthdate = $_POST['Birthdate'];
$relationship = $_POST['Relationship'];
$sex = $_POST['Sex'];
$request = $_POST['Request'];

if($request == "Create"){
  $insert = "INSERT INTO Library . FriendsAndFamily (FirstName, LastName, PhoneNumber, Address, City, State, 
              Zip, Birthdate, UserName, Password, Sex, Relationship) VALUES ('" . mysql_fix_string($con, $_POST['FirstName']) . "',
              '" . mysql_fix_string($con, $_POST['LastName']) . "',  '" .  mysql_fix_string($con, $_POST['PhoneNumber']) . "',
              '" . mysql_fix_string($con, $_POST['Address']) . "',  '" .  mysql_fix_string($con, $_POST['City']) .  "',
              '" . mysql_fix_string($con, $_POST['State']) . "', '" .  mysql_fix_string($con, $_POST['Zip']) . "',
              '" . mysql_fix_string($con, $_POST['Birthdate']) . "', '" . mysql_fix_string($con, $_POST['UserName']) . "',
              '" . hash("ripemd128", $_POST['Password']) . "', '" . mysql_fix_string($con, $_POST['Sex']) . "',
              '" . mysql_fix_string($con, $_POST['Relationship']) . "',
               NOW(), 0";

    $result = $con->query($insert);

        if (!$result){
            echo "Something went wrong while vreating new record, please try again";
        }else{
            echo "Record successfully registered.";
        }
}