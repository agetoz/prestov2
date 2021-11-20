<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>PRESTO v2 (Presensi Terpadu Online)</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="<?php echo base_url()?>abc/img/favicon.png" rel="icon">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>abc/css/login-template/font-awesome.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>abc/css/login-template/icon-font.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>abc/css/login-template/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>abc/css/login-template/hamburgers.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>abc/css/login-template/animsition.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>abc/css/login-template/select2.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>abc/css/login-template/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>abc/css/login-template/util.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>abc/css/login-template/main.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>abc/css/login-template/bootstrap.css">
<script src="<?php echo base_url()?>abc/js/jquery-3.6.0.js"></script>
<script src="<?php echo base_url()?>abc/css/login-template/bootstrap.js"></script>
<script src="<?php echo base_url()?>abc/savy/savy.js"></script>
<script src="<?php echo base_url()?>abc/savy/savy.min.js"></script>
<script>
    $(document).ready(function(){
        $('.auto-save').savy('load');
        $( "#hapus" ).click(function() {
            $('.auto-save').savy('destroy');
        });
    });
</script>
</head>

<body class="background">
<div class="container-login100">
<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
<img src="<?php echo base_url(); ?>abc/img/logo-man1-new.png" alt="" width="125" height="125"/>
<div id="txt" align="center" style="font-family:calibri; font-size:40px; color: #000000;"></div>
<div align="center" style="color: #000000;">Tanggal : <?php echo(date('d-m-Y')); ?></div>
<br>
<br>
<div class="p-t-13 p-b-9">
<span class="txt1">
<i>Silahkan Masukkan NIK :</i>
</span>
</div>

<form class="login100-form flex-sb flex-w" method="post" id="form-input">
<div class="form-group wrap-input100" data-validate="NIK is required">
    <input class="auto-save input100" type="text" name="nippos" id="nippos" placeholder="NIK">
    <span class="focus-input100"></span>
</div>
<div class="form-group wrap-input100">
<button type="button" name="simpan" id="simpan" class="btn-google input100" data-toggle="modal" data-target="#simpanNIK">
<img src="<?php echo base_url()?>abc/css/login-template/save.png">
<b>SIMPAN INPUTAN NIK</b>
<br>
<span style="font-size: 8px;">
<i>*Jika anda klik (simpan inputan NIK) tidak perlu isi NIK lagi*</i>
</span>
</button>
</div>
<a href="#" onclick="cekMasuk()" class="btn-google m-b-20" style="text-decoration: none;">
<img src="<?php echo base_url()?>abc/css/login-template/kedatangan.png">
PRESENSI DATANG
</a>
<a href="#" onclick="cekPulang()" class="btn-google m-b-20" style="text-decoration: none;">
<img src="<?php echo base_url()?>abc/css/login-template/kepulangan.png">
PRESENSI PULANG
</a>
</form>
<!-- Isi Konten -->
    <!--<div class="row" style="margin-left: 1px;">
        <div class="col-lg-9 main-chart">
            <h3><?php echo $judul; ?></h3>
                <div class="" id="isiContent">          
                    <?php $this->load->view($view); ?>
                </div>
        </div>
    </div>-->
<div class="" id="isiContent">          
    <?php $this->load->view($view); ?>
</div>
<!-- End -->
<div class="w-full text-center">
<span class="txt2">
Ada Kesulitan? Silahkan hubungi staff pusiskom untuk informasi lebih lanjut.
</span>
</div>
<br>
<div class="text-center">
    <p>
        &copy; Copyright 2021 <strong>Pusiskom Ranger</strong>. All Rights Reserved
    </p>
</div>
</div>
</div>

<div id="simpanNIK" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <br>
            </div>
            <label style="font-size:30px;color:green"><b>NIK ANDA TELAH TERSIMPAN</b></label>
            <br>
            <p style="font-size: 15px;">Keterangan :</p>
            <p style="font-size: 10px;"><i><b>NIK akan ter-reset/ terhapus kembali</b> jika anda melakukan <b>"Clear All History Browser"/ Membersihkan Riwayat Browser anda</b>, namun anda bisa menyimpan NIK anda kembali dengan mengulangi langkah <b>"Menyimpan Inputan NIK"</b>.</i></p>
        </div>
    </div>
</div>

<script type="text/javascript" async="" src="<?php echo base_url()?>abc/css/login-template/analytics.js"></script>
<script src="<?php echo base_url()?>abc/css/login-template/animsition.js"></script>
<script src="<?php echo base_url()?>abc/css/login-template/popper.js"></script>
<script src="<?php echo base_url()?>abc/css/login-template/select2.js"></script>
<script src="<?php echo base_url()?>abc/css/login-template/moment.js"></script>
<script src="<?php echo base_url()?>abc/css/login-template/daterangepicker.js"></script>
<script src="<?php echo base_url()?>abc/css/login-template/countdowntime.js"></script>
<script src="<?php echo base_url()?>abc/css/login-template/main.js"></script>
<script async="" src="<?php echo base_url()?>abc/css/login-template/js.js"></script>

</body>
</html>