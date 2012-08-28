<?php include('./view/header.php'); ?>
<h2>New User Registration Page</h2>
<form method="post" action="/users/add" >
	<table>
		<tr>
			<td>First Name:</td>
			<td><input type="text" name="first_name" /></br></td>
		</tr>
		<tr>
			<td>Last Name:</td>
			<td><input type="text" name="last_name" /></br></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" /></br></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password" /></br></td>
		</tr>
		<tr>
			<td>Re-Enter Password:</td>
			<td><input type="password" name="pw_repeat" /></td>
		</tr>
	</table>
	<input type="submit" value="Register Account" />
</form>