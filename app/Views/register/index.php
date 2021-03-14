<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<div class="login100-pic js-tilt" data-tilt>
				<img src="<?php echo base_url('asset/images/img-01.png') ?>" alt="IMG">

			</div>

			<form class="login100-form validate-form" action="/register/save" method="post">
				<?= csrf_field(); ?>
				<span class="login100-form-title">
					Member Register
				</span>


				<div class="wrap-input100 ">
					<input class="input100 <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" type="text" name="name" placeholder="name">


					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</span>

				</div>
				<?= $validation->getError('name'); ?>

				<div class="wrap-input100 validate-input">
					<input class="input100  <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" type="text" name="email" placeholder="Email">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</span>
				</div>
				<?= $validation->getError('email'); ?>
				<div class="wrap-input100 validate-input">

					<input class="input100  <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" type="password" name="password" placeholder="Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>
				<?= $validation->getError('password'); ?>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Create your Account
					</button>
				</div>

				<div class="text-center p-t-12">
					<span class="txt1">

						<a class="txt2" href="#">

						</a>
				</div>

				<div class="text-center p-t-136">
					<a class="txt2" href="#">

						<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
					</a>
				</div>
			</form>
		</div>
	</div>
</div>



<?= $this->endSection(); ?>