<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>Star Game</title>

    <link rel="shortcut icon" href="assets/img/favicon.png" />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />

    <link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.min.css" />
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="index.html" class="logo">
                    <img src="assets/img/logo.png" alt="Logo" />
                </a>
                <a href="index.html" class="logo logo-small">
                    <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30" />
                </a>
                <a href="javascript:void(0);" id="toggle_btn">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
            </div>

            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Tìm kiếm..." />
                    <button class="btn" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>

            <ul class="nav user-menu">
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle nav-link pr-0" data-toggle="dropdown">
                        <i data-feather="bell"></i>
                        <span class="badge badge-pill"></span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Thông báo</span>
                            <a href="javascript:void(0)" class="clear-noti">Xóa tất cả</a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="activities.php">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt=""
                                                    src="assets/img/profiles/avatar-02.jpg" />
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details">
                                                    <span class="noti-title">Brian Johnson</span>
                                                    đã thanh toán hóa đơn
                                                    <span class="noti-title">#DF65485</span>
                                                </p>
                                                <p class="noti-time">
                                                    <span class="notification-time">4 phút trước</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt=""
                                                    src="assets/img/profiles/avatar-03.jpg" />
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details">
                                                    <span class="noti-title">Marie Canales</span>
                                                    đã chấp nhận báo giá
                                                    <span class="noti-title">#GTR458789</span>
                                                </p>
                                                <p class="noti-time">
                                                    <span class="notification-time">6 phút trước</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <div class="avatar avatar-sm">
                                                <span class="avatar-title rounded-circle bg-primary-light">
                                                    <i class="far fa-user"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <p class="noti-details">
                                                    <span class="noti-title">Người dùng mới đã
                                                        đăng ký</span>
                                                </p>
                                                <p class="noti-time">
                                                    <span class="notification-time">8 phút trước</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt=""
                                                    src="assets/img/profiles/avatar-04.jpg" />
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details">
                                                    <span class="noti-title">Barbara Moore</span>
                                                    đã từ chối hóa đơn
                                                    <span class="noti-title">#RDW026896</span>
                                                </p>
                                                <p class="noti-time">
                                                    <span class="notification-time">12 phút trước</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <div class="avatar avatar-sm">
                                                <span class="avatar-title rounded-circle bg-info-light">
                                                    <i class="far fa-comment"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <p class="noti-details">
                                                    <span class="noti-title">Bạn có tin nhắn
                                                        mới</span>
                                                </p>
                                                <p class="noti-time">
                                                    <span class="notification-time">2 ngày trước</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">Xem tất cả thông báo</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img src="assets/img/profile.jpg" alt="" />
                            <span class="status online"></span>
                        </span>
                        <span>Đình Phát</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="profile.html">
                            <i data-feather="user" class="mr-1"></i> Hồ sơ
                            cá nhân
                        </a>
                        <a class="dropdown-item" href="settings.html">
                            <i data-feather="settings" class="mr-1"></i> Cài
                            đặt
                        </a>
                        <a class="dropdown-item" href="login.html">
                            <i data-feather="log-out" class="mr-1"></i> Đăng
                            xuất
                        </a>
                    </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu show">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">Hồ sơ cá nhân</a>
                    <a class="dropdown-item" href="settings.html">Cài đặt</a>
                    <a class="dropdown-item" href="login.html">Đăng xuất</a>
                </div>
            </div>
        </div>