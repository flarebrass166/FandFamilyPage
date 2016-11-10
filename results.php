<?php

require_once "DataBaseConnection.php";

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

switch ($request){
    case "Create":
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
            $select = "SELECT FirstName, LastName, PhoneNumber, Address, City, State, 
              Zip, Birthdate, UserName, Password, Sex, Relationship FROM Library . FriendsAndFamily WHERE  FirstName = '$firstName' and LastName = '$lastName'";

            $return = $con->query($select);
            echo "Record successfully registered.";
            while ($row = $return->fetch_assoc()) {
                echo "<h3>First Name: "  . $row['FirstName']
                    . "</br></h3><h3> Last Name: " . $row['LastName']
                    . "</br></h3><h3> Address: "  . $row['Address']
                    . "</br></h3><h3> City: " . $row['City']
                    . "</br></h3><h3> Zip: " . $row['Zip']
                    . "</br></h3><h3> Sex: " . $row['Sex']
                    . "</br></h3><h3>Birth date: " . $row['Birthdate']
                    . "</br></h3><h3> Relationship: " . $row['Relationship'] ;
            }
        }
          break;
    case "Search":
        $select = "SELECT FirstName, LastName, PhoneNumber, Address, City, State, 
              Zip, Birthdate, UserName, Password, Sex, Relationship FROM Library . FriendsAndFamily WHERE  FirstName = '$firstName' and LastName = '$lastName'";

        $return = $con->query($select);

        if(!$return){
            echo "Something went wrong while searching, please try again";
            echo $select;
        }
        while ($row = $return->fetch_assoc()) {
            echo "<h3>First Name: "  . $row['FirstName']
                . "</br></h3><h3> Last Name: " . $row['LastName']
                . "</br></h3><h3> Address: "  . $row['Address']
                . "</br></h3><h3> City: " . $row['City']
                . "</br></h3><h3> Zip: " . $row['Zip']
                . "</br></h3><h3> Sex: " . $row['Sex']
                . "</br></h3><h3>Birth date: " . $row['Birthdate']
                . "</br></h3><h3> Relationship: " . $row['Relationship'] ;
        }
        break;
    case "Update":
            if(empty($_POST['FirstName'])) {
                $result = "SELECT FirstName FROM Library . FriendsAndFamily WHERE  UserName = '$userName'";
                $newName = $con->query($result);
                while ($row = $newName->fetch_assoc()){
                    $firstName = $row['FirstName'];
                }
            }
            if(empty($_POST['LastName'])){
                $result = "SELECT LastName FROM FriendsAndFamily WHERE UserName='$userName'";
                $newName = $con->query($result);
                while ($row = $newName->fetch_assoc()){
                    $lastName = $row['LastName'];
                }
            }
            if(empty($_POST['Address'])){
                $result = "SELECT Address FROM FriendsAndFamily WHERE UserName='$userName'";
                $newAdd = $con->query($result);
                while ($row = $newAdd->fetch_assoc()){
                    $address = $row['Address'];
                }
            }
            if(empty($_POST['State'])){
                $result = "SELECT State FROM FriendsAndFamily WHERE UserName='$userName'";
                $newState = $con->query($result);
                while ($row = $newState->fetch_assoc()){
                    $state = $row['State'];
                }
            }
            if(empty($_POST['City'])){
                $result = "SELECT City FROM FriendsAndFamily WHERE UserName='$userName'";
                $newCity = $con->query($result);
                while ($row = $newCity->fetch_assoc()){
                    $city = $row['City'];
                }
            }
            if(empty($_POST['Zip'])){
                $result = "SELECT Zip FROM FriendsAndFamily WHERE UserName='$userName'";
                $newZip = $con->query($result);
                while ($row = $newZip->fetch_assoc()){
                    $zip = $row['Zip'];
                }
            }
            if(empty($_POST['Sex'])){
                $result = "SELECT Sex FROM FriendsAndFamily WHERE UserName='$userName'";
                $newSex = $con->query($result);
                while ($row = $newSex->fetch_assoc()){
                    $sex = $row['Sex'];
                }
            }
            if(empty($_POST['Birthdate'])){
                 $result = "SELECT Sex FROM FriendsAndFamily WHERE UserName='$userName'";
                    $newDate = $con->query($result);
                 while ($row = $newDate->fetch_assoc()){
                $birthdate = $row['Birthdate'];
                }
            }
            if(empty($_POST['Relationship'])){
                $result = "SELECT Sex FROM FriendsAndFamily WHERE UserName='$userName'";
                $newRel = $con->query($result);
                while ($row = $newRel->fetch_assoc()){
                $relationship = $row['Relationship'];
                }
            }
            $update = "UPDATE FriendsAndFamily  SET FirstName='$firstName', LastName='$lastName', Address='$address', State='$state', City='$city', Zip='$zip', Sex='$sex',
                        Birthdate='$birthdate', Relationship='$relationship' WHERE  UserName = '$userName'";
            $newData = $con->query($update);
            echo "Update Compete";

            $select = "SELECT FirstName, LastName, PhoneNumber, Address, City, State, 
              Zip, Birthdate, UserName, Password, Sex, Relationship FROM Library . FriendsAndFamily WHERE  UserName = '$userName'";

            $return = $con->query($select);
            while ($row = $return->fetch_assoc()) {
                echo "<h3>First Name: "  . $row['FirstName']
                    . "</br></h3><h3> Last Name: " . $row['LastName']
                    . "</br></h3><h3> Address: "  . $row['Address']
                    . "</br></h3><h3> City: " . $row['City']
                    . "</br></h3><h3> Zip: " . $row['Zip']
                    . "</br></h3><h3> Sex: " . $row['Sex']
                    . "</br></h3><h3>Birth date: " . $row['Birthdate']
                    . "</br></h3><h3> Relationship: " . $row['Relationship'] ;
            }

        if(!$newData){
            echo "Something went wrong with the update";
            echo $update;
        }
        break;
}
mysqli_close($con);
