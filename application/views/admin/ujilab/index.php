<?php if ($this->session->userdata('level') == 'kesmas' || $this->session->userdata('level') == 'super') : ?>
    <div id="main">
        <div class="card col-md-12 shadow md-5 p-3 bg-white rounded">
            <div class="card-body">
                <h2 class="card-title mb-30">Hasil Uji Labolatorium & Tinjauan Lapangan</h2>
                <div class="form-group col-md-6 mb-30">
                    <input type="text" name="searchhasiluji" id="searchhasiluji" class="form-control" placeholder="Hasil uji lab mana yang anda cari">
                </div>
            </div>

            <div class="col-md-12">
                <div class="table-responsive-md">
                    <div id="ujilabresult"></div>
                    
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            searchujilab();

            function searchujilab(query) {
                $.ajax({
                    url: "<?php echo base_url(); ?>Ujilab/akssearch",
                    method: "POST",
                    data: {
                        query: query,
                    },
                    success: function(data) {
                        $('#ujilabresult').html(data);
                    }
                });
            }

            $('#searchhasiluji').keyup(function() {
                var search = $(this).val();
                if (search != '') {
                    searchujilab(search);
                } else {
                    searchujilab();
                }
            });
        });
    </script>
<?php elseif ($this->session->userdata('level') == 'visitasi') : ?>
    <div id="main">
        <div class="card col-md-12 shadow md-5 p-3 bg-white rounded">
            <div class="card-body">
                <h2 class="card-title mb-30">Hasil Uji Labolatorium & Tinjauan Lapangan</h2>
                <?php if ($this->session->flashdata('validasi_succes')) : ?>
                            <?php echo '<p class="alert alert-success">'. $this->session->flashdata('validasi_succes') . '</p>'; ?>
                        <?php endif; ?>
                <div class="form-group col-md-6 mb-30">
                    <input type="text" name="searchavisithasiluji" id="searchavisithasiluji" class="form-control" placeholder="Hasil uji lab mana yang anda cari">
                </div>
            </div>

            <div class="col-md-12">
                <div class="table-responsive-md">
                    <div id="ujilabresult"></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            searchujilab();

            function searchujilab(query) {
                $.ajax({
                    url: "<?php echo base_url(); ?>Ujilab/avisitsearch",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#ujilabresult').html(data);
                    }
                });
            }

            $('#searchavisithasiluji').keyup(function() {
                var search = $(this).val();
                if (search != '') {
                    searchujilab(search);
                } else {
                    searchujilab();
                }
            });
        });
    </script>
<?php elseif ($this->session->userdata('level') == 'pengguna') : ?>
    <div id="main">
        <div class="card col-md-12 shadow md-5 p-3 bg-white rounded">
            <div class="card-body">
                <h2 class="card-title mb-30">Hasil Uji Labolatorium & Tinjauan Lapangan</h2>
                <div class="form-group col-md-6 mb-30">
                    <input type="text" name="searchhasiluji" id="searchhasiluji" class="form-control" placeholder="Hasil uji lab mana yang anda cari">
                </div>
            </div>

            <div class="col-md-12">
                <div class="table-responsive-md">
                    <table id="ujilabresult" class="table">
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
                        <?php if ($hasil == TRUE) : ?>
                            <?php foreach ($hasil as $data) : ?>
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
                                                <p><?php echo $data->tglvisit; ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td ng-repeat="col in columns" class="ng-scope">
                                        <div ng-switch="" on="col.renderType">
                                            <div ng-switch-when="primaryLink" class="ng-scope">
                                                <a href="" class="btn btn-primary p-3">Cek Berkas</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td ng-repeat="col in columns" class="ng-scope">
                                        <div ng-switch="" on="col.renderType">
                                            <div ng-switch-when="primaryLink" class="ng-scope">
                                                <a href="" class="btn btn-primary p-3">Cek Berkas</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php elseif ($hasil == FALSE) : ?>
                            <tr>
                                <td ng-repeat="col in columns" class="ng-scope" colspan="6">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <br>
                                            <p class="text-danger p-3 text-center"><?php echo "Tidak ada hasil Uji Lab & Tinjauan" ?></p>
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
    <script type="text/javascript">
        $(document).ready(function() {
            searchujilab();

            function searchujilab(query) {
                $.ajax({
                    url: "<?php echo base_url(); ?>Ujilab/psearch",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#ujilabresult').html(data);
                    }
                });
            }

            $('#searchhasiluji').keyup(function() {
                var search = $(this).val();
                if (search != '') {
                    searchujilab(search);
                } else {
                    searchujilab();
                }
            });
        });
    </script>
<?php endif; ?>