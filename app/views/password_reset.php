<?php include 'layouts/header.php'; ?>


<section>
	<div id="login">
		<div class="login-inner">
			
			<div class="login-heading">
				<h1>Reset your password</h1>
			</div>
			<div class="login-row">
				<form action="password_reset.php" method="POST">

                <?php if(!empty($error_msg)) { ?>
                    <div class="login-msg error-msg">
                        <p><?=$error_msg?></p>
                    </div>
                <?php } ?>

                <?php if(!empty($success_msg)) { ?>
                    <div class="login-msg success-msg">
                        <p><?=$success_msg?></p>
                    </div>
                <?php } ?>

					<div class="login-inputs email-icon">
					    <input type="email" name="email" value="<?php echo (!empty($email)) ? $email : ''; ?>" placeholder="enter your email" required>
					</div>

					<div class="login-submit">
					    <input type="submit" name="reset_submit" value="Reset">
					</div>

				</form>
			</div>

		</div>
	</div>
</section>


<?php if(!empty($error_msg)) {
    echo $error_msg;
}
?>


<?php include 'layouts/footer.php'; ?>