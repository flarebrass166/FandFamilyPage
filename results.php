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
              Zip, Birthdate, UserName, Password, Sex, Relationship) VALUES ('" . mysql_fix_string($con, $firstName) . "',
              '" . mysql_fix_string($con, $lastName) . "',  '" .  mysql_fix_string($con, $phone) . "',
              '" . mysql_fix_string($con, $address) . "',  '" .  mysql_fix_string($con, $city) .  "',
              '" . mysql_fix_string($con, $state) . "', '" .  mysql_fix_string($con, $zip) . "',
              '" . mysql_fix_string($con, $birthdate) . "', '" . mysql_fix_string($con, $userName) . "',
              '" . hash("ripemd128", $_POST['Password']) . "', '" . mysql_fix_string($con, $sex) . "',
              '" . mysql_fix_string($con, $relationship) . "')";

    $result = $con->query($insert);

        if (!$result){
            echo "Something went wrong while creating new record, please try again";
            echo $insert;
        }else{
            echo "Record successfully registered.";
        }
}
else if ($request == "Search"){
    $select = "SELECT FirstName, LastName, PhoneNumber, Address, City, State, 
              Zip, Birthdate, UserName, Password, Sex, Relationship FROM Library . FriendsAndFamily WHERE  FirstName = '$firstName' and LastName = '$lastName'";

    $return = $con->query($select);

    if(!$return){
        echo "Something went wrong while searching, please try again";
        echo $select;
    }

    echo "<table><th>First Name</th><th>Last Name</th><th>City</th><th>State</th><th>Zip</th><th>Phone Number</th><th>Sex</th><th>Birth date</th><th>Relationship</th>";
    while ($row = $return->fetch_assoc()) {
        echo "<tr><td> First Name: " . $row['FirstName']
            . "</td><td> Last Name: " . $row['LastName']
            . "</td><td> City: " . $row['City']
            . "<tr><td> Zip: " . $row['Zip']
            . "</td><td> Sex: " . $row['Sex']
            . "</td><td> Birth date: " . $row['Birthdate']
            . "</td><td> Relationship: " . $row['Relationship'] . "</td></tr>";
    }
    echo "</table>";

    if($request == "Update"){
        $update = "UPDATE Library . FriendsAndFamily SET FirstName='$firstName'";

        $newData = $con->query($update);
    }
    if(!$newData){
        echo "Somthing went wrong with the update";
        echo $update;
    }
    mysqli_close($con);
}