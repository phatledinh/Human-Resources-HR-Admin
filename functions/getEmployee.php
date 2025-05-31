<?php
include(__DIR__ . '/../config/dbcon.php');

function getEmployee($filters = [], $sort = '') {
    global $conn;

    $sql = "SELECT e.*, t.team_name, d.dept_name 
            FROM employee e 
            LEFT JOIN team t ON e.team_id = t.team_id 
            LEFT JOIN department d ON t.dept_id = d.dept_id 
            WHERE e.status = 'Đang làm'";

    $conditions = [];
    $params = [];
    $types = '';

    if (!empty($filters['gender'])) {
        $conditions[] = "e.gender = ?";
        $params[] = $filters['gender'];
        $types .= 's';
    }

    if (!empty($filters['dept_id'])) {
        $conditions[] = "d.dept_id = ?";
        $params[] = $filters['dept_id'];
        $types .= 'i';
    }

    if (!empty($conditions)) {
        $sql .= " AND " . implode(" AND ", $conditions);
    }

    $allowed_sort_columns = [
        'FullName ASC', 'FullName DESC', 'dob ASC', 'dob DESC',
        'HireDate ASC', 'HireDate DESC', 'salary ASC', 'salary DESC'
    ];
    if (!empty($sort) && in_array($sort, $allowed_sort_columns)) {
        $sql .= " ORDER BY " . $sort;
    } else {
        $sql .= " ORDER BY e.id ASC"; 
    }

    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        throw new Exception('Prepare failed: ' . mysqli_error($conn));
    }
    if (!empty($params)) {
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    }
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception('Execute failed: ' . mysqli_stmt_error($stmt));
    }
    $result = mysqli_stmt_get_result($stmt);
    if ($result === false) {
        throw new Exception('Get result failed: ' . mysqli_stmt_error($stmt));
    }

    return $result;
}

function getTotalEmployees($filters = []) {
    global $conn;

    if (mysqli_connect_errno()) {
        throw new Exception('Database connection failed: ' . mysqli_connect_error());
    }

    $sql = "SELECT COUNT(*) as total 
            FROM employee e 
            LEFT JOIN team t ON e.team_id = t.team_id 
            LEFT JOIN department d ON t.dept_id = d.dept_id 
            WHERE e.status = 'Đang làm'";

    $conditions = [];
    $params = [];
    $types = '';

    if (!empty($filters['gender'])) {
        $conditions[] = "e.gender = ?";
        $params[] = $filters['gender'];
        $types .= 's';
    }

    if (!empty($filters['dept_id'])) {
        $conditions[] = "d.dept_id = ?";
        $params[] = $filters['dept_id'];
        $types .= 'i';
    }

    if (!empty($filters['position'])) {
        $conditions[] = "e.position LIKE ?";
        $params[] = '%' . $filters['position'] . '%';
        $types .= 's';
    }

    if (!empty($conditions)) {
        $sql .= " AND " . implode(" AND ", $conditions);
    }

    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        throw new Exception('Prepare failed: ' . mysqli_error($conn));
    }
    if (!empty($params)) {
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    }
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception('Execute failed: ' . mysqli_stmt_error($stmt));
    }
    $result = mysqli_stmt_get_result($stmt);
    if ($result === false) {
        throw new Exception('Get result failed: ' . mysqli_stmt_error($stmt));
    }
    $row = mysqli_fetch_assoc($result);

    return $row['total'];
}

function getGridEmployee($page = 1, $perPage = 6, $filters = [], $sort = '') {
    global $conn;

    if (mysqli_connect_errno()) {
        throw new Exception('Database connection failed: ' . mysqli_connect_error());
    }

    $offset = ($page - 1) * $perPage;

    $sql = "SELECT e.*, t.team_name, d.dept_name 
            FROM employee e 
            LEFT JOIN team t ON e.team_id = t.team_id 
            LEFT JOIN department d ON t.dept_id = d.dept_id 
            WHERE e.status = 'Đang làm'";

    $conditions = [];
    $params = [];
    $types = '';

    if (!empty($filters['gender'])) {
        $conditions[] = "e.gender = ?";
        $params[] = $filters['gender'];
        $types .= 's';
    }

    if (!empty($filters['dept_id'])) {
        $conditions[] = "d.dept_id = ?";
        $params[] = $filters['dept_id'];
        $types .= 'i';
    }

    if (!empty($filters['position'])) {
        $conditions[] = "e.position LIKE ?";
        $params[] = '%' . $filters['position'] . '%';
        $types .= 's';
    }

    if (!empty($conditions)) {
        $sql .= " AND " . implode(" AND ", $conditions);
    }

    $allowed_sort_columns = [
        'FullName ASC', 'FullName DESC', 'dob ASC', 'dob DESC',
        'HireDate ASC', 'HireDate DESC', 'salary ASC', 'salary DESC'
    ];
    if (!empty($sort) && in_array($sort, $allowed_sort_columns)) {
        $sql .= " ORDER BY " . $sort;
    } else {
        $sql .= " ORDER BY e.id ASC";
    }

    $sql .= " LIMIT $perPage OFFSET $offset";

    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        throw new Exception('Prepare failed: ' . mysqli_error($conn));
    }
    if (!empty($params)) {
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    }
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception('Execute failed: ' . mysqli_stmt_error($stmt));
    }
    $result = mysqli_stmt_get_result($stmt);
    if ($result === false) {
        throw new Exception('Get result failed: ' . mysqli_stmt_error($stmt));
    }

    return $result;
}
?>