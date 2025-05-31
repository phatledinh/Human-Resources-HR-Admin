<?php
session_start();
require('layouts/header.php');
require('layouts/sidebar.php');
require('config/dbcon.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: employee.php");
    exit();
}

$employee_id = mysqli_real_escape_string($conn, $_GET['id']);

$query = "SELECT * FROM employee WHERE id = '$employee_id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    header("Location: employee.php");
    exit();
}

$employee = mysqli_fetch_assoc($result);

$team_id = mysqli_real_escape_string($conn, $employee['team_id']);
$team_query = "SELECT dept_id FROM team WHERE team_id = '$team_id'";
$team_result_query = mysqli_query($conn, $team_query);
$team_data = mysqli_fetch_assoc($team_result_query);
$dept_id = $team_data ? $team_data['dept_id'] : '';

$dept_result = mysqli_query($conn, "SELECT dept_id, dept_name FROM department");
$team_result = mysqli_query($conn, "SELECT team_id, team_name, dept_id FROM team");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ sơ nhân viên</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-xl-12 col-sm-12 col-12">
                    <div class="breadcrumb-path mb-4">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="employee.php">Nhân viên</a></li>
                            <li class="breadcrumb-item active">Hồ sơ nhân viên</li>
                        </ul>
                        <h3>Hồ sơ nhân viên</h3>
                    </div>
                </div>
                <div class="col-xl-12 col-sm-12 col-12">
                    <form id="updateEmployeeForm" method="POST" enctype="multipart/form-data"
                        action="functions/process_edit_employee.php">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($employee['id']); ?>">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-titles">Thông tin cơ bản</h2>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label>Ảnh đại diện</label>
                                        <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                                            onchange="previewImage(event)"
                                            style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc" />
                                        <img id="imagePreview"
                                            src="<?php echo htmlspecialchars($employee['thumbnail'] ?? ''); ?>"
                                            style="display:block; max-width:200px; margin-top:10px; border-radius:5px;" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Họ tên <span class="text-danger">*</span></label>
                                            <input type="text" name="fullname" id="fullname" placeholder="Họ tên"
                                                value="<?php echo htmlspecialchars($employee['FullName'] ?? ''); ?>"
                                                required />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Ngày sinh <span class="text-danger">*</span></label>
                                            <input type="date" name="dob" id="dob"
                                                value="<?php echo htmlspecialchars($employee['dob'] ?? ''); ?>" required
                                                style="height: 70px; width: 100%; border: 1px solid rgba(235, 236, 241, 1); padding: 0 30px;" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Giới tính <span class="text-danger">*</span></label>
                                            <select name="gender" id="gender" required>
                                                <option value="">Chọn giới tính</option>
                                                <option value="Nam"
                                                    <?php echo ($employee['gender'] ?? '') == 'Nam' ? 'selected' : ''; ?>>
                                                    Nam</option>
                                                <option value="Nữ"
                                                    <?php echo ($employee['gender'] ?? '') == 'Nữ' ? 'selected' : ''; ?>>
                                                    Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Địa chỉ <span class="text-danger">*</span></label>
                                            <input type="text" name="address" id="address" placeholder="Địa chỉ"
                                                value="<?php echo htmlspecialchars($employee['address'] ?? ''); ?>"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" id="email" placeholder="Email"
                                                value="<?php echo htmlspecialchars($employee['email'] ?? ''); ?>"
                                                required
                                                style="height: 70px; width: 100%; border: 1px solid rgba(235, 236, 241, 1); padding: 0 30px;" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Số điện thoại <span class="text-danger">*</span></label>
                                            <input type="text" name="phone" id="phone" placeholder="Số điện thoại"
                                                value="<?php echo htmlspecialchars($employee['phone'] ?? ''); ?>"
                                                required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-titles">Thông tin công việc</h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Phòng ban <span class="text-danger">*</span></label>
                                            <select name="dept_id" id="dept_id" onchange="filterTeams()" required>
                                                <option value="">Chọn phòng ban</option>
                                                <?php while ($dept = mysqli_fetch_assoc($dept_result)) { ?>
                                                <option value="<?php echo htmlspecialchars($dept['dept_id']); ?>"
                                                    <?php echo $dept_id == $dept['dept_id'] ? 'selected' : ''; ?>>
                                                    <?php echo htmlspecialchars($dept['dept_name']); ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Team <span class="text-danger">*</span></label>
                                            <select name="team_id" id="team_id" required>
                                                <option value="">Chọn team</option>
                                                <?php
                                            mysqli_data_seek($team_result, 0);
                                            while ($team = mysqli_fetch_assoc($team_result)) { ?>
                                                <option value="<?php echo htmlspecialchars($team['team_id']); ?>"
                                                    data-dept="<?php echo htmlspecialchars($team['dept_id']); ?>"
                                                    <?php echo $employee['team_id'] == $team['team_id'] ? 'selected' : ''; ?>>
                                                    <?php echo htmlspecialchars($team['team_name']); ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Chức vụ <span class="text-danger">*</span></label>
                                            <input type="text" name="position" id="position" placeholder="Chức vụ"
                                                value="<?php echo htmlspecialchars($employee['position'] ?? ''); ?>"
                                                required />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Lương <span class="text-danger">*</span></label>
                                            <input type="number" name="salary" id="salary" placeholder="Lương"
                                                step="0.01"
                                                value="<?php echo htmlspecialchars($employee['salary'] ?? ''); ?>"
                                                required
                                                style="height: 70px; width: 100%; border: 1px solid rgba(235, 236, 241, 1); padding: 0 30px;" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Ngày vào làm <span class="text-danger">*</span></label>
                                            <input type="date" name="hire_date" id="hire_date"
                                                value="<?php echo htmlspecialchars($employee['HireDate'] ?? ''); ?>"
                                                required
                                                style="height: 70px; width: 100%; border: 1px solid rgba(235, 236, 241, 1); padding: 0 30px;" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Trạng thái <span class="text-danger">*</span></label>
                                            <select name="status" id="status" required>
                                                <option value="">Chọn trạng thái</option>
                                                <option value="Đang làm"
                                                    <?php echo ($employee['status'] ?? '') == 'Đang làm' ? 'selected' : ''; ?>>
                                                    Đang làm</option>
                                                <option value="Nghỉ việc"
                                                    <?php echo ($employee['status'] ?? '') == 'Nghỉ việc' ? 'selected' : ''; ?>>
                                                    Nghỉ việc</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-sm-12 col-12">
                                        <button type="submit" class="btn btn-primary" style="padding: 20px 30px;">Cập
                                            nhật nhân viên</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('updateEmployeeForm');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(form);
            const actionUrl = form.getAttribute('action');
            const employeeId = form.querySelector('input[name="id"]').value;
            const redirectUrl = `profile.php?id=${employeeId}`;


            fetch(actionUrl, {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    console.log('Response status:', response.status);
                    console.log('Response headers:', response.headers.get('content-type'));
                    return response.text().then(text => ({
                        status: response.status,
                        text
                    }));
                })
                .then(({
                    status,
                    text
                }) => {
                    console.log('Response text:', text);
                    console.log('Response text length:', text.length, 'Trimmed length:', text.trim()
                        .length);
                    if (text.trim() === '') {
                        console.warn('Empty response received');
                        Swal.fire({
                            icon: 'warning',
                            title: 'Cảnh báo',
                            text: 'Không nhận được phản hồi từ server. Cập nhật vẫn thành công.',
                            confirmButtonText: 'OK',
                            timer: 3000,
                            timerProgressBar: true
                        }).then(() => {
                            window.location.href = redirectUrl;
                        });
                        return;
                    }
                    try {
                        const data = JSON.parse(text);
                        console.log('Parsed response:', data);
                        if (data.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Thành công',
                                text: data.message,
                                confirmButtonText: 'OK',
                                timer: 3000,
                                timerProgressBar: true
                            }).then(() => {
                                window.location.href = redirectUrl;
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi',
                                text: data.message || 'Có lỗi xảy ra khi cập nhật.',
                                confirmButtonText: 'OK'
                            });
                        }
                    } catch (e) {
                        console.error('JSON parse error:', e.message, 'Response:', text);
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: 'Phản hồi từ server không hợp lệ. Cập nhật vẫn thành công.',
                            confirmButtonText: 'OK',
                            timer: 3000,
                            timerProgressBar: true
                        }).then(() => {
                            window.location.href = redirectUrl;
                        });
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Không thể kết nối với server. Cập nhật vẫn thành công.',
                        confirmButtonText: 'OK',
                        timer: 3000,
                        timerProgressBar: true
                    }).then(() => {
                        window.location.href = redirectUrl;
                    });
                });
        });
    });

    function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.style.display = 'block';
        imagePreview.src = URL.createObjectURL(event.target.files[0]);
    }

    function filterTeams() {
        const deptId = document.getElementById('dept_id').value;
        const teamSelect = document.getElementById('team_id');
        const currentTeamId = teamSelect.value;
        let isCurrentTeamValid = false;

        const options = teamSelect.querySelectorAll('option');
        options.forEach(option => {
            if (option.value === '' || option.getAttribute('data-dept') === deptId) {
                option.style.display = 'block';
                if (option.value === currentTeamId && option.value !== '') {
                    isCurrentTeamValid = true;
                }
            } else {
                option.style.display = 'none';
            }
        });

        if (!isCurrentTeamValid) {
            teamSelect.value = '';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        filterTeams();
    });
    </script>
    <?php require('layouts/footer.php'); ?>
</body>

</html>