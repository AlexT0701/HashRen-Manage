<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Employee Application Form</title>
  <link rel="stylesheet" href="app.css">
</head>

<body>
    <form name="appEmployee" method="post" action="submit.php">
	  <table class="testTable">
	<thead>
		<tr>
			<th colspan="2"><u>Employment Application</u> <i><?php echo $currentUsr ?></i></th>
		</tr>
	</thead>
	<tr>
		<td><label for="pos">Position</label></td>
		<td><input type="text" name="txtPos" id="txtPos" required></td>
	</tr>
	<tr>
		<td><label for="user">Name</label></td>
		<td><input type="text" name="txtName" id="txtName" required></td>
	</tr>
	<tr>
		<td><label for="pass">Address</label></td>
		<td><input type="text" name="txtAdd" id="txtAdd" required></td>
	</tr>
	<tr>
		<td><label for="name">City</label></td>
		<td><input type="text" name="txtCit" id="txtCit" required></td>
	</tr>
	<tr>
		<td><label for="position">State</label></td>
		<td><input type="text" name="txtStat" id="txtStat" required></td>
	</tr>
	<tr>
		<td><label for="position">Zip</label></td>
		<td><input type="text" name="txtZip" id="txtZip" required></td>
	</tr>
	<tr>
		<td><label for="position">Cell Phone</label></td>
		<td><input type="text" name="txtCell" id="txtCell" required></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="Submit" id="Submit" value="Submit"></td>
	</tr>
	</table>
    </form>
  
</body>
</html>