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
                            <a href="index.html">
                                <img src="assets/img/dash.png" class="mr-2" alt="breadcrumb" />Trang Chủ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            Quản Lý
                        </li>
                    </ul>
                    <h3>Quản Lý</h3>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12 mb-4">
                <div class="head-link-set">
                    <ul>
                        <li>
                            <a href="manage.html">Vai Trò Tài Khoản</a>
                        </li>
                        <li>
                            <a class="active" href="#">Vai Trò Lãnh Đạo</a>
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
                                            <h2>Quản Lý Trực Tiếp</h2>
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
                                                Họ có thể xem và làm mọi thứ – tốt nhất không nên có nhiều người với vai
                                                trò này.
                                            </p>
                                            <a class="btn-addmembers" href="super-admin.html">Xem Quyền</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="employee-head">
                                            <h2>Trưởng Nhóm</h2>
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
                                                Quản trị viên giúp sắp xếp công việc, nhưng có quyền truy cập ít hơn vào
                                                thông tin bảo mật như lương.
                                            </p>
                                            <a class="btn-addmembers" href="super-admin.html">Xem Quyền</a>
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
                                            <h2>Người Phê Duyệt Nghỉ Phép</h2>
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
                                                Họ xử lý bảng lương và có quyền truy cập thông tin lương của mọi người.
                                            </p>
                                            <a class="btn-addmembers" href="super-admin.html">Xem Quyền</a>
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
                                Tạo Nhóm Mới
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12 p-0">
                                <div class="form-popup">
                                    <label>Tên Nhóm</label>
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
    </div>
</div>


<?php require('layouts/footer.php'); ?>