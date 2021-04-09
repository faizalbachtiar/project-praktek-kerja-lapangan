<div id="main">
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
                    </table>
                    <div class="modal fade" id="anggotalModal" tabindex="-1" role="dialog" aria-labelledby="anggotaModalTitle" aria-hidden="true">
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
                                        <?php echo $data->tim_visit; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    </table>
                <?php endif; ?>
            </div>
            <a href="<?php echo base_url(); ?>jadwal">Lihat selengkapnya</a>
        </div>
    </div>

    <div class="card col-md-12 shadow md-5 mb-30 p-3 bg-white rounded mt-auto">
        <div class="card-body">
            <h3 class="card-title mb-30">Hasil Uji Lab & Tinjauan Lapangan Terbaru</h3>

            <div class="table-responsive-md mb-30">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pemohon </th>
                            <th>Usaha</th>
                            <th>Tim Visitasi</th>
                            <th>Tanggal Visitasi </th>
                            <th>Status</th>
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
                                            <p><?php echo $data->status; ?></p>
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
                    </table>
                   
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
                    </table>
                <?php endif; ?>
                <a href="<?php echo base_url(); ?>ujilab">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
</div>