<!DOCTYPE html>
<html>
<head>
  <link href="<?php echo base_url(); ?>assets/dist/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>absen/css/bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>abc/js/jquery-ui.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo base_url()?>abc/js/jquery-ui.js"></script>
  <?php $this->load->view('inc/head'); ?>
  <script type="text/javascript">
    $(function() {
      $( "#CREATED" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
      });
    });
  </script>
</head>
<body class="skin-blue">
  <!-- wrapper di bawah footer -->
  <div class="wrapper">

    <?php $this->load->view('inc/head2'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <?php $this->load->view('inc/sidebar'); ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <b>DATA KARYAWAN</b>
          <!--<select class="form-control" style="width:300px">
          	<option>--Pilih Bulan--</option>
          	<option>Jan</option>
          	<option>Feb</option>
          </select>
          <select class="form-control" style="width:300px">
          	<option>--Pilih Tahun--</option>
          	<option>2015</option>
          	<option>2016</option>
          </select><br>
          <button type="submit" class="btn btn-success">Lihat Data</button> <button type="submit" class="btn btn-warning"><i class="fa fa-print"> Cetak</i></button>-->
          <form action="<?php echo base_URL(); ?>index.php/home/cetakAbsen" target="blank" method="post" accept-charset="utf-8" enctype="multipart/form-data"> 
          <!--<input type="hidden" name="tipe" value="<?php echo $this->uri->segment(2); ?>">-->

          <table class="table-form" width="100%">
            <tr><td width="20%">Dari Tanggal</td><td><b><input type="text" name="tgl_start" id="tgl_start" class="form-control" style="width: auto;" required></b></td></tr>
            <tr></tr>
            <tr><td width="20%">Sampai Tanggal</td><td><b><input type="text" name="tgl_end" id="tgl_end" class="form-control" style="width: auto;"  required></b></td></tr>
  
            <tr><td colspan="2">
          <br>
        <button type="submit" class="btn btn-primary"><i class="icon icon-print icon-white"></i> Cetak</button>
          <a href="<?php echo base_URL(); ?>index.php/dashboard" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
        </td></tr>
        </table>
    </form>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
            <!-- <a style="margin-bottom:3px" href="<?php echo base_url(); ?>karyawan/addkaryawan" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH KARYAWAN </a> -->
              <div class="box">
                <!-- <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span> -->
                <div class="box-title">
                  
                </div><!-- /.box-title -->
                <div class="box-body">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>NIK</th>
                      <th>NAMA</th>
                      <th>JABATAN</th>
                      <th>TANGGAL</th>
                      <th>JAM</th>
                      <th>STATUS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_absensi as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['nippos']; ?></td>
                      <td><?php echo $row['nama_kar']; ?></td>
                      <td><?php echo $row['jabatan']; ?></td>
                      <td><?php echo $row['tanggal']; ?></td>
                      <td><?php echo $row['jammasuk']; ?></td>
                      <td><?php if ($row['kodeabsensi'] == 1) { ?>
						          <h4><span class="label label-success">Masuk</span></h4>
                      <?php } else { ?>
                      <h4><span style="text-fonts:16px" class="label label-danger">Pulang</span></h4>
                      <?php } ?>
                      </td>
                      
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <!-- <b>Version</b> 2.0 -->
      </div>
      <strong>Copyright &copy; 2016 <a href="#"></a></strong>
    </footer>
  </div><!-- ./wrapper -->
  <!-- page script -->
  

    
    <?php $this->load->view('inc/footer'); ?>
    <script src="<?php echo base_url(); ?>assets/dist/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/dist/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function() {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false


        });
      });
            //waktu flash data :v
      $(function(){
      $('#pesan-flash').delay(4000).fadeOut();
      $('#pesan-error-flash').delay(5000).fadeOut();
      });

  //Date Picker
  $(function() {
  $( "#tgl_start" ).datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'yy-mm-dd'
  });
  $( "#tgl_end" ).datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'yy-mm-dd'
  });
});
    </script>
</body>
</html>