<div class="card">
    <div class="header">
        <h2>Lajur Disposisi</h2>
    </div>
    <div class="body">

        <div class="row clearfix">
            <div class="col-md-6">
                <table>
                    <tr>
                        <td><b>No. Surat</b></td>
                        <td>:</td>
                        <td><?php echo $surat['surat_nomor'] ?></td>
                    </tr>
                    <tr>
                        <td><b>No. Agenda</b></td>
                        <td>:</td>
                        <td><?php echo $surat['surat_no_agenda'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Sumber Surat</b></td>
                        <td>:</td>
                        <td><?php echo $surat['surat_sumber'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table>
                    <tr>
                        <td><b>Tgl Surat</b></td>
                        <td>:</td>
                        <td><?php echo $surat['surat_tanggal'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Tgl Diterima</b></td>
                        <td>:</td>
                        <td><?php echo $surat['surat_tanggal_terima'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Sifat</b></td>
                        <td>:</td>
                        <td><?php echo $surat['surat_sifat'] ?></td>
                    </tr>
                </table>
            </div>

        </div>
        <br>
        <div class="row clearfix">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-6">
                        <span><b>Perihal :</b></span>
                        <hr>
                        <p class="text-left">
                            <?php echo $surat['surat_perihal'] ?>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <span><b>Keterangan :</b></span>
                        <hr>
                        <p class="text-left">
                            <?php echo $surat['surat_keterangan'] ?>
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <br>

        <hr>
        <div class="row clearfix">
            <div class="col-md-12">
                <form action="<?= base_url() ?>disposisi_lanjutan_kasubag/<?= $surat['surat_id'] ?>" method="POST">
                    <div class="form-group">
                        <label for="">Keterangan Pimpinan</label>
                        <textarea rows="2" class="form-control" readonly><?= $surat['surat_lajur_ket'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan Kabag/Kabid</label>
                        <textarea rows="2" class="form-control" name="surat_ket_kabag"
                                  readonly><?= $surat['surat_ket_kabag'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan Kasubag</label>
                        <textarea rows="2" class="form-control" name="surat_ket_kasubag"></textarea>
                    </div>

                    <div class="form-group">

                        <label for="">Tunjuk Utusan</label>
                        <select name="pegawai" id="" class="form-control">
                            <option disabled selected>-Pilih-</option>
                            <?php foreach ($pegawais as $value): ?>

                                <option value="<?= $value['pegawai_id'] ?>"><?= $value['pegawai_nama'] ?></option>

                            <?php endforeach ?>
                        </select>

                    </div>


                    <button name="send" class="btn btn-success float-right">Send</button>


                    <!-- <div class="oke">
                    </div> -->
                </form>
            </div>

        </div>
    </div>
</div>
<script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
<script language="javascript">
    $(document).ready(function () {
        var next = 1;

        $('#addPegawai').click(function () {
            var html = '';
            html += '<div class="form-group">' +
                '<label>Pilih Pegawai</label><select class="form-control" name="pegawai' + next + '">' +
                <?php foreach ($pegawai as $key => $val): ?>
                <?php
                $jab = $this->JabatanModel->getJabatanById($value['pegawai_jabatan']);
                ?>
                '<option value="<?php echo $val['pegawai_id'] ?>">' + '<?php echo $val['pegawai_nama'] ?> (<?php echo $val['pegawai_nip'] ?>) ' + '</option>' +
                <?php endforeach ?>
                '</select>' +
                '</div>';
            $('.oke').append(html);
            $('#jumlah_pegawai').val(next);
            next++;

        });

    });


</script>
