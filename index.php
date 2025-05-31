<?php
require('layouts/header.php');
require('layouts/sidebar.php');
require('functions/data.php');
?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-name mb-4">
            <h4 class="m-0">
                <img src="assets/img/profile.jpg" class="mr-1" alt="profile" />
                Xin chào Đình Phát
            </h4>
            <?php
            setlocale(LC_TIME, 'vi_VN.UTF-8');

            $day = date('D'); 
            $day_num = date('d'); 
            $month = date('M'); 
            $year = date('Y'); 

            $days = [
                'Mon' => 'Thứ Hai',
                'Tue' => 'Thứ Ba',
                'Wed' => 'Thứ Tư',
                'Thu' => 'Thứ Năm',
                'Fri' => 'Thứ Sáu',
                'Sat' => 'Thứ Bảy',
                'Sun' => 'Chủ Nhật'
            ];

            $months = [
                'Jan' => 'Tháng Một',
                'Feb' => 'Tháng Hai',
                'Mar' => 'Tháng Ba',
                'Apr' => 'Tháng Tư',
                'May' => 'Tháng Năm',
                'Jun' => 'Tháng Sáu',
                'Jul' => 'Tháng Bảy',
                'Aug' => 'Tháng Tám',
                'Sep' => 'Tháng Chín',
                'Oct' => 'Tháng Mười',
                'Nov' => 'Tháng Mười Một',
                'Dec' => 'Tháng Mười Hai'
            ];

            $translated_day = $days[$day] ?? $day;
            $translated_month = $months[$month] ?? $month;

            $formatted_date = "$translated_day, $day_num $translated_month $year";
            ?>
            <label><?php echo $formatted_date; ?></label>
        </div>

        <div class="row mb-4">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card board1 fill1">
                    <div class="card-body">
                        <div class="card_widget_header">
                            <label>Nhân viên</label>
                            <h4><?php echo $total_employees; ?></h4>
                        </div>
                        <div class="card_widget_img">
                            <img src="assets/img/dash1.png" alt="card-img" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card board1 fill2">
                    <div class="card-body">
                        <div class="card_widget_header">
                            <label>Phòng ban</label>
                            <h4><?php echo $total_departments; ?></h4>
                        </div>
                        <div class="card_widget_img">
                            <img src="assets/img/dash2.png" alt="card-img" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card board1 fill3">
                    <div class="card-body">
                        <div class="card_widget_header">
                            <label>Nghỉ phép</label>
                            <h4><?php echo $total_leaves; ?></h4>
                        </div>
                        <div class="card_widget_img">
                            <img src="assets/img/dash3.png" alt="card-img" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card board1 fill4">
                    <div class="card-body">
                        <div class="card_widget_header">
                            <label>Lương</label>
                            <h4 style="font-size: 18px;"><?php echo number_format($total_salary, 0); ?> VNĐ</h4>
                        </div>
                        <div class="card_widget_img">
                            <img src="assets/img/dash4.png" alt="card-img" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 d-flex mobile-h">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title">Tổng số Nhân viên</h5>
                    </div>
                    <div class="card-body">
                        <div id="invoice_chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title">Tổng lương theo phòng ban</h5>
                    </div>
                    <div class="card-body">
                        <div id="sales_chart"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-sm-12 col-12 d-flex">
                <div class="card card-list flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">Nhân viên xuất sắc nhân tháng</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($top_employees as $employee): ?>
                        <div class="team-list">
                            <div class="team-view">
                                <div class="team-img">
                                    <img src="<?php echo $employee['thumbnail']; ?>" alt="avatar" />
                                </div>
                                <div class="team-content">
                                    <label><?php echo $employee['FullName']; ?></label>
                                    <span><?php echo $employee['position']; ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-12 col-12 d-flex">
                <div class="card card-list flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">Sinh nhật tháng này</h4>
                    </div>
                    <div class="card-body dash-activity">
                        <div class="slimscroll activity_scroll">
                            <?php if (empty($birthdays_this_month)): ?>
                            <p>Không có sinh nhật trong tháng này.</p>
                            <?php else: ?>
                            <?php foreach ($birthdays_this_month as $birthday): ?>
                            <div class="activity-set">
                                <div class="activity-img">
                                    <img src="<?php echo $birthday['thumbnail']; ?>" alt="avatar" />
                                </div>
                                <div class="activity-content">
                                    <label><?php echo $birthday['FullName']; ?></label>
                                    <span>Sinh nhật: <?php echo $birthday['birthday']; ?></span>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="leave-viewall">
                            <a href="birthday.php">Xem tất cả
                                <img src="assets/img/right-arrow.png" class="ml-2" alt="arrow" /></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-12 col-12 d-flex">
                <div class="card card-list flex-fill">
                    <div class="card-header">
                        <h4 class="card-title-dash">Nghỉ phép tháng này</h4>
                    </div>
                    <div class="card-body p-0">
                        <?php if (empty($leaves_this_month)): ?>
                        <div class="leave-set">
                            <p>Không có nghỉ phép trong tháng này.</p>
                        </div>
                        <?php else: ?>
                        <?php foreach ($leaves_this_month as $leave): ?>
                        <div class="leave-set">
                            <span class="leave-inactive">
                                <i class="fas fa-briefcase"></i>
                            </span>
                            <label><?php echo $leave['FullName']; ?> - <?php echo $leave['leave_date']; ?>
                                (<?php echo $leave['leave_type']; ?>, <?php echo $leave['status']; ?>)</label>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <div class="leave-viewall">
                            <a href="leave.php">Xem tất cả
                                <img src="assets/img/right-arrow.png" class="ml-2" alt="arrow" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require('layouts/footer.php');
?>

<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>
<script>
pieConfig.series = <?php echo json_encode($employees_by_dept['employee_counts'] ?? []); ?>.map(
    Number);
pieConfig.labels = <?php echo json_encode($employees_by_dept['dept_names'] ?? []); ?>;

pieChart.updateOptions(pieConfig, true);
</script>
<script>
var barCtx = document.getElementById("sales_chart");
var barConfig = {
    series: [{
        name: 'Tổng lương (triệu VNĐ)',
        data: <?php echo json_encode($salary_by_dept['total_salaries'] ?? []); ?>.map(Number)
    }],
    chart: {
        type: 'bar',
        height: 350,
        fontFamily: 'Poppins, sans-serif',
        toolbar: {
            show: true
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        }
    },
    dataLabels: {
        enabled: true,
        formatter: function(val) {
            return val.toFixed(2) + " triệu VNĐ";
        },
        offsetY: -20,
        style: {
            fontSize: '12px',
            colors: ['#304758']
        }
    },
    xaxis: {
        categories: <?php echo json_encode($salary_by_dept['dept_names'] ?? []); ?>,
        labels: {
            style: {
                fontSize: '12px'
            }
        }
    },
    yaxis: {
        title: {
            text: 'Tổng lương (triệu VNĐ)'
        },
        labels: {
            formatter: function(val) {
                return val.toFixed(2);
            }
        }
    },
    colors: ['#008FFB'],
    fill: {
        opacity: 1
    },
    tooltip: {
        y: {
            formatter: function(val) {
                return val.toFixed(2) + " triệu VNĐ";
            }
        }
    },
    legend: {
        show: true,
        position: 'top'
    }
};

var barChart = new ApexCharts(barCtx, barConfig);
barChart.render();
</script>