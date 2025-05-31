<?php
require('../config/dbcon.php');

ob_start();

header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_id = mysqli_real_escape_string($conn, $_POST['employee_id'] ?? '');
    $action = $_POST['action'] ?? '';

    if ($action === 'delete' && !empty($employee_id)) {
        $delete_query = "DELETE FROM employee WHERE id = '$employee_id'";
        if (mysqli_query($conn, $delete_query)) {
            $response['success'] = true;
            $response['message'] = 'Xóa nhân viên thành công';
        } else {
            $response['message'] = 'Không thể xóa nhân viên: ' . mysqli_error($conn);
        }
    } else {
        $response['message'] = 'Hành động không hợp lệ hoặc thiếu ID nhân viên';
    }
} else {
    $response['message'] = 'Phương thức không được phép';
}

ob_end_clean();
echo json_encode($response);
exit();
?>