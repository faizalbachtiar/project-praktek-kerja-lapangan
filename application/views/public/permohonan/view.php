<?php foreach ($permohonan as $pmh) : ?>
    <section class="section_gap">
        <div class="container">
            <div class="container_area">
                <div class="card col-md-12 shadow p-4 md-5 bg-white rounded">
                    <?php if ($pmh['kategori'] == "dam") : ?>
                        <section class="content-header">
                            <h2><?php echo $pmh['nama_usaha']; ?></h2>
                        </section>
                        <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-primary" style="padding-top:15px">
                                        <div class="box-body">
                                            <div class="row detail_permohonan">
                                                <h3 class="col-md-12">Data Pemohon</h3>
                                                <div class="col-md-4">
                                                    <h4>Nama Pemohon</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['nama']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>Umur</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['umur']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>NIK Pemohon</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['nik_pemohon']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>Alamat Rumah</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['alamat_rumah']; ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row detail_permohonan">
                                                <h3 class="col-md-12">Data Depot Air Minum (DAM)</h3>
                                                <div class="col-md-4">
                                                    <h4>Nama DAM</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['nama_usaha']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>Alamat DAM</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['alamat_usaha']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>Nomor Telepon DAM</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['notelp_usaha']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php elseif ($pmh['kategori'] == "hotel") : ?>
                        <section class="content-header">
                            <h2><?php echo $pmh['nama_usaha']; ?></h2>
                        </section>
                        <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-primary" style="padding-top:15px">
                                        <div class="box-body">
                                            <div class="row detail_permohonan">
                                                <h3 class="col-md-12">Data Pemohon</h3>
                                                <div class="col-md-4">
                                                    <h4>Nama Pemohon</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['nama']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>Kewarganegaraan</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['kewarganegaraan']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>NIK Pemohon</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['nik_pemohon']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>Alamat Rumah</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['alamat_rumah']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>Nomor Telepon</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['notelp_pemohon']; ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row detail_permohonan">
                                                <h3 class="col-md-12">Data Hotel</h3>
                                                <div class="col-md-4">
                                                    <h4>Nama Perusahaan</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['nama_kantor']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>Alamat Perusahaan</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['alamat_kantor']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>Nama Hotel</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['nama_usaha']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>Alamat Hotel</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['alamat_usaha']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>Nomor Telepon Hotel</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['notelp_usaha']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>Nomor Handphone</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['noHP_usaha']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php elseif ($pmh['kategori'] == "jasaboga") : ?>
                        <section class="content-header">
                            <h2><?php echo $pmh['nama_usaha']; ?></h2>
                        </section>
                        <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-primary" style="padding-top:15px">
                                        <div class="box-body">
                                            <div class="row detail_permohonan">
                                                <h3 class="col-md-12">Data Pemohon</h3>
                                                <div class="col-md-4">
                                                    <h4>Nama Pemohon</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['nama']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>NIK Pemohon</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['nik_pemohon']; ?></p>
                                                </div>
                                                <hr>
                                                <div class="row detail_permohonan">
                                                    <h3 class="col-md-12">Data Jasaboga</h3>
                                                    <div class="col-md-4">
                                                        <h4>Nama Jasaboga</h4>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p><?php echo $pmh['nama_usaha']; ?></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h4>Alamat Jasaboga</h4>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p><?php echo $pmh['alamat_usaha']; ?></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h4>Tahun Produksi</h4>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p><?php echo $pmh['tahun_produksi']; ?></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h4>Kecamatan</h4>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p><?php echo $pmh['kecamatan_usaha']; ?></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h4>Nomor Telepon Jasaboga</h4>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p><?php echo $pmh['notelp_usaha']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </section>
                    <?php elseif ($pmh['kategori'] == "tpm") : ?>
                        <section class="content-header">
                            <h2><?php echo $pmh['nama_usaha']; ?></h2>
                        </section>
                        <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-primary" style="padding-top:15px">
                                        <div class="box-body">
                                            <div class="row detail_permohonan">
                                                <h3 class="col-md-12">Data Pemohon</h3>
                                                <div class="col-md-4">
                                                    <h4>Nama Pemohon</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['nama']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>NIK Pemohon</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['nik_pemohon']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>Alamat Rumah</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['alamat_rumah']; ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row detail_permohonan">
                                                <h3 class="col-md-12">Data Tempat Penyedia Makan (TPM)</h3>
                                                <div class="col-md-4">
                                                    <h4>Nama TPM</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['nama_usaha']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>Alamat TPM</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['alamat_usaha']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>Kelurahan</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['kelurahan_usaha']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>Kecamatan</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['kecamatan_usaha']; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>Nomor Telepon TPM</h4>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $pmh['notelp_usaha']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <?php endif; ?>
                    <?php if ($pmh['status'] == 'terverifikasi') : ?>
                        <button type="button" class="btn btn-warning p-3" data-toggle="modal" data-target="#jadwalmodal">Lihat Jadwal</button>
                    <?php elseif ($pmh['status'] == 'validasi') : ?>
                        <?php if($pmh['kategori']=='dam') : ?>
                        <?php foreach ($rekap as $rkp) : ?>
                        <tr>
                                    <td>Hasil Uji Lab</td>
                                    <td>
                                        <a href="../../assets/file/berkas_visitasi/dam/uji_lab/<?php echo $rkp['ujilab'] ?>" target="_blank" class="btn btn-info">
                                            Lihat Berkas
                                        </a>
                                    </td>
                        </tr>
                        <?php endforeach; ?>                        
                    <?php elseif($pmh['kategori']=='tpm') : ?>
                            <?php foreach ($rekap as $rkp) : ?>
                            <tr>
                                    <td>Hasil Uji Kelaikan</td>
                                    <td>
                                        <a href="../../assets/file/berkas_visitasi/tpm/uji_kelaikan/<?php echo $rkp['tinjauan']  ?>" target="_blank" class=" btn btn-info">
                                            Lihat Berkas
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hasil Uji Lab</td>
                                    <td>
                                        <a href="../../assets/file/berkas_visitasi/tpm/uji_lab/<?php echo $rkp['ujilab']  ?>" target="_blank" class="btn btn-info">
                                            Lihat Berkas
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?> 
                    <?php elseif($pmh['kategori']=='hotel') : ?>
                        <?php foreach ($rekap as $rkp) : ?>
                        <tr>
                                    <td>Hasil Uji Kelaikan</td>
                                    <td>
                                        <a href="../../assets/file/berkas_visitasi/hotel/uji_kelaikan/<?php echo $rkp['tinjauan'] ?>" target="_blank" class=" btn btn-info">
                                            Lihat Berkas
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hasil Uji Lab</td>
                                    <td>
                                        <a href="../../assets/file/berkas_visitasi/hotel/uji_lab/<?php echo $rkp['ujilab'] ?>" target="_blank" class="btn btn-info">
                                            Lihat Berkas
                                        </a>
                                    </td>
                        </tr>
                        <?php endforeach; ?> 
                    <?php elseif($pmh['kategori']=='jasaboga') : ?>
                        <?php foreach ($rekap as $rkp) : ?>
                        <tr>
                                    <td>Hasil Uji Kelaikan</td>
                                    <td>
                                        <a href="../../assets/file/berkas_visitasi/jasaboga/uji_kelaikan/<?php echo $rkp['tinjauan'] ?>" target="_blank" class=" btn btn-info">
                                            Lihat Berkas
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hasil Uji Lab</td>
                                    <td>
                                        <a href="../../assets/file/berkas_visitasi/jasaboga/uji_lab/<?php echo $rkp['ujilab']  ?>" target="_blank" class="btn btn-info">
                                            Lihat Berkas
                                        </a>
                                    </td>
                                </tr>
                        <?php endforeach; ?> 
                        <?php endif;?>
                        
                    <?php elseif ($pmh['status'] == 'ditolak') : ?>
                        <p class=" alert-danger p-3">Permohonan ini telah ditolak.
                            <span>
                                <strong><a data-toggle="modal" data-target="#keteranganmodal">Lihat keterangan.</a></strong>
                            </span>
                        </p>
                    <?php elseif ($pmh['status'] == 'selesai') : ?>
                        <button type="button"class="btn btn-success p-2" data-toggle="modal" data-target="#selesaimodal">Sertifikat Sudah Diterbitkan</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>  
    <!---- selesai modal------>
    <div class="modal fade" id="selesaimodal" tabindex="-1" role="dialog" aria-labelledby="selesaimodaltitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Pengumuman : </p>
                        <p align="center">
                            Silahkan Ambil Sertifikat Di Kantor Dinas Kesehatan Kota Malang    
                        </p> 
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
<?php endforeach; ?>
<script src="<?php echo base_url(); ?>assets/js/permohonan.js"></script>