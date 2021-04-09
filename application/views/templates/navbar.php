<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light" id="top-menu">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">
                    <img src="http://malangkota.go.id/wp-content/uploads/2015/02/logo.png" sizes="(max-width: 64px) 100vw, 480px" width="48" height="48" alt="logo">
                </a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar_content" aria-controls="navbar_content" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse offset" id="navbar_content" style="">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <?php if (!$this->session->userdata('logged_in')) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(); ?>jadwal">Jadwal Visitasi</a>
                            </li>
                            <!-- Dropdown Persyaratan -->
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Info Persyaratan</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url(); ?>hotel/panduan">Laik Sehat Hotel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url(); ?>dam/panduan">Laik Sanitasi DAM</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url(); ?>tpm/panduan">Laik Higiene TPM & Jasaboga</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(); ?>users/login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(); ?>users/register">Register</a>
                            </li>
                        <?php endif; ?>
                        <?php if ($this->session->userdata('logged_in')) : ?>
                            <!-- Permohonan -->
                            <li class="nav-item submenu dropdown">
                                <a href="<?php echo base_url(); ?>" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Permohonan</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url(); ?>permohonan">Data permohonan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url(); ?>penilaian">Hasil Penilaian</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Pengajuan Sertifikasi -->
                            <li class="nav-item submenu dropdown">
                                <a href="<?php echo base_url(); ?>permohonan/index" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pengajuan Sertifikasi</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url(); ?>hotel/create">Laik Sehat Hotel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url(); ?>dam/create">Laik Sanitasi DAM</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url(); ?>tpm/create">Laik Higiene TPM</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url(); ?>jasaboga/create">Pendaftaran Jasaboga (Catering)</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Informasi layanan -->
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Info Layanan</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url(); ?>hotel/panduan">Laik Sehat Hotel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url(); ?>dam/panduan">Laik Sanitasi DAM</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url(); ?>tpm/panduan">Laik Higiene TPM & Jasaboga</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="<?php echo base_url(); ?>users/profile" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url(); ?>users/profile">Lihat Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a>
                                    </li>
                                </ul>
                            </li>
                            
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>