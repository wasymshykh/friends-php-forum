<?php include 'layouts/header.php'; ?>


<section>
	<div id="register">
		<div class="register-inner">
			
			<div class="register-heading">
				<h1>Register an account</h1>
            </div>
            <form action="register.php" method="POST"  enctype="multipart/form-data">

            <div class="register-container">

            <?php if(!empty($error_msg)) { ?>
                <div class="register-msg error-msg">
                    <p><?=$error_msg;?></p>
                </div>
            <?php } ?>

                    <div class="register-category">
                        <h5>Personal Information</h5>
                    </div>

                    <div class="register-inputs reg-icon">
                        <input type="text" name="f_name" value="<?php echo (!empty($firstName)) ? $firstName : ''; ?>" placeholder="Your first name" required>
                    </div>

                    <div class="register-inputs reg-icon">
                        <input type="text" name="m_name" value="<?php echo (!empty($middleName)) ? $middleName : ''; ?>" placeholder="Your middle name (optional)">
                    </div>
                    <div class="register-inputs reg-icon">
                        <input type="text" name="l_name" value="<?php echo (!empty($lastName)) ? $lastName : ''; ?>" placeholder="Your last name" required>
                    </div>

                    <div class="register-inputs reg-icon">
                        <input type="text" name="cast" value="<?php echo (!empty($cast)) ? $cast : ''; ?>" placeholder="Your Cast" required>
                    </div>
                    <div class="register-inputs reg-icon">
                        <input type="text" name="designation" value="<?php echo (!empty($designation)) ? $designation : ''; ?>" placeholder="Your designation" required>
                    </div>
                    <div class="register-inputs reg-icon">
                        <input type="text" name="posting_place" value="<?php echo (!empty($posting_place)) ? $posting_place : ''; ?>" placeholder="Your place of posting" required>
                    </div>
                    
                    <div class="register-category">
                        <h5>Contact Information</h5>
                    </div>

                    <div class="register-inputs reg-icon">
                        <input type="text" name="contactMobile" value="<?php echo (!empty($contactMobile)) ? $contactMobile : ''; ?>" placeholder="Your mobile number" required>
                    </div>
                    <div class="register-inputs reg-icon">
                        <input type="text" name="contactPhone" value="<?php echo (!empty($contactPhone)) ? $contactPhone : ''; ?>" placeholder="Your phone number">
                    </div>
                    <div class="register-inputs reg-icon">
                        <input type="text" name="contactOffice" value="<?php echo (!empty($contactOffice)) ? $contactOffice : ''; ?>" placeholder="Your office number">
                    </div>

                    <div class="register-inputs reg-icon">
                        <input type="text" name="p_address" value="<?php echo (!empty($presentAddress)) ? $presentAddress : ''; ?>" placeholder="Your present address" required>
                        <input type="text" name="p_address_2" value="<?php echo (!empty($presentAddress2)) ? $presentAddress2 : ''; ?>" placeholder="present address continued">
                    </div>
                    <div class="register-inputs reg-icon">
                        <input type="text" name="per_address" value="<?php echo (!empty($permanentAddress)) ? $permanentAddress : ''; ?>" placeholder="Your permanent address" required>
                        <input type="text" name="per_address_2" value="<?php echo (!empty($permanentAddress2)) ? $permanentAddress2 : ''; ?>" placeholder="permanent address continued">
                    </div>

                    <div class="register-category">
                        <h5>Upload Picture (less than 50kb)</h5>
                    </div>

                    <div class="register-upload">
                        <label for="picture">Profile Picture</label>
                        <input type="file" name="picture" id="picture" required><br><br>
                    </div>
        
                    
                    <div class="register-category">
                        <h5>Create Login Information</h5>
                    </div>

                    <div class="register-inputs email-icon">
                        <input type="email" name="email" value="<?php echo (!empty($email)) ? $email : ''; ?>" placeholder="Your email address" required>
                    </div>
                    <div class="register-inputs username-input">
                        <input type="text" name="username" value="<?php echo (!empty($username)) ? $username : ''; ?>" placeholder="Your unique username" required>
                    </div>
                    <div class="register-inputs password-input">
                        <input type="password" name="password" value="" placeholder="Your password" required>
                    </div>
                    <div class="register-inputs password-input">
                        <input type="password" name="password_c" value="" placeholder="confirm your password" required>
                    </div>
                            
					<div class="login-submit">
                        <input type="submit" name="signup" value="Sign Up">
                    </div>
            
            </div>

            </form>
            
        </div>
    </div>
</section>


<?php include 'layouts/footer.php'; ?>