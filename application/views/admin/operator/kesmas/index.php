<div id="main">
    <div class="row mb-10">
        <div class="col-md-6 mb-20">
            <div class="card shadow md-5 p-3 bg-white rounded">
                <div class="card-body text-center">
                    <h3 class="card-title"><?= $countpermohonan ?></h3>
                    <p class="text-muted">Permohonan belum diproses</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-20">
            <div class="card shadow md-5 p-3 bg-white rounded">
                <div class="card-body text-center">
                    <h3 class="card-title"><?= $countjadwal ?></h3>
                    <p class="text-muted">Jadwal Visitasi</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-20">
            <div class="card shadow md-5 p-3 bg-white rounded">
                <div class="card-body text-center">
                    <h3 class="card-title"><?= $countpenilaian ?></h3>
                    <p class="text-muted">Hasil Uji Lab & Tinjauan</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-20">
            <div class="card shadow md-5 p-3 bg-white rounded">
                <div class="card-body text-center">
                    <h3 class="card-title"><?= $countsertifikat ?></h3>
                    <p class="text-muted">Sertifikat Terbit</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card col-md-12 shadow md-5 mb-30 p-3 bg-white rounded mt-auto">
        <div class="card-body">
            <h3 class="card-title mb-30">Permohonan Terbaru</h3>

            <div class="table-responsive-md">
                <table class="table">
                    <tr>
                        <th>Pemohon</th>
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
                                        <p><?php echo $row->nama; ?></p>
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
                                        <p class="alert-warning p-2 rounded"><?php echo $row->status; ?></p>
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
                            <?php endforeach; ?>
                        </tr>
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
                    </tr>
                </table>
            </div>

            <a href="<?php echo base_url(); ?>permohonan">Lihat selengkapnya</a>
        </div>
    </div>

    <div class="card col-md-12 shadow md-5 p-3 bg-white rounded mt-auto">
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
                                            <?php if ($data->kategori == 'dam' && $data->tinjauan !='-') : ?>
                                                <a href="assets/file/berkas_visitasi/dam/uji_kelaikan/<?php echo $data->tinjauan ?>" class="btn btn-primary" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'dam' && $data->tinjauan =='-') : ?>
                                                <a href="assets/file/berkas_visitasi/dam/uji_kelaikan/<?php echo $data->tinjauan ?>" class="btn btn-secondary disabled">Lihat Berkas</a>
                                            
                                            <?php elseif ($data->kategori == 'hotel' && $data->tinjauan !='-') : ?>
                                                <a href="assets/file/berkas_visitasi/hotel/uji_kelaikan/<?php echo $data->tinjauan ?>" class="btn btn-primary" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'hotel' && $data->tinjauan =='-') : ?>
                                                <a href="assets/file/berkas_visitasi/hotel/uji_kelaikan/<?php echo $data->tinjauan ?>" class="btn btn-secondary disabled" target="blank">Lihat Berkas</a>
                                            
                                            <?php elseif ($data->kategori == 'jasaboga' && $data->tinjauan !='-') : ?>
                                                <a href="assets/file/berkas_visitasi/jasaboga/uji_kelaikan/<?php echo $data->tinjauan ?>" class="btn btn-primary" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'jasaboga' && $data->tinjauan =='-') : ?>
                                                <a href="assets/file/berkas_visitasi/jasaboga/uji_kelaikan/<?php echo $data->tinjauan ?>" class="btn btn-secondary disabled" target="blank">Lihat Berkas</a>
                                            
                                            <?php elseif ($data->kategori == 'tpm' && $data->tinjauan !='-') : ?>
                                                <a href="assets/file/berkas_visitasi/tpm/uji_kelaikan/<?php echo $data->tinjauan ?>" class="btn btn-primary" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'tpm' && $data->tinjauan =='-') : ?>
                                                <a href="assets/file/berkas_visitasi/tpm/uji_kelaikan/<?php echo $data->tinjauan ?>" class="btn btn-secondary disabled" target="blank">Lihat Berkas</a>
                                            
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <?php if ($data->kategori == 'dam' && $data->ujilab !='-') : ?>
                                                <a href="assets/file/berkas_visitasi/dam/uji_lab/<?php echo $data->ujilab ?>" class="btn btn-primary" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'dam' && $data->ujilab =='-') : ?>
                                                <a href="assets/file/berkas_visitasi/dam/uji_lab/<?php echo $data->ujilab ?>" class="btn btn-secondary disabled" target="blank">Lihat Berkas</a>
                                            
                                            <?php elseif ($data->kategori == 'hotel' && $data->ujilab !='-') : ?>
                                                <a href="assets/file/berkas_visitasi/hotel/uji_lab/<?php echo $data->ujilab ?>" class="btn btn-primary" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'hotel' && $data->ujilab =='-') : ?>
                                                <a href="assets/file/berkas_visitasi/hotel/uji_lab/<?php echo $data->ujilab ?>" class="btn btn-secondary disabled" target="blank">Lihat Berkas</a>
                                            
                                            <?php elseif ($data->kategori == 'jasaboga' && $data->ujilab !='-') : ?>
                                                <a href="assets/file/berkas_visitasi/jasaboga/uji_lab/<?php echo $data->ujilab ?>" class="btn btn-primary" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'jasaboga' && $data->ujilab =='-') : ?>
                                                <a href="assets/file/berkas_visitasi/jasaboga/uji_lab/<?php echo $data->ujilab ?>" class="btn btn-secondary disabled" target="blank">Lihat Berkas</a>
                                            
                                            <?php elseif ($data->kategori == 'tpm' && $data->ujilab !='-') : ?>
                                                <a href="assets/file/berkas_visitasi/tpm/uji_lab/<?php echo $data->ujilab ?>" class="btn btn-primary" target="blank">Lihat Berkas</a>
                                            <?php elseif ($data->kategori == 'tpm' && $data->ujilab =='-') : ?>
                                                <a href="assets/file/berkas_visitasi/tpm/uji_lab/<?php echo $data->ujilab ?>" class="btn btn-secondary disabled" target="blank">Lihat Berkas</a>
                                            
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

    <!-- <div class="modal fade" id="anggotalModal" tabindex="-1" role="dialog" aria-labelledby="anggotaModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="anggotaModalTitle">Angota Tim Visitasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                       <?php 
                       
                       ?>
                    </p>
                </div>
            </div>
        </div>
    </div> -->
</div>