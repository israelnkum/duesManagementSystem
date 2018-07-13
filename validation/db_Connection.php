<?php
error_reporting(1);
/**
 * This script connects to MySQL using the PDO object.
 */

// MySQL user account.
define('DB_TYPE', 'mysql');
//The server that MySQL is located on.
define('HOST', 'localhost');
// MySQL user account.
define('USERNAME', 'root');
//Our MySQL password.
define('PASSWORD', '');
//The name of our database.
define('DB_NAME', 'duesMgmtSystem');
// Character set
define('CHARSET', 'utf8');

/**
 * PDO options / configuration details.
 * I'm going to set the error mode to "Exceptions".
 * I'm also going to turn off emulated prepared statements.
 */
$connOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

/**
 * Connect to MySQL and instantiate the PDO object.
 */
$connection = new PDO(DB_TYPE .':host=' . HOST . ";dbname=" . DB_NAME .';charset=' .CHARSET,USERNAME, PASSWORD, $connOptions);


if (!$connection) {
    die("Connection failed: ".mysqli_connect_error());
}