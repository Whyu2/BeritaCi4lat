<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<div class="login100-pic js-tilt" data-tilt>
				<img src="<?php echo base_url('asset/images/img-01.png') ?>" alt="IMG">

			</div>

			<form class="login100-form validate-form" method="post" action="/login/login_action">
				<span class="login100-form-title">
					Member Login

				</span>
				<?php if (session()->getFlashdata('pesan')) : ?>
					<div class="alert alert-success" role="alert">
						<?= session()->getFlashdata('pesan'); ?>
					</div>
				<?php endif; ?>
				<?php if (session()->getFlashdata('pesan_login')) : ?>
					<div class="alert alert-danger" role="alert">
						<?= session()->getFlashdata('pesan_login'); ?>
					</div>
				<?php endif; ?>
				<div class="wrap-input100 validate-input">
					<input class="input100 <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" type="text" name="email" placeholder="Email">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</span>
				</div>
				<?= $validation->getError('email'); ?>

				<div class="wrap-input100 <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?> validate-input" data-validate="Password is required">
					<input class="input100" type="password" name="password" placeholder="Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>
				<?= $validation->getError('password'); ?>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Login
					</button>
				</div>

				<div class="text-center p-t-12">
					<span class="txt1">
						Forgot
					</span>
					<a class="txt2" href="#">
						Username / Password?
					</a>
				</div>

				<div class="text-center p-t-136">
					<a class="txt2" href="/register/">
						Create your Account
						<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
					</a>
				</div>
			</form>
		</div>
	</div>
</div>



<?= $this->endSection(); ?>