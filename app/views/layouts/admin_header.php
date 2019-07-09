<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>

	<link rel="stylesheet" href="../css/uikit/css/uikit.min.css">
	<link rel="stylesheet" href="../css/style.css">
	
	<script src="../css/uikit/js/uikit.min.js"></script>
        <script src="../css/uikit/js/uikit-icons.min.js"></script>

</head>
<body>

<div class="uk-container">
	<div class="uk-grid" uk-grid>
		
		<div class="uk-width-1-4">
			<div class="uk-card uk-card-default uk-card-body">
		    <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
		        <li class="uk-active"><a href="<?=BASE_URL?>"><span class="uk-label" uk-icon="icon: arrow-left">Go Back Forum</span></a></li>
		        <li class="uk-nav-divider"></li>
		        <li class="uk-parent">
		            <a href="#"><span class="uk-margin-small-right" uk-icon="icon: pencil"></span> Users & Groups</a>
		            <ul class="uk-nav-sub">
		                <li><a href="<?=BASE_URL?>/admin/users.php">View/Edit Users</a></li>
		                <li><a href="<?=BASE_URL?>/admin/users_groups.php">User Group Settings</a></li>
		            </ul>
		        </li>
		        <li class="uk-nav-divider"></li>
		        <li class="uk-parent">
		            <a href="#"><span class="uk-margin-small-right" uk-icon="icon: pencil"></span> Categories & Topics</a>
		            <ul class="uk-nav-sub">
		                <li><a href="<?=BASE_URL?>/admin/add_cat.php">Add/Edit Category</a></li>
		                <li><a href="<?=BASE_URL?>/admin/add_topic.php">Add/Edit Topics</a></li>
		            </ul>
		        </li>
		        <li class="uk-nav-divider"></li>
		        <li class="uk-nav-header">Manage</li>
		        <li><a href="<?=BASE_URL?>/admin/confirm_user.php"><span class="uk-margin-small-right" uk-icon="icon: info"></span> Unconfirmed Users</a></li>
		        <li><a href="<?=BASE_URL?>/admin/reported.php"><span class="uk-margin-small-right" uk-icon="icon: warning"></span> Reported Posts</a></li>
		        <li class="uk-nav-divider"></li>
		        <li class="uk-nav-header">Core</li>
		        <li><a href="<?=BASE_URL?>/admin/site_settings.php"><span class="uk-margin-small-right" uk-icon="icon: cog"></span> Site Settings</a></li>
		        <li class="uk-nav-divider"></li>
		        <li><a href="<?=BASE_URL?>/logout.php"><span class="uk-margin-small-right" uk-icon="icon: sign-out"></span> Logout</a></li>
		    </ul>
			</div>
		</div>
	

		<div class="uk-width-3-4">
            
			<div class="uk-card uk-card-default uk-card-body">
            
            <?php if($userLogged) {?>
                <?php $badgeTop = badgeDetails($userData['user_group']); ?>
            <?php } ?>
