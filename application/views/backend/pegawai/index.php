<div class="card">
	<div class="header">
		<h2>Data Pegawai</h2>
	</div>
	<div class="body">
        <?php if ($this->session->userdata('session_jabatan')=="Sekretaris"){ ?>
		<button class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">Pegawai Baru</button>
        <?php } ?>
		<hr>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover js-basic-example" id="dataTable">
				<thead>
					<tr>
						<th style="width: 30px;" class="text-center">No</th>
						<th>Nip</th>
						<th>Nama</th>
						<th>Jabatan</th>
                        <?php if ($this->session->userdata('session_jabatan')!="Pimpinan"){ ?>
						<th class="text-center"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></th>
                        <?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($user as $key => $val): ?>
					<tr>
						<td style="width: 30px;" class="text-center"><?php echo $no ?></td>
						<td><?php echo $val['pegawai_nip'] ?></td>
						<td><?php echo $val['pegawai_nama'] ?></td>
						<td><?php echo $val['jabatan_nama'] ?> <?php echo $val['jabatan_bagian'] ?></td>
						<?php if ($this->session->userdata('session_jabatan')!="Pimpinan"){ ?>
                        <td class="text-center">
							<a href="<?php echo base_url() ?>pegawai/edit/<?php echo $val['pegawai_nip'] ?>" class="btn btn-warning" title="Edit"><i class="zmdi zmdi-edit"></i></a> <i class="zmdi zmdi-swap"></i>
							<a href="<?= base_url() ?>pegawai/delete/<?= $val['pegawai_id'] ?>" onclick="return confirm('Yakin ingin menghapus ?')" class="btn btn-danger" title="Delete"><i class="zmdi zmdi-delete"></i></a>
						</td>
                        <?php } ?>
					</tr>
					<?php
					$no++;
					endforeach ?>
				</tbody>
				
			</table>
		</div>
	</div>
</div>
<!-- Default Size -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Tambah Pegawai</h4>
            </div>
            <div class="modal-body"> 
            	
                        <?php echo form_open('pegawai/post');?>
            		<div class="row">
            			<div class="col-lg-12 col-md-12">
                                    <label>Nip</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-account-box-o"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="nip" placeholder="Masukkan NIP">
                                    </div>
                        </div>
            		</div>

            		<div class="row">
            			<div class="col-lg-12 col-md-12">
                                    <label>Nama</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                                    </div>
                        </div>
            		</div>
            		<div class="row">
            			<div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                    <label>Jabatan</label>
                                    <select class="form-control" name="jabatan">
                                    	<option>Pilih Jabatan</option>
                                    	<?php foreach ($jabatan as $key => $value): ?>
                                    		<option value="<?php echo $value['jabatan_id'] ?>"><?php echo $value['jabatan_nama'] ?> - <?php echo $value['jabatan_bagian'] ?></option>
                                    	<?php endforeach ?>
                                    </select>
                                    </div>
                        </div>
            		</div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                    <label>Status Pegawai</label>
                                    <select class="form-control" name="pegawai_status">
                                        <option disabled selected>Pilih Status</option>
                                        <option>fungsional</option>
                                        <option>nonfungsional</option>
                                    </select>
                                    </div>
                        </div>
                    </div>
            		
            		
            	
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                <button type="submit" name="submit" class="btn btn-success waves-effect">SIMPAN</button>
            </div>
            </form>
        </div>
    </div>
</div>