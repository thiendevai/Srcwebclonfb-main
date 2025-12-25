<?php if (!defined('IN_SITE')) {
    die('The Request Not Found');
}?>

<script type="text/javascript">
 $(function() {
    $('#datatable').DataTable({
        "lengthMenu": [[10, 50, 100, 500, 1000, 2000, 5000, 10000 -1], [10, 50, 100, 500, 1000, 2000, 5000, 10000, "All"]]
    });
    $('#datatable1').DataTable({
        "lengthMenu": [[10, 50, 100, 500, 1000, 2000, 5000, 10000 -1], [10, 50, 100, 500, 1000, 2000, 5000, 10000, "All"]]
    });
    $('#datatable2').DataTable({
        "lengthMenu": [[10, 50, 100, 500, 1000, 2000, 5000, 10000 -1], [10, 50, 100, 500, 1000, 2000, 5000, 10000, "All"]]
    });

});

$.ajax({
    url: "<?=BASE_URL('update.php');?>",
    type: "GET",
    timeout: 3000,
    dateType: "text",
    data: {},
    success: function(result) {

    }
});

$.ajax({
    url: "<?=BASE_URL('install.php');?>",
    type: "GET",
    dateType: "text",
    data: {},
    success: function(result) {

    }
});

// $.ajax({
//     url: "<?=BASE_URL('cron/cron.php');?>",
//     type: "GET",
//     dateType: "text",
//     data: {},
//     success: function(result) {

//     }
// });

</script>
<!-- <div id="autoload"></div>
<script type="text/javascript">
function autoload() {
    $.ajax({
        url: "<?=BASE_URL('cron/cron.php');?>",
        type: "GET",
        dateType: "text",
        data: {},
        success: function(result) {

        }
    });
}
setInterval(function() {
    $('#autoload').load(autoload());
}, 15000);
</script> -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
        
        <div id="google_translate_element"></div>
        <script type="text/javascript">
        // <![CDATA[
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'vi',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }
        // ]]>
        </script>
        <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"
            type="text/javascript"></script>

    </div>
    <b>Version</b> <b style="color:red;"><?=$config['version'];?></b> - <strong>Powered By <a
            href="https://www.cmsnt.co/?domain=<?=base_url_admin('');?>" target="_blank">CMSNT.CO</a></strong>
</footer>
</div>
 

<!-- jQuery UI 1.11.4 -->
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=BASE_URL('public/AdminLTE3/');?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=BASE_URL('public/AdminLTE3/');?>dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=BASE_URL('public/AdminLTE3/');?>dist/js/pages/dashboard.js"></script>
<!-- ChartJS -->
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/chart.js/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
 <!-- daterangepicker -->
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/moment/moment.min.js"></script>
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Summernote -->
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- JQVMap -->
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- DataTables -->
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/jszip/jszip.min.js"></script>
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=BASE_URL('public/AdminLTE3/');?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<?=$body['footer'];?>
</body>

</html>
 