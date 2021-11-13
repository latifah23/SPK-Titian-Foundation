<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
		</div>

		<div class="card">
			<div class="card-body">
				<h1>Login berhasil !</h1>
				<h2>Hai, <?php echo $this->session->userdata("nama"); ?></h2>
				<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
			</div>
		</div>
	</section>
</div>