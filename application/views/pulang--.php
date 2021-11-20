<!DOCTYPE html>
<html>
<head>
<script>

//$( document ).ready(function() {
// $("#nippos").keyup(function(event){
//    	if(event.keyCode == 13){
//        	 cekMasuk();
//    	}
//	});
//});
function cekMasuk(){
			var nippos=$("#nippos").val();
		$.ajax({
			url:'<?php echo base_url(); ?>index.php/home/cekPulang/',		 
			type:'POST',
			data:"nippos="+nippos,
			success:function(data){ 
			  	if(data==''){
					 $( "#infodlg" ).html('NIK Tidak tersedia Harap Periksa Kembali ...');
					 $( "#infodlg" ).dialog({ title:"Info...", draggable: false});					 
				} else {
				   $("#notification").html(data);
				   $("#nippos").val("");
				}
			 }
		});		
}
function startTime()
{
var today=new Date();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
document.getElementById('txt').innerHTML=h+":"+m+":"+s;
t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}
</script>
</head>

<body onLoad="startTime()">
<!--<label style="font-size:30px;font-family:arial">KEPULANGAN</label>-->
<div class="p-t-13 p-b-9">
<span class="txt1">
<i>Silahkan Masukkan NIK :</i>
</span>
</div>
<div class="wrap-input100 validate-input" data-validate="NIK is required">
	<input class="input100" type="text" name="nippos" id="nippos" placeholder="NIK">
	<span class="focus-input100"></span>
</div>
<div class="container-login100-form-btn m-t-17">
<!--<button class="login100-form-btn" onclick="cekMasuk()">
Tekan Absen Pulang
</button>-->
</div>
<br>
<div id="notification" style="color: #000000;">
</div>
</body>
</html>