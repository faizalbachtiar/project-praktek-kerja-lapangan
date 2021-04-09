<div id="main">
    <!-- <p><?= $pass; ?></p> -->
    <div class="container mb-30">
        <div class="row">
            <div class="col-md-4 mb-20">
                <div class="card shadow md-5 p-3 bg-white rounded">
                    <div class="card-body text-center">
                        <h3 class="card-title"><?= $countjadwal ?></h3>
                        <p class="text-muted">Jadwal Visitasi</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-20">
                <div class="card shadow md-5 p-3 bg-white rounded">
                    <div class="card-body text-center">
                        <h3 class="card-title"><?= $countpermohonan ?></h3>
                        <p class="text-muted">Permohonan belum diproses</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-20">
                <div class="card shadow md-5 p-3 bg-white rounded">
                    <div class="card-body text-center">
                        <h3 class="card-title"><?= $countpenilaian ?></h3>
                        <p class="text-muted">Penilaian Visitasi</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-20">
                <div class="card shadow md-5 p-3 bg-white rounded">
                    <div class="card-body text-center">
                        <h3 class="card-title"><?= $countpengguna ?></h3>
                        <p class="text-muted">Pengguna</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-20">
                <div class="card shadow md-5 p-3 bg-white rounded">
                    <div class="card-body text-center">
                        <h3 class="card-title"><?= $countsertifikat ?></h3>
                        <p class="text-muted">Sertifikat Disetujui</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-20">
                <div class="card shadow md-5 p-3 bg-white rounded">
                    <div class="card-body text-center">
                        <h3 class="card-title"><?= $countadmin ?></h3>
                        <p class="text-muted">Admin</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest permohonan -->
    <div class="card col-md-12 shadow md-5 p-3 bg-white rounded mb-30 mt-auto">
        <div class="card-body">
            <h3 class="card-title mb-30">Permohonan Masuk Terbaru</h3>

            <div class="table-responsive-md">
                <table class="table">
                    <tr>
                        <th>NIK Pemohon</th>
                        <th>Nama Usaha</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Tanggal Pengajuan</th>
                        <th></th>
                    </tr>
                    <tr>
                        <?php if ($latestpermohonan !== FALSE) : ?>
                            <?php foreach ($latestpermohonan as $row) : ?>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $row->nik_pemohon; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $row->nama_usaha; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $row->kategori; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p class="alert-warning rounded p-2"><?php echo $row->status; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $row->created_at; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a href="<?php echo base_url(); ?>permohonan/view/<?php echo $row->id_permohonan; ?>" class="btn btn-info">
                                                Lihat Detail
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php elseif ($latestpermohonan === FALSE) : ?>
                        <tr>
                            <td ng-repeat="col in columns" class="ng-scope" colspan="6">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p class="text-danger p-3 text-center"><?php echo "Belum ada hasil uji lab & tinjauan" ?></p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </table>
                <a href="<?php echo base_url(); ?>permohonan">Lihat selengkapnya</a>
            </div>
        </div>
    </div>

    <!-- Penilaian -->
    <div class="card col-md-12 shadow md-5 p-3 bg-white rounded mb-30 mt-auto">
        <div class="card-body">
            <h3 class="card-title mb-30">Hasil Uji Lab & Tinjauan Terbaru</h3>

            <div class="table-responsive-md mb-30">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pemohon </th>
                            <th>Usaha</th>
                            <th>Tim Visitasi</th>
                            <th>Tanggal Visitasi </th>
                            <th>Hasil Uji Kelaikan</th>
                            <th>Hasil Uji Lab</th>
                        </tr>
                    </thead>
                    <?php if ($latestujilab !== FALSE) : ?>
                        <?php foreach ($latestujilab as $data) : ?>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $data->nama; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $data->nama_usaha; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $data->tim_visit; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $data->tglvisitasi; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <?php if ($data->kategori == 'dam' && $data->tinjauan != '-') : ?>
                                                <a href="../assets/file/berkas_visitasi/dam/uji_kelaikan/<?php echo $data->tinjauan ?>" class="btn btn-primary" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'dam' && $data->tinjauan == '-') : ?>
                                                <a href="../assets/file/berkas_visitasi/dam/uji_kelaikan/<?php echo $data->tinjauan ?>" class="btn btn-secondary disabled">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'hotel' && $data->tinjauan != '-') : ?>
                                                <a href="../assets/file/berkas_visitasi/hotel/uji_kelaikan/<?php echo $data->tinjauan ?>" class="btn btn-primary" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'hotel' && $data->tinjauan == '-') : ?>
                                                <a href="../assets/file/berkas_visitasi/hotel/uji_kelaikan/<?php echo $data->tinjauan ?>" class="btn btn-secondary disabled" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'jasaboga' && $data->tinjauan != '-') : ?>
                                                <a href="../assets/file/berkas_visitasi/jasaboga/uji_kelaikan/<?php echo $data->tinjauan ?>" class="btn btn-primary" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'jasaboga' && $data->tinjauan == '-') : ?>
                                                <a href="../assets/file/berkas_visitasi/jasaboga/uji_kelaikan/<?php echo $data->tinjauan ?>" class="btn btn-secondary disabled" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'tpm' && $data->tinjauan != '-') : ?>
                                                <a href="../assets/file/berkas_visitasi/tpm/uji_kelaikan/<?php echo $data->tinjauan ?>" class="btn btn-primary" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'tpm' && $data->tinjauan == '-') : ?>
                                                <a href="../assets/file/berkas_visitasi/tpm/uji_kelaikan/<?php echo $data->tinjauan ?>" class="btn btn-secondary disabled" target="blank">Lihat Berkas</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <?php if ($data->kategori == 'dam' && $data->ujilab != '-') : ?>
                                                <a href="../assets/file/berkas_visitasi/dam/uji_lab/<?php echo $data->ujilab ?>" class="btn btn-primary" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'dam' && $data->ujilab == '-') : ?>
                                                <a href="../assets/file/berkas_visitasi/dam/uji_lab/<?php echo $data->ujilab ?>" class="btn btn-secondary disabled" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'hotel' && $data->ujilab != '-') : ?>
                                                <a href="../assets/file/berkas_visitasi/hotel/uji_lab/<?php echo $data->ujilab ?>" class="btn btn-primary" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'hotel' && $data->ujilab == '-') : ?>
                                                <a href="../assets/file/berkas_visitasi/hotel/uji_lab/<?php echo $data->ujilab ?>" class="btn btn-secondary disabled" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'jasaboga' && $data->ujilab != '-') : ?>
                                                <a href="../assets/file/berkas_visitasi/jasaboga/uji_lab/<?php echo $data->ujilab ?>" class="btn btn-primary" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'jasaboga' && $data->ujilab == '-') : ?>
                                                <a href="../assets/file/berkas_visitasi/jasaboga/uji_lab/<?php echo $data->ujilab ?>" class="btn btn-secondary disabled" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'tpm' && $data->ujilab != '-') : ?>
                                                <a href="../assets/file/berkas_visitasi/tpm/uji_lab/<?php echo $data->ujilab ?>" class="btn btn-primary" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'tpm' && $data->ujilab == '-') : ?>
                                                <a href="../assets/file/berkas_visitasi/tpm/uji_lab/<?php echo $data->ujilab ?>" class="btn btn-secondary disabled" target="blank">Lihat Berkas</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php elseif ($latestujilab === FALSE) : ?>
                        <tr>
                            <td ng-repeat="col in columns" class="ng-scope" colspan="6">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p class="text-danger p-3 text-center"><?php echo "Belum ada hasil uji lab & tinjauan" ?></p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </table>
                <a href="<?php echo base_url(); ?>ujilab">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>

    <!-- Jadwal Visitasi -->
    <div class="card col-md-12 shadow md-5 mb-30 p-3 bg-white rounded mt-auto">
        <div class="card-body">
            <h3 class="card-title mb-30">Jadwal Visitasi Terdekat</h3>

            <div class="table-responsive-md mb-30">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pemohon</th>
                            <th>Nama Usaha</th>
                            <th>Alamat</th>
                            <th>Tim Visitasi</th>
                            <th>Tanggal Visitasi</th>
                        </tr>
                    </thead>
                    <?php if ($latestjadwal !== FALSE) : ?>
                        <?php foreach ($latestjadwal as $data) : ?>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $data->nama; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $data->nama_usaha; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $data->alamat_usaha; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $data->tim_visit; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $data->tglvisitasi; ?></p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php elseif ($latestjadwal === FALSE) : ?>
                        <tr>
                            <td ng-repeat="col in columns" class="ng-scope" colspan="6">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p class="text-danger p-3 text-center"><?php echo "Belum ada jadwal visitasi" ?></p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>

            <a href="<?php echo base_url(); ?>jadwal">Lihat selengkapnya</a>
        </div>
    </div>

    <!-- Sertifikat -->


    <!-- Latest Admin -->
    <div class="card col-md-12 shadow md-5 mb-30 p-3 bg-white rounded mb-30 mt-auto">
        <div class="card-body">
            <h3 class="card-title mb-30">Admin Terbaru</h3>
            <?php if ($this->session->flashdata('admin_pass_success')) : ?>
                <?php echo '<p class="alert alert-success p-2 mb-30">' . $this->session->flashdata('admin_pass_success') . '</p>'; ?>
            <?php endif; ?>
            <?php if ($this->session->flashdata('admin_pass_failed')) : ?>
                <?php echo '<p class="alert alert-danger p-2 mb-30">' . $this->session->flashdata('admin_pass_failed') . '</p>'; ?>
            <?php endif; ?>

            <div class="table-responsive-md">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Terdaftar pada</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php if ($latestadmin == TRUE) : ?>
                        <?php foreach ($latestadmin as $data) : ?>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $data->level; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $data->nama; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $data->username; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $data->created_at; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $data->is_verified; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                        <a href="<?php base_url(); ?>../admin/ubahpassword/<?php echo $data->nip; ?>" class="btn btn-block btn-outline-primary">
                                            Ubah Password
                                        </a>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a href="<?php echo base_url(); ?>operator/<?php echo $data->nip; ?>" class="btn btn-info">
                                                Lihat Detail
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php elseif ($latestadmin == FALSE) : ?>
                        <tr>
                            <td ng-repeat="col in columns" class="ng-scope" colspan="6">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p class="text-danger p-3 text-center"><?php echo "Belum ada admin" ?></p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </table>

                <div class="modal fade" id="changepassModal" tabindex="-1" role="dialog" aria-labelledby="changepassModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="changepassModalTitle">Ubah Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group p-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password Baru">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary p-2">Ganti Password</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <a href="<?php echo base_url(); ?>operator">Lihat selengkapnya</a>
        </div>
    </div>

    <!-- Latest Pengguna -->
    <div class="card col-md-12 shadow md-5 p-3 bg-white rounded mt-auto">
        <div class="card-body">
            <h3 class="card-title mb-30">Pengguna Terbaru</h3>

            <div class="table-responsive-md">
                <table class="table">
                    <tr>
                        <th>NIK Pengguna</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tanggal Daftar</th>
                        <th></th>
                    </tr>
                    <tr>
                        <?php if ($latestpengguna == TRUE) : ?>
                            <?php foreach ($latestpengguna as $row) : ?>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $row->nik_pengguna; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $row->nama; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $row->email; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <p><?php echo $row->created_at; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a href="<?php echo base_url(); ?>pengguna/<?php echo $row->nik_pengguna; ?>" class="btn btn-info">
                                                Lihat Detail
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php elseif ($latestpengguna == FALSE) : ?>
                        <tr>
                            <td ng-repeat="col in columns" class="ng-scope" colspan="6">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p class="text-danger p-3 text-center"><?php echo "Belum ada Pengguna" ?></p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tr>
                </table>
            </div>

            <a href="<?php echo base_url(); ?>pengguna">Lihat selengkapnya</a>
        </div>
    </div>
</div>