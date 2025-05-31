var pieCtx = document.getElementById("invoice_chart"),
    pieConfig = {
        colors: [
            "#800080",
            "#32CD32",
            "#FF0000",
            "#FFD700",
            "#00CED1",
            "#FF69B4",
            "#A52A2A",
        ],
        series: [],
        chart: {
            fontFamily: "Poppins, sans-serif",

            type: "pie",
        },
        labels: [],
        dataLabels: {
            enabled: true,
            formatter: function (val, opts) {
                return (
                    opts.w.config.labels[opts.seriesIndex] +
                    " (" +
                    val.toFixed(1) +
                    "%)"
                );
            },
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " nhân viên";
                },
            },
        },
        legend: {
            show: true,
            position: "bottom",
            labels: {
                colors: ["#000000"],
            },
        },
        responsive: [
            {
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200,
                    },
                    legend: {
                        position: "bottom",
                    },
                },
            },
        ],
    };

var pieChart = new ApexCharts(pieCtx, pieConfig);
pieChart.render();
