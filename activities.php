<?php
require('layouts/header.php');
require('layouts/sidebar.php');
require('config/dbcon.php');

?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xl-12 col-sm-12 col-12">
                <div class="breadcrumb-path mb-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Activities
                        </li>
                    </ul>
                    <h3>Activities</h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="activity">
                    <div class="activity-box">
                        <ul class="activity-list">
                            <li>
                                <div class="activity-user">
                                    <a href="profile.html" title="" data-toggle="tooltip" class="avatar"
                                        data-original-title="Lesley Grauer">
                                        <img alt="Lesley Grauer" src="assets/img/user.jpg"
                                            class="img-fluid rounded-circle" />
                                    </a>
                                </div>
                                <div class="activity-content">
                                    <div class="timeline-content">
                                        <a href="profile.html" class="name">Lesley Grauer</a>
                                        buy new coin
                                        <a href="#">BTC</a>
                                        <span class="time">4 mins ago</span>
                                    </div>
                                </div>
                                <a class="activity-delete" href="" title="Delete">×</a>
                            </li>
                            <li>
                                <div class="activity-user">
                                    <a href="profile.html" title="" data-toggle="tooltip" class="avatar"
                                        data-original-title="Lesley Grauer">
                                        <img alt="Lesley Grauer" src="assets/img/profiles/avatar-02.jpg"
                                            class="img-fluid rounded-circle" />
                                    </a>
                                </div>
                                <div class="activity-content">
                                    <div class="timeline-content">
                                        <a href="profile.html" class="name">Jeffery Lalor</a>
                                        added
                                        <a href="profile.html" class="name">Loren Gatlin</a>
                                        and
                                        <a href="profile.html" class="name">Tarah Shropshire</a>
                                        to project
                                        <a href="#">Crypto</a>
                                        <span class="time">6 mins ago</span>
                                    </div>
                                </div>
                                <a class="activity-delete" href="" title="Delete">×</a>
                            </li>
                            <li>
                                <div class="activity-user">
                                    <a href="profile.html" title="" data-toggle="tooltip" class="avatar"
                                        data-original-title="Lesley Grauer">
                                        <img alt="Lesley Grauer" src="assets/img/profiles/avatar-04.jpg"
                                            class="img-fluid rounded-circle" />
                                    </a>
                                </div>
                                <div class="activity-content">
                                    <div class="timeline-content">
                                        <div class="timeline-content">
                                            <a href="profile.html" class="name">Catherine
                                                Manseau</a>
                                            completed task
                                            <a href="#">Crypto coin sell
                                                with payment
                                                gateway</a>
                                            <span class="time">12 mins ago</span>
                                        </div>
                                    </div>
                                </div>
                                <a class="activity-delete" href="" title="Delete">×</a>
                            </li>
                            <li>
                                <div class="activity-user">
                                    <a href="profile.html" title="" data-toggle="tooltip" class="avatar"
                                        data-original-title="Lesley Grauer">
                                        <img alt="Lesley Grauer" src="assets/img/user.jpg"
                                            class="img-fluid rounded-circle" />
                                    </a>
                                </div>
                                <div class="activity-content">
                                    <div class="timeline-content">
                                        <a href="profile.html" class="name">Lesley Grauer</a>
                                        buy new coin
                                        <a href="#">BTC</a>
                                        <span class="time">4 mins ago</span>
                                    </div>
                                </div>
                                <a class="activity-delete" href="" title="Delete">×</a>
                            </li>
                            <li>
                                <div class="activity-user">
                                    <a href="profile.html" title="" data-toggle="tooltip" class="avatar"
                                        data-original-title="Lesley Grauer">
                                        <img alt="Lesley Grauer" src="assets/img/profiles/avatar-05.jpg"
                                            class="img-fluid rounded-circle" />
                                    </a>
                                </div>
                                <div class="activity-content">
                                    <div class="timeline-content">
                                        <a href="profile.html" class="name">Jeffery Lalor</a>
                                        added
                                        <a href="profile.html" class="name">Loren Gatlin</a>
                                        and
                                        <a href="profile.html" class="name">Tarah Shropshire</a>
                                        to project
                                        <a href="#">Crypto</a>
                                        <span class="time">6 mins ago</span>
                                    </div>
                                </div>
                                <a class="activity-delete" href="" title="Delete">×</a>
                            </li>
                            <li>
                                <div class="activity-user">
                                    <a href="profile.html" title="" data-toggle="tooltip" class="avatar"
                                        data-original-title="Lesley Grauer">
                                        <img alt="Lesley Grauer" src="assets/img/profiles/avatar-07.jpg"
                                            class="img-fluid rounded-circle" />
                                    </a>
                                </div>
                                <div class="activity-content">
                                    <div class="timeline-content">
                                        <div class="timeline-content">
                                            <a href="profile.html" class="name">Catherine
                                                Manseau</a>
                                            completed task
                                            <a href="#">Crypto coin sell
                                                with payment
                                                gateway</a>
                                            <span class="time">12 mins ago</span>
                                        </div>
                                    </div>
                                </div>
                                <a class="activity-delete" href="" title="Delete">×</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require('layouts/footer.php');
?>