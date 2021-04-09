<section class="home_banner_area">
    <div class="banner_inner">
        <div class="container">
            <!-- Flash message user logged in -->
            <?php if ($this->session->flashdata('user_loggedin')) : ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedin') . '</p>'; ?>
            <?php endif; ?>
            <!-- Flash message user logged out -->
            <?php if ($this->session->flashdata('user_loggedout')) : ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedout') . '</p>'; ?>
            <?php endif; ?>
            <!-- Flash message user registered  -->
            <?php if ($this->session->flashdata('user_registered')) : ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedin') . '</p>'; ?>
            <?php endif; ?>
            <!-- Flash message update succes  -->
            <?php if ($this->session->flashdata('update_berhasil')) : ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('update_berhasil') . '</p>'; ?>
            <?php endif; ?>
            <!-- Flash certification request has been created -->
            <?php if ($this->session->flashdata('req_created')) : ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('req_created') . '</p>'; ?>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner_content text-center">
                        <h2 class="text-uppercase mt-4 mb-5">
                            Dinas Kesehatan
                        </h2>
                        <p class="text-uppercase">
                            Kota Malang
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="carouselLangkahSertifikasi" class="carousel slide" data-ride="carousel">
    <div class="text-center">
        <h2 class="title_color p-1">Alur Pengajuan Sertifikasi</h2>
        <br>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item col-md-6 offset-md-3 active" data-interval="4000">
            <div class="card text-center shadow mb-5 bg-white rounded">
                <div class="card-body">
                    <h5 class="card-title">1. Registrasi Akun</h5>
                    <hr>
                    <p class="card-text">Anda harus memiliki akun pada website ini untuk dapat mengajukan permohonan sertifikasi.</p>
                    <a href="<?php echo base_url(); ?>users/register" class="btn primary-btn">Daftar Akun Sekarang</a>
                </div>
            </div>
        </div>
        <div class="carousel-item col-md-6 offset-md-3" data-interval="4000">
            <div class="card text-center shadow mb-5 bg-white rounded">
                <div class="card-body">
                    <h5 class="card-title">2. Lengkapi Berkas</h5>
                    <hr>
                    <p class="card-text">Lengkapi berkas kelengkapan sesuai dengan kategori sertifikasi.</p>
                    <a href="#" class="btn primary-btn">Lihat Persyaratan</a>
                </div>
            </div>
        </div>
        <div class="carousel-item col-md-6 offset-md-3" data-interval="4000">
            <div class="card text-center shadow mb-5 bg-white rounded">
                <div class="card-body">
                    <h5 class="card-title">3. Menunggu Hasil Validasi</h5>
                    <hr>
                    <p class="card-text">Mohon bersabar, silahkan menunggu pemberitahuan lebih lanjut mengenai hasil validasi permohonan anda.</p>
                </div>
            </div>
        </div>
        <div class="carousel-item col-md-6 offset-md-3" data-interval="4000">
            <div class="card text-center shadow mb-5 bg-white rounded">
                <div class="card-body">
                    <h5 class="card-title">4. Tunggu Jadwal Visitasi</h5>
                    <hr>
                    <p class="card-text">Silahkan menunggu pemberitahuan lebih lanjut mengenai jadwal visitasi permohonan sertifikasi anda.</p>
                    <a href="#" class="btn primary-btn">Lihat Jadwal Visitasi Anda</a>
                </div>
            </div>
        </div>
        <div class="carousel-item col-md-6 offset-md-3" data-interval="4000">
            <div class="card text-center shadow mb-5 bg-white rounded">
                <div class="card-body">
                    <h5 class="card-title">5. Penerbitan Sertifikat</h5>
                    <br>
                    <p class="card-text">Jika permohonan anda lolos uji, sertifikat akan terbit. Silahkan hubungi Dinas Kesehatan Kota Malang untuk info lebih lanjut.</p>
                    <a href="#" class="btn primary-btn">Hubungi Dinas Kesehatan Kota Malang</a>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselLangkahSertifikasi" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselLangkahSertifikasi" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container panduan">
    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="display-4 font-weight-normal col-md-12 text-center mb-30">
            <h2 class="title_color">Persyaratan Permohonan Sertifikasi</h2>
        </div>
        <div class="col-lg-4">
            <svg class="bd-placeholder-img rounded-circle mb-20" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
            </svg>
            <h2 class="title_color">DAM</h2>
            <p>Sertifikasi Depot Air Minum (DAM) bertujuan untuk ...</p>
            <p><a class="btn white_bg_btn" href="#" role="button">Lihat persyaratan »</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <svg class="bd-placeholder-img rounded-circle mb-20" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
            </svg>
            <h2 class="title_color">Hotel</h2>
            <p>Sertifikasi Laik Sanitasi Hotel diperlukan dengan tujuan ...</p>
            <p><a class="btn white_bg_btn" href="#" role="button">Lihat persyaratan »</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <svg class="bd-placeholder-img rounded-circle mb-20" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
            </svg>
            <h2 class="title_color">TPM</h2>
            <p>Tempat Penyedia Makan (TPM) memerlukan sertifikasi demi ...</p>
            <p><a class="btn white_bg_btn" href="#" role="button">Lihat persyaratan »</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</div>