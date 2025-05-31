<?php
include('./config/dbcon.php');

function getTeam() {
    global $conn;
    $query = "SELECT t.team_id, t.team_name, t.dept_id,
              GROUP_CONCAT(e.thumbnail ORDER BY e.id ASC SEPARATOR ',') AS member_avatars,
              GROUP_CONCAT(e.id ORDER BY e.id ASC SEPARATOR ',') AS member_ids
              FROM team t
              LEFT JOIN employee e ON t.team_id = e.team_id
              GROUP BY t.team_id, t.team_name, t.dept_id"; 
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
?>