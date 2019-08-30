<div class="card">
	<div class="header">
		<h2>Profil <?php echo $this->session->userdata('session_nama') ?></h2>
	</div>
	<div class="body">
		<div class="row">
			<div class="col-md-4">
				<img src="<?php echo base_url() ?>assets/templates/images/profile_av.png" alt="no image" style="width: 250px;height: 250px;">
			</div>

			



			<div class="col-md-8">
					<ul class="nav nav-tabs p-0 mb-3 nav-tabs-success" role="tablist">
						<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#user"> <i class="zmdi zmdi-home"></i> Home </a></li>
						
						<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#password"><i class="zmdi zmdi-settings"></i> New Password </a></li>
					</ul>

			<div class="tab-content">
				<div role="tabpanel" class="tab-pane in active" id="user">
					<table class="table">
					<tr>
						<td>Nip</td>
						<td style="width: 150px;" class="text-center">:</td>
						<td><?php echo $this->session->userdata('session_nip') ?></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td style="width: 150px;" class="text-center">:</td>
						<td><?php echo $this->session->userdata('session_nama') ?></td>
					</tr>
					<tr>
						<td>Jabatan</td>
						<td style="width: 150px;" class="text-center">:</td>
						<td><?php echo $this->session->userdata('session_jabatan') ?></td>
					</tr>
				</table>
				</div>

				<div role="tabpanel" class="tab-pane" id="password">
					<form method="POST" action="<?php echo base_url() ?>changePw/<?php echo $this->session->userdata('session_nip') ?>">
					<div class="form-group">
						<label>Password Lama</label>
						<input type="password" name="p_lama" class="form-control" placeholder="Masukkan password lama">
					</div>
					<div class="form-group">
						<label>Password Baru</label>
						<input type="password" name="p_baru" class="form-control" placeholder="Masukkan password baru">
					</div>
					<div class="form-group">
						<label>Ulangi Password Baru</label>
						<input type="password" name="p_baru2" class="form-control" placeholder="Ulangi password baru">
					</div>
					<button type="submit" name="change" class="btn btn-success float-right">Simpan</button>
					</form>
				</div>
				

			</div>		
		</div>
	</div>
</div>