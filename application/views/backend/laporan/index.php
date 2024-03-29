<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                Silahkan Pilih Tanggal
            </div>
            <div class="body">
                <form action="<?= base_url() ?>laporan" method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group" id="okelah">
                                <label>Cari</label>
                                <input type="text" name="key" id="keyword" placeholder="keyword" class="form-control">
                                <!--                            <label>Tanggal</label>-->
                                <!--                            <input type="date" name="tgl_surat" class="form-control">-->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Berdasarkan</label>
                                <select name="berdasarkan" id="pilihan" class="form-control" required>
                                    <option selected disabled>- Silahkan Pilih -</option>
                                    <option value="surat_perihal">Perihal</option>
                                    <option value="surat_nomor">Nomor Surat</option>
                                    <option value="surat_tgl">Tanggal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <button class="form-control mt-4 btn bg-primary">Lihat</button>
                            </div>
                        </div>
                    </div>
                </form>

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
                <button class="mb-2 btn btn-success btn-icon btn-icon-mini btn-round float-right"
                        onclick="printContent('print')" title="Print"><i class="zmdi zmdi-print "></i></button>
                <script>
                    function printContent(el) {
                        var restorepage = document.body.innerHTML;
                        var printcontent = document.getElementById(el).innerHTML;
                        document.body.innerHTML = printcontent;
                        window.print();
                        document.body.innerHTML = restorepage;
                    }
                </script>

                <div id="print">
                    <div class="table-responsive p-4">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th style="width: 30px;" class="text-center">No</th>
                                <th>Nomor Surat</th>
                                <th>Sumber Surat</th>
                                <th>Perihal</th>
                                <th>Keterangan</th>
                                <th>Sifat</th>
                                <th class="d-print-none">Aksi</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($laporan as $val): ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $val['surat_nomor'] ?></td>
                                    <td><?= $val['surat_sumber'] ?></td>
                                    <td><?= $val['surat_perihal'] ?></td>
                                    <td><?= $val['surat_keterangan'] ?></td>
                                    <td><?= $val['surat_sifat'] ?></td>
                                    <td class="d-print-none"><a
                                                href="<?= base_url() ?>surat/detail/<?= $val['surat_id'] ?>">
                                            <button class="btn btn-info">lihat</button>
                                        </a></td>
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
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {


        $('#pilihan').change(function () {
            var pilih = $(this).val();
            var html = '';
            if (pilih == 'surat_tgl'){
                html += '<label>Cari</label><input type="date" name="key" class="form-control">';
                $('#okelah').html(html);
            }else{
                html += '<label>Cari</label><input type="text" name="key" class="form-control">';
                $('#okelah').html(html);

            }

        });

    });

</script>