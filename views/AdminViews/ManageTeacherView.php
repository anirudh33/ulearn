<html>
<head>

<style type="text/css">
table {
	border: 3px solid red;
}

td {
	border: 2px solid green;
}

tr {
	border: 1px solid blue;
}
</style>
</head>
<body>
	<table>
		<tr>

			<td>FirstName</td>
			<td>LastName</td>


		</tr>

<?php
foreach ($data as $resp) {
    ?>
	
	<tr>

			<td><?php echo $resp['firstname']?></td>
			<td><?php echo $resp['lastname']?></td>
			<td><a href="#"
				onClick="myFunction('delete.php?id=<?php echo $id;?>')">Delete</a></td>
			<td><a href="#"
				onClick="myFunction('update.php?id=<?php echo $id;?>')">Update</a></td>
		</tr>
	<?php
}
?>
</table>
</body>
</html>