<?php
require('layouts/header.php');
require('layouts/sidebar.php');
require('config/dbcon.php');

$dept_query = "SELECT * FROM department";
$dept_result = mysqli_query($conn, $dept_query);

$team_query = "SELECT * FROM team";
$team_result = mysqli_query($conn, $team_query);
?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xl-12 col-sm-12 col-12">
                <div class="breadcrumb-path mb-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="employee.php">Nhân viên</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Thêm nhân viên
                        </li>
                    </ul>
                    <h3>Tạo nhân viên</h3>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12">
                <form id="addEmployeeForm" method="POST" enctype="multipart/form-data"
                    action="functions/process_add_employee.php">
                    <div id="formMessage" class="alert" style="display:none;"></div>
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
                                        style="display:none; max-width:200px; margin-top:10px; border-radius:5px;" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Họ tên <span class="text-danger">*</span></label>
                                        <input type="text" name="fullname" placeholder="Họ tên" required />
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Ngày sinh <span class="text-danger">*</span></label>
                                        <input type="date" name="dob" required
                                            style="height: 70px; border: 1px solid rgba(235, 236, 241, 1);" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Giới tính <span class="text-danger">*</span></label>
                                        <select name="gender" required>
                                            <option value="">Chọn giới tính</option>
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Địa chỉ <span class="text-danger">*</span></label>
                                        <input type="text" name="address" placeholder="Địa chỉ" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" placeholder="Email" required
                                            style="height: 70px;" />
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Số điện thoại <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" placeholder="Số điện thoại" required />
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
                                            <option value="<?php echo $dept['dept_id']; ?>">
                                                <?php echo $dept['dept_name']; ?></option>
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
                                            mysqli_data_seek($team_result, 0); // Reset con trỏ result
                                            while ($team = mysqli_fetch_assoc($team_result)) { ?>
                                            <option value="<?php echo $team['team_id']; ?>"
                                                data-dept="<?php echo $team['dept_id']; ?>">
                                                <?php echo $team['team_name']; ?>
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
                                        <input type="text" name="position" placeholder="Chức vụ" required />
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Lương <span class="text-danger">*</span></label>
                                        <input type="number" name="salary" placeholder="Lương" step="0.01" required
                                            style="height: 70px;" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Ngày vào làm <span class="text-danger">*</span></label>
                                        <input type="date" name="hire_date" required style="height: 70px;" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-sm-12 col-12">
                                    <button type="submit" class="btn btn-primary">Thêm nhân viên</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.form-group select,
.form-group input {
    width: 100%;
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

.form-group label {
    font-weight: 500;
}

.text-danger {
    color: red;
}

.confirmButton {
    padding: 10px;
}
</style>

<script>
function previewImage(event) {
    const imagePreview = document.getElementById('imagePreview');
    const file = event.target.files[0];
    if (file) {
        imagePreview.src = URL.createObjectURL(file);
        imagePreview.style.display = 'block';
    } else {
        imagePreview.style.display = 'none';
    }
}

function filterTeams() {
    const deptId = document.getElementById('dept_id').value;
    const teamSelect = document.getElementById('team_id');
    const options = teamSelect.options;

    for (let i = 0; i < options.length; i++) {
        const option = options[i];
        if (option.value === '' || option.getAttribute('data-dept') === deptId) {
            option.style.display = 'block';
        } else {
            option.style.display = 'none';
        }
    }
    teamSelect.value = '';
}

document.getElementById('addEmployeeForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formMessage = document.getElementById('formMessage');
    const formData = new FormData(this);

    fetch('functions/process_add_employee.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            return response.text();
        })
        .then(text => {
            try {
                return JSON.parse(text);
            } catch (e) {
                throw new Error('Phản hồi không phải JSON: ' + text);
            }
        })
        .then(data => {
            formMessage.style.display = 'block';
            formMessage.className = 'alert ' + data.status;
            formMessage.innerText = data.message;

            if (data.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công!',
                    text: data.message || 'Nhân viên đã được thêm thành công!',
                    showConfirmButton: true,
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed && data.redirect) {
                        window.location.href = data.redirect;
                    }
                });
            } else {
                formMessage.className = 'alert error';
                formMessage.innerText = data.message || 'Đã xảy ra lỗi khi thêm nhân viên.';
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
            formMessage.style.display = 'block';
            formMessage.className = 'alert error';
            formMessage.innerText = 'Đã xảy ra lỗi: ' + error;
        });
});
</script>

<?php
require('layouts/footer.php');
mysqli_close($conn);
?>
<script src="assets/plugins/select2/js/select2.min.js"></script>