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

<!-- Select2 --> 
<script src="back/js/plugins/select2/select2.full.min.js"></script>
<!-- SUMMERNOTE -->
<script src="back/js/plugins/summernote/summernote-bs4.js"></script>
 <!-- Color picker -->
 <script src="back/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
     <!-- FooTable -->
     <script src="back/js/plugins/footable/footable.all.min.js"></script>
   <!-- Input Mask-->
   <script src="back/js/plugins/jasny/jasny-bootstrap.min.js"></script>

   <!-- Chosen -->
   <script src="back/js/plugins/chosen/chosen.jquery.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
<script>
      $(function () {
        $('select').multipleSelect({
            width:'100%',
            filter: true ,
            animate:'slide',
            displayDelimiter: ' | '
        })
      })
    </script>

<script>
 $('.custom-file-input').on('change', function() {
   let fileName = $(this).val().split('\\').pop();
   $(this).next('.custom-file-label').addClass("selected").html(fileName);
}); 
    <?php
    $admin_name = $_SESSION['username'];
    $admin = $db->query("SELECT * FROM admin WHERE email  LIKE '%$admin_name%' ", PDO::FETCH_ASSOC);


    foreach ($admin as $value) {
        echo "$(document).ready(function() {
           
            setTimeout(function(){
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 5000
                };
                toastr.success('Yönetim Paneli', 'Hoş Geldin " . $value['name'] . ' ' . $value['surName'] . "');

            }, 1300);
           
        });";
    }

    ?>
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

        $(".select2_demo_3").select2({
            placeholder: "Bir konum seçin",
            allowClear: true
        });

       

            $('.summernote').summernote();
            $('.demo1').colorpicker();
            $('.footable').footable();
            $('.chosen-select').chosen({width: "100%"});
           

        

    });
</script>

<script>
        $(document).ready(function () {
            $(".edit_btn").click(function (e) {

                e.preventDefault();
                var category_id = $(this).closest("tr").find(".category_id").text();
                   
                    $.ajax({
                        type: "POST",
                        url: "ajax_post.php",
                        data: {
                            'checking_edit_btn': true,
                            'category_id': category_id,
                        },
                    
                        success: function (response) {
                        
                            $.each(response, function (key, value) {
                                $('#name').val(value['name']);
                                $('#iddegeri').val(value['id']);
                            
                            });
                        
                            $('#categoryUpdateModal').modal('show');
                        }
                    });
                });

                $(".edit_photo_btn").click(function (e) {

                    e.preventDefault();
                    var photo_id = $(this).closest("tr").find(".photo_id").text();
                  
                        $.ajax({
                            type: "POST",
                            url: "ajax_post.php",
                            data: {
                                'checking_edit_photo_btn': true,
                                'photo_id': photo_id,
                            },
                        
                            success: function (response) {
                            
                                $.each(response, function (key, value) {
                                    $('#name').val(value['name']);
                                    $('#categories').val(value['categories[]']);
                                    $('#id').val(value['id']);
                                    $('#photoName').val(value['photoName']);
                                    
                                });
                            
                                $('#photoUpdateModalCenter').modal('show');
                            }
                        });
                    });

            });

</script>
</body>

</html>
