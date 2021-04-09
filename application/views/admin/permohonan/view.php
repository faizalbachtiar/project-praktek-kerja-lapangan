<?php foreach ($permohonan as $pmh) : ?>
    <div id="main">
        <div class="card col-md-12 shadow md-5 p-3 bg-white rounded">
            <div class="card-body">
                <?php if ($pmh['kategori'] == 'dam') : ?>
                    <h2 class="card-title"><?php echo $pmh['nama_usaha']; ?></h2>
                    <div class="row detail_permohonan mb-30">
                        <h4 class="col-md-12">Data Pemohon</h4>
                        <div class="col-md-4">
                            <h6>Nama Pemohon</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['nama']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Umur</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['umur']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>NIK Pemohon</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['nik_pemohon']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Alamat Rumah</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['alamat_rumah']; ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row detail_permohonan mb-30">
                        <h4 class="col-md-12">Data Depot Air Minum (DAM)</h4>
                        <div class="col-md-4">
                            <h6>Nama DAM</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['nama_usaha']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Alamat DAM</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['alamat_usaha']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Nomor Telepon DAM</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['notelp_usaha']; ?></p>
                        </div>
                    </div>
                    <div class="table-responsive-md mb-30" id="fieldberkas">
                        <h4 class="mb-15">Berkas Kelengkapan</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Jenis Berkas</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>KTP Pemohon<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a class="btn btn-info" href="../../assets/file/permohonan/dam/fotokopi_ktp/<?php echo $pmh['ktp_pemohon'] ?>" target="_blank">Cek Berkas </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>Foto Terbaru<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a class="btn btn-info" href="../../assets/file/permohonan/dam/foto_terbaru/<?php echo $pmh['foto_pemohon'] ?>" target="_blank">Cek Berkas </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>Surat ijin Domisili<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a class="btn btn-info" href="../../assets/file/permohonan/dam/domisili/<?php echo $pmh['skdu'] ?>" target="_blank">Cek Berkas </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>Denah Lokasi dan Bangunan<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a class="btn btn-info" href="../../assets/file/permohonan/dam/denah/<?php echo $pmh['denah'] ?>" target="_blank">Cek Berkas </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>Foto Sertifikat Pelatihan / Kursus Higiene Sanitasi DAM<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <?php if ($pmh['sertifikat_pelatihan']) :  ?>
                                                <a class="btn btn-info" href="../../assets/file/permohonan/dam/sertifikat/<?php echo $pmh['sertifikat_pelatihan'] ?>" target="_blank">Cek Berkas </a>
                                            <?php else :  ?>
                                                <a class="btn btn-secondary disabled" href="../../assets/file/permohonan/dam/sertifikat/<?php echo $pmh['sertifikat_pelatihan'] ?>" target="_blank">Cek Berkas </a>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php if ($this->session->userdata('level') == 'visitasi') : ?>
                        <?php echo validation_errors(); ?>
                        <?php echo form_open_multipart('dam/validate/' . $pmh['id_permohonan']); ?>

                        <h4>Berkas Visitasi</h4>
                        <p class="alert-warning p-3">
                            Berkas maksimal berukuran <strong>2 Mb</strong>,<br>
                            dengan format <strong>.jpg, .png, .jpeg untuk gambar</strong> atau <strong>.pdf</strong>
                        </p>
                        <?php if ($this->session->flashdata('Upload_berkas_failed')) : ?>
                            <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('Upload_berkas_failed') . '</p>'; ?>
                        <?php endif; ?>

                        <div class="mb-30">
                            <div class="form-group">
                                <label for="h_uk">Hasil Uji Lab</label><br>
                                <input type="file" name="h_ul" id="h_ul" required class="single-input">
                            </div>
                        </div>

                        <hr class="mb-10">
                        <button type="button" class="btn btn-outline-primary p-3 mr-5" data-toggle="modal" data-target="#tolakmodal">Tolak</button>
                        <button type="submit" class="btn btn-primary p-3">Validasi</button>
                        <?php echo form_close(); ?>
                    <?php endif; ?>
                <?php elseif ($pmh['kategori'] == 'hotel') : ?>
                    <h2 class="card-title"><?php echo $pmh['nama_usaha']; ?></h2>
                    <div class="row" id="fieldpemohon">
                        <!-- Data Pemohon -->
                        <h4 class="col-md-12">Data Pemohon</h4>
                        <div class="col-md-4">
                            <h6>Nama Pemohon</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['nama']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Kewarganegaraan</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['kewarganegaraan']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>NIK Pemohon</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['nik_pemohon']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Alamat Rumah</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['alamat_rumah']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Nomor Telepon</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['notelp_pemohon']; ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row" id="fieldusaha">
                        <h4 class="col-md-12">Data Hotel</h4>
                        <div class="col-md-4">
                            <h6>Nama Perusahaan</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['nama_kantor']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Alamat Perusahaan</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['alamat_kantor']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Nama Hotel</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['nama_usaha']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Alamat Hotel</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['alamat_usaha']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Nomor Telepon Hotel</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['notelp_usaha']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Nomor Handphone</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['noHP_usaha']; ?></p>
                        </div>
                    </div>
                    <div class="table-responsive-md mb-30" id="fieldberkas">
                        <h4 class="mb-15">Berkas Kelengkapan</h4>
                        <table class="table" id="Data Berkas">
                            <thead>
                                <tr>
                                    <th>Jenis Berkas</th>
                                    <th> </th>

                                </tr>
                            </thead>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>KTP<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a class="btn btn-info" href="../../assets/file/permohonan/hotel/ktp/<?php echo $pmh['ktp_pemohon'] ?>" target="_blank">Cek Berkas </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>Ijin HO/Surat Keterangan Domisili Usaha<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a class="btn btn-info" href="../../assets/file/permohonan/hotel/domisili/<?php echo $pmh['skdu'] ?>" target="_blank">Cek Berkas </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>Foto Ktp Penanggung Jawab<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <?php if ($pmh['foto_pemohon']) :  ?>
                                                <a class="btn btn-info" href="../../assets/file/permohonan/hotel/ktp_penanggung_jawab/<?php echo $pmh['foto_pemohon'] ?>" target="_blank">Cek Berkas </a>
                                            <?php else :  ?>
                                                <a class="btn btn-secondary disabled" href="../../assets/file/permohonan/hotel/ktp_penanggung_jawab/<?php echo $pmh['foto_pemohon'] ?>" target="_blank">Cek Berkas </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>Surat Kuasa<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <?php if ($pmh['kuasa']) :  ?>
                                                <a class="btn btn-info" href="../../assets/file/permohonan/hotel/surat_kuasa/<?php echo $pmh['kuasa'] ?>" target="_blank">Cek Berkas </a>
                                            <?php else :  ?>
                                                <a class="btn btn-secondary disabled" href="../../assets/file/permohonan/hotel/surat_kuasa/<?php echo $pmh['kuasa'] ?>" target="_blank">Cek Berkas </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>Ijin Usaha Pariwisata<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a class="btn btn-info" href="../../assets/file/permohonan/hotel/ijin_usaha/<?php echo $pmh['ijin_pariwisata'] ?>" target="_blank">Cek Berkas </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>Denah Bangunan<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a class="btn btn-info" href="../../assets/file/permohonan/hotel/denah_bangunan/<?php echo $pmh['denah'] ?>" target="_blank">Cek Berkas </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php if ($this->session->userdata('level') == 'visitasi') : ?>
                        <?php echo validation_errors(); ?>
                        <?php echo form_open_multipart('hotel/validate/' . $pmh['id_permohonan']); ?>

                        <h4>Berkas Visitasi</h4>
                        <p class="alert-warning p-3">
                            Berkas maksimal berukuran <strong>2 Mb</strong>,<br>
                            dengan format <strong>.jpg, .png, .jpeg untuk gambar</strong> atau <strong>.pdf</strong>
                        </p>

                        <?php if ($this->session->flashdata('Upload_berkas_failed')) : ?>
                            <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('Upload_berkas_failed') . '</p>'; ?>
                        <?php endif; ?>

                        <div class="mb-30">
                            <div class="form-group">
                                <label for="h_uk">Hasil Uji Kelaikan Jasaboga</label><br>
                                <input type="file" name="h_uk" id="h_uk" required class="single-input">
                            </div>
                            <div class="form-group">
                                <label for="h_uk">Hasil Uji Lab</label><br>
                                <input type="file" name="h_ul" id="h_ul" required class="single-input">
                            </div>
                        </div>
                        <hr class="mb-10">
                        <button type="button" class="btn btn-outline-primary p-3 mr-5" data-toggle="modal" data-target="#tolakmodal">Tolak</button>
                        <button type="submit" class="btn btn-primary p-3">Validasi</button>
                        <?php echo form_close(); ?>
                    <?php endif; ?>
                <?php elseif ($pmh['kategori'] == 'jasaboga') : ?>
                    <h2 class="card-title"><?php echo $pmh['nama_usaha']; ?></h2>
                    <div class="row" id="fieldpemohon">
                        <h3 class="col-md-12">Data Pemohon</h3>
                        <div class="col-md-4">
                            <h6>Nama Pemohon</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['nama']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>NIK Pemohon</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['nik_pemohon']; ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row" id="fieldusaha">
                        <h3 class="col-md-12">Data Jasaboga</h3>
                        <div class="col-md-4">
                            <h6>Nama</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['nama_usaha']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Alamat</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['alamat_usaha']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Kecamatan</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['nama_kecamatan']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Nomor Telepon</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['notelp_usaha']; ?></p>
                        </div>
                    </div>
                    <div class="table-responsive-md mb-30" id="fieldberkas">
                        <h4 class="mb-15">Berkas Kelengkapan</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Jenis Berkas</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>Berkas Jasaboga<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a class="btn btn-info" href="../../assets/file/permohonan/jasaboga/form/<?php echo $pmh['formJS'] ?>" target="_blank">Cek Berkas </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php if ($this->session->userdata('level') == 'visitasi') : ?>
                        <?php echo validation_errors(); ?>
                        <?php echo form_open_multipart('jasaboga/validate/' . $pmh['id_permohonan']); ?>

                        <h4>Berkas Visitasi</h4>
                        <p class="alert-warning p-3">
                            Berkas maksimal berukuran <strong>2 Mb</strong>,<br>
                            dengan format <strong>.jpg, .png, .jpeg untuk gambar</strong> atau <strong>.pdf</strong>
                        </p>

                        <?php if ($this->session->flashdata('Upload_berkas_failed')) : ?>
                            <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('Upload_berkas_failed') . '</p>'; ?>
                        <?php endif; ?>

                        <div class="mb-30">
                            <div class="form-group">
                                <label for="h_uk">Hasil Uji Kelaikan Jasaboga</label><br>
                                <input type="file" name="h_uk" id="h_uk" required class="single-input">
                            </div>
                            <div class="form-group">
                                <label for="h_uk">Hasil Uji Lab</label><br>
                                <input type="file" name="h_ul" id="h_ul" required class="single-input">
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-primary p-3 mr-5" data-toggle="modal" data-target="#tolakmodal">Tolak</button>
                        <button type="submit" class="btn btn-primary p-3">Validasi</button>
                        <?php echo form_close(); ?>
                    <?php endif; ?>
                <?php elseif ($pmh['kategori'] == 'tpm') : ?>
                    <h2 class="card-title"><?php echo $pmh['nama_usaha']; ?></h2>
                    <div class="row" id="fieldpemohon">
                        <h4 class="col-md-12">Data Pemohon</h4>
                        <div class="col-md-4">
                            <h6>Nama Pemohon</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['nama']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>NIK Pemohon</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['nik_pemohon']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Alamat Rumah</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['alamat_rumah']; ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row" id="fieldusaha">
                        <h4 class="col-md-12">Data Tempat Penyedia Makan (TPM)</h4>
                        <div class="col-md-4">
                            <h6>Nama TPM</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['nama_usaha']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Alamat TPM</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['alamat_usaha']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Kelurahan</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['kelurahan_usaha']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Kecamatan</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['nama_kecamatan']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Nomor Telepon TPM</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $pmh['notelp_usaha']; ?></p>
                        </div>
                    </div>
                    <div class="table-responsive-md mb-30" id="fieldberkas">
                        <h4 class="mb-15">Berkas Kelengkapan</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Jenis Berkas</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>Ktp Pemohon<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a class="btn btn-info" href="../../assets/file/permohonan/tpm/ktp/<?php echo $pmh['ktp_pemohon'] ?>" target="_blank">Cek Berkas </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>NPWP Pemohon<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a class="btn btn-info" href="../../assets/file/permohonan/tpm/npwp/<?php echo $pmh['npwp'] ?>" target="_blank">Cek Berkas </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>Surat Keterangan Domisili Usaha<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a class="btn btn-info" href="../../assets/file/permohonan/tpm/domisili/<?php echo $pmh['skdu'] ?>" target="_blank">Cek Berkas </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>Denah Lokasi dan Bangunan<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a class="btn btn-info" href="../../assets/file/permohonan/tpm/denah/<?php echo $pmh['denah'] ?>" target="_blank">Cek Berkas </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>Surat Kuasa<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <?php if ($pmh['kuasa']) :  ?>
                                                <a class="btn btn-info" href="../../assets/file/permohonan/tpm/surat_kuasa/<?php echo $pmh['kuasa'] ?>" target="blank">Cek Berkas </a>
                                            <?php else :  ?>
                                                <a class="btn btn-secondary disabled" href="../../assets/file/permohonan/tpm/surat_kuasa/<?php echo $pmh['kuasa'] ?>" target="blank">Cek Berkas </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>Sertifikat / Piagam kursus untuk Pengusaha Penjamah<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <?php if ($pmh['sertifikat_pelatihan']) :  ?>
                                                <a class="btn btn-info" href="../../assets/file/permohonan/tpm/sertifikat/<?php echo $pmh['sertifikat_pelatihan'] ?>" target="_blank">Cek Berkas </a>
                                            <?php else :  ?>
                                                <a class="btn btn-secondary disabled" href="../../assets/file/permohonan/tpm/sertifikat/<?php echo $pmh['sertifikat_pelatihan'] ?>" target="_blank">Cek Berkas </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>Rekomendasi Dari Asosiasi RM Resto Cafe Depot<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <?php if ($pmh['rekomendasi']) :  ?>
                                                <a class="btn btn-info" href="../../assets/file/permohonan/tpm/rekomendasi/<?php echo $pmh['rekomendasi'] ?>" target="_blank">Cek Berkas </a>
                                            <?php else :  ?>
                                                <a class="btn btn-secondary disabled" href="../../assets/file/permohonan/tpm/rekomendasi/<?php echo $pmh['rekomendasi'] ?>" target="_blank">Cek Berkas </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>Foto Terbaru Pemohon<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a class="btn btn-info" href="../../assets/file/permohonan/tpm/foto_terbaru/<?php echo $pmh['foto_pemohon'] ?>" target="_blank">Cek Berkas </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p>Surat Pernyataan Kesanggupan Dikunjungi Lapangan (TPM)<p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a class="btn btn-info" href="../../assets/file/permohonan/tpm/surat_tpm/<?php echo $pmh['surat_tpm'] ?>" target="_blank">Cek Berkas </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php if ($this->session->userdata('level') == 'visitasi') : ?>
                        <?php echo validation_errors(); ?>
                        <?php echo form_open_multipart('tpm/validate/' . $pmh['id_permohonan']); ?>

                        <h4>Berkas Visitasi</h4>
                        <p class="alert-warning p-3">
                            Berkas maksimal berukuran <strong>2 Mb</strong>,<br>
                            dengan format <strong>.jpg, .png, .jpeg untuk gambar</strong> atau <strong>.pdf</strong>
                        </p>

                        <?php if ($this->session->flashdata('Upload_berkas_failed')) : ?>
                            <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('Upload_berkas_failed') . '</p>'; ?>
                        <?php endif; ?>

                        <div class="mb-30">
                            <div class="form-group">
                                <label for="h_uk">Hasil Uji Kelaikan Tempat Penyedia Makanan</label><br>
                                <input type="file" name="h_uk" id="h_uk" required class="single-input">
                            </div>
                            <div class="form-group">
                                <label for="h_uk">Hasil Uji Lab</label><br>
                                <input type="file" name="h_ul" id="h_ul" required class="single-input">
                            </div>
                        </div>
                        <hr class="mb-10">
                        <button type="button" class="btn btn-outline-primary p-3 mr-5" data-toggle="modal" data-target="#tolakmodal">Tolak</button>
                        <button type="submit" class="btn btn-primary p-3">Validasi</button>
                    <?php endif; ?>
                    <?php echo form_close(); ?>
                <?php endif; ?>
                <?php if ($this->session->userdata('level') == 'kesmas') : ?>
                    <?php if ($pmh['status'] == 'diproses') : ?>
                        <button type="button" class="btn btn-outline-primary p-3 mr-3" data-toggle="modal" data-target="#tolakmodal">Tolak</button>
                        <button type="button" class="btn btn-primary p-3" data-toggle="modal" data-target="#setujuimodal">Setujui</button>
                    <?php elseif ($pmh['status'] == 'terverifikasi') : ?>
                        <button type="button" class="btn btn-warning p-3" data-toggle="modal" data-target="#jadwalmodal">Lihat Jadwal</button>
                    <?php elseif ($pmh['status'] == 'validasi') : ?>
                        <h4 class="mb-15">Berkas Uji Lab & Tinjauan</h4>
                        <a class="btn btn-info" href="<?php echo base_url(); ?>asertifikat/<?php echo $pmh['id_permohonan']; ?>">Lihat Hasil Penilaian</a>
                    <?php elseif ($pmh['status'] == 'ditolak') : ?>
                        <p class=" alert-danger p-3">Permohonan ini telah ditolak.
                            <span>
                                <strong><a data-toggle="modal" data-target="#keteranganmodal">Lihat keterangan.</a></strong>
                            </span>
                        </p>
                    <?php elseif ($pmh['status'] == 'selesai') : ?>
                        <a class="btn btn-success p-2" href="<?php echo base_url(); ?>sertifikat/<?php echo $pmh['id_permohonan']; ?>" target="blank">Lihat Sertifikat</a>
                    <?php endif; ?>
                <?php elseif ($this->session->userdata('level') == 'visitasi') : ?>
                <?php elseif ($this->session->userdata('level') == 'super') : ?>
                    <?php if ($pmh['status'] == 'diproses') : ?>
                        <p class="alert-info p-3">Permohonan ini sedang <strong>diproses</strong></p>
                    <?php elseif ($pmh['status'] == 'terverifikasi') : ?>
                        <button type="button" class="btn btn-warning p-3" data-toggle="modal" data-target="#jadwalmodal">Lihat Jadwal</button>
                    <?php elseif ($pmh['status'] == 'validasi') : ?>
                        <h4 class="mb-15">Berkas Uji Lab & Tinjauan</h4>
                        <a class="btn btn-info" href="<?php echo base_url(); ?>asertifikat/<?php echo $pmh['id_permohonan']; ?>">Lihat Hasil Penilaian</a>
                    <?php elseif ($pmh['status'] == 'ditolak') : ?>
                        <p class=" alert-danger p-3">Permohonan ini telah ditolak.
                            <span>
                                <strong><a data-toggle="modal" data-target="#keteranganmodal">Lihat keterangan.</a></strong>
                            </span>
                        </p>
                    <?php elseif ($pmh['status'] == 'selesai') : ?>
                        <a class="btn btn-success p-2" href="<?php echo base_url(); ?>sertifikat/<?php echo $pmh['id_permohonan']; ?>" target="blank">Lihat Sertifikat</a>
                    <?php endif; ?>
                <?php else : ?>
                    <hr>
                    <?php if ($pmh['status'] == 'diproses') : ?>
                        <p class="alert-info p-3">Permohonan ini sedang <strong>diproses</strong></p>
                    <?php elseif ($pmh['status'] == 'terverifikasi') : ?>
                        <a href="<?php echo base_url(); ?>" class="btn btn-warning p-3">Lihat Jadwal</a>
                    <?php elseif ($pmh['status'] == 'tervalidasi') : ?>
                        <p class="alert-info p-3">Permohonan ini telah <strong>divalidasi</strong></p>
                    <?php elseif ($pmh['status'] == 'ditolak') : ?>
                        <p class="alert-info p-3">Permohonan ini <strong>ditolak</strong></p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
        <!--- Keterangan modal ----->
        <div class="modal fade" id="keteranganmodal" tabindex="-1" role="dialog" aria-labelledby="keteranganmodaltitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Keterangan : </p>
                        <?php foreach ($keterangan as $ktg) : ?>
                            <p align="center">
                                <?php echo $ktg['keterangan']; ?>
                            </p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <!---- jadwal modal------>
        <div class="modal fade" id="jadwalmodal" tabindex="-1" role="dialog" aria-labelledby="jadwalmodaltitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Jadwal Visitasi : </p>
                        <?php foreach ($jadwal as $jdl) : ?>
                            <p align="center">
                                <?php echo $jdl['tglvisitasi']; ?>
                            </p>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- Setuju Modal -->
        <div class="modal fade" id="setujuimodal" tabindex="-1" role="dialog" aria-labelledby="setujuimodaltitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin menyetujui permohonan ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary p-3 mr-3" data-dismiss="modal">Batal</button>
                        <a class="btn btn-primary p-3" href="<?php echo base_url(); ?>jadwal/create/<?php echo $pmh['id_permohonan']; ?>">Saya Setuju</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tolak Modal -->
        <div class="modal fade" id="tolakmodal" tabindex="-1" role="dialog" aria-labelledby="tolakmodaltitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                <div class="modal-content">
                    <?php echo form_open('permohonan/tolak/' . $pmh['id_permohonan']); ?>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-muted"> Ceritakan kepada pemohonan alasan penolakan</p>
                        <textarea name="f_penolakan" id="f_penolakan" class="form-control" placeholder="Tulis alasan penolakan di sini" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary p-3 mr-3" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary p-3">Tolak</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>