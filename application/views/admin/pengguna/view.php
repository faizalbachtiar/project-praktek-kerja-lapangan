<div id="main">
    <div class="card col-md-12 shadow md-5 p-3 bg-white rounded">
        <div class="card-body">
            <?php foreach ($pengguna as $data) : ?>
                <h2 class="card-title mb-30">
                    <?php echo $data->nama; ?>
                </h2>
                <div class="row mb-30">
                    <div class="col-md-8">
                        <div class="row">
                            <h6 class="col-sm-3">NIK</h6>
                            <p class="col-sm-9">
                                <?php echo $data->nik_pengguna; ?>
                            </p>
                        </div>
                        <div class="row">
                            <h6 class="col-sm-3">Email</h6>
                            <p class="col-sm-9">
                                <?php echo $data->email; ?>
                            </p>
                        </div>
                        <div class="row">
                            <h6 class="col-sm-3">Username</h6>
                            <p class="col-sm-9">
                                <?php echo $data->username; ?>
                            </p>
                        </div>
                        <div class="row">
                            <h6 class="col-md-3">Tanggal Terdaftar</h6>
                            <p class="col-md-9">
                                <?php echo $data->created_at; ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Riwayat kegiatan Pengguna</div>
                            <div class="card-body">
                                <p><a class="card-link" href="#riwayatpermohonan">Permohonan</a></p>
                                <p><a class="card-link" href="#jadwalvisitasi">Jadwal Visitasi</a></p>
                                <p><a class="card-link" href="#sertifikat">Sertifikat</a></p>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

            <div class="mb-30" id="riwayatpermohonan">
                <h4 class="card-title mb-3">Riwayat Permohonan</h4>
                <!-- Search bar -->
                <!-- <div class="search-area form-group">
                    <input class="col-md-6 form-control" type="text" name="searchpermohonan" id="searchpermohonan" placeholder="Permohonan mana yang ingin anda lihat">
                </div> -->
                <div class="table-responsive-md">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Pemohon</th>
                                <th>Nama Usaha</th>
                                <th>Kategori</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php if (is_array($permohonan) !== FALSE) : ?>
                            <?php foreach ($permohonan as $data) : ?>
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
                                                <p><?php echo $data->kategori; ?></p>
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
                                                <?php if ($data->status == 'diproses') : ?>
                                                    <p class="alert-warning p-2 rounded"><?php echo $data->status; ?></p>
                                                <?php elseif ($data->status == 'validasi') : ?>
                                                    <p class="alert-info p-2 rounded"><?php echo $data->status; ?></p>
                                                <?php elseif ($data->status == 'terverifikasi') : ?>
                                                    <p class="alert-info p-2 rounded"><?php echo $data->status; ?></p>
                                                <?php elseif ($data->status == 'ditolak') : ?>
                                                    <p class="alert-danger p-2 rounded"><?php echo $data->status; ?></p>
                                                <?php elseif ($data->status == 'selesai') : ?>
                                                    <p class="alert-success p-2 rounded"><?php echo $data->status; ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td ng-repeat="col in columns" class="ng-scope">
                                        <div ng-switch="" on="col.renderType">
                                            <div ng-switch-when="primaryLink" class="ng-scope">
                                                <a class="btn btn-info btn-block" href="<?php echo base_url(); ?>permohonan/view/<?php echo $data->id_permohonan; ?>">
                                                    Lihat Detail
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php elseif ($permohonan === FALSE) : ?>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope" colspan="6">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <br>
                                            <p class="text-center text-info">Belum Ada Permohonan</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>

            <div class="mb-30" id="jadwalvisitasi">
                <h4 class="card-title mb-3">Jadwal Visitasi Terdekat</h4>
                <!-- Search bar -->
                <!-- <div class="search-area form-group">
                    <input class="col-md-6 form-control" type="text" name="searchjadwal" id="searchjadwal" placeholder="Permohonan mana yang ingin anda lihat">
                </div> -->
                <div class="table-responsive-md">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Usaha</th>
                                <th>Tanggal Visitasi</th>
                                <th>Puskesmas</th>
                                <th>Tim Visitasi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php if (is_array($jadwal) !== FALSE) : ?>
                            <?php foreach ($jadwal as $data) : ?>
                                <tr>
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
                                                <p><?php echo $data->tglvisitasi; ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td ng-repeat="col in columns" class="ng-scope">
                                        <div ng-switch="" on="col.renderType">
                                            <div ng-switch-when="primaryLink" class="ng-scope">
                                                <p><?php echo $data->nama_puskesmas; ?></p>
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
                                </tr>
                            <?php endforeach; ?>
                        <?php elseif ($jadwal === FALSE) : ?>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope" colspan="6">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <br>
                                            <p class="text-center text-info">Belum Ada Jadwal</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>

            <div class="mb-30" id="sertifikat">
                <h4 class="card-title mb-3">Sertifikat</h4>
                <!-- Search bar -->
                <!-- <div class="search-area form-group">
                    <input class="col-md-6 form-control" type="text" name="searchsertifikat" id="searchsertifikat" placeholder="Operator mana yang ingin anda lihat">
                </div> -->
                <div class="table-responsive-md">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Usaha</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php if ($sertifikat) : ?>
                            <?php foreach ($sertifikat as $data) : ?>
                                <tr>
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
                                                <a href="<?php echo base_url(); ?>sertifikat/<?php echo $data->id_permohonan; ?>" class="btn btn-primary">Lihat Sertifikat</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php elseif ($sertifikat === FALSE) : ?>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope" colspan="6">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <br>
                                            <p class="text-center text-info">Belum Ada Sertifikat</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>