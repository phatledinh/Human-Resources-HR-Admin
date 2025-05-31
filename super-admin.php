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
                            <a href="index.html">Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Quản lý
                        </li>
                    </ul>
                    <h3>Quản trị viên cấp cao</h3>
                </div>
            </div>

            <div class="col-xl-12 col-sm-12 col-12 mb-4">
                <div class="head-link-set">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="active nav-link" id="tabdetails" data-toggle="tab" href="#details" role="tab"
                                aria-controls="details" aria-selected="true">Quản lý thông tin</a>
                        </li>
                        <li>
                            <a class="nav-link" id="tabtimeoff" data-toggle="tab" href="#timeoff" role="tab"
                                aria-controls="timeoff" aria-selected="false">Quản lý nghỉ phép</a>
                        </li>
                        <li>
                            <a class="nav-link" id="tabsalaries" data-toggle="tab" href="#salaries" role="tab"
                                aria-controls="salaries" aria-selected="false">Quản lý lương</a>
                        </li>
                        <li>
                            <a class="nav-link" id="tabmanageall" data-toggle="tab" href="#manageall" role="tab"
                                aria-controls="manageall" aria-selected="false">Quản lý tất cả</a>
                        </li>
                        <li>
                            <a class="nav-link" id="tabsettings" data-toggle="tab" href="#settings" role="tab"
                                aria-controls="settings" aria-selected="false">Cài đặt</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-xl-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="details" role="tabpanel"
                                aria-labelledby="tabdetails">
                                <div class="table-responsive">
                                    <table class="table custom-table no-footer tablenoheader">
                                        <thead>
                                            <tr>
                                                <th>Mô tả Quyền</th>
                                                <th>Xem</th>
                                                <th>Quản lý</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">Thông tin cơ bản</h6>
                                                        <p class="ctm-text-sm">Tên ưu tiên và ngày sinh</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="switch1"
                                                            checked="" />
                                                        <label class="custom-control-label" for="switch1"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="switch2"
                                                            checked="" />
                                                        <label class="custom-control-label" for="switch2"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">Thông tin cá nhân</h6>
                                                        <p class="ctm-text-sm">Quốc tịch, ngày sinh đầy đủ và địa chỉ
                                                            nhà</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="switch3"
                                                            checked="" />
                                                        <label class="custom-control-label" for="switch3"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="switch4"
                                                            checked="" />
                                                        <label class="custom-control-label" for="switch4"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">Thông tin liên hệ</h6>
                                                        <p class="ctm-text-sm">Email và số điện thoại</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="switch5"
                                                            checked="" />
                                                        <label class="custom-control-label" for="switch5"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="switch6"
                                                            checked="" />
                                                        <label class="custom-control-label" for="switch6"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">Thông tin đăng nhập</h6>
                                                        <p class="ctm-text-sm">Email đăng nhập</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="switch7"
                                                            checked="" />
                                                        <label class="custom-control-label" for="switch7"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="switch8"
                                                            checked="" />
                                                        <label class="custom-control-label" for="switch8"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">Mạng xã hội</h6>
                                                        <p class="ctm-text-sm">Trang web</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="switch9"
                                                            checked="" />
                                                        <label class="custom-control-label" for="switch9"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch10" checked="" />
                                                        <label class="custom-control-label" for="switch10"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">Thông tin công ty</h6>
                                                        <p class="ctm-text-sm">Vai trò và loại hình làm việc</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch11" checked="" />
                                                        <label class="custom-control-label" for="switch11"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch12" checked="" />
                                                        <label class="custom-control-label" for="switch12"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">Tuần làm việc</h6>
                                                        <p class="ctm-text-sm">Xem hoặc quản lý các ngày làm việc</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch13" checked="" />
                                                        <label class="custom-control-label" for="switch13"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch14" checked="" />
                                                        <label class="custom-control-label" for="switch14"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">Ngày quan trọng</h6>
                                                        <p class="ctm-text-sm">
                                                            Theo dõi các dịp quan trọng của thành viên trong nhóm, như
                                                            ngày bắt đầu làm việc, ngày thử việc hoặc ngày hết hạn visa.
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch15" checked="" />
                                                        <label class="custom-control-label" for="switch15"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch16" checked="" />
                                                        <label class="custom-control-label" for="switch16"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">Quản lý loại ngày quan trọng</h6>
                                                        <p class="ctm-text-sm">
                                                            Tạo và quản lý tất cả các loại ngày quan trọng áp dụng cho
                                                            bất kỳ ai trong công ty.
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch17" checked="" />
                                                        <label class="custom-control-label" for="switch17"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch38" checked="" />
                                                        <label class="custom-control-label" for="switch38"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="timeoff" role="tabpanel" aria-labelledby="tabtimeoff">
                                <div class="table-responsive">
                                    <table class="table custom-table no-footer tablenoheader">
                                        <thead>
                                            <tr>
                                                <th>Mô tả Quy tắc</th>
                                                <th>Cho phép?</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">
                                                            Phê duyệt hoặc từ chối nghỉ phép
                                                        </h6>
                                                        <p class="ctm-text-sm">
                                                            Quản lý yêu cầu nghỉ phép của bất kỳ ai trong nhóm của họ.
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch1812" checked="" />
                                                        <label class="custom-control-label" for="switch1812"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">
                                                            Đặt nghỉ phép thay
                                                        </h6>
                                                        <span>
                                                            Đặt nghỉ phép cho bất kỳ ai trong nhóm của họ
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch19" checked="" />
                                                        <label class="custom-control-label" for="switch19"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">
                                                            Quản lý hạn mức nghỉ phép
                                                        </h6>
                                                        <span>
                                                            Điều chỉnh hạn mức nghỉ phép cho mọi người trong nhóm của họ
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch20" checked="" />
                                                        <label class="custom-control-label" for="switch20"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">
                                                            Quản lý cài đặt nghỉ phép cho công ty
                                                        </h6>
                                                        <span>
                                                            Quản lý loại nghỉ phép tùy chỉnh, chuyển đổi ngày nghỉ, ngày
                                                            nghỉ lễ công ty và các ngày hạn chế,
                                                            tuần làm việc của công ty, và hạn mức nghỉ phép công ty.
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch21" checked="" />
                                                        <label class="custom-control-label" for="switch21"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">
                                                            Quản lý làm việc tại nhà
                                                        </h6>
                                                        <p class="ctm-text-sm">
                                                            Tạo, chỉnh sửa hoặc xóa yêu cầu làm việc tại nhà cho mọi
                                                            người trong nhóm của họ
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch22" checked="" />
                                                        <label class="custom-control-label" for="switch22"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="salaries" role="tabpanel" aria-labelledby="tabsalaries">
                                <div class="table-responsive">
                                    <table class="table custom-table no-footer tablenoheader">
                                        <thead>
                                            <tr>
                                                <th>Mô tả Quy tắc</th>
                                                <th>Xem</th>
                                                <th>Quản lý</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">
                                                            Lương
                                                        </h6>
                                                        <p class="ctm-text-sm">
                                                            Xem hoặc quản lý lương
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch18" checked="" />
                                                        <label class="custom-control-label" for="switch18"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch181" checked="" />
                                                        <label class="custom-control-label" for="switch181"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="manageall" role="tabpanel" aria-labelledby="tabmanageall">
                                <div class="table-responsive">
                                    <table class="table custom-table no-footer tablenoheader">
                                        <thead>
                                            <tr>
                                                <th>Mô tả Quy tắc</th>
                                                <th>Cho phép?</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">
                                                            Mời Người Vào Nhóm
                                                        </h6>
                                                        <p class="ctm-text-sm">
                                                            Xem hoặc quản lý những người sẽ gia nhập nhóm của họ tại
                                                            công ty bạn.
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch25" checked="" />
                                                        <label class="custom-control-label" for="switch25"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">
                                                            Loại bỏ Những Người Khác
                                                        </h6>
                                                        <p class="ctm-text-sm">
                                                            Lưu trữ những người khác và thu hồi quyền truy cập của họ.
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch26" checked="" />
                                                        <label class="custom-control-label" for="switch26"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">
                                                            Quản lý Vai Trò
                                                        </h6>
                                                        <p class="ctm-text-sm">
                                                            Chỉnh sửa và phân vai trò cho bất kỳ ai trong công ty.
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch27" checked="" />
                                                        <label class="custom-control-label" for="switch27"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">
                                                            Tạo Nhóm
                                                        </h6>
                                                        <p class="ctm-text-sm">
                                                            Tạo các nhóm mới.
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch28" checked="" />
                                                        <label class="custom-control-label" for="switch28"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">
                                                            Chỉnh sửa Tên Nhóm
                                                        </h6>
                                                        <p class="ctm-text-sm">
                                                            Có thể chỉnh sửa tên nhóm.
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch29" checked="" />
                                                        <label class="custom-control-label" for="switch29"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">
                                                            Chỉnh sửa Thành viên Nhóm
                                                        </h6>
                                                        <p class="ctm-text-sm">
                                                            Có thể thêm hoặc bớt thành viên trong nhóm.
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch30" checked="" />
                                                        <label class="custom-control-label" for="switch30"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">
                                                            Quản lý Văn phòng
                                                        </h6>
                                                        <p class="ctm-text-sm">
                                                            Tạo và chỉnh sửa tất cả các văn phòng.
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch31" checked="" />
                                                        <label class="custom-control-label" for="switch31"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="tabsettings">
                                <div class="table-responsive">
                                    <table class="table custom-table no-footer tablenoheader">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Mô Tả Quyền
                                                </th>
                                                <th>Cho phép?</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">
                                                            Tùy chỉnh thương hiệu công ty
                                                        </h6>
                                                        <p class="ctm-text-sm">
                                                            Đặt tên công ty, logo, sứ mệnh và ảnh bìa
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch32" checked="" />
                                                        <label class="custom-control-label" for="switch32"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">
                                                            Slide chào đón nhân viên mới
                                                        </h6>
                                                        <p class="ctm-text-sm">
                                                            Tạo, chỉnh sửa và xóa các slide hiển thị cho nhân viên mới
                                                            khi họ bắt đầu
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch33" checked="" />
                                                        <label class="custom-control-label" for="switch33"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">
                                                            Quản lý tất cả công cụ công ty
                                                        </h6>
                                                        <p class="ctm-text-sm">
                                                            Thêm, cập nhật và xóa công cụ trong phần công cụ công ty
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch34" checked="" />
                                                        <label class="custom-control-label" for="switch34"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">
                                                            Tích hợp Slack
                                                        </h6>
                                                        <p class="ctm-text-sm">
                                                            Quản lý tích hợp Slack, bao gồm tự động tạo tài khoản Slack
                                                            cho nhân viên mới và tùy chỉnh thông báo
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch35" checked="" />
                                                        <label class="custom-control-label" for="switch35"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">
                                                            Tích hợp lịch nghỉ phép
                                                        </h6>
                                                        <p class="ctm-text-sm">
                                                            Khả năng tắt tích hợp lịch cho tất cả mọi người
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch36" checked="" />
                                                        <label class="custom-control-label" for="switch36"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-0">
                                                            Quản lý đăng ký tài khoản
                                                        </h6>
                                                        <p class="ctm-text-sm">
                                                            Có thể cập nhật thông tin thẻ và xem tất cả hóa đơn
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="switch37" checked="" />
                                                        <label class="custom-control-label" for="switch37"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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


<?php require('layouts/footer.php'); ?>