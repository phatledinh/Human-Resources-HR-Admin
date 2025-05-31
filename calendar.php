<?php
require('layouts/header.php');
require('layouts/sidebar.php');
?>

<div class="page-wrapper calendar_page">
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
                            Lịch
                        </li>
                    </ul>
                    <h3>Lịch</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="calendar_head">Lịch</h2>
                    </div>
                    <div class="calendar_events">
                        <h4 class="card-title">
                            Kéo và thả sự kiện của bạn hoặc nhấp vào lịch
                        </h4>
                        <div id="calendar-events" class="mb-3">
                            <div class="calendar-events" data-class="bg-info">
                                <i class="fas fa-square bg-primary"></i>

                            </div>
                            <div class="calendar-events" data-class="bg-success">
                                <i class="fas fa-square bg-success"></i>
                            </div>
                            <div class="calendar-events" data-class="bg-danger">
                                <i class="fas fa-square bg-warning"></i>

                            </div>
                            <div class="calendar-events" data-class="bg-warning">
                                <i class="fas fa-square bg-secondary"></i>

                            </div>
                        </div>
                        <div class="checkbox mb-3">
                            <input id="drop-remove" type="checkbox" />
                            <label for="drop-remove">
                                Xóa sau khi thả
                            </label>
                        </div>
                        <a href="#" data-toggle="modal" data-target="#add_new_event"
                            class="btn mb-3 btn-primary btn-block">
                            <i class="fas fa-plus"></i> Tạo mới
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="card bg-white">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popup Thêm Sự Kiện -->
        <div class="customize_popup">
            <div class="modal fade" id="add_event" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabelevent" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabelevent">
                                Thêm sự kiện mới
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12 p-0">
                                <div class="form-popup">
                                    <label>Tên sự kiện</label>
                                    <input type="text" placeholder="Nhập tên sự kiện" />
                                </div>
                                <div class="form-popup">
                                    <label>Màu phân loại</label>
                                    <select name="Danger">
                                        <option value="Danger">Nguy hiểm</option>
                                        <option value="Success">Thành công</option>
                                        <option value="Warning">Cảnh báo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-apply">Áp dụng</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popup Sự kiện của tôi -->
        <div class="customize_popup">
            <div class="modal fade" id="my_event" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabeladd" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabeladd">
                                Thêm sự kiện mới
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12 p-0">
                                <div class="form-popup">
                                    <label>Tên sự kiện</label>
                                    <input type="text" placeholder="Nhập tên sự kiện" />
                                </div>
                                <div class="form-popup">
                                    <label>Màu phân loại</label>
                                    <select name="Danger">
                                        <option value="Danger">Nguy hiểm</option>
                                        <option value="Success">Thành công</option>
                                        <option value="Warning">Cảnh báo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-apply">Áp dụng</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popup Thêm Nhóm -->
        <div class="customize_popup">
            <div class="modal fade" id="add_new_event" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">
                                Thêm nhóm phân loại
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12 p-0">
                                <div class="form-popup">
                                    <label>Tên nhóm</label>
                                    <input type="text" placeholder="Nhập tên nhóm" />
                                </div>
                                <div class="form-popup">
                                    <label>Chọn màu nhóm</label>
                                    <select name="Success">
                                        <option value="Success">Thành công</option>
                                        <option value="Cancel">Nguy hiểm</option>
                                        <option value="Cancel">Cảnh báo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-apply">Áp dụng</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php require('layouts/footer.php'); ?>
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/js/jquery-ui.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/locales/vi.js'></script>
<script src="assets/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="assets/plugins/fullcalendar/jquery.fullcalendar.js"></script>