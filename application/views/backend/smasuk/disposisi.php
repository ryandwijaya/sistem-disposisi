
<div class="card">
	<div class="header clearfix">
		<div class="row">
			<div class="col-md-12">
				<h2 class="float-left">Disposisi Surat Masuk</h2>
				<div class="print float-right">
					<?php if ($surat['surat_acc_pimpinan']==1){ ?>
					<button class="btn btn-success" onclick="printContent('print')"><i class="zmdi zmdi-print"></i> Cetak</button>

					<?php }else{ ?>
					<button class="btn btn-default" onclick="return alert('Surat belum bisa di print karena belum di acc Pimpinan')"><i class="zmdi zmdi-print"></i> Cetak</button>
					<?php } ?>

				</div>
				<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>

			</div>
		</div>
	</div>
	<div class="body p-4" id="print">

<style type="text/css">
	.kop{
		font-size: 13pt;
		display: block;
	}
	.alamat{
		font-size: 10pt;
	}
	.judul{
		font-size: 12pt;
		text-decoration: underline;
	}
	.sifat{
		width: 150px;
		float: right;
	}
	.text-p{
		display: block;

	}
</style>

		<div class="row p-2 text-center">
			<div class="col-md-3">
				<img src="<?php echo base_url() ?>assets/images/logo.png" width="100" height="100">
			</div>
			<div class="col-md-9" style="margin-left: -30px;">
				<span class="kop"><b>KEMENTRIAN LINGKUNGAN HIDUP DAN KEHUTANAN</b></span>
				<span class="kop"><b>SEKRETARIAT JENDERAL</b></span>
				<span class="kop"><b>PUSAT PENGENDALIAN PEMBANGUNAN EKOREGION SUMATERA</b></span>
				<span class="alamat">JL. Garuda Sakti Km.2 - Pekanbaru, Telp (0822) 8812 0012, Fax:0121292</span>
			</div>
		</div>
		<hr style="border: 1.5px solid black;">

		<div class="row p-2 ">
			<div class="col-md-12 text-center">		
			<span class="judul"><b>DISPOSISI SURAT MASUK</b></span>
			</div>
		</div>
		<div class="row p-2">
			<div class="col-md-12 pr-2">
				<div class="sifat float-right">
					<span class="">Sifat : <?php echo $surat['surat_sifat'] ?></span>
				</div>
			</div>
		</div>
		<div class="row p-2">
			<div class="col-md-12">	
			<table class="table table-bordered">
				<tr>
					<td>Diterima tgl</td>
					<td><?php echo date_indo($surat['surat_tanggal_terima']) ?></td>
				</tr>
				<tr>
					<td>Dari</td>
					<td><?php echo $surat['surat_sumber'] ?></td>
				</tr>
				<tr>
					<td>Lampiran</td>
					<td><?php echo $surat['surat_file'] ?></td>
				</tr>
				<tr>
					<td>Surat No</td>
					<td><?php echo $surat['surat_nomor'] ?></td>
				</tr>
				<tr>
					<td>Surat Tgl</td>
					<td><?php echo date_indo($surat['surat_tanggal']) ?></td>
				</tr>
				<tr>
					<td>Agenda No</td>
					<td><?php echo $surat['surat_no_agenda'] ?></td>
				</tr>
			</table>
			</div>
		</div>
		<div class="row ">
			<div class="col-md-12 text-center">
					<span class="text-p"><b>1. Dilarang memisahkan sehelai suratpun dari berkas yang telah disusun ini </b></span>
					<span class="text-p"><b>2. Jika mengenai soal rahasia bantulah memelihara kerahasiaan negara </b></span>
				
			</div>
		</div>

		<div class="row p-2">
			<div class="col-md-12">
					<table class="table table-bordered">
						<tr>
							<td><b>Perihal :</b></td>
						</tr>
						<tr style="height: 120px;">
							<td><?php echo $surat['surat_perihal'] ?></td>
						</tr>
					</table>
				
			</div>
		</div>
		<div class="row p-2">
			<div class="col-md-12">
					<table class="table table-bordered">
						<tr>
							<td style="width: 65%;"><b>Lajur Disposisi</b></td>
							<td style="width: 15%;"><b>Paraf</b></td>
							<td style="width: 20%;"><b>Tgl.</b></td>
						</tr>
						<tr style="height: 200px;">
							<td style="width: 65%;">
								<span>Keterangan Pimpinan :</span><br>
								<?php echo $surat['surat_lajur_ket']; ?><br><br>
								<span>Keterangan Kabag :</span><br>
								<?php echo $surat['surat_ket_kabag']; ?>
								<br><br>
								<span>Keterangan Kasubag :</span><br>
								<?php echo $surat['surat_ket_kasubag']; ?>
								<br><br>
								<span>Pegawai yang ditunjuk :</span>
								<br>
								<?php 
								$no = 1;
								foreach ($lajur as $key => $res): ?>
									<?php $pegawai = $this->PegawaiModel->getPegawaiById($res['lajur_pegawai_id']); ?>
									<?php echo $no.'. '.$pegawai['pegawai_nama'] ?><br><br>
									<?php $no++; ?>
								<?php endforeach ?>
							</td>
							<td style="width: 15%;"></td>
							<td style="width: 20%;"></td>
						</tr>
						
					</table>
				
			</div>
		</div>
	
	</div>
</div>