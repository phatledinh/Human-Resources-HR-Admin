<?php
require('layouts/header.php');
require('layouts/sidebar.php');
require('functions/getEmployee.php');
require('config/dbcon.php');
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
                        <li class="breadcrumb-item active">
                            Sinh nhật
                        </li>
                    </ul>
                    <h3>Sinh nhật</h3>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12">
                <div class="card m-0">
                    <div class="card-body pb-0">
                        <div class="row">
                            <?php
                            $months = [
                                1 => 'Tháng 1', 2 => 'Tháng 2', 3 => 'Tháng 3', 4 => 'Tháng 4',
                                5 => 'Tháng 5', 6 => 'Tháng 6', 7 => 'Tháng 7', 8 => 'Tháng 8',
                                9 => 'Tháng 9', 10 => 'Tháng 10', 11 => 'Tháng 11', 12 => 'Tháng 12'
                            ];

                            $default_thumbnail = 'assets/img/default-avatar.png';

                            foreach ($months as $month_num => $month_name) {
                                $sql = "SELECT e.*, t.team_name, d.dept_name 
                                        FROM employee e 
                                        LEFT JOIN team t ON e.team_id = t.team_id 
                                        LEFT JOIN department d ON t.dept_id = d.dept_id 
                                        WHERE e.status = 'Đang làm' AND MONTH(e.dob) = ?";
                                
                                $stmt = mysqli_prepare($conn, $sql);
                                mysqli_stmt_bind_param($stmt, 'i', $month_num);
                                mysqli_stmt_execute($stmt);
                                $employees = mysqli_stmt_get_result($stmt);

                                if (mysqli_num_rows($employees) > 0) {
                            ?>
                            <div class="col-xl-6 col-sm-6 col-12 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="employee-head">
                                            <h2><?php echo $month_name; ?></h2>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div class="employee-content">
                                            <div class="employee-image">
                                                <div class="avatar-group">
                                                    <?php
                                                    while ($employee = mysqli_fetch_assoc($employees)) {
                                                        $thumbnail = !empty($employee['thumbnail']) ? htmlspecialchars($employee['thumbnail']) : $default_thumbnail;
                                                    ?>
                                                    <div class="avatar avatar-xs group_img group_header">
                                                        <img class="avatar-img rounded-circle" alt="profile"
                                                            src="<?php echo $thumbnail; ?>" data-toggle="modal"
                                                            data-target="#employeeModal"
                                                            data-name="<?php echo htmlspecialchars($employee['FullName']); ?>"
                                                            data-dob="<?php echo date('d/m/Y', strtotime($employee['dob'])); ?>"
                                                            data-thumbnail="<?php echo $thumbnail; ?>"
                                                            style="cursor: pointer;" />
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
                            <?php
                                } else {
                                    echo '<div class="col-12"><p>Không có nhân viên nào có sinh nhật trong ' . $month_name . '</p></div>';
                                }
                                mysqli_stmt_close($stmt);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal hiển thị thông tin nhân viên -->
<div class="customize_popup">
    <div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="employeeModalLabel">Thông tin nhân viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalThumbnail" src="" alt="profile" class="img-fluid rounded-circle mb-3"
                        style="max-width: 150px; max-height: 150px;" />
                    <h5 id="modalName" class="mb-2"></h5>
                    <p id="modalDob"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript xử lý modal -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.avatar-img').forEach(img => {
        img.addEventListener('click', function() {
            const name = this.getAttribute('data-name');
            const dob = this.getAttribute('data-dob');
            const thumbnail = this.getAttribute('data-thumbnail');

            document.getElementById('modalName').textContent = name;
            document.getElementById('modalDob').textContent = 'Ngày sinh: ' + dob;
            document.getElementById('modalThumbnail').setAttribute('src', thumbnail);
            $('#employeeModal').modal('show');
        });
    });
});
</script>

<?php require('layouts/footer.php'); ?>