<?php
require('layouts/header.php');
require('layouts/sidebar.php');
require('functions/getEmployee.php');
?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xl-12 col-sm-12 col-12 mb-4">
                <div class="breadcrumb-path">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php"><img src="assets/img/dash.png" class="mr-2" alt="breadcrumb" />Trang
                                chủ</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Nhân viên
                        </li>
                    </ul>
                    <h3>Nhân viên</h3>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12 mb-4">
                <div class="head-link-set">
                    <ul>
                        <li><a class="active" href="#">Nhân viên</a></li>
                        <li><a href="employee-team.php">Nhóm</a></li>
                        <li><a href="employee-office.php">Phòng ban</a></li>
                    </ul>
                    <a class="btn-add" href="add-employee.php"><i data-feather="plus"></i> Thêm người</a>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <form id="filterSortForm" class="row g-3">
                            <div class="col-md-3">
                                <label for="filterGender" class="form-label">Giới tính</label>
                                <select id="filterGender" class="form-control">
                                    <option value="">Tất cả</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="filterDepartment" class="form-label">Phòng ban</label>
                                <select id="filterDepartment" class="form-control">
                                    <option value="">Tất cả</option>
                                    <?php
                                    $departments = mysqli_query($conn, "SELECT dept_id, dept_name FROM department");
                                    while ($dept = mysqli_fetch_assoc($departments)) {
                                        echo '<option value="' . htmlspecialchars($dept['dept_id']) . '">' . htmlspecialchars($dept['dept_name']) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="sortBy" class="form-label">Sắp xếp theo</label>
                                <select id="sortBy" class="form-control">
                                    <option value="">Mặc định</option>
                                    <option value="FullName ASC">Họ tên (A-Z)</option>
                                    <option value="FullName DESC">Họ tên (Z-A)</option>
                                    <option value="dob ASC">Ngày sinh (Cũ đến mới)</option>
                                    <option value="dob DESC">Ngày sinh (Mới đến cũ)</option>
                                    <option value="HireDate ASC">Ngày vào làm (Cũ đến mới)</option>
                                    <option value="HireDate DESC">Ngày vào làm (Mới đến cũ)</option>
                                    <option value="salary ASC">Lương (Thấp đến cao)</option>
                                    <option value="salary DESC">Lương (Cao đến thấp)</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12 mb-4">
                <div class="row">
                    <div class="col-xl-10 col-sm-8 col-12">
                        <label class="employee_count"><?php echo getTotalEmployees(); ?> Nhân viên</label>
                    </div>
                    <div class="col-xl-1 col-sm-2 col-12">
                        <a href="employee-grid.php" class="btn-view"><i data-feather="grid"></i></a>
                    </div>
                    <div class="col-xl-1 col-sm-2 col-12">
                        <a href="#" class="btn-view active"><i data-feather="list"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12 mb-4">
                <div class="card">
                    <div class="table-heading">
                        <h2>Danh Sách Nhân Viên</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table custom-table no-footer">
                            <thead>
                                <tr>
                                    <th>Họ tên</th>
                                    <th>Ngày sinh</th>
                                    <th>Giới tính</th>
                                    <th>Email</th>
                                    <th>Chức vụ</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="employeeTableBody">
                            </tbody>
                        </table>
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
require('layouts/footer.php');
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    function updateEmployeeTable() {
        var filters = {
            gender: $('#filterGender').val(),
            dept_id: $('#filterDepartment').val()
        };
        var sort = $('#sortBy').val();

        $.ajax({
            url: 'functions/process_filter_sort_employee.php',
            type: 'POST',
            data: {
                gender: filters.gender,
                dept_id: filters.dept_id,
                sort: sort
            },
            dataType: 'json',
            success: function(response) {
                console.log('Response from server:', response);
                if (response.success) {
                    $('.employee_count').text(response.count + ' Nhân viên');

                    var tbody = $('#employeeTableBody');
                    tbody.empty();
                    if (response.count > 0) {
                        response.data.forEach(function(employee) {
                            var row = `
                                <tr id="employeeRow${employee.id}">
                                    <td>
                                        <div class="table-img">
                                            <a href="profile.php?id=${employee.id}">
                                                <img src="${employee.thumbnail}" alt="profile" class="img-table" />
                                                <label>${employee.FullName}</label>
                                            </a>
                                        </div>
                                    </td>
                                    <td><label class="action_label">${employee.dob}</label></td>
                                    <td><label class="action_label2">${employee.gender}</label></td>
                                    <td><label>${employee.email}</label></td>
                                    <td><label>${employee.position}</label></td>
                                    <td class="d-flex">
                                        <a href="profile.php?id=${employee.id}" class="edit-link"><i data-feather="edit"></i></a>
                                        <a class="edit-link delete-employee" style="color: red;" 
                                           data-employee-id="${employee.id}" data-toggle="modal" data-target="#delete">
                                           <i data-feather="trash-2"></i>
                                        </a>
                                    </td>
                                </tr>`;
                            tbody.append(row);
                        });
                        feather.replace();
                    } else {
                        tbody.html(
                            '<tr><td colspan="6" class="text-center">Không có nhân viên nào được tìm thấy.</td></tr>'
                        );
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: response.message || 'Không thể tải danh sách nhân viên.',
                        confirmButtonText: 'Đồng ý'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.log('AJAX Error:', xhr.responseText);
                let errorMessage = 'Đã xảy ra lỗi: ' + error;
                try {
                    const responseText = xhr.responseText;
                    if (responseText) {
                        errorMessage += ' (Chi tiết: ' + responseText + ')';
                    }
                } catch (e) {
                    errorMessage += ' (Không thể đọc phản hồi từ server)';
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: errorMessage,
                    confirmButtonText: 'Đồng ý'
                });
            }
        });
    }

    $('#filterGender, #filterDepartment, #sortBy').on('change input', function() {
        updateEmployeeTable();
    });

    $(document).on('click', '.delete-employee', function() {
        var employeeId = $(this).data('employee-id');
        if (!employeeId) {
            console.log('Error: employee_id is missing in delete button');
            return;
        }
        $('#confirmDeleteBtn').data('employee-id', employeeId);
        console.log('Set employee_id for delete:', employeeId);
    });

    $('#confirmDeleteBtn').on('click', function() {
        var employeeId = $(this).data('employee-id');
        if (!employeeId) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: 'Không thể xác định ID nhân viên.',
                confirmButtonText: 'Đồng ý'
            });
            return;
        }
        console.log('Sending delete request with employee_id:', employeeId);
        $.ajax({
            url: 'functions/process_delete_employee.php',
            type: 'POST',
            data: {
                employee_id: employeeId,
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
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        $('#employeeRow' + employeeId).remove();
                        var employeeCount = parseInt($('.employee_count').text());
                        $('.employee_count').text((employeeCount - 1) +
                            ' Nhân viên');
                        if ($('#employeeTableBody tr').length === 0) {
                            $('#employeeTableBody').html(
                                '<tr><td colspan="6" class="text-center">Không có nhân viên nào được tìm thấy.</td></tr>'
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
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: 'Đã xảy ra lỗi: ' + error,
                    confirmButtonText: 'Đồng ý'
                });
                console.log('AJAX Error:', xhr.responseText);
                $('#delete').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            }
        });
    });

    updateEmployeeTable();
});
</script>