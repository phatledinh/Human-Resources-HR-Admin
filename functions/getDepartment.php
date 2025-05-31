<?php
include('./config/dbcon.php');

function getDepartment() {
    global $conn;
    $query = "SELECT d.*
            FROM department d";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
?>