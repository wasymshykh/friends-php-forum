<?php include 'layouts/header.php'; ?>


<section>
	<div id="login">
		<div class="login-inner">
			
			<div class="login-heading">
				<h1>Login to account</h1>
			</div>
			<div class="login-row">
				<form action="login.php" method="POST">
                
    <?php if(!empty($error_msg)) { ?>
        <div class="login-msg error-msg">
            <p><?=$error_msg?></p>
        </div>
    <?php } ?>
					
					<div class="login-inputs username-input">
					    <input type="text" name="username" value="<?php echo (!empty($username)) ? $username : ''; ?>" placeholder="enter username" required>
					</div>
					
					<div class="login-inputs password-input">
					    <input type="password" name="password" value"" placeholder="enter password" required> 
					</div>
					
					<div class="login-forgot">
					    <a href="./password_reset.php">Reset your password</a>
					</div>

					<div class="login-submit">
					    <input type="submit" name="login_submit" value="Login">
					</div>

				</form>
			</div>

		</div>
	</div>
</section>




<?php include 'layouts/footer.php'; ?>