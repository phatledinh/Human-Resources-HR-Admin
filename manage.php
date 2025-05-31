<?php
require('layouts/header.php');
require('layouts/sidebar.php');
?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xl-12 col-sm-12 col-12">
                <div class="breadcrumb-path mb-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php"><img src="assets/img/dash.png" class="mr-2" alt="breadcrumb" />Trang
                                chủ</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Quản lý
                        </li>
                    </ul>
                    <h3>Quản lý</h3>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12 mb-4">
                <div class="head-link-set">
                    <ul>
                        <li>
                            <a class="active" href="#">Vai trò tài khoản</a>
                        </li>
                        <li>
                            <a href="leadership-manage.php">Vai trò lãnh đạo</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12 mb-4">
                <div class="card grid-views">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="employee-head">
                                            <h2>
                                                Quản trị viên cao
                                                cấp
                                            </h2>
                                            <ul>
                                                <li>
                                                    <img src="assets/img/profiles/avatar-15.jpg" alt="profile"
                                                        class="img-table" />
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="employee-contents">
                                            <p>
                                                Họ có thể xem và
                                                thực hiện mọi thứ –
                                                tốt nhất là không
                                                nên có nhiều người
                                                với vai trò này.
                                            </p>
                                            <a class="btn-addmembers" href="super-admin.php">Xem quyền hạn</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="employee-head">
                                            <h2>Quản trị viên</h2>
                                            <ul>
                                                <li>
                                                    <img src="assets/img/profiles/avatar-14.jpg" alt="profile"
                                                        class="img-table" />
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="employee-contents">
                                            <p>
                                                Quản trị viên giúp
                                                sắp xếp công việc,
                                                nhưng có ít quyền
                                                truy cập vào thông
                                                tin bảo mật như
                                                lương bổng.
                                            </p>
                                            <a class="btn-addmembers" href="super-admin.php">Xem quyền hạn</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="employee-head">
                                            <h2>
                                                Quản trị viên lương
                                            </h2>
                                            <ul>
                                                <li>
                                                    <img src="assets/img/profiles/avatar-10.jpg" alt="profile"
                                                        class="img-table" />
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="employee-contents">
                                            <p>
                                                Họ quản lý tiền
                                                lương và có quyền
                                                truy cập vào thông
                                                tin lương của mọi
                                                người.
                                            </p>
                                            <a class="btn-addmembers" href="super-admin.php">Xem quyền hạn</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="employee-head">
                                            <h2>Thành viên nhóm</h2>
                                            <ul>
                                                <li>
                                                    <img src="assets/img/profiles/avatar-15.jpg" alt="profile"
                                                        class="img-table" />
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="employee-contents">
                                            <p>
                                                Thành viên nhóm có
                                                quyền truy cập hạn
                                                chế nhất – hầu hết
                                                mọi người nên có vai
                                                trò này.
                                            </p>
                                            <a class="btn-addmembers" href="super-admin.php">Xem quyền hạn</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="customize_popup">
    <div class="modal fade" id="addteam" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lgs">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Tạo nhóm mới
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 p-0">
                        <div class="form-popup">
                            <label>Tên nhóm</label>
                            <input type="text" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        Thêm
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Hủy
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('layouts/footer.php'); ?>
<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>