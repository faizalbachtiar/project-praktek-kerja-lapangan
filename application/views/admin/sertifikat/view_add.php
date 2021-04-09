<div id="main">
    <div class="card col-md-12 shadow md-5 p-3 bg-white rounded">
        <div class="card-body">
            <?php if (!empty($rekap)) : ?>
                <?php foreach ($rekap as $data) : ?>
                    <h3 class="card-title mb-30"><?php echo $data->nama_usaha; ?></h3>
                    <div class="row mb-30">
                        <div class="col-md-4">
                            <h6>Pemohon</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $data->nama; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6>Alamat Usaha</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $data->alamat_usaha; ?></p>
                        </div>
                    </div>
                    <h4>Data Visitasi</h4>
                    <div class="row mb-15">
                        <div class="col-md-12">
                            <h6><?php echo $data->nama_puskesmas; ?></h6>
                        </div>
                        <div class="col-md-4">
                            <h6>Tim Visitasi</h6>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $data->tim_visit; ?></p>
                        </div>
                    </div>
                    <div class="table-responsive-md mb-30">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Jenis Berkas</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php if ($data->kategori == 'dam') : ?>
                               <tr>
                                    <td>Hasil Uji Lab</td>
                                    <td>
                                        <a href="../assets/file/berkas_visitasi/dam/uji_lab/<?php echo $data->ujilab ?>" target="_blank" class="btn btn-info">
                                            Lihat Berkas
                                        </a>
                                    </td>
                                </tr>
                            <?php elseif ($data->kategori == 'hotel') : ?>
                                <tr>
                                    <td>Hasil Uji Kelaikan</td>
                                    <td>
                                        <a href="../assets/file/berkas_visitasi/hotel/uji_kelaikan/<?php echo $data->tinjauan ?>" target="_blank" class=" btn btn-info">
                                            Lihat Berkas
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hasil Uji Lab</td>
                                    <td>
                                        <a href="../assets/file/berkas_visitasi/hotel/uji_lab/<?php echo $data->ujilab ?>" target="_blank" class="btn btn-info">
                                            Lihat Berkas
                                        </a>
                                    </td>
                                </tr>
                            <?php elseif ($data->kategori == 'jasaboga') : ?>
                                <tr>
                                    <td>Hasil Uji Kelaikan</td>
                                    <td>
                                        <a href="../assets/file/berkas_visitasi/jasaboga/uji_kelaikan/<?php echo $data->tinjauan ?>" target="_blank" class=" btn btn-info">
                                            Lihat Berkas
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hasil Uji Lab</td>
                                    <td>
                                        <a href="../assets/file/berkas_visitasi/jasaboga/uji_lab/<?php echo $data->ujilab ?>" target="_blank" class="btn btn-info">
                                            Lihat Berkas
                                        </a>
                                    </td>
                                </tr>
                            <?php elseif ($data->kategori == 'tpm') : ?>
                                <tr>
                                    <td>Hasil Uji Kelaikan</td>
                                    <td>
                                        <a href="../assets/file/berkas_visitasi/tpm/uji_kelaikan/<?php echo $data->tinjauan ?>" target="_blank" class=" btn btn-info">
                                            Lihat Berkas
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hasil Uji Lab</td>
                                    <td>
                                        <a href="../assets/file/berkas_visitasi/tpm/uji_lab/<?php echo $data->ujilab ?>" target="_blank" class="btn btn-info">
                                            Lihat Berkas
                                        </a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>

                    <?php if ($this->session->userdata('level') == 'kesmas') : ?>
                        <div class="form-group">
                            <a href="" class="btn btn-outline-primary p-3 mr-3">Kembali</a>
                            <a href="<?php echo base_url(); ?>csertifikat/<?php echo $data->id_permohonan; ?>" class="btn btn-success p-3">Terbitkan Sertifikat</a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="alert-danger p-3">
                    Oops .. Data yang anda cari tidak ditemukan pada penyimpanan :(
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>