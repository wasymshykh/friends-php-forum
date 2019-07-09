<?php include 'layouts/header.php'; ?>


<section>
	<div id="register">
		<div class="register-inner">
			
			<div class="register-heading">
				<h1>Information Submitted</h1>
            </div>

            <div class="register-container">
				
				<div class="register-confirm">
					<h3>Hello, <span><?=$username?></span></h3>
                    <p>You have successfully submited registration form, administrator will approve your registration.<br>
                    <br>You will be informed to <b><?=$email?></b> once your membership is confirmed.</p>
				</div>

			</div>

		</div>
	</div>
</section>

<?php include 'layouts/footer.php'; ?>