<section class="section_gap">
<div class="container">
            <div class="content-area">
                <!-- content header -->
                <div class="card col-md-12 mb-30 shadow p-3 bg-white rounded">
                    <div class="card-body">
                        <h1 class="card-title title_color">
                        Hasil Penilaian
                        </h1>
                        <p class="card-subtitle mb-2 text-muted text-area">
                             Pada bagian ini berisi mengenai hasil penilaian dari visitasi dari tiap permohonan yang anda ajukan. Anda dapat melihat detail informasi hasil penilaian, mulai dari rincian hasil penilaian hingga komponen penilaian.
                        </p>
                    </div>
                </div>

                <div class="card col-md-12 shadow p-3 bg-white rounded">
                    <div class="card-body">
                        <div class="search-area form-group mb-30">
                        <input class="col-md-6 form-control mb-30" type="text" name="searchpenilaian" id="searchpenilaian" placeholder="Penilaian mana yang ingin anda cari">
                        </div>

                        <div class="col-md-12">
                            <div class="table-responsive-md">
                            <div id="r_pl_pemohon"></div>
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
                    url: "<?php echo base_url(); ?>Ujilab/search_uji",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#r_pl_pemohon').html(data);
                    }
                })
            }
            // live search data permohonan
            $('#searchpenilaian').keyup(function() {
                var search = $(this).val();
                if (search != '') {
                    s_p_permohonan(search);
                } else {
                    s_p_permohonan();
                }
            });
        });
    </script>