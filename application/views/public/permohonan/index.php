<!-- <script src="<?php echo base_url(); ?>assets/js/permohonan.js"></script> -->
<?php if ($this->session->userdata('level') == 'pengguna') : ?>
    <section class="section_gap">
        <div class="container">
            <div class="content-area">
                <!-- content header -->
                <div class="card col-md-12 mb-30 shadow p-3 bg-white rounded">
                    <div class="card-body">
                        <h1 class="card-title title_color">
                            Permohonan
                        </h1>
                        <p class="card-subtitle mb-2 text-muted text-area">
                            Pada bagian ini berisi mengenai permohonan yang pernah anda ajukan, anda dapat melihat informasi permohonan dan jadwal visitasi untuk penilaian
                        </p>
                    </div>
                </div>

                <div class="card col-md-12 shadow p-3 bg-white rounded">
                    <div class="card-body">
                        <div class="search-area form-group mb-30">
                            <input class="col-md-6 form-control" type="text" name="spsearchpermohonan" id="spsearchpermohonan" placeholder="Permohonan mana yang ingin anda cari">
                        </div>

                        <div class="col-md-12">
                            <div class="table-responsive-md">
                                <div id="sp_permohonan_result" class="sp_permohonan_result"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function() {
            s_p_permohonan();

            function s_p_permohonan(query) {
                $.ajax({
                    url: "<?php echo base_url(); ?>permohonan/search",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#sp_permohonan_result').html(data);
                    }
                })
            }
            // live search data permohonan
            $('#spsearchpermohonan').keyup(function() {
                var search = $(this).val();
                if (search != '') {
                    s_p_permohonan(search);
                } else {
                    s_p_permohonan();
                }
            });
        });
    </script>
<?php elseif ($this->session->userdata('level') == 'kesmas' || $this->session->userdata('level') == 'super') : ?>
    <div id="main">
        <div class="card col-md-12 shadow md-5 p-3 bg-white rounded">
            <div class="card-body">
                <h2 class="card-title mb-30">Data Permohonan</h2>
                <!-- Flash pengajuan succes message -->
                <?php if ($this->session->flashdata('req_created')) : ?>
                    <?php echo '<p class="alert alert-success">' . $this->session->flashdata('req_created') . '</p>'; ?>
                <?php endif; ?>
                <!-- <h5 class="title">Status Permohonan</h5>
                <div class="radio-area" id="radio-area">
                    <input type="radio" id="radio1" name="radios" value="all" onclick="javascript:permohonanCategory();" checked>
                    <label for="radio1">Semua</label>
                    <input type="radio" id="radio2" name="radios" value="all" onclick="javascript:permohonanCategory();">
                    <label for="radio2">Diproses</label>
                    <input type="radio" id="radio3" name="radios" value="all" onclick="javascript:permohonanCategory();">
                    <label for="radio3">Terverfikasi</label>
                    <input type="radio" id="radio4" name="radios" value="all" onclick="javascript:permohonanCategory();">
                    <label for="radio4">Validasi</label>
                    <input type="radio" id="radio5" name="radios" value="all" onclick="javascript:permohonanCategory();">
                    <label for="radio5">Lolos</label>
                    <input type="radio" id="radio6" name="radios" value="all" onclick="javascript:permohonanCategory();">
                    <label for="radio6">Ditolak</label>
                </div> -->

                <div class="form-group col-md-6 mb-30">
                    <input type="text" name="searchpermohonan" id="searchpermohonan" class="form-control" placeholder="Permohonan mana yang anda cari">
                </div>
                <div class="col-md-12">
                    <div class="table-responsive-md">
                        <div id="permohonanresult"></div>
                    </div>
                </div>

                <script type="text/javascript">
                    $(document).ready(function() {
                        a_p_permohonan();

                        function a_p_permohonan(query) {
                            $.ajax({
                                url: "<?php echo base_url(); ?>permohonan/a_p_search",
                                method: "POST",
                                data: {
                                    query: query
                                },
                                success: function(data) {
                                    $('#permohonanresult').html(data);
                                }
                            });
                        }

                        $('#searchpermohonan').keyup(function() {
                            var search = $(this).val();
                            if (search != '') {
                                a_p_permohonan(search);
                            } else {
                                a_p_permohonan();
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
<?php elseif ($this->session->userdata('level') == 'visitasi') : ?>
    <div id="main">
        <div class="card col-md-12 shadow md-5 p-3 bg-white rounded">
            <div class="card-body">
                <h2 class="card-title mb-30">Data Permohonan</h2>
                <div class="form-group col-md-6 mb-30">
                    <input type="text" name="avsearchpermohonan" id="avsearchpermohonan" class="form-control" placeholder="Permohonan mana yang anda cari">
                </div>
                <div class="table-responsive-sm">
                    <div id="a_v_permohonan_result" class="a_v_permohonan_result"></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            verifiedpermohonan();

            function verifiedpermohonan(query) {
                $.ajax({
                    url: "<?php echo base_url(); ?>permohonan/verifiedpermohonan",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#a_v_permohonan_result').html(data);
                    }
                });
            }

            $('#avsearchpermohonan').keyup(function() {
                var search = $(this).val();
                if (search != '') {
                    verifiedpermohonan(search);
                } else {
                    verifiedpermohonan();
                }
            });
        });
    </script>
<?php endif; ?>