<?php include 'layouts/header.php'; ?>

<section>
	<div id="post">
		<div class="post-heading">
			<h1><a href="<?=BASE_URL?>/category.php?id=<?=$info['cat_id']?>"><?=findCategoryName($info['cat_id'])?></a> / <a href="<?=BASE_URL?>/topic.php?id=<?=$info['topic_id']?>"><?=findTopicName($info['topic_id'])?></a> / <?=$info['title']?></h1>
		</div>

		<div class="mainThread">
			<div class="threadProfile">
				<div class="avatar-image">
					<img src="<?=BASE_URL;?>/images/profile_pictures/<?=$infoUser['profile_picture']?>">
				</div>
				<div class="tProfileInfo">
					<a href="<?=BASE_URL;?>/profile.php?id=<?=$infoUser['id']?>"><h3><?=$infoUser['username']?></h3></a>
					<p><?=$infoUser['f_name']?> <?=$infoUser['l_name']?></p>
					<div class="profileBadge" style="background: #<?=$badge['badge_bg'];?>; color: #<?=$badge['badge_text'];?>">
                        <?=$badge['group_name'];?>
					</div>
					<ul>
						<li><span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Total posts</span> <?=totalThreadsByUser($infoUser['id'])?></li>
						<li><span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Member since</span> <?=convertDate($infoUser['reg_date'], "d M, Y")?></li>
					</ul>
				</div>
			</div>
			<div class="threadPost">
				<div class="threadButtons">
					<div class="buttonCenter">
						<?php if($info['status'] != 2) { ?>
							<a href="#Comment" class="thread-btn add-thread"><i class="fa fa-plus"></i> Add Reply</a>
						<?php } ?>
						<?php if($info['user_id'] == $userData['id'] || $userData['user_group'] == 3 || $userData['user_group'] == 2) { ?>
							<a href="edit_thread.php?id=<?=$id?>"  class="thread-btn edit-thread"><i class="fa fa-pencil"></i> Edit</a>
						<?php } ?>

						<?php if($userData['user_group'] == 3 || $userData['user_group'] == 2) { ?>
							<?php if($info['status'] != 2 ) { ?>
								<a href="lock_thread.php?id=<?=$id?>" class="thread-btn lock-thread"><i class="fa fa-lock"></i> Lock</a>
							<?php } else { ?>
								<a href="unlock_thread.php?id=<?=$id?>" class="thread-btn lock-thread"><i class="fa fa-unlock-alt"></i> Unlock</a>
							<?php } ?>
								<a href="delete.php?thread_id=<?=$id?>" class="thread-btn delete-thread"><i class="fa fa-trash-o"></i> Delete</a>
						<?php } ?>
					</div>
				</div>

				<div class="threadPostContent">
					<?=html_entity_decode($info['content']);?>
				</div>
				
			</div>

			<div class="clr"></div>

			<div class="threadBottom">
				<div class="threadPosted">
					<p><span><i class="fa fa-clock-o"></i> Posted on <?=convertDate($info['created_on'], "d M, Y")?> at <?=convertDate($info['created_on'], "h:i A")?></span>
					<?php if($info['updated_on'] != null) { ?>
                        <span><i class="fa fa-repeat"></i> Updated on <?=convertDate($info['updated_on'], "d M, Y")?> at <?=convertDate($info['updated_on'], "h:i A")?></span></p>
                    <?php } ?>
                    
				</div>
				<div class="threadReport">
					<a href="report.php?thread=<?=$id;?>">Report Post</a>
				</div>
			</div>
		</div>

<?php 		
	if(checkReplies($id) > 0) { 

        $replies = checkReplies($id);
		
		foreach($replies as $reply) { 
            $userby = userInfo($reply['user_id']);
            $badgeby = badgeDetails($userby['user_group']);
?>
            

        <div class="threadComment <?php if($userby['user_group']==3){ echo'ifred'; } ?> <?php if($userby['user_group']==2){ echo'ifgreen'; } ?>">
			<div class="threadProfile">
				<div class="avatar-image">
					<img src="<?=BASE_URL;?>/images/profile_pictures/<?=$userby['profile_picture']?>">
				</div>
				<div class="tProfileInfo">
					<a href="<?=BASE_URL;?>/profile.php?id=<?=$userby['id']?>"><h3><?=$userby['username']?></h3></a>
					<p><?=$userby['f_name']?> <?=$userby['l_name']?></p>
					<div class="profileBadge" style="background: #<?=$badgeby['badge_bg'];?>; color: #<?=$badgeby['badge_text'];?>">
                        <?=$badgeby['group_name'];?>
					</div>
				</div>
			</div>
			<div class="threadPost">

				<div class="threadButtons">
					<div class="buttonCenter">
						<?php if($info['status'] != 2) { ?>
							<a href="#Comment" class="thread-btn add-thread"><i class="fa fa-plus"></i> Add Reply</a>
						<?php } ?>
						<?php if($reply['user_id'] == $userData['id'] || $userData['user_group'] == 3 || $userData['user_group'] == 2) { ?>
							<a href="edit_reply.php?id=<?=$reply['id']?>"  class="thread-btn edit-thread"><i class="fa fa-pencil"></i> Edit</a>
						<?php } ?>

						<?php if($userData['user_group'] == 3 || $userData['user_group'] == 2) { ?>
							<a href="delete.php?reply_id=<?=$reply['id']?>" class="thread-btn delete-thread"><i class="fa fa-trash-o"></i> Delete</a>
						<?php } ?>
					</div>
				</div>

				<p><?=html_entity_decode($reply['content']);?></p>
			</div>

			<div class="clr"></div>

			<div class="threadBottom">
				<div class="threadPosted">
                    <p><span><i class="fa fa-clock-o"></i> Posted on <?=convertDate($reply['created_on'], "d M, Y")?> at <?=convertDate($reply['created_on'], "h:i A")?></span>
                <?php if($reply['updated_on'] != null) { ?>
                    <span><i class="fa fa-repeat"></i> Updated on <?=convertDate($reply['updated_on'], "d M, Y")?> at <?=convertDate($reply['updated_on'], "h:i A")?></span></p>
                <?php } ?>
				</div>
				<div class="threadReport">
					<a href="report.php?reply=<?=$reply['id'];?>">Report Comment</a>
				</div>
			</div>
		</div>

		<?php } //end foreach
	} //end if ?>

		<?php if($userLogged && $info['status'] != 2) { // reply comment ?>
			<form action="thread.php?id=<?=$id?>" method="POST">
				<div class="postmessage" id="Comment">
					<textarea name="message" id="" cols="40" rows="5" placeholder="Write your comment here" required></textarea>
					<input type="submit" name="replied" value="Reply">
				</div>
			</form>
		<?php } ?>

    </div>
</section>

<?php include 'layouts/footer.php'; ?>