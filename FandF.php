<!doctype html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>Friends and Family</title>
</head>
<body>
<div id="form_container">
    <form method = "post" action = "results.php">
        <h3>Welcome please Create a new user, update an existing user, or look up an existing user</h3></br>
        <h3> Please provide userName to update and provide first and last name to search</h3>
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
</div>
</body>
</html>