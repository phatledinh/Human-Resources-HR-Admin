<?php
require('layouts/header.php');
require('layouts/sidebar.php');
require('functions/getTeam.php');

require('config/dbcon.php');
$dept_query = "SELECT dept_id, dept_name FROM department";
$dept_result = mysqli_query($conn, $dept_query);

// Lấy danh sách nhân viên chưa thuộc team nào
$employee_query = "SELECT id, FullName FROM employee WHERE team_id IS NULL";
$employee_result = mysqli_query($conn, $employee_query);
?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xl-12 col-sm-12 col-12 mb-4">
                <div class="breadcrumb-path">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html"><img src="assets/img/dash.png" class="mr-2" alt="breadcrumb" />Trang
                                chủ</a>
                        </li>
                        <li class="breadcrumb-item active">Nhóm</li>
                    </ul>
                    <h3>Nhóm</h3>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12 mb-4">
                <div class="head-link-set">
                    <ul>
                        <li><a href="employee.php">Nhân viên</a></li>
                        <li><a class="active" href="#">Nhóm</a></li>
                        <li><a href="employee-office.php">Phòng ban</a></li>
                    </ul>
                    <a class="btn-add" data-toggle="modal" data-target="#addteam"><i data-feather="plus"></i> Thêm
                        nhóm</a>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12">
                <div class="card m-0">
                    <div class="card-body pb-0">
                        <div class="row">
                            <?php
                            $teams = getTeam();
                            if (mysqli_num_rows($teams) > 0) {
                                while ($team = mysqli_fetch_assoc($teams)) {
                            ?>
                            <div class="col-xl-6 col-sm-6 col-12 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="employee-head">
                                            <h2><?php echo htmlspecialchars($team['team_name'] ?? ''); ?></h2>
                                            <ul>
                                                <li>
                                                    <a class="edit_employee" data-toggle="modal" data-target="#edit"
                                                        data-team-id="<?php echo $team['team_id']; ?>"
                                                        data-team-name="<?php echo htmlspecialchars($team['team_name'] ?? ''); ?>"
                                                        data-dept-id="<?php echo htmlspecialchars($team['dept_id'] ?? ''); ?>">
                                                        <i data-feather="edit"></i>
                                                    </a>
                                                </li>
                                                <li><a class="edit_delete" data-toggle="modal" data-target="#delete"
                                                        data-team-id="<?php echo $team['team_id']; ?>"><i
                                                            data-feather="trash-2"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div class="employee-content">
                                            <div class="employee-image">
                                                <div class="avatar-group">
                                                    <?php
                                                    $avatars = explode(',', $team['member_avatars'] ?? '');
                                                    $member_ids = explode(',', $team['member_ids'] ?? '');
                                                    for ($i = 0; $i < min(2, count($avatars)); $i++) {
                                                        if (!empty($avatars[$i])) {
                                                    ?>
                                                    <div
                                                        class="avatar avatar-xs group_img group_header position-relative">
                                                        <img class="avatar-img rounded-circle" alt="profile"
                                                            src="<?php echo htmlspecialchars($avatars[$i]); ?>" />
                                                        <a href="#" class="remove-member"
                                                            data-employee-id="<?php echo $member_ids[$i]; ?>"
                                                            data-team-id="<?php echo $team['team_id']; ?>">
                                                            <span class="remove-icon">×</span>
                                                        </a>
                                                    </div>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn-addmember btn btn-orange" data-toggle="modal"
                                            data-target="#addMembers"
                                            data-team-id="<?php echo $team['team_id']; ?>">Thêm thành viên</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            } else {
                            ?>
                            <div class="col-12">
                                <p class="text-center">Không có nhóm nào được tìm thấy.</p>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Thêm Nhóm -->
<div class="customize_popup">
    <div class="modal fade" id="addteam" tabindex="-1" aria-labelledby="staticBackdropLabela" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabela">Tạo team mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addTeamForm">
                        <div class="col-md-12 p-0">
                            <div class="form-popup m-0">
                                <input type="text" name="team_name" placeholder="Tên nhóm" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-12 p-0 mt-3">
                            <div class="form-popup m-0">
                                <select name="dept_id" class="form-control" required>
                                    <option value="">Chọn phòng ban</option>
                                    <?php
                                    mysqli_data_seek($dept_result, 0);
                                    while ($dept = mysqli_fetch_assoc($dept_result)) { ?>
                                    <option value="<?php echo $dept['dept_id']; ?>">
                                        <?php echo htmlspecialchars($dept['dept_name']); ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="addTeamBtn">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Thêm Thành Viên -->
<div class="customize_popup">
    <div class="modal fade" id="addMembers" tabindex="-1" aria-labelledby="staticBackdropLabelMembers"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabelMembers">Thêm thành viên vào nhóm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addMembersForm">
                        <input type="hidden" name="team_id" id="add_members_team_id">
                        <div class="col-md-12 p-0">
                            <div class="form-popup m-0">
                                <select name="employee_id" class="form-control" required>
                                    <option value="">Chọn nhân viên</option>
                                    <?php
                                    while ($employee = mysqli_fetch_assoc($employee_result)) { ?>
                                    <option value="<?php echo $employee['id']; ?>">
                                        <?php echo htmlspecialchars($employee['FullName']); ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="addMembersBtn">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Chỉnh Sửa Nhóm -->
<div class="customize_popup">
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="staticBackdropLa" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLa">Chỉnh sửa Team</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editTeamForm">
                        <input type="hidden" name="team_id" id="edit_team_id">
                        <div class="col-md-12 p-0">
                            <div class="form-popup m-0">
                                <input type="text" name="team_name" id="edit_team_name" placeholder="Tên nhóm"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12 p-0 mt-3">
                            <div class="form-popup m-0">
                                <select name="dept_id" id="edit_dept_id" class="form-control" required>
                                    <option value="">Chọn phòng ban</option>
                                    <?php
                                    mysqli_data_seek($dept_result, 0);
                                    while ($dept = mysqli_fetch_assoc($dept_result)) { ?>
                                    <option value="<?php echo $dept['dept_id']; ?>">
                                        <?php echo htmlspecialchars($dept['dept_name']); ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="editTeamBtn">Lưu</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Xóa Nhóm -->
<div class="customize_popup">
    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="staticBackdropLabels1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-centers border-0">
                    <h5 class="modal-title text-center" id="staticBackdropLabels1">Bạn có chắc muốn xóa?</h5>
                </div>
                <div class="modal-footer text-centers">
                    <button type="button" class="btn btn-primary" id="confirmDeleteBtn">Xóa</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.remove-icon {
    position: absolute;
    top: -5px;
    right: -5px;
    background: red;
    color: white;
    border-radius: 50%;
    width: 15px;
    height: 15px;
    text-align: center;
    line-height: 15px;
    font-size: 12px;
    cursor: pointer;
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    $('#addTeamBtn').on('click', function(e) {
        e.preventDefault();
        var formData = $('#addTeamForm').serialize() + '&action=add';
        $.ajax({
            url: 'functions/process_team.php',
            type: 'POST',
            data: formData,
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
                        $('#addteam').modal('hide');
                        location.reload();
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
            }
        });
    });

    $('.edit_employee').on('click', function() {
        var teamId = $(this).data('team-id');
        var teamName = $(this).data('team-name');
        var deptId = $(this).data('dept-id');

        $('#edit_team_id').val(teamId);
        $('#edit_team_name').val(teamName);
        $('#edit_dept_id').val(deptId);
    });

    $('#editTeamBtn').on('click', function(e) {
        e.preventDefault();
        var formData = $('#editTeamForm').serialize() + '&action=edit';
        $.ajax({
            url: 'functions/process_team.php',
            type: 'POST',
            data: formData,
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
                        $('#edit').modal('hide');
                        location.reload();
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
            }
        });
    });

    $('.edit_delete').on('click', function() {
        var teamId = $(this).data('team-id');
        $('#confirmDeleteBtn').data('team-id', teamId);
    });

    $('#confirmDeleteBtn').on('click', function() {
        var teamId = $(this).data('team-id');
        $.ajax({
            url: 'functions/process_team.php',
            type: 'POST',
            data: {
                team_id: teamId,
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
                        location.reload();
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
            }
        });
    });

    $('.btn-addmember').on('click', function() {
        var teamId = $(this).data('team-id');
        $('#add_members_team_id').val(teamId);
    });

    $('#addMembersBtn').on('click', function(e) {
        e.preventDefault();
        var formData = $('#addMembersForm').serialize() + '&action=add_member';
        $.ajax({
            url: 'functions/process_team.php',
            type: 'POST',
            data: formData,
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
                        $('#addMembers').modal('hide');
                        location.reload();
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
            }
        });
    });

    // Xóa Thành Viên Khỏi Nhóm
    $('.remove-member').on('click', function(e) {
        e.preventDefault();
        var employeeId = $(this).data('employee-id');
        var teamId = $(this).data('team-id');
        Swal.fire({
            title: 'Bạn có chắc chắn?',
            text: 'Bạn có muốn xóa nhân viên này khỏi nhóm?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'functions/process_team.php',
                    type: 'POST',
                    data: {
                        employee_id: employeeId,
                        team_id: teamId,
                        action: 'remove_member'
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
                                location.reload();
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
                    }
                });
            }
        });
    });
});
</script>

<?php require('layouts/footer.php'); ?>