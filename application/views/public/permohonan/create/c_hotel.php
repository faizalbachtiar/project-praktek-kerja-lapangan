<section class="section_gap">
    <div class="container">
        <div class="card col-md-12 mb-20 mt-20 shadow p-3 bg-white rounded">
            <div class="card-body p-3">
                <h2 class="card-title title_color mb-30">Permohonan Sertifikasi Laik Higiene Sanitasi Hotel</h2>
                <!-- Flash pengajuan failed message -->
                <?php if ($this->session->flashdata('req_failed_hotel')) : ?>
                    <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('req_failed_hotel') . '</p>'; ?>
                <?php endif; ?>
                <?php echo form_open_multipart('hotel/create'); ?>
                <!--  -->
                <div class="accordion" id="sertifikasi_hotel">
                    <div class="card">
                        <div class="card-header" id="heading_pemohon">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#fieldpemohon" aria-expanded="true" aria-controls="fieldpemohon">
                                    Data Pemohon
                                </button>
                            </h2>
                        </div>

                        <div class="collapse show" id="fieldpemohon" aria-labelledby="heading_pemohon" data-parent="#sertifikasi_hotel">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <div class="mt-10">
                                        <input type="text" name="nama" id="nama" required class="single-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kwn">Kewarganegaraan</label>
                                    <div class="mt-10">
                                        <input type="text" name="kwn" id="kwn" required class="single-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="noktp">Nomor KTP</label>
                                    <div class="mt-10">
                                        <input type="text" name="noktp" id="noktp" required onkeypress="return hanyaAngka(event)" class="single-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat Rumah</label>
                                    <div class="mt-10">
                                        <input type="text" name="alamat" id="alamat" required class="single-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="notelp">Nomor Telepon</label>
                                    <div class="mt-10">
                                        <input type="text" name="notelp" id="notelp" required onkeypress="return hanyaAngka(event)" class="single-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="heading_hotel">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#fieldhotel" aria-expanded="false" aria-controls="fieldhotel">
                                    Data Hotel
                                </button>
                            </h2>
                        </div>
                        <div id="fieldhotel" class="collapse" aria-labelledby="heading_hotel" data-parent="#sertifikasi_hotel">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="namaPrshn">Nama Perusahaan</label>
                                    <div class="mt-10">
                                        <input type="text" name="namaPrshn" id="namaPrshn" required class="single-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamatKntr">Alamat Kantor</label>
                                    <div class="mt-10">
                                        <input type="text" name="alamatKntr" id="alamatKntr" required class="single-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="namaHtl">Nama Hotel</label>
                                    <div class="mt-10">
                                        <input type="text" name="namaHtl" id="namaHtl" required class="single-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamatHtl">Alamat Hotel</label>
                                    <div class="mt-10">
                                        <input type="text" name="alamatHtl" id="alamatHtl" required class="single-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kecamatanHotel">Kecamatan</label>
                                    <div class="mt-10">
                                    <select name="kecamatan" id="kecamatan" require>
                                    <option value="kosong">Select Kecamatan</option>
                                    <?php foreach ($kecamatan as $data) : ?>
                                        <option value='<?php echo $data['id_kecamatan']; ?>'>
                                            <?php echo $data['nama_kecamatan']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="notelpHtl">Nomor Telepon</label>
                                    <div class="mt-10">
                                        <input type="text" name="notelpHtl" id="notelpHtl" required onkeypress="return hanyaAngka(event)" class="single-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nohpHtl">Nomor Handphone</label>
                                    <div class="mt-10">
                                        <input type="text" name="nohpHtl" id="nohpHtl" required onkeypress="return hanyaAngka(event)" class="single-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading_berkas">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#fieldberkas" aria-expanded="false" aria-controls="fieldberkas">
                                    Berkas Kelengkapan
                                </button>
                            </h2>
                        </div>
                        <div id="fieldberkas" class="collapse" aria-labelledby="heading_berkas" data-parent="#sertifikasi_hotel">
                            <div class="card-body">
                                <p class="alert-danger p-3">
                                    Berkas maksimal berukuran <strong>2 Mb</strong>,<br>
                                    dengan format <strong>.jpg, .png, .jpeg untuk gambar</strong> atau <strong>.pdf untuk dokumen</strong>
                                </p>
                                <div class="form-group">
                                    <label for="f_ktp">Foto KTP</label>
                                    <div class="mt-10">
                                        <input type="file" name="f_ktp" id="f_ktp" required class="single-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="f_ho">Ijin HO/Surat Keterangan Domisili Usaha/Ijin Gangguan</label>
                                    <div class="mt-10">
                                        <input type="file" name="f_ho" id="f_ho" required class="single-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="f_ktp_penanggung">Foto KTP Penanggungjawab</label>
                                    <div class="mt-10">
                                        <input type="file" name="f_ktp_penanggung" id="f_ktp_penanggung" class="single-input">
                                    </div>
                                    <small>* Jika dikelola orang lain</small>
                                </div>
                                <div class="form-group">
                                    <label for="f_surat_kuasa">Surat Kuasa</label>
                                    <div class="mt-10">
                                        <input type="file" name="f_surat_kuasa" id="f_surat_kuasa" class="single-input">
                                    </div>
                                    <small>* Jika dikelola orang lain</small>
                                </div>
                                <div class="form-group">
                                    <label for="f_pariwisata">Ijin Usaha Pariwisata</label>
                                    <div class="mt-10">
                                        <input type="file" name="f_pariwisata" id="f_pariwisata" required class="single-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="f_denah">Denah Bangunan</label>
                                    <div class="mt-10">
                                        <input type="file" name="f_denah" id="f_denah" required class="single-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-block primary-btn">Ajukan Permohonan</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>
<script>
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;
    }
</script>