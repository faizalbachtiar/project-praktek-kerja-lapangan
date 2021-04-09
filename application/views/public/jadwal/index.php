<?php if ($this->session->userdata('level') === 'pengguna') : ?>
    <section class="section_gap">
        <div class="container">
            <div class="card col-md-12 mb-30 mt-20 shadow p-3 bg-white rounded">
                <div class="card-body">
                    <h2 class="card-title title_color mb-30">Jadwal Visitasi</h2>
                    <p class="card-subtitle text-muted">
                        Pada bagian ini berisi mengenai jadwal visitasi untuk melakukan penilaian terhadap usaha yang diajukan oleh pemohon. Anda dapat melakukan pencarian mengenai jadwal visitasi dari tiap Puskesmas di Kota Malang dan detail mengenai jadwal tersebut.
                    </p>
                </div>
            </div>
            <div class="card col-md-12 mb-20 shadow p-3 bg-white rounded">
                <div class="card-body">
                    <h2 class="card-title mb-30">Jadwal Visitasi</h2>
                    <div class="search-area form-group">
                        <input class="col-md-6 form-control" id="searchjadwal" name="searchjadwal" type="text" placeholder="Saya ingin mencari jadwal">
                    </div>

                    <div class="table-responsive">
                        <div id="resultjadwal"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- live search script -->
    <script type="text/javascript">
        $(document).ready(function() {
            s_p_jadwal();

            function s_p_jadwal(query) {
                $.ajax({
                    url: "<?php echo base_url(); ?>Jadwal/fetchdata",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#resultjadwal').html(data);
                    }
                });
            }

            $('#resultjadwal').keyup(function() {
                var search = $(this).val();
                if (search != '') {
                    s_p_jadwal(search);
                } else {
                    s_p_jadwal();
                }
            });
        });
    </script>
<?php elseif ($this->session->userdata('level') === 'kesmas' || $this->session->userdata('level') == 'super') : ?>
    <div id="main">
        <div class="card col-md-12 shadow md-5 p-3 bg-white rounded">
            <div class="card-body">
                <h2 class="card-title mb-30">Jadwal visitasi</h2>
                <?php if ($this->session->flashdata('succes_jadwal')) : ?>
                    <?php echo '<p class="alert alert-success p-2 mb-30">' . $this->session->flashdata('succes_jadwal') . '</p>'; ?>
                <?php endif; ?>
                <div class="search-area form-group">
                    <input class="col-md-6 form-control" type="text" name="akssearchjadwal" id="akssearchjadwal" placeholder="Saya ingin mencari jadwal">
                </div>

                <div class="table-responsive-sm">
                    <div id="aks_jadwalvisitasi"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- live search script -->
    <script type="text/javascript">
        $(document).ready(function() {
            searchjadwalaks();

            function searchjadwalaks(query) {
                $.ajax({
                    url: "<?php echo base_url(); ?>Jadwal/aks_jadwalsearch",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#aks_jadwalvisitasi').html(data);
                    }
                });
            }

            $('#akssearchjadwal').keyup(function() {
                var search = $(this).val();
                if (search != '') {
                    searchjadwalaks(search);
                } else {
                    searchjadwalaks();
                }
            });
        });
    </script>
<?php elseif ($this->session->userdata('level') == 'visitasi') : ?>
    <div id="main">
        <div class="card col-md-12 shadow md-5 p-3 bg-white rounded">
            <div class="card-body">
                <h2 class="card-title mb-30">Jadwal visitasi</h2>
                <div class="search-area form-group">
                    <input class="col-md-6 form-control" type="text" name="" id="s_v_jadwal" placeholder="Saya ingin mencari jadwal">
                </div>

                <div class="table-responsive-sm">
                    <div id="avisit_jadwalvisitasi"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- live search script -->
    <script type="text/javascript">
        $(document).ready(function() {
            searchjadwal();

            function searchjadwal(query) {
                $.ajax({
                    url: "<?php echo base_url(); ?>Jadwal/avisit_jadwalsearch",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#avisit_jadwalvisitasi').html(data);
                    }
                });
            }

            $('#s_v_jadwal').keyup(function() {
                var search = $(this).val();
                if (search != '') {
                    searchjadwal(search);
                } else {
                    searchjadwal();
                }
            });
        });
    </script>
<?php else : ?>
    <section class="section_gap">
        <div class="container">
            <div class="card col-md-12 mb-30 mt-20 shadow p-3 bg-white rounded">
                <div class="card-body">
                    <h2 class="card-title title_color mb-30">Jadwal Visitasi</h2>
                    <p class="card-subtitle text-muted">
                        Pada bagian ini berisi mengenai jadwal visitasi untuk melakukan penilaian terhadap usaha yang diajukan oleh pemohon. Anda dapat melakukan pencarian mengenai jadwal visitasi dari tiap Puskesmas di Kota Malang dan detail mengenai jadwal tersebut.
                    </p>
                </div>
            </div>
            <div class="card col-md-12 mb-20 shadow p-3 bg-white rounded">
                <div class="card-body">
                    <div class="search-area form-group mb-30">
                        <input class="col-md-6 form-control" id="s_u_jadwal" name="s_u_jadwal" type="text" placeholder="Saya ingin mencari jadwal">
                    </div>

                    <div class="table-responsive mb-30">
                        <div id="u_resultjadwal"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- live search script -->
    <script type="text/javascript">
        $(document).ready(function() {
            s_u_jadwal();

            function s_u_jadwal(query) {
                $.ajax({
                    url: "<?php echo base_url(); ?>Jadwal/s_u_jadwalsearch",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#u_resultjadwal').html(data);
                    }
                });
            }

            $('#s_u_jadwal').keyup(function() {
                var search = $(this).val();
                if (search != '') {
                    s_u_jadwal(search);
                } else {
                    s_u_jadwal();
                }
            });
        });
    </script>
<?php endif; ?>

<!-- <script src="<?php echo base_url(); ?>assets/js/jadwal.js"></script> -->