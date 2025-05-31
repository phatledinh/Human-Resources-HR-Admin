<?php
ob_start();
require_once 'getEmployee.php';

try {
    $filters = [
        'gender' => isset($_POST['gender']) ? $_POST['gender'] : '',
        'dept_id' => isset($_POST['dept_id']) ? $_POST['dept_id'] : ''
    ];
    $sort = isset($_POST['sort']) ? $_POST['sort'] : '';

    $employees = getEmployee($filters, $sort);
    if ($employees === false) {
        throw new Exception('Failed to fetch employees');
    }

    $employee_data = [];
    while ($employee = mysqli_fetch_assoc($employees)) {
        $employee_data[] = $employee;
    }

    error_log("Number of employees fetched: " . count($employee_data));

    ob_end_clean();
    echo json_encode([
        'success' => true,
        'data' => $employee_data,
        'count' => count($employee_data)
    ]);
} catch (Exception $e) {
    ob_end_clean();
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>