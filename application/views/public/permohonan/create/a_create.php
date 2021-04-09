<div id="main">
    <div class="card col-md-12 shadow md-5 p-3 bg-white rounded">
        <div class="card-body">
            <h3 class="card-title mb-30">Tambah Permohonan</h3>

            <h6 class="title">Kategori Permohonan</h6>
            <div class="radio-area" id="radio-area">
                <input type="radio" id="radio1" name="radios" value="all" onclick="javascript:operatorCategory();" checked>
                <label for="radio1">Hotel</label>
                <input type="radio" id="radio2" name="radios" value="all" onclick="javascript:operatorCategory();">
                <label for="radio2">TPM</label>
                <input type="radio" id="radio3" name="radios" value="all" onclick="javascript:operatorCategory();">
                <label for="radio3">Jasaboga</label>
                <input type="radio" id="radio4" name="radios" value="all" onclick="javascript:operatorCategory();">
                <label for="radio4">DAM</label>
            </div>
            <hr>
            <div id="damfield" style="display: none;">
                <!-- Flash pengajuan failed message -->
                <?php if ($this->session->flashdata('req_failed_dam')) : ?>
                    <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('req_failed_dam') . '</p>'; ?>
                <?php endif; ?>

                <?php echo form_open_multipart('dam/create'); ?>
                <h3 class=" card-title title_color mb-30">Permohonan Sertifikasi Laik Higiene Sanitasi Depot Air Minum (DAM)</h3>
                <div class="accordion" id="sertifikasi_dam">
                    <div class="card">
                        <div class="card-header" id="heading_pemohon">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#fieldpemohon" aria-expanded="true" aria-controls="fieldpemohon">
                                    Data Pemohon
                                </button>
                            </h2>
                        </div>

                        <div class="collapse show" id="fieldpemohon" aria-labelledby="heading_pemohon" data-parent="#sertifikasi_dam">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <div class="mt-10">
                                        <input type="text" name="nama" id="nama" required class="single-input form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="umur">Umur</label>
                                    <div class="mt-10">
                                        <input type="text" name="umur" id="umur" required onkeypress="return hanyaAngka(event)" class="single-input form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="noktp">Nomor KTP</label>
                                    <div class="mt-10">
                                        <input type="text" name="noktp" id="noktp" required onkeypress="return hanyaAngka(event)" class="single-input form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat Rumah</label>
                                    <div class="mt-10">
                                        <input type="text" name="alamat" id="alamat" required class="single-input form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="heading_dam">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#fielddam" aria-expanded="false" aria-controls="fielddam">
                                        Data Depot Air Minum (DAM)
                                    </button>
                                </h2>
                            </div>
                            <div id="fielddam" class="collapse" aria-labelledby="heading_hotel" data-parent="#sertifikasi_dam">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="namaDAM">Nama DAM</label>
                                        <div class="mt-10">
                                            <input type="text" name="namaDAM" id="namaDAM" required class="single-input form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamatDAM">Alamat DAM</label>
                                        <div class="mt-10">
                                            <input type="text" name="alamatDAM" id="alamatDAM" required class="single-input form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <div class="mt-10">
                                        <select name="kecamatan" id="kecamatan" required>
                                                <option value="kosong">Select Kecamatan</option>
                                                <?php foreach ($kecamatan as $data) : ?>
                                                <option value='<?php echo $data['id_kecamatan']; ?>'>
                                                 <?php echo $data['nama_kecamatan']; ?>
                                                </option>
                                                <?php endforeach; ?>
                                        </select></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="notelpDAM">Nomor Telepon DAM</label>
                                        <div class="mt-10">
                                            <input type="text" name="notelpDAM" id="notelpDAM" required onkeypress="return hanyaAngka(event)" class="single-input form-control">
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
                            <div id="fieldberkas" class="collapse" aria-labelledby="heading_berkas" data-parent="#sertifikasi_dam">
                                <div class="card-body">
                                    <p class="alert-danger p-3 rounded">
                                        Berkas maksimal berukuran <strong>2 Mb</strong>,<br>
                                        dengan format <strong>.jpg, .png, .jpeg untuk gambar</strong> atau <strong>.pdf</strong>
                                    </p>
                                    <div class="form-group">
                                        <label for="f_ktp">Foto KTP</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_ktp" id="f_ktp" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_foto">Foto Terbaru</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_foto" id="f_foto" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_domisili">Surat Keterangan Domisili Usaha</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_domisili" id="f_domisili" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_denah">Denah Lokasi dan Bangunan DAM</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_denah" id="f_denah" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_sertifikat">Fotocopy Sertifikat Pelatihan/Kursus Higiene Sanitasi DAM</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_sertifikat" id="f_sertifikat"class="single-input">
                                        </div>
                                        <small class="text-info">*Jika ada</small>
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
            <div id="hotelfield" style="display: block;">
                <h3 class=" card-title title_color mb-30">Permohonan Sertifikasi Laik Higiene Sanitasi Hotel</h3>
                <?php if ($this->session->flashdata('req_failed_hotel')) : ?>
                    <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('req_failed_hotel') . '</p>'; ?>
                <?php endif; ?>
                <?php echo form_open_multipart('hotel/create'); ?>
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
                                        <input type="text" name="nama" id="nama" required class="single-input form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kwn">Kewarganegaraan</label>
                                    <div class="mt-10">
                                        <input type="text" name="kwn" id="kwn" required class="single-input form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="noktp">Nomor KTP</label>
                                    <div class="mt-10">
                                        <input type="text" name="noktp" id="noktp" required onkeypress="return hanyaAngka(event)" class="single-input form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat Rumah</label>
                                    <div class="mt-10">
                                        <input type="text" name="alamat" id="alamat" required class="single-input form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="notelp">Nomor Telepon</label>
                                    <div class="mt-10">
                                        <input type="text" name="notelp" id="notelp" required onkeypress="return hanyaAngka(event)" class="single-input form-control">
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
                                        <input type="text" name="namaPrshn" id="namaPrshn" required class="single-input form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamatKntr">Alamat Kantor</label>
                                    <div class="mt-10">
                                        <input type="text" name="alamatKntr" id="alamatKntr" required class="single-input form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="namaHtl">Nama Hotel</label>
                                    <div class="mt-10">
                                        <input type="text" name="namaHtl" id="namaHtl" required class="single-input form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamatHtl">Alamat Hotel</label>
                                    <div class="mt-10">
                                        <input type="text" name="alamatHtl" id="alamatHtl" required class="single-input form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <div class="mt-10">
                                    <select name="kecamatan" id="kecamatan" required>
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
                                        <input type="text" name="notelpHtl" id="notelpHtl" required onkeypress="return hanyaAngka(event)" class="single-input form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nohpHtl">Nomor Handphone</label>
                                    <div class="mt-10">
                                        <input type="text" name="nohpHtl" id="nohpHtl" required onkeypress="return hanyaAngka(event)" class="single-input form-control">
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
                                <p class="alert-danger p-3 rounded">
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
            <div id="jasabogafield" style="display: none;">
                <h3 class=" card-title title_color mb-30">Permohonan Sertifikasi Laik Higiene Jasaboga</h3>
                <?php if ($this->session->flashdata('req_failed_jasaboga')) : ?>
                    <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('req_failed_jasaboga') . '</p>'; ?>
                <?php endif; ?>
                <?php echo form_open_multipart('jasaboga/create'); ?>
                <div class="accordion" id="sertifikasi_jasaboga">
                    <div class="card">
                        <div class="card-header" id="heading_pemohon">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#fieldpemohon" aria-expanded="true" aria-controls="fieldpemohon">
                                    Data Pemohon
                                </button>
                            </h2>
                        </div>

                        <div class="collapse show" id="fieldpemohon" aria-labelledby="heading_pemohon" data-parent="#sertifikasi_jasaboga">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <div class="mt-10">
                                        <input type="text" name="nama" id="nama" required class="single-input form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="noktp">Nomor KTP</label>
                                    <div class="mt-10">
                                        <input type="text" name="noktp" id="noktp" required onkeypress="return hanyaAngka(event)" class="single-input form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="heading_jasaboga">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#fieldjasaboga" aria-expanded="false" aria-controls="fieldjasaboga">
                                        Data Jasaboga
                                    </button>
                                </h2>
                            </div>
                            <div id="fieldjasaboga" class="collapse" aria-labelledby="heading_jasaboga" data-parent="#sertifikasi_jasaboga">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="namaJasaboga">Nama Jasaboga</label>
                                        <div class="mt-10">
                                            <input type="text" name="namaJasaboga" id="namaJasaboga" required class="single-input form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tahunProduksiJs">Tahun Produksi</label>
                                        <div class="mt-10">
                                            <input type="text" name="tahunProduksiJs" id="tahunProduksiJs" required class="single-input form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamatJasaboga">Alamat Jasaboga</label>
                                        <div class="mt-10">
                                            <input type="text" name="alamatJasaboga" id="alamatJasaboga" required class="single-input form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <div class="mt-10">
                                        <select name="kecamatan" id="kecamatan" required>
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
                                        <label for="notelpJasaboga">Nomor Telepon </label>
                                        <div class="mt-10">
                                            <input type="text" name="notelpJasaboga" id="notelpJasaboga" required onkeypress="return hanyaAngka(event)" class="single-input form-control">
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
                            <div id="fieldberkas" class="collapse" aria-labelledby="heading_berkas" data-parent="#sertifikasi_jasaboga">
                                <div class="card-body">
                                    <p class="alert-danger p-3 rounded">
                                        Berkas maksimal berukuran <strong>2 Mb</strong>,<br>
                                        dengan format <strong>.pdf</strong>
                                    </p>
                                    <div class="form-group">
                                        <label for="f_form">Form Jasaboga</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_form" id="f_form" required class="single-input">
                                        </div>
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
            <div id="tpmfield" style="display: none;">
                <h3 class=" card-title title_color mb-30">Permohonan Sertifikasi Laik Higiene Tempat Penyedia Makan (TPM)</h3>
                <!-- Flash pengajuan failed message -->
                <?php if ($this->session->flashdata('req_failed_tpm')) : ?>
                    <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('req_failed_tpm') . '</p>'; ?>
                <?php endif; ?>
                <?php echo form_open_multipart('tpm/create'); ?>
                <div class="accordion" id="sertifikasi_tpm">
                    <div class="card">
                        <div class="card-header" id="heading_pemohon">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#fieldpemohon" aria-expanded="true" aria-controls="fieldpemohon">
                                    Data Pemohon
                                </button>
                            </h2>
                        </div>

                        <div class="collapse show" id="fieldpemohon" aria-labelledby="heading_pemohon" data-parent="#sertifikasi_tpm">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <div class="mt-10">
                                        <input type="text" name="nama" id="nama" required class="single-input form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="noktp">Nomor KTP</label>
                                    <div class="mt-10">
                                        <input type="text" name="noktp" id="noktp" required onkeypress="return hanyaAngka(event)" class="single-input form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat Rumah</label>
                                    <div class="mt-10">
                                        <input type="text" name="alamat" id="alamat" required class="single-input form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="heading_tpm">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#fieldtpm" aria-expanded="false" aria-controls="fieldtpm">
                                        Data Tempat Penyedia Makan (TPM)
                                    </button>
                                </h2>
                            </div>
                            <div id="fieldtpm" class="collapse" aria-labelledby="heading_tpm" data-parent="#sertifikasi_tpm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="namaTPM">Nama TPM</label>
                                        <div class="mt-10">
                                            <input type="text" name="namaTPM" id="namaTPM" required class="single-input form-control">
                                        </div>
                                    </div>
                                    <h5>Alamat</h5>
                                    <div class="form-group">
                                        <label for="jalanTPM">Jalan</label>
                                        <div class="mt-10">
                                            <input type="text" name="jalanTPM" id="jalanTPM" required class="single-input form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="kelurahanTPM">Kelurahan</label>
                                            <div class="mt-10">
                                                <input type="text" name="kelurahanTPM" id="kelurahanTPM" required class="single-input form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Kecamatan</label>
                                            <div class="mt-10">
                                            <select name="kecamatanTPM" id="kecamatanTPM" required>
                                                <option value="kosong">Select Kecamatan</option>
                                                <?php foreach ($kecamatan as $data) : ?>
                                                <option value='<?php echo $data['id_kecamatan']; ?>'>
                                                 <?php echo $data['nama_kecamatan']; ?>
                                                </option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="notelpTPM">Nomor Telepon TPM</label>
                                        <div class="mt-10">
                                            <input type="text" name="notelpTPM" id="notelpTPM" required onkeypress="return hanyaAngka(event)" class="single-input form-control">
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
                            <div id="fieldberkas" class="collapse" aria-labelledby="heading_berkas" data-parent="#sertifikasi_tpm">
                                <div class="card-body">
                                    <p class="alert-danger p-3 rounded">
                                        Berkas maksimal berukuran <strong>2 Mb</strong>,<br>
                                        dengan format <strong>.jpg, .png, .jpeg untuk gambar</strong> atau <strong>.pdf</strong>
                                    </p>
                                    <div class="form-group">
                                        <label for="f_ktp">Foto KTP Pemohon</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_ktp" id="f_ktp" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_npwp">NPWP Pemohon</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_npwp" id="f_npwp" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_domisili">Surat Keterangan Domisili Usaha</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_domisili" id="f_domisili" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_denah">Denah Lokasi dan Bangunan</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_denah" id="f_denah" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_kuasa">Surat Kuasa</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_kuasa" id="f_kuasa">
                                        </div>
                                        <span><small class="text-info">*Jika dikelola orang lain</small></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_sertif">Sertifikat/Piagam kursus untuk Pengusaha Penjamah</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_sertif" id="f_sertif">
                                        </div>
                                        <span><small class="text-info">*Optional</small></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_rekomendasi">Rekomendasi dari Asosiasi RM Resto Cafe Depot</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_rekomendasi" id="f_rekomendasi">
                                        </div>
                                        <span><small class="text-info">*Optional</small></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_foto">Foto Terbaru Pemohon</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_foto" id="f_foto" required class="single-input">
                                        </div>
                                        <span><small class="text-info">*Ukuran 4x6</small></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_pernyataan_TPM">Surat Pernyataan Kesanggupan Dikunjungi Lapangan (TPM)</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_pernyataan_TPM" id="f_pernyataan_TPM" required class="single-input">
                                        </div>
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
</div>
<script type="text/javascript">
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;
    }
</script>