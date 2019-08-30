<div class="card">
	<div class="header">
		<h2>Edit Data Pegawai</h2>
	</div>
	<div class="body">
		<div class="row">
			<div class="col-md-12">
				<form action="<?php echo base_url() ?>pegawai/edit/<?php echo $user['pegawai_nip'] ?>" method="POST">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Nip</label>
								<input type="text" name="nip" class="form-control" value="<?php echo $user['pegawai_nip'] ?>" readonly>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="nama" class="form-control" value="<?php echo $user['pegawai_nama'] ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Jabatan</label>
								<input list="jabatan" name="jabatan" placeholder="Pilih Jabatan" class="form-control" required autocomplete="off" value="<?php echo $user['pegawai_jabatan'] ?>">
							</div>
							<datalist id="jabatan">
                            <?php foreach ($jabatan->result() as $b) {
                            echo "<option value='$b->jabatan_id'> $b->jabatan_nama";
                              } ?>
                             </datalist>
						</div>
						

					</div>
					<button type="submit" name="edit" class="btn btn-success float-right">Simpan</button>
					<a href="javascript:history.back()" class="btn btn-default float-right">Batal</a>
				</form>
			</div>
		</div>
	</div>
</div>
