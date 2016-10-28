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
$phone = $_POST['Phone'];
$address = $_POST['Address'];
$city = $_POST['City'];
$state = $_POST['State'];
$zip = $_POST['Zip'];
$birthDate = $_POST['BirthDate'];
$relationship = $_POST['Relationship'];
$sex = $_POST['Sex'];
$request = $_POST['Request'];

if($request == "Create"){
  $insert = "INSERT INTO Library . FriendsAndFamily (FirstName, LastName, PhoneNumber, Address, City, State, 
Zip, Birthdate, UserName, Password, Sex, Relationship) VALUES ('" . mysql_fix_string($con, $_POST['FirstName'])')";
}