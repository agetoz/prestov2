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
			url:'<?php echo base_url(); ?>index.php/home/cekMasuk/',		 
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
function cekPulang(){
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
<br>
<div id="notification" style="color: #000000;">
</div>
</body>
</html>