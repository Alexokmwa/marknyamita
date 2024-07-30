<?php
/**
 * header nav file combined inclusion.
 */
adminrenderpageHeader();
?>
<!-- **************** MAIN CONTENT START **************** -->
<main class="mysmbottomspace">

<!-- =======================
Main contain START -->
<section class="py-4">
	<div class="container">
	 
    <div class="row g-4">
      <!-- Profile cover and info START -->
      <div class="col-12">
        <div class="card mb-4 position-relative z-index-9">
          <!-- Cover image -->
          <div class="py-5 h-200 rounded" style="background-image:url(<?=get_imageadmin()?>); background-position: center bottom; background-size: cover; background-repeat: no-repeat;">
          </div>
          <div class="card-body pt-3 pb-0">
            <div class="row d-flex justify-content-between">
                
              <!-- Avatar -->
              <div class="col-sm-12 col-md-auto text-center text-md-start">
              <div class="position-absolute top-0 end-0  z-index-9">
                    <a class="btn btn-sm btn-light btn-round mb-0 mt-n1 me-n1" href="#"> <i class="bi bi-pencil"></i> </a>
                  </div>
                <div class="avatar avatar-xxl mt-n5">
                <div class="position-absolute top-0 end-0  z-index-9">
                    <a class="btn btn-sm btn-light btn-round mb-0 mt-n1 me-n1" href="#"> <i class="bi bi-pencil"></i> </a>
                  </div>
                  <img class="avatar-img rounded-circle border border-white border-3 shadow" src="<?=get_imageadmin()?>" alt="">
                </div>
              </div>
              <!-- Profile info -->
              <div class="col-sm-12 col-md text-center text-md-start d-md-flex justify-content-between align-items-center">
                <div>
                  <h4 class="my-1">Louis Ferguson <i class="bi bi-patch-check-fill text-info small"></i></h4>
                  <ul class="list-inline">
                    <li class="list-inline-item"><i class="bi bi-person-fill me-1"></i> An admin at mark nyamita</li>
                    
                    <li class="list-inline-item"><i class="bi bi-calendar2-plus me-1"></i> Joined on Jan 15, 2018</li>
                  </ul>
                  <p class="m-0"></p>
                </div>
                <!-- Links -->
                <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                  <!-- Card action START -->
                  <div class="dropdown ms-3">
                    <a class="text-secondary" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                      <!-- Dropdown Icon -->
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle fill="currentColor" cx="3" cy="12" r="2.5"></circle>
                        <circle fill="currentColor" opacity="0.5" cx="12" cy="12" r="2.5"></circle>
                        <circle fill="currentColor" opacity="0.3" cx="21" cy="12" r="2.5"></circle>
                      </svg>
                    </a>               
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                     
                      
                      <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-slash-circle me-2 fw-icon"></i>Delete profile</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-flag me-2 fw-icon"></i>Report a bug</a></li>
                    </ul>
                  </div>
                  <!-- Card action END -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Profile info END -->
    </div>

    <div class="row g-4">
      <!-- Left sidebar START -->
      <div class="col-lg-7 col-xxl-8">
        <!-- Profile START -->
        <div class="card border mb-4">
          <div class="card-header border-bottom p-3">
            <h5 class="card-header-title mb-0">Profile</h5>
          </div>
          <div class="card-body">
            <!-- Full name -->
            <div class="mb-3">
              <label class="form-label">Full name</label>
              <div class="input-group">
                <input type="text" class="form-control" value="Louis" placeholder="First name">
                <input type="text" class="form-control" value="Ferguson" placeholder="Last name">
              </div>
            </div>
            <!-- Username -->
            <div class="mb-3">
              <label class="form-label">Username</label>
              <div class="input-group">
                <span class="input-group-text">username</span>
                <input type="text" class="form-control" value="">
              </div>
            </div>
            <!-- Profile picture -->
            <div class="mb-3">
              <label class="form-label">Profile picture</label>
              <!-- Avatar upload START -->
              <div class="d-flex align-items-center">
                <div class="position-relative me-3">
                  <!-- Avatar edit -->
                  <div class="position-absolute top-0 end-0  z-index-9">
                    <a class="btn btn-sm btn-light btn-round mb-0 mt-n1 me-n1" href="#"> <i class="bi bi-pencil"></i> </a>
                  </div>
                  <!-- Avatar preview -->
                  <div class="avatar avatar-xl">
                    <img class="avatar-img rounded-circle border border-white border-3 shadow" src="<?=get_imageadmin()?>" alt="">
                  </div>
                </div>
                <!-- Avatar remove button -->
                <div class="avatar-remove">
                  <button type="button" class="btn btn-light">Delete</button>
                </div>
              </div>
              <!-- Avatar upload END -->
            </div>
             <!-- Email -->
             <div class="mb-3">
              <label class="form-label">Email</label>
              <input class="form-control" type="email" value="loriferguson@wbs.com">
            </div>
           
            <!-- Save button -->
            <div class="d-flex justify-content-end mt-4">
              <a href="#" class="btn btn-danger  border-0 me-2">Discard</a>
              <a href="#" class="btn btn-primary">Save changes</a>
            </div>
          </div>
        </div>
        <!-- Profile END -->

        <!-- Personal information START -->
        <div class="card border mb-4">
          <div class="card-header border-bottom p-3">
            <h5 class="card-header-title mb-0">Personal information</h5>
          </div>
          <div class="card-body">
            
            <!-- Email -->
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input class="form-control" type="email" value="loriferguson@wbs.com">
            </div>
            <!-- Address -->
            <div class="mb-3">
              <label class="form-label">location</label>
              <input class="form-control" type="text" value=" ">
            </div>
            <!-- Save button -->
            <div class="d-flex justify-content-end mt-4">
              <a href="#" class="btn btn-primary">Save changes</a>
            </div>
          </div>
        </div>
        <!-- Personal information END -->

        <!-- Social links START -->
        <div class="card border mb-4">
          <div class="card-header border-bottom p-3">
            <h5 class="card-header-title mb-0"> Social links</h5>
          </div>
          <div class="card-body">
            <!-- Skype -->
            <div class="mb-3">
              <label class="form-label">Facebook</label>
              <input class="form-control" type="text" value="https://facebook.com/">
            </div>
            
            <!-- Address -->
            <div class="mb-3">
              <label class="form-label">Twitter</label>
              <input class="form-control" type="text" value="https://twitter.com/ ">
            </div>
            <!-- Save button -->
            <div class="d-flex justify-content-end mt-4">
              <a href="#" class="btn btn-primary">Save changes</a>
            </div>
          </div>
        </div>
        <!-- Social links END -->

        <!-- Update password START -->
        <div class="card border">
          <div class="card-header border-bottom p-3">
            <h5 class="card-header-title mb-0">Update password</h5>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Current password</label>
              <input class="form-control" type="password" placeholder="Enter current password">
            </div>
            <!-- New password -->
            <div class="mb-3">
              <label class="form-label" id="psw-strength-message"></label>
              <div class="input-group">
                <input class="form-control fakepassword" type="password" id="psw-input" placeholder="Enter new password">
                <span class="input-group-text p-0">
                  <i class="fakepasswordicon far fa-eye cursor-pointer p-2 w-40px"></i>
                </span>
              </div>
              <div class="rounded mt-1" id="psw-strength"></div>
            </div>
            <!-- New password -->
            <div>
              <label class="form-label">Confirm new password</label>
              <input class="form-control" type="password" placeholder="Enter new password">
            </div>
            <div class="d-flex justify-content-end mt-4">
              <a href="#" class="btn btn-primary">Change password</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Left sidebar END -->

      <!-- Right sidebar START -->
      <div class="col-lg-5 col-xxl-4">
        

        

        <!-- Deactivate account START -->
        <div class="card border mb-4">
          <div class="card-header border-bottom p-3">
            <h5 class="card-header-title mb-0">Delete Account</h5>
          </div>
          <div class="card-body">
            <h6>Before you go...</h6>
            <ul>
              <li>Take backup of your data <a href="#">Here</a> </li>
              <li>Account deletion is final. There will be no way to restore your account</li>
            </ul>
            <div class="form-check form-check-md my-3">
              <input class="form-check-input" type="checkbox" value="" id="deleteaccountCheck">
              <label class="form-check-label" for="deleteaccountCheck">Yes, I'd really like to delete my account</label>
            </div>
            <a href="#" class="btn btn-success-soft my-1">Keep my account</a>
            <a href="#" class="btn btn-danger my-1">Delete my account</a>
          </div>
        </div>
        <!-- Deactivate account START -->
        <p><i class="bi bi-info-circle me-2"></i>This account was created on Jan 15, 2018</p>

        
      </div>
    </div>
	</div>
</section>
<!-- =======================
Main contain END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->




		<?php
/**
 * html footer function
 */
adminrendersmfooter();
adminrenderHtmlFooter();
?>