<?php
require('../config/dbcon.php');

ob_start();

header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        $team_name = mysqli_real_escape_string($conn, $_POST['team_name'] ?? '');
        $dept_id = mysqli_real_escape_string($conn, $_POST['dept_id'] ?? '');
        if (empty($team_name) || empty($dept_id)) {
            $response['message'] = 'Tên nhóm và phòng ban không được để trống';
        } else {
            $query = "INSERT INTO team (team_name, dept_id) VALUES ('$team_name', '$dept_id')";
            if (mysqli_query($conn, $query)) {
                $response['success'] = true;
                $response['message'] = 'Thêm nhóm thành công';
                $response['team_id'] = mysqli_insert_id($conn);
            } else {
                $response['message'] = 'Không thể thêm nhóm: ' . mysqli_error($conn);
            }
        }
    } elseif ($action === 'edit' && isset($_POST['team_id'])) {
        $team_id = mysqli_real_escape_string($conn, $_POST['team_id'] ?? '');
        $team_name = mysqli_real_escape_string($conn, $_POST['team_name'] ?? '');
        $dept_id = mysqli_real_escape_string($conn, $_POST['dept_id'] ?? '');
        if (empty($team_name) || empty($dept_id) || empty($team_id)) {
            $response['message'] = 'Dữ liệu không hợp lệ';
        } else {
            $query = "UPDATE team SET team_name = '$team_name', dept_id = '$dept_id' WHERE team_id = '$team_id'";
            if (mysqli_query($conn, $query)) {
                $response['success'] = true;
                $response['message'] = 'Cập nhật nhóm thành công';
            } else {
                $response['message'] = 'Không thể cập nhật nhóm: ' + mysqli_error($conn);
            }
        }
    } elseif ($action === 'delete' && isset($_POST['team_id'])) {
        $team_id = mysqli_real_escape_string($conn, $_POST['team_id'] ?? '');
        if (empty($team_id)) {
            $response['message'] = 'Thiếu ID nhóm';
        } else {
            $query = "DELETE FROM team WHERE team_id = '$team_id'";
            if (mysqli_query($conn, $query)) {
                $response['success'] = true;
                $response['message'] = 'Xóa nhóm thành công';
            } else {
                $response['message'] = 'Không thể xóa nhóm: ' . mysqli_error($conn);
            }
        }
    } elseif ($action === 'add_member' && isset($_POST['team_id']) && isset($_POST['employee_id'])) {
        $team_id = mysqli_real_escape_string($conn, $_POST['team_id'] ?? '');
        $employee_id = mysqli_real_escape_string($conn, $_POST['employee_id'] ?? '');
        if (empty($team_id) || empty($employee_id)) {
            $response['message'] = 'Thiếu ID nhóm hoặc ID nhân viên';
        } else {
            $query = "UPDATE employee SET team_id = '$team_id' WHERE id = '$employee_id' AND team_id IS NULL";
            if (mysqli_query($conn, $query)) {
                if (mysqli_affected_rows($conn) > 0) {
                    $response['success'] = true;
                    $response['message'] = 'Thêm nhân viên vào nhóm thành công';
                } else {
                    $response['message'] = 'Nhân viên đã thuộc nhóm khác hoặc không tồn tại';
                }
            } else {
                $response['message'] = 'Không thể thêm nhân viên: ' . mysqli_error($conn);
            }
        }
    } elseif ($action === 'remove_member' && isset($_POST['employee_id']) && isset($_POST['team_id'])) {
        $employee_id = mysqli_real_escape_string($conn, $_POST['employee_id'] ?? '');
        $team_id = mysqli_real_escape_string($conn, $_POST['team_id'] ?? '');
        if (empty($employee_id) || empty($team_id)) {
            $response['message'] = 'Thiếu ID nhân viên hoặc ID nhóm';
        } else {
            $query = "UPDATE employee SET team_id = NULL WHERE id = '$employee_id' AND team_id = '$team_id'";
            if (mysqli_query($conn, $query)) {
                if (mysqli_affected_rows($conn) > 0) {
                    $response['success'] = true;
                    $response['message'] = 'Xóa nhân viên khỏi nhóm thành công';
                } else {
                    $response['message'] = 'Nhân viên không thuộc nhóm này';
                }
            } else {
                $response['message'] = 'Không thể xóa nhân viên: ' . mysqli_error($conn);
            }
        }
    } else {
        $response['message'] = 'Hành động không hợp lệ hoặc thiếu thông tin';
    }
} else {
    $response['message'] = 'Phương thức không được phép';
}

ob_end_clean();
echo json_encode($response);
exit();
?>