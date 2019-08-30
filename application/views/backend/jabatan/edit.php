<div class="card">
	<div class="header">
		<h2>Edit Data Pegawai</h2>
	</div>
	<div class="body">
		<div class="row">
			<div class="col-md-12">
				<form action="<?php echo base_url() ?>jabatan/edit/<?php echo $jabatan['jabatan_id'] ?>" method="POST">
					<div class="row">
						

						<div class="col-md-6">
							<div class="form-group">
								<label>Id</label>
								<input type="text" name="id" class="form-control" value="<?php echo $jabatan['jabatan_id'] ?>" readonly>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Jabatan</label>
								<input type="text" name="nama" class="form-control" value="<?php echo $jabatan['jabatan_nama'] ?>">
							</div>
						</div>
						
						

					</div>
					<button type="submit" name="edit" class="btn btn-success float-right">Simpan</button>
					<a href="javascript:history.back()" class="btn btn-default float-right">Batal</a>
				</form>
			</div>
		</div>
	</div>
</div>
