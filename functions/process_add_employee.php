<?php
header('Content-Type: application/json');
require('../config/dbcon.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname'] ?? '');
    $gender = mysqli_real_escape_string($conn, $_POST['gender'] ?? '');
    $dob = mysqli_real_escape_string($conn, $_POST['dob'] ?? '');
    $email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
    $phone = mysqli_real_escape_string($conn, $_POST['phone'] ?? '');
    $address = mysqli_real_escape_string($conn, $_POST['address'] ?? '');
    $hire_date = mysqli_real_escape_string($conn, $_POST['hire_date'] ?? '');
    $team_id = intval($_POST['team_id'] ?? 0);
    $position = mysqli_real_escape_string($conn, $_POST['position'] ?? '');
    $salary = floatval($_POST['salary'] ?? 0);
    $status = 'Đang làm';

    if (empty($fullname) || empty($gender) || empty($dob) || empty($email) || empty($phone) || empty($address) || empty($hire_date) || empty($position) || empty($salary) || $team_id === 0) {
        ob_end_clean();
        echo json_encode(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ các trường bắt buộc.']);
        exit;
    }

    
    $thumbnail = '';
    $upload_dir = dirname(__DIR__) . '/assets/img/profiles/';
    
    
    error_log("Upload directory path: $upload_dir");

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }
    if (!is_writable($upload_dir)) {
        error_log("Upload directory not writable: $upload_dir");
        ob_end_clean();
        echo json_encode(['status' => 'error', 'message' => 'Thư mục không thể ghi: ' . $upload_dir]);
        exit;
    }

    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png'];
        $file_name = $_FILES['thumbnail']['name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $file_size = $_FILES['thumbnail']['size'];
        $file_tmp = $_FILES['thumbnail']['tmp_name'];

        error_log("File upload attempt: name=$file_name, size=$file_size, tmp=$file_tmp");

        if (!file_exists($file_tmp)) {
            error_log("Temporary file does not exist: $file_tmp");
            ob_end_clean();
            echo json_encode(['status' => 'error', 'message' => 'File tạm không tồn tại.']);
            exit;
        }

        if (in_array($file_ext, $allowed) && $file_size <= 2 * 1024 * 1024) {
            $new_file_name = uniqid() . '.' . $file_ext;
            $upload_path = $upload_dir . $new_file_name;
            if (move_uploaded_file($file_tmp, $upload_path)) {
                $thumbnail = 'assets/img/profiles/' . $new_file_name;  
                error_log("File moved successfully to: $upload_path");
            } else {
                error_log("Failed to move file to: $upload_path");
                ob_end_clean();
                echo json_encode(['status' => 'error', 'message' => 'Lỗi khi di chuyển tệp. Kiểm tra quyền thư mục hoặc cấu hình PHP.']);
                exit;
            }
        } else {
            ob_end_clean();
            echo json_encode(['status' => 'error', 'message' => 'Chỉ chấp nhận file JPG, JPEG, PNG và kích thước dưới 2MB.']);
            exit;
        }
    }

    $employee_query = "INSERT INTO employee (FullName, thumbnail, gender, dob, email, phone, address, HireDate, status, team_id, position, salary)
                      VALUES ('$fullname', '$thumbnail', '$gender', '$dob', '$email', '$phone', '$address', '$hire_date', '$status', $team_id, '$position', $salary)";
    if (mysqli_query($conn, $employee_query)) {
        ob_end_clean();
        echo json_encode(['status' => 'success', 'message' => 'Thêm nhân viên thành công!', 'redirect' => '../add-employee.php']);
    } else {
        ob_end_clean();
        echo json_encode(['status' => 'error', 'message' => 'Lỗi khi thêm nhân viên: ' . mysqli_error($conn)]);
    }
} else {
    ob_end_clean();
    echo json_encode(['status' => 'error', 'message' => 'Phương thức không hợp lệ.']);
}

mysqli_close($conn);
?>