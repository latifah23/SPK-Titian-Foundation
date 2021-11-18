<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="<?php echo base_url('assets') ?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>
                    <?= $this->session->flashdata('pesan'); ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Form Create Account</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="<?php echo base_url('login/aksi_daftar'); ?>" class="needs-validation" novalidate="">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input id="nama" type="nama" class="form-control" name="nama" tabindex="1" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" type="username" class="form-control" name="username" tabindex="1" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="confirm-password" tabindex="2" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        Already have an account? <a href="<?php echo base_url('login/') ?>">Login</a>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; Stisla 2018
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>