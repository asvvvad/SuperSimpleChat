<?php
session_start();
if (! isset($_POST['nick']))
{
	die(0);
}

$nick = $_POST['nick'];
$nick = strip_tags($nick);

if (strlen($nick) > 12)
{
	die('Your nickname is too long');
}

$_SESSION['chatUser'] = $nick;

header('location: ./chat.php');
?>