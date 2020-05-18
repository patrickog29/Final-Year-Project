<?php
/* Database connection settings */
$host = '';
$user = 'root';
$pass = '';
$db = 'waterapplim';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
