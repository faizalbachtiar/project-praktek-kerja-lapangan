<!-- <script src="<?php echo base_url(); ?>assets/js/permohonan.js"></script> -->
<div id="main">
    <div class="card col-md-12 shadow md-5 p-3 mb-30 bg-white rounded">
        <div class="card-body">
            <h2 class="card-title">Penerbitan Sertifikat</h2>
            <p class="text-muted">Silahkan pilih permohonan untuk penerbitan sertifikat</p>
        </div>
    </div>

    <div class="card col-md-12 shadow md-5 p-3 mb-30 bg-white rounded">
        <div class="card-body">
            <div class="search-area form-group mb-30">
                <input class="col-md-6 form-control" id="searchpermohonan" name="searchpermohonan" type="text" placeholder="Saya ingin membuat sertifikat untuk">
            </div>

            <div class="table-responsive-md">
                <div id="permohonanresult"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        searchujilab();

        function searchujilab(query) {
            $.ajax({
                url: "<?php echo base_url(); ?>Permohonan/permohonan_validasi",
                method: "POST",
                data: {
                    query: query,
                    // username: username
                },
                success: function(data) {
                    $('#permohonanresult').html(data);
                }
            });
        }

        $('#searchpermohonan').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                searchujilab(search);
            } else {
                searchujilab();
            }
        });
    });
</script>