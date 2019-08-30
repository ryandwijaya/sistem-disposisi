
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                Silahkan Pilih Tanggal
            </div>
            <div class="body">
                <div class="row">
                    <div class="col-md-8">
                    <form action="<?= base_url() ?>laporan" method="POST">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tgl_surat" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <button class="form-control mt-4 btn bg-primary">Lihat</button>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
<div class="card">
	<div class="header">
		<h2>Data Pegawai</h2>
	</div>
	<div class="body">
        <button class="mb-2 btn btn-success btn-icon btn-icon-mini btn-round float-right" onclick="printContent('print')" title="Print"><i class="zmdi zmdi-print "></i></button>
		<script>
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script>

<div id="print">
		<div class="table-responsive p-4">
			<table class="table table-bordered table-striped table-hover" >
				<thead>
					<tr>
						<th style="width: 30px;" class="text-center">No</th>
						<th>Sumber Surat</th>
						<th>Perihal</th>
						<th>Keterangan</th>
                        <th>Sifat</th>
                        <th class="d-print-none">Aksi</th>
                        
					</tr>
				</thead>
				<tbody>
					<?php 
                    $no=1;
                    foreach ($laporan as $val): ?>
					<tr>
						<td><?= $no ?></td>
                        <td><?= $val['surat_sumber'] ?></td>
                        <td><?= $val['surat_perihal'] ?></td>
                        <td><?= $val['surat_keterangan'] ?></td>
                        <td><?= $val['surat_sifat'] ?></td>
                        <td class="d-print-none"><a href="<?= base_url() ?>surat/detail/<?= $val['surat_id'] ?>"><button class="btn btn-info">lihat</button></a></td>
					</tr>
                    <?php 
                    $no++;
                    endforeach ?>
					
				</tbody>
				
			</table>
		</div>
</div>
	</div>
</div>
</div>
</div>
