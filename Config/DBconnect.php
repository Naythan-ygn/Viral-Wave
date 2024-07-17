<?php
// Connecting to the database

    $server = 'localhost:3308'; // Server name is depend on the server_machine. Port number is optional.
    $user = 'root';
    $pass = '';
    $DB = 'viralwave';

    $conn = mysqli_connect($server, $user, $pass, $DB);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
