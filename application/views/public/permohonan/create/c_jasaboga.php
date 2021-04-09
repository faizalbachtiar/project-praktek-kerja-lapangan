<section class="section_gap">
    <div class="container">
        <div class="card col-md-12 mb-30 shadow p-3 bg-white rounded">
            <div class="card-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('jasaboga/create'); ?>
                <h2 class="title_color mb-30">Sertifikasi Jasaboga</h2>
                <!-- Flash pengajuan failed message -->
                <?php if ($this->session->flashdata('req_failed_jasaboga')) : ?>
                    <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('req_failed_jasaboga') . '</p>'; ?>
                <?php endif; ?>
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
                                        <input type="text" name="nama" id="nama" required class="single-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="noktp">Nomor KTP</label>
                                    <div class="mt-10">
                                        <input type="text" name="noktp" id="noktp" required onkeypress="return hanyaAngka(event)" class="single-input">
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
                                            <input type="text" name="namaJasaboga" id="namaJasaboga" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tahunProduksiJs">Tahun Produksi</label>
                                        <div class="mt-10">
                                            <input type="text" name="tahunProduksiJs" id="tahunProduksiJs" required onkeypress="return hanyaAngka(event)" class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamatJasaboga">Alamat Jasaboga</label>
                                        <div class="mt-10">
                                            <input type="text" name="alamatJasaboga" id="alamatJasaboga" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kecamatanJasaboga">Kecamatan</label>
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
                                        <label for="notelpJasaboga">Nomor Telepon</label>
                                        <div class="mt-10">
                                            <input type="text" name="notelpJasaboga" id="notelpJasaboga" required onkeypress="return hanyaAngka(event)" class="single-input">
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