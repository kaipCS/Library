<!DOCTYPE html>
<html>
<head>
    
    <title>Users</title>
    
</head>
<body>
<form action="addusers.php" method = "POST" >
  Account number:<input type="text" name="accountnumber"><br>
  Last name:<input type="text" name="surname"><br>
  First name:<input type="text" name="firstname"><br>
  Password:<input type="password" name="password"><br>
  House:<input type="text" name="house"><br>
  Year:<input type="number" name="year"><br>
  Email:<iSnput type="text" name="email"><br>
  Role:<select name="role">
		<option value="T">Teacher</option>
		<option value="S">Student</option>
	</select><br>
  <input type="submit" value="Add User">
  
</form>
                                                                                                                                                                                         
</body>
</html>