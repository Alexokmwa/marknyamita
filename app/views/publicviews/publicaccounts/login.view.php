
<?php 
/**
 * header nav file combined inclusion.
 */
renderpageHeader();
?>

<h1 class="myclassmargintop">public login view page design of tabs and subpages goes here</h1>
<!-- <h1>Login page view</h1>
<form method="post">
	
	<input value="<?=old_value('email')?>" name="email" placeHolder="Email"><br>
	<div><?=$user->getError('email')?></div><br>
	<input value="<?=old_value('password')?>" name="password" placeHolder="Password"><br>
	<div><?=$user->getError('password')?></div><br>
	<button>Login</button>
</form> -->
<?php
/**
 * html footer function
 */
renderHtmlFooter();
rendersmfooter();
?>