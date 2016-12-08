<script src="results.php"></script>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Friends and Family</title>
    <script type="text/javascript">
    </script>
</head>
<body>
<div id="form_container">
    <form method = "post" name="myForm"  onsubmit="return(validate());" action="results.php" >
        <h3>Welcome please Create a new user, update an existing user, or look up an existing user.</h3>
        <h3> Please provide userName to update and provide first and last name to search.</h3>
        <ul>
            <li class="text">User Name:<input type="text" name="UserName"></li></br>
            <li class="text">Password:<input type="text" name="Password"></li></br>
            <li class="text">First Name:<input type="text" name="FirstName"></li></br>
            <li class="text">Last Name<input type="text" name="LastName"></li></br>
            <li class="text">Phone:<input type="text" name="PhoneNumber"></li></br>
            <li class="text">Address:<input type="text" name="Address"></li></br>
            <li class="text">City:<input type="text" name="City"></li></br>
            <li class="text">State:<input type="text" name="State"></li></br>
            <li class="text">Zip:<input type="text" name="Zip"></li></br>
            <li class="text">Birth date:<input type="date" name="Birthdate"></li></br>
            <li class="text">Relationship:<input type="text" name="Relationship"></li></br>
            <li class="radio"> Sex:<input type="radio" value="Male" name="Sex">Male<input type="radio" value="Female" name="Sex">Female</li></br>
            <li class="radio"> Request:<input type="radio" value="Create" name="Request">Create New Record<input type="radio" value="Update" name="Request">Update<input type="radio" value="Search" name="Request">Search </li></br></br>
            <li><input type="submit" name="Create" value="Submit"></li></ul></br>
    </form>
    <script type="text/javascript">
    function validate() {
        var errorArr = [];
        var nameRegex = /^[a-zA-Z]+$/;
        var phoneRegex = /^[0-9]+$/;
        if (document.myForm.FirstName.value == "") {
            alert( "Please enter a first name!" );
            document.myForm.FirstName.focus();
            return false;
          // errorArr.push("You need a username");
        }else if(nameRegex.test(document.myForm.FirstName.value ) != true){
            alert("Invalid format for First name, please use upper case and lower case letters only!")
            return false;
        }

        if (document.myForm.LastName.value == "") {
             alert( "Please enter a last name!" );
            document.myForm.LastName.focus();
            return false;
            //errorArr.push("You need an email");
        }else if(nameRegex.test(document.myForm.LastName.value ) != true){
            alert("Invalid format for Last name, please use upper case and lower case letters only!")
            return false;
        }

        if (phoneRegex.test(document.myForm.PhoneNumber.value) != true) {
            alert( "Invalid phone number, please use numbers only!." );
            document.myForm.PhoneNumber.focus();
             return false;
            //errorArr.push("You need a Zip, or your zip isn't correct format");
        }

        if (document.myForm.Request.value == "Update") {
           alert("Form needs to be filled out completely!")
            return false;
        }

        if (errorArr == null) {
            return true;
        } else {
            for (var i = 0; i < errorArr.length; i++) {
                alert(errorArr[i]);
            }
            return false;
        }
    }
    </script>

</div>
</body>
</html>