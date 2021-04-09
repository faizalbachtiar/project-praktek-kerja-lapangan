<div id="main">
    <div class="card col-md-12 shadow md-5 p-3 bg-white rounded">
        <div class="card-body">
            <?php foreach ($permohonan as $data) : ?>
                <?php if ($data->kategori == 'dam') : ?>
                    <h2 class="card-title mb-30">Form Penerbitan Sertifikat Depot Air Minum</h2>
                    <hr>
                    <?php echo form_open('dam/create_certificate/' . $data->id_permohonan) ?>
                    <div class="form-group">
                        <label for="nosertif">Nomor Sertifikat</label>
                        <div class="mt-10">
                            <input type="text" name="nosertif" id="nosertif" required onkeypress="return numberonly(event)" class="single-input form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tahunterbit">Tahun Terbit</label>
                        <div class="mt-10">
                            <input type="text" name="tahunterbit" id="tahunterbit" required onkeypress="return numberonly(event)" class="single-input form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_usaha">Nama Depot</label>
                        <div class="mt-10">
                            <input type="text" name="nama_usaha" id="nama_usaha" required class="single-input form-control disabled" readonly value="<?php echo $data->nama_usaha; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Pemilik / Penanggungjawab</label>
                        <div class="mt-10">
                            <input type="text" name="nama" id="nama" required class="single-input form-control disabled" readonly value="<?php echo $data->nama; ?>">
                        </div>
                    </div>
                    <div class="form-group mb-30">
                        <label for="alamat_usaha">Alamat Depot Air Minum</label>
                        <div class="mt-10">
                            <input type="text" name="alamat_usaha" id="alamat_usaha" required class="single-input form-control" readonly value="<?php echo $data->alamat_usaha; ?>">
                        </div>
                    </div>
                    <div class="form-group mb-30">
                        <label for="batastgl">Batas Berlaku Sertifikat</label>
                        <div class="mt-10">
                            <input type="date" name="batastgl" id="batastgl" required class="single-input form-control" value="<?php echo $data->alamat_usaha; ?>">
                        </div>
                    </div>
                    <div class="form-group mb-30">
                        <label for="tglterbit">Tanggal Penerbitan Sertifikat</label>
                        <div class="mt-10">
                            <input type="date" name="tglterbit" id="tglterbit" required class="single-input form-control" value="<?php echo $data->alamat_usaha; ?>">
                        </div>
                    </div>

                    <button class="btn btn-primary p-3" type="submit">Terbitkan sertifikat</button>
                    <?php echo form_close(); ?>
                <?php elseif ($data->kategori == 'hotel') : ?>
                    <h2 class="mb-30">Form Sertifikat Hotel</h2>
                    <hr>
                    <?php echo form_open('hotel/create_certificate/' . $data->id_permohonan); ?>
                    <div class="form-group">
                        <label for="nosertif">Nomor Sertifikat</label>
                        <div class="mt-10">
                            <input type="text" name="nosertif" id="nosertif" required onkeypress="return numberonly(event)" class="single-input form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tahunterbit">Tahun Terbit</label>
                        <div class="mt-10">
                            <input type="text" name="tahunterbit" id="tahunterbit" required onkeypress="return numberonly(event)" class="single-input form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgluji">Tanggal Pelaksanaan Uji</label>
                        <div class="mt-10">
                            <input type="text" name="tgluji" id="tgluji" required readonly class="single-input form-control" value="<?php echo $data->tglvisitasi; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_usaha">Nama Hotel</label>
                        <div class="mt-10">
                            <input type="text" name="nama_usaha" id="nama_usaha" required readonly class="single-input form-control" value="<?php echo $data->nama_usaha; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Penanggungjawab</label>
                        <div class="mt-10">
                            <input type="text" name="nama" id="nama" required readonly class="single-input form-control" value="<?php echo $data->nama; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat_usaha">Alamat Hotel</label>
                        <div class="mt-10">
                            <input type="text" name="alamat_usaha" id="alamat_usaha" required readonly class="single-input form-control" value="<?php echo $data->alamat_usaha; ?>">
                        </div>
                    </div>
                    <div class="form-group mb-30">
                        <label for="batastgl">Batas Berlaku Sertifikat</label>
                        <div class="mt-10">
                            <input type="date" name="batastgl" id="batastgl" required class="single-input form-control" value="<?php echo $data->alamat_usaha; ?>">
                        </div>
                    </div>
                    <div class="form-group mb-30">
                        <label for="tglterbit">Tanggal Penerbitan Sertifikat</label>
                        <div class="mt-10">
                            <input type="date" name="tglterbit" id="tglterbit" required class="single-input form-control" value="<?php echo $data->alamat_usaha; ?>">
                        </div>
                    </div>

                    <button class="btn btn-primary p-3" type="submit">Terbitkan sertifikat</button>
                    <?php echo form_close(); ?>
                <?php elseif ($data->kategori == 'jasaboga') : ?>
                    <h2 class="mb-30">Form Sertifikat Jasaboga</h2>
                    <hr>
                    <?php echo form_open('jasaboga/create_certificate/' . $data->id_permohonan); ?>
                    <div class="form-group">
                        <label for="nosertif">Nomor Sertifikat</label>
                        <div class="mt-10">
                            <input type="text" name="nosertif" id="nosertif" required class="single-input form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tahunterbit">Tahun Terbit</label>
                        <div class="mt-10">
                            <input type="text" name="tahunterbit" id="tahunterbit" required onkeypress="return numberonly(event)" class="single-input form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="golongan">Nomor Golongan</label>
                        <div class="mt-10">
                            <input type="text" name="golongan" id="golongan" required class="single-input form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_usaha">Nama Perusahaan</label>
                        <div class="mt-10">
                            <input type="text" name="nama_usaha" id="nama_usaha" required readonly class="single-input form-control" value="<?php echo $data->nama_usaha; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Pengusaha / Penanggungjawab</label>
                        <div class="mt-10">
                            <input type="text" name="nama" id="nama" required readonly class="single-input form-control" value="<?php echo $data->nama; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat_usaha">Alamat Perusahaan</label>
                        <div class="mt-10">
                            <input type="text" name="alamat_usaha" id="alamat_usaha" required readonly class="single-input form-control" value="<?php echo $data->alamat_usaha; ?>">
                        </div>
                    </div>
                    <div class="form-group mb-30">
                        <label for="batastgl">Batas Berlaku Sertifikat</label>
                        <div class="mt-10">
                            <input type="date" name="batastgl" id="batastgl" required class="single-input form-control" value="<?php echo $data->alamat_usaha; ?>">
                        </div>
                    </div>
                    <div class="form-group mb-30">
                        <label for="tglterbit">Tanggal Penerbitan Sertifikat</label>
                        <div class="mt-10">
                            <input type="date" name="tglterbit" id="tglterbit" required class="single-input form-control" value="<?php echo $data->alamat_usaha; ?>">
                        </div>
                    </div>

                    <button class="btn btn-primary p-3" type="submit">Terbitkan sertifikat</button>
                    <?php echo form_close(); ?>
                <?php elseif ($data->kategori == 'tpm') : ?>
                    <h2 class="mb-30">Form Sertifikat Tempat Penyedia Makanan</h2>
                    <hr>
                    <?php echo form_open('tpm/create_certificate/' . $data->id_permohonan); ?>
                    <div class="form-group">
                        <label for="nosertif">Nomor Sertifikat</label>
                        <div class="mt-10">
                            <input type="text" name="nosertif" id="nosertif" required onkeypress="return numberonly(event)" class="single-input form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tahunterbit">Tahun Terbit</label>
                        <div class="mt-10">
                            <input type="text" name="tahunterbit" id="tahunterbit" required onkeypress="return numberonly(event)" class="single-input form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_usaha">Nama Rumah Makan</label>
                        <div class="mt-10">
                            <input type="text" name="nama_usaha" id="nama_usaha" required readonly class="single-input form-control" value="<?php echo $data->nama_usaha; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat_usaha">Alamat</label>
                        <div class="mt-10">
                            <input type="text" name="alamat_usaha" id="alamat_usaha" required readonly class="single-input form-control" value="<?php echo $data->alamat_usaha; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgluji">Tanggal Pemeriksaan</label>
                        <div class="mt-10">
                            <input type="text" name="tgluji" id="tgluji" required readonly class="single-input form-control" value="<?php echo $data->tglvisitasi; ?>">
                        </div>
                    </div>
                    <div class="form-group mb-30">
                        <label for="batastgl">Batas Berlaku Sertifikat</label>
                        <div class="mt-10">
                            <input type="date" name="batastgl" id="batastgl" required class="single-input form-control" value="<?php echo $data->alamat_usaha; ?>">
                        </div>
                    </div>
                    <div class="form-group mb-30">
                        <label for="tglterbit">Tanggal Penerbitan Sertifikat</label>
                        <div class="mt-10">
                            <input type="date" name="tglterbit" id="tglterbit" required class="single-input form-control" value="<?php echo $data->alamat_usaha; ?>">
                        </div>
                    </div>

                    <button class="btn btn-primary p-3" type="submit">Terbitkan sertifikat</button>
                    <?php echo form_close(); ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    function numberonly(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;
    }
</script>