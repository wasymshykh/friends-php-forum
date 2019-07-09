<?php include 'layouts/header.php'; ?>

<section>
	<div id="login">
		<div class="login-inner">
			
			<div class="login-heading">
				<h1>Reset your password</h1>
			</div>
			<div class="login-row">
				<form action="" method="POST">

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

					<div class="login-inputs password-input">
					    <input type="password" name="password" value="" placeholder="enter your new password" required>
					</div>
					<div class="login-inputs password-input">
					    <input type="password" name="passwordC" value="" placeholder="re-enter new password" required>
					</div>

					<div class="login-submit">
					    <input type="submit" name="reset_submit" value="Submit">
					</div>

				</form>
			</div>

		</div>
	</div>
</section>


<?php include 'layouts/footer.php'; ?>