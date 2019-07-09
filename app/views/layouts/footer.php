
<section>
<div id="webFoot">
    <div class="webFoot-inner">
              

        <?php if($userLogged){ ?>
            <style>
                .webFoot-stats {
                    width: 100%;
                }
                .webFoot-stats ul li {
                    width: 25%;
                }
            </style>
            <div class="webFoot-stats">
                <ul>
                    <li><span><?=totalUsers()?></span> Members registered</li>
                    <li><span><?=totalActive()?></span> Members active today</li>
                    <li><span><?=totalPosts()?></span> Total posts</li>
                    <li><span><?=totalThreads()?></span> Total threads</li>
                </ul>
            </div>
        <?php } else { ?>
            <div class="webFoot-stats">
                <ul>
                    <li><span><?=totalUsers()?></span> Members registered</li>
                    <li><span><?=totalActive()?></span> Members active today</li>
                    <li><span><?=totalPosts()?></span> Total posts</li>
                    <li><span><?=totalThreads()?></span> Total threads</li>
                </ul>
            </div>

            <div class="webFoot-login">
                <h1>Quick Login</h1>
                <div class="login-container">
                    <form action="login.php" method="POST">
                        <div class="loginbox-input lb-user">
                            <input type="text" name="username" placeholder="username">
                        </div>
                        <div class="loginbox-input lb-pass">
                            <input type="password" name="password" placeholder="password">
                        </div>
                        <div class="loginbox-submit lb-user">
                            <input type="submit" name="login_submit" value="Login">
                        </div>
                    </form>
                </div>
            </div>

        <?php } ?>

    </div>
</div>
</section>

<footer>
<div class="footer-copyright">
    <p>Copyright &copy; 2017 <?=getSettings('site_title')?>. All Rights Reserved.</p>
</div>
</footer>