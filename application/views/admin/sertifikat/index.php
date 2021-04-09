<div id="main">
    <div class="card col-md-12 shadow md-5 p-3 bg-white rounded">
        <div class="card-body">
            <h2 class="card-title mb-30">Data Sertifikat Pemohon</h2>
            <!-- Flash user logged out message -->
            <?php if ($this->session->flashdata('sertifikat_succes')) : ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('sertifikat_succes') . '</p>'; ?>
            <?php endif; ?>

            <!-- Search Bar -->
            <div class="search-area form-group">
                <input class="col-md-6 form-control mb-30" type="text" name="searchsertifikat" id="searchsertifikat" placeholder="Sertifikat mana yang ingin anda lihat">
            </div>
            <!-- Main Content -->
            <div class="table-responsive-md">
                <div id="sertifikatresult"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        searchsertifikat();

        function searchsertifikat(query) {
            $.ajax({
                url: "<?php echo base_url(); ?>Sertifikat/search",
                method: "POST",
                data: {
                    query: query
                },
                success: function(data) {
                    $('#sertifikatresult').html(data);
                }
            });
        }

        $('#searchsertifikat').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                searchsertifikat(search);
            } else {
                searchsertifikat();
            }
        });
    });
</script>