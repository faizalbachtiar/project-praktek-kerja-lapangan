<div id="main">
    <div class="card col-md-12 shadow md-5 p-3  mb-30 bg-white rounded">
        <div class="card-body">
            <h2 class="card-title mb-30">Tambah Jadwal</h2>
            <p class="card-subtitle text-muted"> Silahkan pilih permohonan untuk divalidasi terlebih dahulu.</p>
        </div>
    </div>

    <div class="card col-md-12 shadow md-5 p-3  mb-30 bg-white rounded">
        <div class="card-body">
            <!-- search field -->
            <div class="search-area form-group mb-30">
                <input class="col-md-6 form-control" id="searchnewpermohonan" name="searchnewpermohonan" type="text" placeholder="Permohonan yang akan saya validasi">
            </div>

            <!-- result field -->
            <div class="col-md-12">
                <div class="table-responsive-md">
                    <div id="newpermohonanresult"></div>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        searchjadwal();

        function searchjadwal(query) {
            $.ajax({
                url: "<?php echo base_url(); ?>permohonan/aks_newpermohonansearch",
                method: "POST",
                data: {
                    query: query
                },
                success: function(data) {
                    $('#newpermohonanresult').html(data);
                }
            });
        }

        $('#searchnewpermohonan').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                searchjadwal(search);
            } else {
                searchjadwal();
            }
        });
    });
</script>