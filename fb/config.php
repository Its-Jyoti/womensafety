<?php
// start the session early so other pages can rely on it
session_start();

// ---- database connection settings ----
$host = 'localhost';      // usually localhost with XAMPP
$user = 'root';           // MySQL user (avoid using root in production)
$pass = '';               // set this to your MySQL password, or leave blank
$db   = 'facebook';       // name of the database you imported
$port = 3307;             // default MySQL port; change only if you really use 3307

// create the connection
$con = mysqli_connect($host, $user, $pass, $db, $port);

// check for a connection error and stop execution if it fails
if (!$con) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// you can now use $con in your other PHP files