<?php
header('Content-Type: application/json; charset=utf-8');
    require('../config/dbcon.php');
    
    $employee_id = intval($_POST['id'] ?? 0);
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
    $status = mysqli_real_escape_string($conn, $_POST['status'] ?? '');

    if (empty($employee_id) || empty($fullname) || empty($gender) || empty($dob) || empty($email) || empty($phone) || empty($address) || empty($hire_date) || empty($position) || empty($salary) || empty($status) || $team_id === 0) {
        echo json_encode(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ các trường bắt buộc.']);
        exit;
    }

    $check_query = "SELECT id, thumbnail FROM employee WHERE id = $employee_id";
    $check_result = mysqli_query($conn, $check_query);
    if (!$check_result) {
        throw new Exception("Query failed: " . mysqli_error($conn));
    }
    if (mysqli_num_rows($check_result) == 0) {
        echo json_encode(['status' => 'error', 'message' => 'Nhân viên không tồn tại.']);
        exit;
    }
    $existing_employee = mysqli_fetch_assoc($check_result);
    $thumbnail = $existing_employee['thumbnail'];

    $upload_dir = dirname(__DIR__) . tprofiles/';
    error_log("Upload directory path: $upload_dir");

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }
    if (!is_writable($upload_dir)) {
        throw new Exception("Upload directory not writable: $upload_dir");
    }

    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png'];
        $file_name = $_FILES['thumbnail']['name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $file_size = $_FILES['thumbnail']['size'];
        $file_tmp = $_FILES['thumbnail']['tmp_name'];

        error_log("File upload attempt: name=$file_name, size=$file_size, tmp=$file_tmp");

        if (!file_exists($file_tmp)) {
            throw new Exception("Temporary file does not exist: $file_tmp");
        }

        if (in_array($file_ext, $allowed) && $file_size <= 2 * 1024 * 1024) {
            $new_file_name = uniqid() . '.' . $file_ext;
            $upload_path = $upload_dir . $new_file_name;
            if (move_uploaded_file($file_tmp, $upload_path)) {
                $thumbnail = 'assets/img/profiles/' . $new_file_name;
                error_log("File moved successfully to: $upload_path");

                if (!empty($existing_employee['thumbnail']) && file_exists(dirname(__DIR__) . '/' . $existing_employee['thumbnail'])) {
                    unlink(dirname(__DIR__) . '/' . $existing_employee['thumbnail']);
                    error_log("Old thumbnail deleted: " . $existing_employee['thumbnail']);
                }
            } else {
                throw new Exception("Failed to move file to: $upload_path");
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Chỉ chấp nhận file JPG, JPEG, PNG và kích thước dưới 2MB.']);
            exit;
        }
    }

    $update_query = "UPDATE employee SET 
        FullName = '$fullname',
        thumbnail = '$thumbnail',
        gender = '$gender',
        dob = '$dob',
        email = '$email',
        phone = '$phone',
        address = '$address',
        HireDate = '$hire_date',
        status = '$status',
        team_id = $team_id,
        position = '$position',
        salary = $salary
        WHERE id = $employee_id";

    if (mysqli_query($conn, $update_query)) {
        $response = ['status' => 'success', 'message' => 'Cập nhật nhân viên thành công!', 'redirect' => '../profile.php?id=' . $employee_id];
        error_log("Success response prepared: " . json_encode($response));
        echo json_encode($response);
    } else {
        throw new Exception("Update query failed: " . mysqli_error($conn));
    }

    mysqli_close($conn);
?>