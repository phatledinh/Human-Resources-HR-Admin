<?php
require_once 'config/dbcon.php';

function getTotalEmployees($conn) {
    $query = "SELECT COUNT(*) as total FROM employee WHERE status = 'Đang làm'";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result)['total'];
}

function getTotalDepartments($conn) {
    $query = "SELECT COUNT(*) as total FROM department";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result)['total'];
}

function getTotalLeaves($conn) {
    $query = "SELECT COUNT(*) as total FROM `leave`";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result)['total'];
}

function getTotalSalary($conn) {
    $query = "SELECT SUM(salary) as total_salary FROM employee WHERE status = 'Đang làm'";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result)['total_salary']; 
}

function getEmployeesByDepartment($conn) {
    $query = "
        SELECT d.dept_name, COUNT(e.id) as employee_count
        FROM department d
        LEFT JOIN team t ON d.dept_id = t.dept_id
        LEFT JOIN employee e ON t.team_id = e.team_id
        WHERE e.status = 'Đang làm' OR e.id IS NULL
        GROUP BY d.dept_id, d.dept_name
    ";
    $result = mysqli_query($conn, $query);
    $data = ['dept_names' => [], 'employee_counts' => []];
    while ($row = mysqli_fetch_assoc($result)) {
        $data['dept_names'][] = $row['dept_name'];
        $data['employee_counts'][] = $row['employee_count'];
    }
    return $data;
}

function getSalaryByDepartment($conn) {
    $query = "
        SELECT d.dept_name, SUM(e.salary) as total_salary
        FROM department d
        LEFT JOIN team t ON d.dept_id = t.dept_id
        LEFT JOIN employee e ON t.team_id = e.team_id
        WHERE e.status = 'Đang làm' OR e.id IS NULL
        GROUP BY d.dept_id, d.dept_name
    ";
    $result = mysqli_query($conn, $query);
    $data = ['dept_names' => [], 'total_salaries' => []];
    while ($row = mysqli_fetch_assoc($result)) {
        $data['dept_names'][] = $row['dept_name'];
        $data['total_salaries'][] = $row['total_salary'] / 1000000; 
    }
    return $data;
}

function getTopEmployees($conn, $limit = 4) {
    $query = "
        SELECT e.FullName, e.thumbnail, e.position
        FROM employee e
        WHERE e.status = 'Đang làm'
        ORDER BY e.salary DESC
        LIMIT $limit
    ";
    $result = mysqli_query($conn, $query);
    $employees = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $employees[] = $row;
    }
    return $employees;
}

function getBirthdaysThisMonth($conn) {
    $currentMonth = date('m'); 
    $query = "
        SELECT e.FullName, e.thumbnail, DATE_FORMAT(e.dob, '%d/%m') as birthday
        FROM employee e
        WHERE MONTH(e.dob) = '$currentMonth' AND e.status = 'Đang làm'
        ORDER BY DAY(e.dob)
    ";
    $result = mysqli_query($conn, $query);
    $birthdays = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $birthdays[] = $row;
    }
    return $birthdays;
}

function getLeavesThisMonth($conn) {
    $currentMonth = date('Y-m');
    $query = "
        SELECT e.FullName, e.thumbnail, l.start_date as leave_date, l.reason, l.leave_type, l.status
        FROM `leave` l
        JOIN employee e ON l.emp_id = e.id
        WHERE DATE_FORMAT(l.start_date, '%Y-%m') = '$currentMonth' AND e.status = 'Đang làm'
        ORDER BY l.start_date
    ";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        error_log("Lỗi trong getLeavesThisMonth: " . mysqli_error($conn));
        return [];
    }
    $leaves = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $row['leave_date'] = date('d/m/Y', strtotime($row['leave_date']));
        $leaves[] = $row;
    }
    return $leaves;
}

$total_employees = getTotalEmployees($conn);
$total_departments = getTotalDepartments($conn);
$total_leaves = getTotalLeaves($conn);
$total_salary = getTotalSalary($conn);
$employees_by_dept = getEmployeesByDepartment($conn);
$salary_by_dept = getSalaryByDepartment($conn);
$top_employees = getTopEmployees($conn);
$birthdays_this_month = getBirthdaysThisMonth($conn);
$leaves_this_month = getLeavesThisMonth($conn);
?>