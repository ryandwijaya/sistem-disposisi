<div class="card">
	<div class="header">
		<h2>Data Jabatan</h2>
	</div>
	<div class="body">
		<?php if ($this->session->userdata('session_jabatan')=="Sekretaris"): ?>
			
		<button class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">Jabatan Baru</button>
		<?php endif ?>
		<hr>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover js-basic-example" id="dataTable">
				<thead>
					<tr>
						<th style="width: 30px;" class="text-center">No</th>
						<th>Nama Jabatan</th>
						<th>Bagian</th>
						<?php if ($this->session->userdata('session_jabatan')!="Pimpinan"): ?>
						<th class="text-center"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></th>
						<?php endif ?>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($jabatan as $key => $val): ?>
					<tr>
						<td style="width: 30px;" class="text-center"><?php echo $no ?></td>
						<td><?php echo $val['jabatan_nama'] ?></td>
						<td><?php echo $val['jabatan_bagian'] ?></td>
						<?php if ($this->session->userdata('session_jabatan')!="Pimpinan"): ?>
						<td class="text-center">
							<a href="<?php echo base_url() ?>jabatan/edit/<?php echo $val['jabatan_id'] ?>" class="btn btn-warning" title="Edit"><i class="zmdi zmdi-edit"></i></a>  

							<i class="zmdi zmdi-swap"></i> 
							
							<a href="<?php echo base_url() ?>jabatan/delete/<?php echo $val['jabatan_id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')"  class="btn btn-danger" title="Hapus"><i class="zmdi zmdi-delete"></i></a>
						</td>
						<?php endif ?>
						
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
                <h4 class="title" id="defaultModalLabel">Tambah Jabatan</h4>
            </div>
            <div class="modal-body"> 
            	
                        <?php echo form_open('jabatan/post');?>
            		

            		<div class="row">
            			<div class="col-lg-12 col-md-12">
                                    <label>Nama Jabatan</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Jabatan">
                                    </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                                    <label>Bagian</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="bagian" placeholder="Bagian Jabatan EX: pertambangan, dll">
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