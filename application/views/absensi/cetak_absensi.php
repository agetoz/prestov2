<html>
<?PHP
  // filename for download
  $filename = "hasil_" .$tgl_start. " sampai " .$tgl_end. "_" .date('Ymd'). ".xls";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");
?>
<head>
<style type="text/css" media="print">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000; page-break-inside: avoid;}
	td { padding: 7px 5px; font-size: 10px}
	th {
		font-family:Arial;
		color:black;
		font-size: 11px;
		background-color:lightgrey;
	}
	thead {
		display:table-header-group;
	}
	tbody {
		display:table-row-group;
	}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<style type="text/css" media="screen">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000}
	th {
		font-family:Arial;
		color:black;
		font-size: 20px;
		background-color: #999;
		padding: 8px 0;
	}
	td { padding: 7px 5px;font-size: 15px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<title>Absensi</title>
</head>

<body>
	<center><b style="font-size: 30px">Laporan Absensi</b><br>
	Berdasarkan tanggal <b><?php echo tgl_jam_sql($tgl_start)."</b> sampai dengan tanggal <b>".tgl_jam_sql($tgl_end)."</b>"; ?>
	</center><br>
	<table>
		<thead>
			<tr><th width="3%">No</td>
				<th width="20%">NIK</td>
				<th width="32%">NAMA</td>
				<th width="15%">Jabatan</td>
				<th width="10%">Tanggal</td>
				<th width="10%">Status</td>
				<th width="10%">Jam</td>
				</tr>
		</thead>
		<tbody>

		<?php 
			if (!empty($data)) {
				$no = 0;
				foreach ($data as $row) {
					$no++;
			?>

			<tr><td align="center"><?php echo $no; ?></td>
				<td align="center"><?php echo $row->nippos; ?></td>
				<td align="center"><?php echo $row->nama_kar; ?></td>
				<td align="center"><?php echo $row->pekerjaan; ?></td>
				<td align="center"><?php echo tgl_jam_sql($row->tanggal); ?></td>
				<td align="center"><?php if ($row->kodeabsensi == 1) { ?>
						          <h4><span class="label label-success">Masuk</span></h4>
                      <?php } else { ?>
                      <h4><span style="text-fonts:16px" class="label label-danger">Pulang</span></h4>
                      <?php } ?>
                      </td>
				<td align="center"><?php echo $row->jammasuk; ?></td>
			</tr>
			<?php
				}
			} else {
				echo "<tr><td style='text-align: center' colspan='9'>Tidak ada data</td></tr>";
			}
			?>
		</tbody>
	</table>
	<div class="span12 well well-sm">
		<h6>&copy;  2016. ABSENSI | Waktu Eksekusi : {elapsed_time}, Penggunaan Memori : {memory_usage}</h6>
	  </div>
</body>
</html>

