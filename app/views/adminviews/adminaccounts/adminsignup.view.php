<?php
/**
 * header nav file combined inclusion.
 */
adminrenderpageHeader();
?>
<div class="pt-4">
	<div class="mysmbottomspace">



		<div class="card shadow-sm container-fluid border col-lg-4 col-md-6 col-sm-10 pt-2">

			<form method="post">

				<h3 id="mysignupheader"><i class="bi bi-person-circle"></i>Admin signup</h3>
				<br>
				<div class="row">
					<div class="col-md-6">
						<div class="mb-3">
							<label for="signupFullnameInput1" class="form-label">First Name
								<span class="text-danger">*</span>

							</label>
							<input
								value="<?=old_value('firstname')?>"
								name="firstname" type="text" class="form-control" id="signupFullnameInput1" required />
							<div class="text-danger">
								<?=$admin->getError('firstname')?>
							</div>
							<div class="invalid-feedback">Please enter first name</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
							<label for="signupFullnameInput2" class="form-label">last Name
								<span class="text-danger">*</span>

							</label>
							<input
								value="<?=old_value('lastname')?>"
								name="lastname" type="text" class="form-control" id="signupFullnameInput2" required />
							<div class="text-danger">
								<?=$admin->getError('lastname')?>
							</div>
							<div class="invalid-feedback">Please enter last name</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="mb-3">
							<label for="signupFullnameInput1" class="form-label">User Name
								<span class="text-danger">*</span>

							</label>
							<input
								value="<?=old_value('username')?>"
								name="username" type="text" class="form-control" id="signupFullnameInput1" required />
							<div class="text-danger">
								<?=$admin->getError('username')?>
							</div>
							<div class="invalid-feedback">Please enter first name</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
							<label for="signupFullnameInput2" class="form-label">Unique ID
								<span class="text-danger">*</span>

							</label>
							<input
								value="<?=old_value('uniqueID')?>"
								name="uniqueID" type="text" class="form-control" id="signupFullnameInput2" required />
							<div class="text-danger">
								<?=$admin->getError('uniqueID')?>
							</div>
							<div class="invalid-feedback">Please enter last name</div>
						</div>
					</div>
				</div>

				<div class="mb-3">
					<label for="signupEmailInput" class="form-label">
						Email
						<span class="text-danger">*</span>
					</label>
					<input
						value="<?=old_value('email')?>"
						name="email" type="email" class="form-control" id="signupEmailInput" required />

					<div class="text-danger">
						<?=$admin->getError('email')?>
					</div>

					<div class="invalid-feedback">Please enter email.</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="mb-3">
							<label for="formSignUpPassword" class="form-label">Password
								<span class="text-danger">*</span>
							</label>
							<div class="password-field position-relative">
								<input type="password" class="form-control fakePassword" id="formSignUpPassword"
									required
									value="<?=old_value('password')?>"
									name="password" />
								<span><i class="bi bi-eye-slash passwordToggler"></i></span>
								<div class="text-danger">
									<?=$admin->getError('password')?>
								</div>
								<div class="invalid-feedback">Please enter password.</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
							<label for="formSignUpConfirmPassword" class="form-label">Confirm Password
								<span class="text-danger">*</span>
							</label>
							<div class="password-field position-relative">
								<input type="password" class="form-control fakePassword" id="formSignUpConfirmPassword"
									required
									value="<?=old_value('confirmpassword')?>"
									name="confirmpassword" />
								<span><i class="bi bi-eye-slash passwordToggler"></i></span>
								<div class="text-danger">
									<?=$admin->getError('confirmpassword')?>
								</div>
								<div class="invalid-feedback">Please enter confirm password.</div>
							</div>
						</div>
					</div>
				</div>


				<div class="mb-3">
					<div class="mb-4 d-flex align-items-center justify-content-between">
						<div class="form-check">
							<input
								<?=old_checked('terms', 1)?>
							class="form-check-input" type="checkbox" id="signupCheckTextCheckbox" name="terms"
							value="1" required/>

							<label class="form-check-label ms-2" for="signupCheckTextCheckbox">
								<a href="#">Terms of Use</a>
								&
								<a href="#">Privacy Policy</a>
							</label>
							<div class="text-danger">
								<?=$admin->getError('terms')?>
							</div>
						</div>
					</div>
				</div>
				<div class="d-grid">
					<button class="btn btn-primary" type="submit">Sign Up</button>
				</div>
			</form>
			<div class="p-3">
				<div>
					<p>Already Registered <a
							href="<?=ROOTADMIN?>Adminsignin">Login
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
adminrendersmfooter();
adminrenderHtmlFooter();
?>