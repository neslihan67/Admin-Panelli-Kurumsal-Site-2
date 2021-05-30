<!--ADMİN PANEL İNDEX-->


<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
@session_start();
@ob_start();
define("DATA","data/");
define("SAYFA","include/");
define("SINIF","class/");
include_once(DATA."connection.php");
define("SITE",$siteUrl."admin/");
include_once(SINIF."class.phpmailer.php");
include_once(SINIF."class.smtp.php");


 if(!empty($_SESSION["ID"]) && (!empty($_SESSION["adsoyad"])) && (!empty($_SESSION["mail"])))
	{
			
		
	}
	else
	{
		?>
		<meta http-equiv="refresh" content="1;url=<?=SITE?>giris-yap">
        <?php
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$siteBaslik?></title>
  <meta http-equiv="keywords" content="<?=$siteAnahtar?>">
  <meta http-equiv="description" content="<?=$siteAciklama?>">
<meta http-equiv="expires" content="Sun, 01 Jan 2014 00:00:00 GMT"/>
<meta http-equiv="pragma" content="no-cache" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=SITE?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?=SITE?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=SITE?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=SITE?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=SITE?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=SITE?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=SITE?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=SITE?>plugins/summernote/summernote-bs4.min.css">
  <!--FOR Datatable -->
   <link rel="stylesheet" href="<?=SITE?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=SITE?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=SITE?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
   <!-- FOR EDITORS summernote -->
  <link rel="stylesheet" href="<?=SITE?>plugins/summernote/summernote-bs4.min.css">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="<?=SITE?>plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="<?=SITE?>plugins/codemirror/theme/monokai.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar start-->
  <?php 
  include_once(DATA."ust.php");
  include_once(DATA."menu.php");
  
  if($_GET && !empty($_GET["sayfa"]))
{
  $sayfa=$_GET["sayfa"].".php";
  if(file_exists(SAYFA.$sayfa))
  {
    include_once(SAYFA.$sayfa);
  }
  else{
    include_once(SAYFA."home.php");
  }

}
else
{
  include_once(SAYFA."home.php");
}
  
  include_once(DATA."alt.php");
  
  ?>
  <!-- /.navbar finish -->


<!-- Main Sidebar Container start -->

<!-- /.Main Sidebar Container finish -->



  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper"> 
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=SITE?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=SITE?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=SITE?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=SITE?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=SITE?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?=SITE?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=SITE?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=SITE?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=SITE?>plugins/moment/moment.min.js"></script>
<script src="<?=SITE?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=SITE?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=SITE?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=SITE?>dist/js/adminlte.js"></script>
<script src="<?=SITE?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=SITE?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=SITE?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=SITE?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=SITE?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=SITE?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=SITE?>plugins/jszip/jszip.min.js"></script>
<script src="<?=SITE?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=SITE?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=SITE?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=SITE?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=SITE?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?=SITE?>dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=SITE?>dist/js/pages/dashboard.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- CodeMirror -->
<script src="<?=SITE?>plugins/codemirror/codemirror.js"></script>
<script src="<?=SITE?>plugins/codemirror/mode/css/css.js"></script>
<script src="<?=SITE?>plugins/codemirror/mode/xml/xml.js"></script>
<script src="<?=SITE?>plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- FOR EDITORS Summernote -->
<script src="<?=SITE?>plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    //FOR EDITORS Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
  function aktifPasif(ID,tablo){
	  var durum=0;
	  if($(".aktifPasif"+ID).is(':checked'))
	  {
		  durum=1;
	  }
	  else
	  {
      durum=2;		  
	  }
	  $.ajax({
		  method:"POST",
		  url:"<?=SITE?>ajax.php",
		  data:("tablo":tablo,"ID":ID,"durum":durum),
		  success: function(sonuc)
		  {
			  if(sonuc=="TAMAM")
			  {
				  
			  }
			  else
			  {
				  alert("işleminiz şuan geçersizdir. Lütfen daha sonra deneyin.");
			  }
		  }
	  });
  }
</script>




</body>
</html>
