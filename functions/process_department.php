<?php
require('../config/dbcon.php');

ob_start();

header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dept_id = mysqli_real_escape_string($conn, $_POST['dept_id'] ?? '');
    $dept_name = mysqli_real_escape_string($conn, $_POST['dept_name'] ?? '');
    $des = mysqli_real_escape_string($conn, $_POST['des'] ?? '');
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        if (empty($dept_name) || empty($des)) {
            $response['message'] = 'Tên phòng ban và mô tả không được để trống';
        } else {
            $query = "INSERT INTO department (dept_name, des) VALUES ('$dept_name', '$des')";
            if (mysqli_query($conn, $query)) {
                $response['success'] = true;
                $response['message'] = 'Thêm phòng ban thành công';
                $response['dept_id'] = mysqli_insert_id($conn);
            } else {
                $response['message'] = 'Không thể thêm phòng ban: ' . mysqli_error($conn);
            }
        }
    } elseif ($action === 'edit' && !empty($dept_id)) {
        if (empty($dept_name) || empty($des)) {
            $response['message'] = 'Tên phòng ban và mô tả không được để trống';
        } else {
            $query = "UPDATE department SET dept_name = '$dept_name', des = '$des' WHERE dept_id = '$dept_id'";
            if (mysqli_query($conn, $query)) {
                $response['success'] = true;
                $response['message'] = 'Cập nhật phòng ban thành công';
            } else {
                $response['message'] = 'Không thể cập nhật phòng ban: ' . mysqli_error($conn);
            }
        }
    } elseif ($action === 'delete' && !empty($dept_id)) {
        
        $update_team_query = "UPDATE team SET dept_id = NULL WHERE dept_id = '$dept_id'";
        if (mysqli_query($conn, $update_team_query)) {
            $delete_query = "DELETE FROM department WHERE dept_id = '$dept_id'";
            if (mysqli_query($conn, $delete_query)) {
                $response['success'] = true;
                $response['message'] = 'Xóa phòng ban thành công';
            } else {
                $response['message'] = 'Không thể xóa phòng ban: ' . mysqli_error($conn);
            }
        } else {
            $response['message'] = 'Không thể cập nhật team: ' . mysqli_error($conn);
        }
    } else {
        $response['message'] = 'Hành động không hợp lệ hoặc thiếu ID phòng ban';
    }
} else {
    $response['message'] = 'Phương thức không được phép';
}

ob_end_clean();
echo json_encode($response);
exit();
?>