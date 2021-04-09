<div id="main">
    <div class="card col-md-12 shadow md-5 p-3 bg-white rounded">
        <div class="card-body">
            <h2 class="card-title mb-15">Data Pengguna</h2>
            <!-- Search Bar -->
            <div class="search-area form-group">
                <input class="col-md-6 form-control mb-30" type="text" name="searchpengguna" id="searchpengguna" placeholder="Pengguna mana yang ingin anda lihat">
            </div>
            <div class="table-responsive-md">
                <div id="resultpengguna" class="resultpengguna"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).ready(function() {
        searchpengguna();
        function searchpengguna(query) {
            console.log('ok')
            $.ajax({
            url: "<?php echo base_url(); ?>Users/fetchdata",
            method: "POST",
            data: {
            query: query
            },
            success: function(data) {
                $('#resultpengguna').html(data);
            }
        });
        }
        $('#searchpengguna').keyup(function() {
            var search = $(this).val();
            if (search != '') {
            searchpengguna(search);
            } else {
            searchpengguna();
            }
            });
        });
    </script>