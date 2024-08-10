<?php
/**
 * header nav file combined inclusion.
 */
renderpageHeader();
?>


<div class="pattern">
	<div class="mysmbottomspace">

		<div class="card shadow container-fluid border col-lg-5 col-md-6 pt-2 ">

			<form method="post">

				<h3 id="mysignupheader"></i>user Login</h3>
				<br>
				<div class="mb-3">
					<label for="signinEmailInput" class="form-label">
						Email
						<span class="text-danger">*</span>
					</label>

					<input
						value="<?=old_value('email')?>"
						name="email" type="email" class="form-control" id="signinEmailInput" required />

					<div class="text-danger">
						<?=$user->getError('email')?>
					</div>
					<div class="invalid-feedback">Please enter email.</div>
				</div>
				<div class="mb-3">
					<label for="formSigninPassword" class="form-label">Password</label>
					<div class="password-field position-relative">

						<input type="password" class="form-control fakePassword" id="formSigninConfirmPassword" required
							value="<?=old_value('password')?>"
							name="password" />
							<span><i class="bi bi-eye-slash passwordToggler"></i></span>

						<div class="text-danger">
							<?=$user->getError('password')?>
						</div>
						<div class="invalid-feedback">Please enter password.</div>
					</div>
				</div>
				<div class="mb-4 d-flex align-items-center justify-content-between">
					<div class="form-check">
						<input
							<?=old_checked('terms', 1)?>
						class="form-check-input" type="checkbox" id="rememberMeCheckbox" name="terms"
						value="1" required/>
						<div class="text-danger">
							<?=$user->getError('terms')?>
						</div>
						<label class="form-check-label" for="rememberMeCheckbox">Remember me</label>

					</div>

					<div><a href="forget-password.html" class="text-primary">Forgot Password</a></div>
				</div>
				<div class="d-grid">
					<button class="btn btn-primary" type="submit">Sign In</button>
				</div>
			</form>
			<div class="p-3">
				<div>
					<p>Create account <a
							href="<?=ROOT?>Signup">Signup
							Here</a></p>
				</div>
			</div>
		</div>

	</div>

	<div>
		<?php
                /**
                 * html footer function
                 */
                // rendermainFooter();

rendersmfooter();
renderHtmlFooter();
?>
	</div>
</div>