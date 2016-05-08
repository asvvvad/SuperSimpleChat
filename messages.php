<?php
header('refresh: 5');
header('Content-Security-Policy: "script-src \'none\'"');
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
	</style>
</head>
<body>
	<?php
	echo file_get_contents('./messages.txt');
	?>
</body>
</html>