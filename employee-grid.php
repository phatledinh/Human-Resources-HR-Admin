<?php
require('layouts/header.php');
require('layouts/sidebar.php');
require('functions/getEmployee.php')
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
                        <li>
                            <a href="employee-office.php">Phòng ban</a>
                        </li>
                    </ul>
                    <a class="btn-add" href="add-employee.php"><i data-feather="plus"></i> Thêm người</a>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12 mb-4">
                <div class="row">
                    <div class="col-xl-10 col-sm-8 col-12">
                        <div class="col-xl-10 col-sm-8 col-12">
                            <?php
							$employee_count = getTotalEmployees();
							?>
                            <label class="employee_count"><?php echo $employee_count; ?> Nhân viên</label>
                        </div>
                    </div>
                    <div class="col-xl-1 col-sm-2 col-12">
                        <a href="#" class="btn-view active"><i data-feather="grid"></i>
                        </a>
                    </div>
                    <div class="col-xl-1 col-sm-2 col-12">
                        <a href="employee.php" class="btn-view"><i data-feather="list"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12">
                <div class="card grid-views">
                    <div class="card-body">
                        <div class="row">
                            <?php
                            $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
                            $perPage = 6; 
                            $employees = getGridEmployee($page, $perPage);
                            if (mysqli_num_rows($employees) > 0) {
                                while ($employee = mysqli_fetch_assoc($employees)) {
                            ?>
                            <div class="col-xl-4 col-sm-12 col-12">
                                <div class="employee_grid">
                                    <a href="profile.php?id=<?php echo htmlspecialchars($employee['id']); ?>"><img
                                            src="<?php echo htmlspecialchars($employee['thumbnail']); ?>"
                                            alt="profile" /></a>
                                    <h5><?php echo htmlspecialchars($employee['FullName']); ?></h5>
                                    <label><?php echo htmlspecialchars($employee['position']); ?></label>
                                    <a><span><?php echo htmlspecialchars($employee['email']); ?></span></a>
                                </div>
                            </div>
                            <?php
                    }
                } else {
                    echo '<p>Không có nhân viên nào.</p>';
                }
                ?>
                        </div>
                        <?php
                        $totalEmployees = getTotalEmployees();
                        $totalPages = ceil($totalEmployees / $perPage); 
                        if ($totalPages > 1) { 
                        ?>
                        <div class="row pagination_path">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" role="status" aria-live="polite">
                                    Hiển thị <?php echo (($page - 1) * $perPage + 1); ?> đến
                                    <?php echo min($page * $perPage, $totalEmployees); ?> trong tổng số
                                    <?php echo $totalEmployees; ?> mục
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_number">
                                    <ul class="pagination">
                                        <li
                                            class="paginate_button page-item <?php echo $page <= 1 ? 'disabled' : ''; ?>">
                                            <a href="?page=<?php echo $page - 1; ?>" class="page-link btnnavingation"><i
                                                    data-feather="arrow-left"></i></a>
                                        </li>
                                        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                                        <li
                                            class="paginate_button page-item <?php echo $i == $page ? 'active' : ''; ?>">
                                            <a href="?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                                        </li>
                                        <?php } ?>
                                        <li
                                            class="paginate_button page-item <?php echo $page >= $totalPages ? 'disabled' : ''; ?>">
                                            <a href="?page=<?php echo $page + 1; ?>" class="page-link btnnavingation"><i
                                                    data-feather="arrow-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('layouts/footer.php'); ?>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>