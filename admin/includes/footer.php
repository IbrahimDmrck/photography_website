<div class="footer">
    <div class="float-right">
        10GB of <strong>250GB</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> Example Company &copy; 2014-2018
    </div>
</div>
</div>
<div class="small-chat-box fadeInRight animated">

    <div class="heading" draggable="true">
        <small class="chat-date float-right">
            02.19.2015
        </small>
        Small chat
    </div>

    <div class="content">

        <div class="left">
            <div class="author-name">
                Monica Jackson <small class="chat-date">
                    10:02 am
                </small>
            </div>
            <div class="chat-message active">
                Lorem Ipsum is simply dummy text input.
            </div>

        </div>
        <div class="right">
            <div class="author-name">
                Mick Smith
                <small class="chat-date">
                    11:24 am
                </small>
            </div>
            <div class="chat-message">
                Lorem Ipsum is simpl.
            </div>
        </div>
        <div class="left">
            <div class="author-name">
                Alice Novak
                <small class="chat-date">
                    08:45 pm
                </small>
            </div>
            <div class="chat-message active">
                Check this stock char.
            </div>
        </div>
        <div class="right">
            <div class="author-name">
                Anna Lamson
                <small class="chat-date">
                    11:24 am
                </small>
            </div>
            <div class="chat-message">
                The standard chunk of Lorem Ipsum
            </div>
        </div>
        <div class="left">
            <div class="author-name">
                Mick Lane
                <small class="chat-date">
                    08:45 pm
                </small>
            </div>
            <div class="chat-message active">
                I belive that. Lorem Ipsum is simply dummy text.
            </div>
        </div>


    </div>
    <div class="form-chat">
        <div class="input-group input-group-sm">
            <input type="text" class="form-control">
            <span class="input-group-btn"> <button class="btn btn-primary" type="button">Send
                </button> </span>
        </div>
    </div>

</div>
<div id="small-chat">

    <span class="badge badge-warning float-right">5</span>
    <a class="open-small-chat" href="">
        <i class="fa fa-comments"></i>

    </a>
</div>

</div>

<!-- Mainly scripts -->
<script src="back/js/jquery-3.1.1.min.js"></script>
<script src="back/js/popper.min.js"></script>
<script src="back/js/bootstrap.js"></script>
<script src="back/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="back/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="back/js/plugins/dataTables/datatables.min.js"></script>
<script src="back/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
<!-- Flot -->
<script src="back/js/plugins/flot/jquery.flot.js"></script>
<script src="back/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="back/js/plugins/flot/jquery.flot.spline.js"></script>
<script src="back/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="back/js/plugins/flot/jquery.flot.pie.js"></script>

<!-- Peity -->
<script src="back/js/plugins/peity/jquery.peity.min.js"></script>
<script src="back/js/demo/peity-demo.js"></script>

<!-- Ladda -->
<script src="back/js/plugins/ladda/spin.min.js"></script>
<script src="back/js/plugins/ladda/ladda.min.js"></script>
<script src="back/js/plugins/ladda/ladda.jquery.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="back/js/inspinia.js"></script>
<script src="back/js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI -->
<script src="back/js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- GITTER -->
<script src="back/js/plugins/gritter/jquery.gritter.min.js"></script>

<!-- Sparkline -->
<script src="back/js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Sparkline demo data  -->
<script src="back/js/demo/sparkline-demo.js"></script>

<!-- ChartJS-->
<script src="back/js/plugins/chartJs/Chart.min.js"></script>

<!-- Toastr -->
<script src="back/js/plugins/toastr/toastr.min.js"></script>


<script>
    <?php
    $admin_name = $_SESSION['username'];
    $admin = $db->query("SELECT * FROM admin WHERE email  LIKE '%$admin_name%' ", PDO::FETCH_ASSOC);
    foreach ($admin as $value) {
        echo "$(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 5000
                };
                toastr.success('Yönetim Paneli', 'Hoş Geldin " . $value['name'] . ' ' . $value['surName'] . "');

            }, 1300);";
    }
    ?>

    var data1 = [
        [0, 4], [1, 8], [2, 5], [3, 10], [4, 4], [5, 16], [6, 5], [7, 11], [8, 6], [9, 11], [10, 30], [11, 10], [12, 13], [13, 4], [14, 3], [15, 3], [16, 6]
    ];
    var data2 = [
        [0, 1], [1, 0], [2, 2], [3, 0], [4, 1], [5, 3], [6, 1], [7, 5], [8, 2], [9, 3], [10, 2], [11, 1], [12, 0], [13, 2], [14, 8], [15, 0], [16, 0]
    ];
    $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
        data1, data2
    ],
        {
            series: {
                lines: {
                    show: false,
                    fill: true
                },
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 1,
                    fill: 0.4
                },
                points: {
                    radius: 0,
                    show: true
                },
                shadowSize: 2
            },
            grid: {
                hoverable: true,
                clickable: true,
                tickColor: "#d5d5d5",
                borderWidth: 1,
                color: '#d5d5d5'
            },
            colors: ["#1ab394", "#1C84C6"],
            xaxis: {
            },
            yaxis: {
                ticks: 4
            },
            tooltip: false
        }
    );

    var doughnutData = {
        labels: ["App", "Software", "Laptop"],
        datasets: [{
            data: [300, 50, 100],
            backgroundColor: ["#a3e1d4", "#dedede", "#9CC3DA"]
        }]
    };


    var doughnutOptions = {
        responsive: false,
        legend: {
            display: false
        }
    };


    var ctx4 = document.getElementById("doughnutChart").getContext("2d");
    new Chart(ctx4, { type: 'doughnut', data: doughnutData, options: doughnutOptions });

    var doughnutData = {
        labels: ["App", "Software", "Laptop"],
        datasets: [{
            data: [70, 27, 85],
            backgroundColor: ["#a3e1d4", "#dedede", "#9CC3DA"]
        }]
    };


    var doughnutOptions = {
        responsive: false,
        legend: {
            display: false
        }
    };


    var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
    new Chart(ctx4, { type: 'doughnut', data: doughnutData, options: doughnutOptions });

        });

    $(document).ready(function () {
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy' },
                { extend: 'csv' },
                { extend: 'excel', title: 'ExampleFile' },
                { extend: 'pdf', title: 'ExampleFile' },

                {
                    extend: 'print',
                    customize: function (win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]

        });



        var lddelete = $('.ladda-button-demo-delete').ladda();

        lddelete.click(function () {
            // Start loading
            lddelete.ladda('start');

            // Timeout example
            // Do something in backend and then stop ladda
            setTimeout(function () {
                lddelete.ladda('stop');
            }, 3000)


        });

        var ldadd = $('.ladda-button-demo-add').ladda();

        ldadd.click(function () {
            // Start loading
            ldadd.ladda('start');

            // Timeout example
            // Do something in backend and then stop ladda
            setTimeout(function () {
                ldadd.ladda('stop');
            }, 3000)


        });

        var ldupdate = $('.ladda-button-demo-update').ladda();

        ldupdate.click(function () {
            // Start loading
            ldupdate.ladda('start');

            // Timeout example
            // Do something in backend and then stop ladda
            setTimeout(function () {
                ldupdate.ladda('stop');
            }, 3000)


        });

    });
</script>

</body>

</html>