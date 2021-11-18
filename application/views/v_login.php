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
                            <h4>Form Login</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo base_url('login/aksi_login'); ?>" class="needs-validation" novalidate="">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" type="username" class="form-control" name="username" tabindex="1" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your Username
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <select name="level" id="" class="form-control" tabindex="3">
                                        <option value="manajer">Manajer</option>
                                        <option value="admin">Admin</option>
                                        <option value="superadmin">Superadmin</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        Don't have an account? <a href="<?php echo base_url('login/register') ?>">Buat akun</a>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; Stisla 2018
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>