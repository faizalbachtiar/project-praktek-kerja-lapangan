<div id="main">
    <div class="card col-md-12 shadow md-5 p-3 bg-white rounded">
        <div class="card-body">
            <h2 class="card-title">List Operator</h2>
            <p class="text-muted card-subtitle mb-30">Pada bagian ini berisi keseluruhan data operator baik operator Bidang Kesmas dan operator Visitasi.</p>
            <button type="button" class="btn btn-primary mb-30" data-toggle="modal" data-target="#createadminmodal">Tambah Operator</button>

            <?php if ($this->session->flashdata('admin_success')) : ?>
                <?php echo '<p class="alert alert-success p-2 mb-30">' . $this->session->flashdata('admin_success') . '</p>'; ?>
            <?php endif; ?>
            <?php if ($this->session->flashdata('admin_failed')) : ?>
                <?php echo '<p class="alert alert-danger p-2 mb-30">' . $this->session->flashdata('admin_failed') . '</p>'; ?>
            <?php endif; ?>
            <?php if ($this->session->flashdata('nip_exist')) : ?>
                <?php echo '<p class="alert alert-danger p-2 mb-30">' . $this->session->flashdata('nip_exist') . '</p>'; ?>
            <?php endif; ?>
            <?php if ($this->session->flashdata('admin_pass_success')) : ?>
                <?php echo '<p class="alert alert-success p-2 mb-30">' . $this->session->flashdata('admin_pass_success') . '</p>'; ?>
            <?php endif; ?>
            <?php if ($this->session->flashdata('admin_pass_failed')) : ?>
                <?php echo '<p class="alert alert-danger p-2 mb-30">' . $this->session->flashdata('admin_pass_failed') . '</p>'; ?>
            <?php endif; ?>
            <!-- Search Bar -->
            <div class="search-area form-group">
                <input class="col-md-6 form-control mb-30" type="text" name="searchadmin" id="searchadmin" placeholder="Operator mana yang ingin anda lihat">
            </div>
            <div class="table-responsive-md">
                <div id="resultadmin" class="resultadmin"></div>
            </div>
        </div>
    </div>
</div>

<!-- Create Admin Modal -->
<div class="modal fade" id="createadminmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Operator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-3">
                <h6>Jenis Operator</h6>
                <div class="radio-area" id="radio-area" name="type">
                    <input type="radio" id="radio1" name="radios" value="all" onclick="javascript:adminCategory();" checked>
                    <label for="radio1">OP Bidang Kesmas</label>
                    <input type="radio" id="radio2" name="radios" value="all" onclick="javascript:adminCategory();">
                    <label for="radio2">OP Visitasi</label>
                </div>
                <div class="form-group" id="fieldvisitasi" style="display: none; ">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('admin/create_visitasi'); ?>
                    <p class="text-muted">Puskesmas</p>
                    <select class="form-control" name="selectpuskesmas" id="selectpuskesmas" class="col-md-12 mb-30">
                        <?php foreach ($puskesmas as $data) : ?>
                            <option value="<?php echo $data['id_puskesmas']; ?>">
                                <?php echo $data['nama_puskesmas']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="form-group">
                        <label for="nip" class="text-muted">NIP</label>
                        <div class="mt-10">
                            <input type="text" name="nip" id="nip" required class="single-input form-control"onkeypress="return number(event)">
                            <input type="hidden" name="levelvisit" value="visitasi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="text-muted">Nama</label>
                        <div class="mt-10">
                            <input type="text" name="nama" id="nama" required class="single-input form-control">
                        </div>
                    </div>
                    <div class="form-group mb-30">
                        <label for="email" class="text-muted">Email</label>
                        <div class="mt-10">
                            <input type="email" name="email" id="email" required class="single-input form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Buat Akun</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="form-group" id="fieldkesmas" style="display: block; ">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('admin/create_kesmas'); ?>
                    <div class="form-group">
                        <label for="nip" class="text-muted">NIP</label>
                        <div class="mt-10">
                            <input type="text" name="nip" id="nip" required class="single-input form-control" onkeypress="return number(event)">
                            <input type="hidden" name="levelvisit" value="visitasi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="text-muted">Nama</label>
                        <div class="mt-10">
                            <input type="text" name="nama" id="nama" required class="single-input form-control">
                        </div>
                    </div>
                    <div class="form-group mb-30">
                        <label for="email" class="text-muted">Email</label>
                        <div class="mt-10">
                            <input type="email" name="email" id="email" required class="single-input form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Buat Akun</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function number(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        } else {
            return true;
        }
    }
</script>
   <script type="text/javascript">
        $(document).ready(function() {
        searchadmin();
        function searchadmin(query) {
        console.log('ok')
        $.ajax({
        url: "<?php echo base_url(); ?>Admin/search",
        method: "POST",
        data: {
            query: query
        },
        success: function(data) {
            $('#resultadmin').html(data);
        }
    });
}

$('#searchadmin').keyup(function() {
    var search = $(this).val();
    if (search != '') {
        searchadmin(search);
    } else {
        searchadmin();
    }
});
        });
    </script>