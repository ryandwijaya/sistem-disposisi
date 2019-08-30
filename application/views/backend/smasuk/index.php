<div class="card">
	<div class="header">
		<h2>List Surat Masuk</h2>
            
	</div>
	<div class="body">
		<?php if ($this->session->userdata('session_jabatan')=="Sekretaris"){ ?>
		<button class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">Surat Masuk Baru</button>
            <?php } ?>
            <!-- <button class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal2">Lampiran</button> -->
		<hr>
		
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="dataTable">
				<thead>
					<tr>
						<th>No</th>
						<th>No Agenda</th>
						<th>Pengirim</th>
						<th>Perihal</th>
						<th>Tgl Surat</th>
						<th>Tgl Diterima</th>
						<th>Lampiran</th>
						<th class="text-center" style="width: 100px;"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></th>
					</tr>
				</thead>
				<tbody>
                                    
					<?php
					$no = 1;
					foreach ($surat as $key => $val): ?>
					<tr>
						<td><?php echo $no ?></td>
						<td><b><a href="<?php echo base_url() ?>surat/detail/<?php echo $val['surat_id'] ?>" title="lihat surat"><?php echo $val['surat_no_agenda'] ?></a></b></td>
						<td><?php echo $val['surat_sumber'] ?></td>
						<td ><?php echo $val['surat_perihal'] ?></td>
						<td style="width: 100px;"><?php echo date_indo($val['surat_tanggal']) ?></td>
						<td style="width: 100px;"><?php echo date_indo($val['surat_tanggal_terima']) ?></td>
						
                                    <?php if ($val['surat_file']!=''){ ?>
                                    <td class="text-center">
                                          <a href="<?php echo base_url() ?>uploads/<?php echo $val['surat_file'] ?>" target="_blank" title="lihat lampiran">
                                          <span class="badge badge-primary" >Lihat ></span>
                                          </a>
                                    </td>
                                    <?php }else{ ?>
                                          <td class="text-center">
                                                <span class="badge badge-danger">Tidak ada</span>
                                          </td>
                                    <?php } ?>

                                    <!-- pimpinan -->
                                    <?php if ($this->session->userdata('session_jabatan')=='Pimpinan'){ ?>

                                          <?php if ($val['surat_acc_pimpinan']==0){ ?>

                                                <td><a href="<?php echo base_url() ?>surat_masuk/disposisi/<?php echo $val['surat_id'] ?>" class="btn btn-primary animated rubberBand"> Disposisikan</a></td> 
                                         
                                          <?php }else{ ?>

                                                <td class="text-center"><b><i class="zmdi zmdi-check text-success zmdi-hc-2x animated fadeIn infinite" title="Sudah di disposisikan"></i></b></td>

                                          <?php } ?>
                                    
                                    
                                    <?php }elseif($this->session->userdata('session_jabatan')=='Sekretaris'){ ?>
						<td class="text-center" style="width: 300px;">
							<?php if ($val['surat_ket_kabag']!='' && $val['surat_ket_kasubag']!=''){ ?>
                                           <span class="text-success">Done</span>     
                                          <?php }else{ ?>

							<a href="<?php echo base_url() ?>surat/delete/<?php echo $val['surat_id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="zmdi zmdi-delete" title="Hapus"></i></a>
                                    <?php } ?>
						</td>
                                    <?php }elseif($this->session->userdata('session_jabatan_id')==$val['surat_lajur_tujuan'] && $this->session->userdata('session_status_pegawai')=='nonfungsional'){ ?>
                                          

                                          
                                          <!-- buatkan fungsi untuk cek lajur dengan id ini          -->
                                          
                                          
                                          <?php if ($val['surat_ket_kabag']!=''){ ?>
                                                <td class="text-center text-success"><b>Done</b></td>
                                          <?php }else{ ?>
                                                
                                                <td class="text-center"><a href="<?= base_url() ?>disposisi_lanjutan/<?= $val['surat_id'] ?>" class="btn btn-success">Lanjutkan <i class="zmdi zmdi-arrow-right"></i></a></td>
                                    <?php } ?>

                              <?php }elseif($this->session->userdata('session_jabatan')=='Kasubbag'){ ?>
                                          
                                          <?php if ($val['surat_ket_kasubag']!=''){ ?>
                                                <td class="text-center text-success"><b>Done</b></td>
                                          <?php }elseif($val['surat_ket_kasubag']=='' && $val['surat_ket_kabag']!='' && $val['surat_tujuan2']== $this->session->userdata('session_jabatan_id') ){ ?>
                                                
                                                <td class="text-center"><a href="<?= base_url() ?>disposisi_lanjutan_kasubag/<?= $val['surat_id'] ?>" class="btn btn-success">Lanjutkan <i class="zmdi zmdi-arrow-right"></i></a></td>
                                    <?php }else{ ?>
                                          
                                                <td><span>belum di lanjutkan</span></td>
                                          <?php } ?>
                                             


                                    <?php }else{ ?>
						      <td class="text-center"><a href="<?php echo base_url() ?>surat/detail/<?php echo $val['surat_id'] ?>" title="lihat surat" class="btn btn-info"><i class="zmdi zmdi-eye"></i></a></td>

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
<!-- <div class="modal fade" id="defaultModal2" tabindex="-1" role="dialog">
       <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                  Lampiran
            </div>
            <div class="modal-body">
                  <embed src = "<?php echo base_url() ?>assets/docs/a.pdf" type = "application / pdf" width = "100%" height = "600px" />
            </div>
      </div>
</div>
</div> -->
<!-- Default Size -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Tambat Surat Masuk</h4>
            </div>
            <div class="modal-body"> 
            	
                        <?php echo form_open_multipart('surat/post');?>
            		<div class="row">
            		<div class="col-md-6">
            			<div class="form-group">
            			<label>Nomor Surat</label>
            			<input type="text" class="form-control" required name="no_surat" placeholder="Masukkan nomor surat">
            			</div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
            			<label>Nomor Agenda</label>
            			<input type="text" class="form-control" required name="no_agenda" placeholder="Masukkan nomor agenda">
            			</div>
            		</div>
            		</div>

            		<div class="row">
            		<div class="col-md-6">
            			<div class="form-group">
            			<label>Tanggal Surat</label>
            			<input type="date" class="form-control" required name="tgl_surat">
            			</div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
            			<label>Tanggal Diterima</label>
            			<input type="date" class="form-control" required name="tgl_diterima">
            			</div>
            		</div>
            		</div>

            		<div class="row clearfix">
            		<div class="col-md-6">
            			<div class="form-group">
            			<label>Sumber Surat</label>
            			<input type="text" class="form-control" required name="sumber" placeholder="Masukkan sumber surat">
            			</div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
            			<label>Sifat</label>
            			<select class="form-control show-tick" name="sifat">
            				<option selected disabled>Pilih sifat surat</option>
            				<option>Rahasia</option>
            				<option>Biasa</option>
            			</select>
            			</div>
            		</div>
            		</div>
            		<div class="row">
            		<div class="col-md-12">
            			<div class="form-group">
            			<label>Perihal</label>
            			<textarea name="perihal" class="form-control" required placeholder="......"></textarea>
            			</div>
            		</div>
            		</div>
            		<div class="row">
            		<div class="col-md-12">
            			<div class="form-group">
            			<label>Keterangan</label>
            			<textarea name="keterangan" class="form-control" required placeholder="......"></textarea>
            			</div>
            		</div>
            		</div>
            		<div class="row">
            		<div class="col-md-12">
            			<div class="form-group">
            			<label>Lampiran (Opsional)</label>
            			<input type="file" name="userfile" class="form-control" placeholder="Masukkan jika ada">
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