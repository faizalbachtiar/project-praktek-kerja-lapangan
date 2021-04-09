<?php if ($this->session->userdata('level') == 'super') : ?>
    <div id="leftsidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn mt-3" onclick="closeNav()">&times;</a>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>super/dashboard">
                <i class="fa fa-fw fa-home mr-3"></i>
                Dashboard
            </a>
        </li>
        <li class="item-header">Permohonan</li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>permohonan">
                <i class="fas fa-file-alt mr-3"></i>
                List Permohonan
            </a>
        </li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>ujilab">
                <i class="far fa-folder mr-3"></i>
                Hasil Uji Lab
            </a>
        </li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>sertifikat">
                <i class="far fa-file-alt mr-3"></i>
                Sertifikat
            </a>
        </li>
        <li class="item-header">User</li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>operator">
                <i class="far fa-id-badge mr-3"></i>
                Administrator
            </a>
        </li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>pengguna">
                <i class="far fa-user mr-3"></i>
                Pengguna
            </a>
        </li>
        <li class="item-header">Jadwal</li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>jadwal">
                <i class="far fa-calendar-alt mr-3"></i>
                Jadwal Visitasi
            </a>
        </li>
        <li class="item-header">Tambah </li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>puskesmas">
                 <i class=""></i>
                Tambah Puskesmas
            </a>
        </li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>kecamatan">
                 <i class=""></i>
                Tambah Kecamatan
            </a>
        </li>
        
        <li class="item-header">Akun</li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>superadmin/logout">
                <i class="fas fa-power-off mr-3"></i>
                Logout
            </a>
        </li>
    </div>
<?php elseif ($this->session->userdata('level') == 'kesmas') : ?>
    <div id="leftsidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn mt-3" onclick="closeNav()">&times;</a>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-fw fa-home mr-3"></i>
                Dashboard
            </a>
        </li>
        <li class="item-header">Permohonan</li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>cpermohonan">
                <i class=""></i>
                Tambah Permohonan
            </a>
        </li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>permohonan">
                <i class="fas fa-file-alt mr-3"></i>
                List Permohonan
            </a>
        </li>
        <li class="item-link">
            <a href="<?php echo site_url('Permohonan/download'); ?>">
                <i class="fas fa-download mr-2"></i>
                Unduh Berkas Persyaratan
            </a>
        </li>
        <li class="item-header">Visitasi</li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>jadwal">
                <i class="far fa-calendar-alt mr-3"></i>
                Lihat Jadwal
            </a>
        </li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>ajadwal">
                <i class="glyphicon glyphicon-plus-sign"></i>
                Tambah Jadwal
            </a>
        </li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>ujilab">
                <i class="far fa-folder mr-3"></i>
                Hasil Uji Lab
            </a>
        </li>
        <li class="item-header">Sertifikat</li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>sertifikat">
                <i class="glyphicon glyphicon-calendar"></i>
                Lihat Sertifikat
            </a>
        </li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>asertifikat">
                <i class="glyphicon glyphicon-plus-sign"></i>
                Tambah Sertifikat
            </a>
        </li>
        <li class="item-header">Laporan</li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>laporan">
                <i class="glyphicon glyphicon-plus-sign"></i>
                Laporan Permohonan Sanitasi
            </a>
        </li>
        <li class="item-header">Akun</li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>admin/logout">
                <i class="fas fa-power-off mr-3"></i>
                Logout
            </a>
        </li>
    </div>
<?php elseif ($this->session->userdata('level') == 'visitasi') : ?>
    <div id="leftsidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn mt-3" onclick="closeNav()">&times;</a>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-fw fa-home mr-3"></i>
                Dashboard
            </a>
        </li>
        <li class="item-header">Permohonan</li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>permohonan">
                <i class="fas fa-file-alt mr-3"></i>
                List Permohonan
            </a>
        </li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>ujilab">
                <i class="far fa-folder mr-3"></i>
                Hasil Uji Lab & Tinjauan
            </a>
        </li>
        <li class="item-header">Jadwal Visitasi</li>
        <li class="item-link">
            <a href="<?php echo site_url('vistasi/download') ?>">
                <i class="fas fa-download mr-3"></i>
                Unduh Berkas Visitasi
            </a>
        </li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>jadwal">
                <i class="far fa-calendar-alt mr-3"></i>
                Lihat Jadwal
            </a>
        </li>
        <li class="item-header">Akun</li>
        <li class="item-link">
            <a href="<?php echo base_url(); ?>admin/logout">
                <i class="fas fa-power-off mr-3"></i>
                Logout
            </a>
        </li>
    </div>
<?php endif; ?>