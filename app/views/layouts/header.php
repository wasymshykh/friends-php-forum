<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$page_title;?></title>

    <script src="<?=BASE_URL?>/js/jquery-3.2.1.min.js"></script>
    
    <!-- Include the default theme -->
    <link rel="stylesheet" href="<?=BASE_URL?>/editor/minified/themes/default.min.css" media="all" />

    <!-- Include the editors JS -->
    <script src="<?=BASE_URL?>/editor/minified/jquery.sceditor.bbcode.min.js"></script>

    <link rel="stylesheet" href="<?=BASE_URL?>/css/font-awesome/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/css/style.css">

</head>
<body>

<?php if($userLogged) {?>
    <?php $badgeTop = badgeDetails($userData['user_group']); ?>

<div id="topbar">
    <div class="topbar-inner">

        <div class="topbar-server">
            <i class="fa fa-clock-o"></i> <span>Current Server time</span>
            <?= date("h:i:s A - d M, Y") ?>
        </div>


        <div class="topbar-profile">
            <div class="topbar-icon">
                <img src="<?=BASE_URL?>/images/profile_pictures/<?=$userData['profile_picture']?>">
                <div class="topbar-user">
                    <p><?=$userData['username'];?></p>
                    <h5 style="background: #<?=$badgeTop['badge_bg'];?>;color:#<?=$badgeTop['badge_text'];?>"><?=$badgeTop['group_name'];?></h5>
                </div>
                <i class="fa fa-angle-down"></i>
            </div>

            <div class="profile-expand">
                <ul>
                    <?php if($userData['user_group'] == 3) {?>
                        <li><a href="<?=BASE_URL?>/admin/site_settings.php">Site Settings</a></li>
                        <li><a href="<?=BASE_URL?>/admin/users.php">View/Edit Users</a></li>
                        <li><a href="<?=BASE_URL?>/admin/users_groups.php">User Group Settings</a></li>
                        <li><a href="<?=BASE_URL?>/admin/add_cat.php">Add/Edit Category</a></li>
                        <li><a href="<?=BASE_URL?>/admin/add_topic.php">Add/Edit Topics</a></li>
                    <?php } ?>

                    <li><a href="<?=BASE_URL?>/logout.php">Logout</a></li>
                </ul>
                
                <div class="view-profile">
                    <?php if($userData['user_group'] != 3) {?>
                    <a href="<?=BASE_URL?>/profile.php?id=<?=$userData['id'];?>">View Profile</a>
                    <?php } else { ?>
                        <a href="<?=BASE_URL?>/admin?>" style="color: #e6262e;border-color: #e6262e;">Admin Panel</a>
                    <?php } ?>
                </div>
                
            </div>

        </div>

        <?php if($userData['user_group'] == 3) { ?>

            <div class="topbar-admin">
                <?php if(numberOfUnconfirmedUsers() > 0) { ?>
                    <div class="admin-unconfirmed">
                        <a href="<?=BASE_URL?>/admin/confirm_user.php"><span><?=numberOfUnconfirmedUsers()?></span> Unconformed Users</a>
                    </div>
                <?php } ?>
                <?php if(numberOfReportedPosts() > 0) { ?>
                    <div class="admin-unconfirmed">
                        <a href="<?=BASE_URL?>/admin/view_reports.php"><span><?=numberOfReportedPosts()?></span> Post Reported</a>
                    </div>
                <?php } ?>
            </div>

        <?php } ?>

    </div>
</div>

<script>
    $(document).ready(function(){

        $( '.topbar-icon' ).click(function(){
            $('.profile-expand').toggleClass('profile-expand-active');
            });

    });
</script>

<?php } ?>

<header>
	<div id="header">
		<div class="header-inner">

			<div id="logo">
				<a href="<?=BASE_URL?>">
					<div class="logo"></div>
				</a>
			</div>

			<div class="navigation">
				<ul>
                    <?php if($userLogged){ ?>
					    <li><a href="<?=BASE_URL?>"><i class="home-icon"></i> Home</a></li>
					    <li><a href="<?=BASE_URL?>/category.php?id=1"><i class="residence-icon"></i> Residence</a></li>
					    <li><a href="<?=BASE_URL?>/category.php?id=2"><i class="mess-icon"></i> Mess</a></li>
                        <li><a href="<?=BASE_URL?>/profile.php?id=<?=$userData['id'];?>"><i class="register-icon"></i> Profile</a></li>
                        <li><a href="<?=BASE_URL?>/logout.php"><i class="login-icon"></i> Logout</a></li>
                    <?php } else { ?>
                        <li><a href="<?=BASE_URL?>/register.php"><i class="register-icon"></i> Sign Up</a></li>
                        <li><a href="<?=BASE_URL?>/login.php"><i class="login-icon"></i> Sign in</a></li>
                    <?php } ?>
				</ul>
			</div>

		</div>
	</div>
</header>
