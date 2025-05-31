<?php
require('layouts/header.php');
require('layouts/sidebar.php');
require('config/dbcon.php');

$current_date = date('Y-m-d');
$status_query = "
    SELECT e.FullName, e.thumbnail, l.status, l.leave_type
    FROM employee e
    LEFT JOIN `leave` l ON e.id = l.emp_id 
        AND l.start_date <= '$current_date' 
        AND l.end_date >= '$current_date' 
        AND l.status = 'Đã duyệt'
    WHERE l.leave_id IS NOT NULL
    LIMIT 2";
$status_result = $conn->query($status_query);

$leave_query = "
    SELECT l.*, e.FullName, e.thumbnail 
    FROM `leave` l 
    JOIN `employee` e ON l.emp_id = e.id
    ORDER BY l.created_at DESC";
$leave_result = $conn->query($leave_query);
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
                        <li class="breadcrumb-item active">Nghỉ phép</li>
                    </ul>
                    <h3>Nghỉ phép</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php while ($status_row = $status_result->fetch_assoc()) { ?>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <div class="employee_status text-center">
                            <img alt="Hình người dùng" src="<?php echo $status_row['thumbnail']; ?>" />
                            <label>
                                <?php echo $status_row['FullName']; ?> hôm nay
                                <?php echo ($status_row['leave_type'] == 'Làm việc tại nhà') ? 'làm việc tại nhà' : 'vắng mặt'; ?>.
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-xl-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-titles">Chi tiết nghỉ phép</h2>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table custom-table no-footer">
                                <thead>
                                    <tr>
                                        <th>Nhân viên</th>
                                        <th>Loại nghỉ phép</th>
                                        <th>Từ</th>
                                        <th>Đến</th>
                                        <th>Số ngày</th>
                                        <th>Số ngày còn lại</th>
                                        <th>Ghi chú</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $leave_result->fetch_assoc()) { ?>
                                    <tr>
                                        <td>
                                            <div class="table-img">
                                                <a href="profile.html"><img src="<?php echo $row['thumbnail']; ?>"
                                                        alt="profile" class="img-table" /></a>
                                                <label><?php echo $row['FullName']; ?></label>
                                            </div>
                                        </td>
                                        <td><label><?php echo $row['leave_type']; ?></label></td>
                                        <td><label><?php echo $row['start_date']; ?></label></td>
                                        <td><label><?php echo $row['end_date']; ?></label></td>
                                        <td><label><?php echo $row['days']; ?></label></td>
                                        <td><label><?php echo $row['remaining_days'] ?? 'N/A'; ?></label></td>
                                        <td><label><?php echo $row['reason'] ?? ''; ?></label></td>
                                        <td>
                                            <label>
                                                <a class="action_label3"
                                                    data-status="<?php echo strtolower($row['status']); ?>">
                                                    <?php echo $row['status']; ?>
                                                </a>
                                            </label>
                                        </td>
                                        <td>
                                            <?php if ($row['status'] == 'Chờ duyệt') { ?>
                                            <form method="POST" action="functions/leave_process.php"
                                                style="display:inline;">
                                                <input type="hidden" name="leave_id"
                                                    value="<?php echo $row['leave_id']; ?>">
                                                <input type="hidden" name="action" value="approve">
                                                <button type="submit" class="btn btn-success btn-sm">Duyệt</button>
                                            </form>
                                            <form method="POST" action="functions/leave_process.php"
                                                style="display:inline;">
                                                <input type="hidden" name="leave_id"
                                                    value="<?php echo $row['leave_id']; ?>">
                                                <input type="hidden" name="action" value="reject">
                                                <button type="submit" class="btn btn-danger btn-sm">Hủy</button>
                                            </form>
                                            <?php } else { ?>
                                            <label>-</label>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$conn->close();
require('layouts/footer.php');
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
<?php if (isset($_GET['message']) && isset($_GET['text'])) { ?>
Swal.fire({
    title: '<?php echo $_GET['message'] === 'success' ? 'Thành công!' : 'Lỗi!'; ?>',
    text: '<?php echo htmlspecialchars($_GET['text']); ?>',
    icon: '<?php echo $_GET['message'] === 'success' ? 'success' : 'error'; ?>',
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer);
        toast.addEventListener('mouseleave', Swal.resumeTimer);
    }
});
<?php } ?>
</script>

<script src="assets/plugins/select2/js/select2.min.js"></script>