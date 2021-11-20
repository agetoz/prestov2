<!DOCTYPE html>
<html>
<head>
  <link href="<?php echo base_url(); ?>assets/dist/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <?php $this->load->view('inc/head'); ?>
  
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
          <b>TAMBAH DATA KARYAWAN</b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">FORM TAMBAH KARYAWAN</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>index.php/karyawan/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">NIK</label>
                        <input type="text" class="form-control" value="" id="" name="nippos" placeholder="" required>
                    </div>

                    <div class="form-group">
                      <label for="">Nama</label>
                        <input type="text" class="form-control" value="" id="" name="nama_kar" placeholder="" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">NO-HP</label>
                        <input type="text" class="form-control" value="" id="" name="nohp" placeholder="" required>                        
                    </div>                    
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Jabatan</label>
                        <select name="id_jab" class="form-control" required>
                          <option>--Pilih Jabatan--</option>
                          <?php foreach($optjabatan as $row) { ?>
                              <option value="<?php echo $row['id_jab'] ?>"><?php echo $row['jabatan'] ?></option>
                          <?php } ?>
                        </select> 
                    </div>
                    <div class="form-group">
                      <label for="">Unit</label>
                        <!--<input type="text" class="form-control" value="" id="" name="pekerjaan" placeholder="" required>-->
                        <select name="pekerjaan" class="form-control" required>
                          <option>--Pilih Unit--</option>
                          <option value="Guru">Guru</option>
                          <option value="BK">Bimbingan Konseling</option>
                          <option value="Humas">Humas</option>
                          <option value="IT">IT</option>
                          <option value="Kepala Madrasah">Kepala Madrasah</option>
                          <option value="Kesiswaan">Kesiswaan</option>
                          <option value="Komite">Komite</option>
                          <option value="Kopsis">Kopsis</option>
                          <option value="Kurikulum">Kurikulum</option>
                          <option value="Mahad">Ma`had</option>
                          <option value="Perlengkapan">Perlengkapan</option>
                          <option value="Perpustakaan">Perpustakaan</option>
                          <option value="Petugas Keamanan">Petugas Keamanan</option>
                          <option value="Pusiskom">Pusiskom</option>
                          <option value="Riset">Riset</option>
                          <option value="Sarana dan Prasarana">Sarana dan Prasarana</option>
                          <option value="Tata Usaha">Tata Usaha</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="">Foto</label>
                        <input type="file" class="form-control" value="" id="" name="file_upload" placeholder="">                        
                    </div>
                    
                  </div>
                  
                  
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>index.php/karyawan" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

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
</body>
</html>