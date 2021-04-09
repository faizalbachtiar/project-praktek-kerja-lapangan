<div id="main">
    <div class="card col-md-12 shadow md-5 p-3 bg-white rounded">
        <div class="card-body">
                    <h2 class="mb-30">Laporan Permohonan Pengajuan Sertifikat Sanitasi</h2>
                    <hr>
                    <?php echo form_open('Sertifikat/cetak_laporan'); ?>
                    <div class="form-group">
                        <label for="awal">Dari : </label>
                        <div class="mt-10">
                            <input type="date" name="awal" id="awal" required class="single-input form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="akhir">Sampai : </label>
                        <div class="mt-10">
                            <input type="date" name="akhir" id="akhir" required class="single-input form-control">
                        </div>
                    </div>
                    <button class="btn btn-primary p-3" type="submit">Cetak Laporan</button>
                    <?php echo form_close(); ?>
                
        </div>
    </div>
</div>