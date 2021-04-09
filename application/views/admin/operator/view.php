<?php foreach ($operator as $data) : ?>
    <div id="main">
        <div class="card col-md-12 shadow md-5 p-3 bg-white rounded">
            <div class="card-body">
                <?php if ($data->level == 'kesmas') : ?>
                    <h3 class="card-title mb-15">Data Operator Kesmas</h3>
                    <hr>
                    <div class="row">
                        <h5 class="col-sm-4">Nama</h5>
                        <p class="col-sm-8">
                            <?php echo $data->nama; ?>
                        </p>
                    </div>
                    <div class="row">
                        <h5 class="col-sm-4">NIP</h5>
                        <p class="col-sm-8">
                            <?php echo $data->nip; ?>
                        </p>
                    </div>
                    <div class="row">
                        <h5 class="col-sm-4">Alamat Email</h5>
                        <p class="col-sm-8">
                            <?php echo $data->username; ?>
                        </p>
                    </div>
                <?php elseif ($data->level == 'visitasi') : ?>
                    <h3 class="card-title mb-15">Data Operator Visitasi</h3>
                    <p class="card-subtitle mb-30">Bertugas di
                        <span>
                            <a href="">
                                <?php echo $data->nama_puskesmas; ?>
                            </a>
                        </span>
                    </p>
                    <hr>
                    <div class="row">
                        <h5 class="col-md-4">Nama</h5>
                        <p class="col-md-8">
                            <?php echo $data->nama; ?>
                        </p>
                    </div>
                    <div class="row">
                        <h5 class="col-sm-4">NIP</h5>
                        <p class="col-sm-8">
                            <?php echo $data->nip; ?>
                        </p>
                    </div>
                    <div class="row">
                        <h5 class="col-sm-4">Alamat Email</h5>
                        <p class="col-sm-8">
                            <?php echo $data->username; ?>
                        </p>
                    </div>
                    <br>
                   
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>