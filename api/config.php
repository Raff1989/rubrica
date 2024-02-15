<?php
ini_set('display_errors', '1'); ini_set('display_startup_errors', '1'); error_reporting(E_ALL); 

$config = new StdClass();

$config->db = new StdClass();
$config->db->host 		= "127.0.0.1";
$config->db->dbname 	= "ungolo";
$config->db->username 	= "root";
$config->db->password 	= "";