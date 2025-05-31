<?php
require('layouts/header.php');
require('layouts/sidebar.php');
require('functions/getDepartment.php');

header('Content-Type: text/html; charset=UTF-8');
?>

<div class="page-wrapper">
    <div class="content container-fluid" style="padding-top: 0; margin-top: -40px;">
        <div class="row">
            <div class="col-xl-12 col-sm-12 col-12 mb-4">
                <div class="breadcrumb-path">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php"><img src="assets/img/dash.png" class="mr-2" alt="breadcrumb" />Trang
                                chủ</a>
                        </li>
                        <li class="breadcrumb-item active">Phòng ban</li>
                    </ul>
                    <h3>Phòng ban</h3>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12 mb-4">
                <div class="head-link-set">
                    <ul>
                        <li><a href="employee.php">Nhân viên</a></li>
                        <li><a href="employee-team.php">Nhóm</a></li>
                        <li><a class="active" href="#">Phòng ban</a></li>
                    </ul>
                    <a class="btn btn-primary" style="padding: 15px 10px;" data-toggle="modal"
                        data-target="#addDepartment"><i data-feather="plus"></i> Thêm phòng ban</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-sm-12 col-12">
                <div class="card">
                    <div class="table-heading">
                        <h2>Danh sách phòng ban</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table custom-table no-footer" id="departmentTable">
                            <thead>
                                <tr>
                                    <th>Tên phòng</th>
                                    <th>Mô tả</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $departments = getDepartment();
                                if (mysqli_num_rows($departments) > 0) {
                                    while ($department = mysqli_fetch_assoc($departments)) {
                                        $dept_id = $department['dept_id'];
                                ?>
                                <tr id="deptRow<?php echo $dept_id; ?>">
                                    <td>
                                        <label class="action_label2 dept_name" style="width: auto;">
                                            <?php echo htmlspecialchars($department['dept_name'], ENT_QUOTES, 'UTF-8'); ?>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="action_label dept_des">
                                            <?php echo htmlspecialchars($department['des'], ENT_QUOTES, 'UTF-8'); ?>
                                        </label>
                                    </td>
                                    <td class="d-flex">
                                        <a data-toggle="modal" data-target="#editDepartment<?php echo $dept_id; ?>"
                                            class="edit-link"><i data-feather="edit"></i></a>
                                        <a class="edit-link delete-dept" style="color: red;"
                                            data-dept-id="<?php echo $dept_id; ?>" data-toggle="modal"
                                            data-target="#delete"><i data-feather="trash-2"></i></a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                ?>
                                <tr>
                                    <td colspan="3" class="text-center">Không có phòng ban nào được tìm thấy.</td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="customize_popup">
    <div class="modal fade" id="addDepartment" tabindex="-1" aria-labelledby="addDepartmentLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDepartmentLabel">Thêm phòng ban</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="new_dept_name">Tên phòng ban</label>
                        <input type="text" id="new_dept_name" class="form-control" required />
                    </div>
                    <div class="form-group mt-3">
                        <label for="new_des">Mô tả</label>
                        <textarea id="new_des" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="addDepartment()">Thêm</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="customize_popup">
    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="staticBackdropLabels1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-centers border-0">
                    <h5 class="modal-title text-center" id="staticBackdropLabels1">
                        Bạn có chắc muốn xóa?
                    </h5>
                </div>
                <div class="modal-footer text-centers">
                    <button type="button" class="btn btn-primary" id="confirmDeleteBtn">Xóa</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$departments = getDepartment();
if (mysqli_num_rows($departments) > 0) {
    mysqli_data_seek($departments, 0);
    while ($department = mysqli_fetch_assoc($departments)) {
        $dept_id = $department['dept_id'];
?>
<div class="customize_popup">
    <div class="modal fade" id="editDepartment<?php echo $dept_id; ?>" tabindex="-1"
        aria-labelledby="editDepartmentLabel<?php echo $dept_id; ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDepartmentLabel<?php echo $dept_id; ?>">Chỉnh sửa phòng ban</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="dept_name_<?php echo $dept_id; ?>">Tên phòng ban</label>
                        <input type="text" id="dept_name_<?php echo $dept_id; ?>" class="form-control"
                            value="<?php echo htmlspecialchars($department['dept_name'], ENT_QUOTES, 'UTF-8'); ?>"
                            required />
                    </div>
                    <div class="form-group mt-3">
                        <label for="des_<?php echo $dept_id; ?>">Mô tả</label>
                        <textarea id="des_<?php echo $dept_id; ?>" class="form-control" rows="3"
                            required><?php echo htmlspecialchars($department['des'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary"
                            onclick="updateDepartment(<?php echo $dept_id; ?>)">Lưu</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
}
?>

<?php require('layouts/footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script>
$('.delete-dept').on('click', function() {
    var deptId = $(this).data('dept-id');
    $('#confirmDeleteBtn').data('dept-id', deptId);
});

$('#confirmDeleteBtn').on('click', function() {
    var deptId = $(this).data('dept-id');
    $.ajax({
        url: 'functions/process_department.php',
        type: 'POST',
        data: {
            dept_id: deptId,
            action: 'delete'
        },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công',
                    text: response.message,
                    confirmButtonText: 'Đồng ý',
                    timer: 2000,
                    timerProgressBar: true
                }).then(() => {
                    $('#delete').modal('hide');
                    $('#deptRow' + deptId).remove();
                    if ($('#departmentTable tbody tr').length === 0) {
                        $('#departmentTable tbody').html(
                            '<tr><td colspan="3" class="text-center">Không có phòng ban nào được tìm thấy.</td></tr>'
                        );
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: response.message,
                    confirmButtonText: 'Đồng ý'
                });
            }
        },
        error: function(xhr, style, error) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: 'Đã xảy ra lỗi: ' + error,
                confirmButtonText: 'Đồng ý'
            });
        }
    });
});

$('#delete').on('hidden.bs.modal', function() {
    $('body').removeClass('modal-open');
    $('body').css('padding-right', '0');
    $('.modal-backdrop').remove();
});

function addDepartment() {
    const deptName = document.getElementById('new_dept_name').value;
    const deptDes = document.getElementById('new_des').value;

    if (!deptName || !deptDes) {
        Swal.fire({
            icon: 'warning',
            title: 'Cảnh báo',
            text: 'Vui lòng điền đầy đủ thông tin.',
            confirmButtonText: 'Đóng',
            confirmButtonColor: '#3085d6',
        });
        return;
    }

    $.ajax({
        url: 'functions/process_department.php',
        type: 'POST',
        data: {
            dept_name: deptName,
            des: deptDes,
            action: 'add'
        },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                const tableBody = document.querySelector('#departmentTable tbody');
                const noDataRow = tableBody.querySelector('tr td.text-center');
                if (noDataRow) tableBody.innerHTML = '';

                const newRow = document.createElement('tr');
                newRow.id = `deptRow${response.dept_id}`;
                newRow.innerHTML = `
                    <td><label class="action_label2 dept_name" style="width: auto;">${deptName}</label></td>
                    <td><label class="action_label dept_des">${deptDes}</label></td>
                    <td class="d-flex">
                        <a data-toggle="modal" data-target="#editDepartment${response.dept_id}" class="edit-link"><i data-feather="edit"></i></a>
                        <a class="edit-link delete-dept" style="color: red;" data-dept-id="${response.dept_id}" data-toggle="modal" data-target="#delete"><i data-feather="trash-2"></i></a>
                    </td>
                `;
                tableBody.appendChild(newRow);

                if (typeof feather !== 'undefined') {
                    feather.replace();
                }

                const modalContainer = document.createElement('div');
                modalContainer.className = 'customize_popup';
                modalContainer.innerHTML = `
                    <div class="modal fade" id="editDepartment${response.dept_id}" tabindex="-1"
                        aria-labelledby="editDepartmentLabel${response.dept_id}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editDepartmentLabel${response.dept_id}">Chỉnh sửa phòng ban</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="dept_name_${response.dept_id}">Tên phòng ban</label>
                                        <input type="text" id="dept_name_${response.dept_id}" class="form-control" value="${deptName}" required />
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="des_${response.dept_id}">Mô tả</label>
                                        <textarea id="des_${response.dept_id}" class="form-control" rows="3" required>${deptDes}</textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onclick="updateDepartment(${response.dept_id})">Lưu</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                document.body.appendChild(modalContainer);
                $('#editDepartment' + response.dept_id).modal({
                    show: false
                });

                $('#addDepartment').modal('hide');
                document.getElementById('new_dept_name').value = '';
                document.getElementById('new_des').value = '';
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công',
                    text: response.message,
                    confirmButtonText: 'Đồng ý',
                    confirmButtonColor: '#28a745',
                    timer: 2000,
                    timerProgressBar: true
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: response.message,
                    confirmButtonText: 'Đóng',
                    confirmButtonColor: '#d33',
                });
            }
        },
        error: function(xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: 'Đã xảy ra lỗi: ' + error,
                confirmButtonText: 'Đóng',
                confirmButtonColor: '#d33',
            });
        }
    });
}

function updateDepartment(deptId) {
    const deptName = document.getElementById(`dept_name_${deptId}`).value;
    const deptDes = document.getElementById(`des_${deptId}`).value;

    if (!deptName || !deptDes) {
        Swal.fire({
            icon: 'warning',
            title: 'Cảnh báo',
            text: 'Vui lòng điền đầy đủ thông tin.',
            confirmButtonText: 'Đóng',
            confirmButtonColor: '#3085d6',
        });
        return;
    }

    $.ajax({
        url: 'functions/process_department.php',
        type: 'POST',
        data: {
            dept_id: deptId,
            dept_name: deptName,
            des: deptDes,
            action: 'edit'
        },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                const row = document.getElementById(`deptRow${deptId}`);
                row.querySelector('.dept_name').innerText = deptName;
                row.querySelector('.dept_des').innerText = deptDes;
                $('#editDepartment' + deptId).modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công',
                    text: response.message,
                    confirmButtonText: 'Đồng ý',
                    confirmButtonColor: '#28a745',
                    timer: 2000,
                    timerProgressBar: true
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: response.message,
                    confirmButtonText: 'Đóng',
                    confirmButtonColor: '#d33',
                });
            }
        },
        error: function(xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: 'Đã xảy ra lỗi: ' + error,
                confirmButtonText: 'Đóng',
                confirmButtonColor: '#d33',
            });
        }
    });
}

$('#addDepartment').on('hidden.bs.modal', function() {
    $('body').css('padding-right', '0');
    $('.modal-backdrop').remove();
});

$('[id^="editDepartment"]').on('hidden.bs.modal', function() {
    $('body').css('padding-right', '0');
    $('.modal-backdrop').remove();
});
</script>