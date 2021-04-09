<section class="section_gap">
    <div class="container">
        <div class="card col-md-6 offset-md-3 mb-20 mt-20 shadow p-3 bg-white rounded">
            <div class="card-body">
                <?php echo form_open('users/login');?>
                    <div class="col-sm-8 offset-md-2">
                        <!-- Flash user logged out message -->
                        <?php if($this->session->flashdata('user_loggedout')): ?>
                            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
                        <?php endif; ?>
                        <!-- Flash user log in failed message -->
                        <?php if($this->session->flashdata('login_failed')): ?>
                            <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
                        <?php endif; ?>
                        <h1 class="h3 mb-3 font-weight-normal">Login</h1>
                        <label for="inputEmail" class="sr-only">Email</label>
                        <div class="form-group">
                            <label for="username">username</label>
                            <input type="text" class="form-control" id="username" name="username" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="username">password</label>
                            <input type="password" class="form-control" id="password" name="password" required autofocus>
                        </div>
                        <div class="mb-3">
                            <p>Lupa password? 
                                <span>
                                    <a href="<?php echo base_url(); ?>users/forgotpass">Klik di sini</a>
                                </span>
                            </p>
                        </div>
                        <button type="submit" class="btn primary-btn btn-block">
                            login
                        </button>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>