<?php include('./view/header.php'); ?>

<h2>Enter a new property into the system</h2>
<h4>Start by validating the street name with the City of Chicago's street database.</h4>
<?php echo $ajax; ?>
<form id="address_query" >
<table>
    <tbody>
    	<tr>
    		<td>Enter Street Name</td>
    		<td><input type="text" name="street" id="street" /></td>
    	</tr>
    </tbody>
</table>
<input class="btn" type="button" value="Verify Street Name" id="button" />
</form>
</br>
    <div id="data_box">
    </div>
</br>
</br>
<a href="/home" >home</a>