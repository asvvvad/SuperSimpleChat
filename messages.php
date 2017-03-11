<?php
header('refresh: 5');
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset='utf-8'>
	<style>
	body
	{
		color: white;
	}
#scroll{
margin-top: 2em
}
	</style>
</head>
<body>
	<?php
	echo file_get_contents('./messages.txt');
	?>
<div id='scroll'></div>
</body>
</html>
