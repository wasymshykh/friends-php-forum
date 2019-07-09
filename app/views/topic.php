<?php include 'layouts/header.php'; ?>
<?php include 'layouts/searchbar.php'; ?>


<section>
	<div id="threads">

		<div class="threads-heading">
			<h1><a href="<?=BASE_URL?>/category.php?id=<?=$info['cat_id']?>"><?=findCategoryName($info['cat_id'])?></a> / <?=findTopicName($info['id'])?></h1>
		</div>

        <?php if($userLogged){ ?>
            <div class="threads-open">
                <a href="<?=BASE_URL;?>/create.php?id=<?=$info['id']?>">Open New Thread</a>
            </div>
        <?php } ?>

        <?php $threads = threadListPer($info['id'], $startAt, $perPage);
        if(count($threads) > 0) { 
            foreach($threads as $thread) { ?>
            <?php $userd = userInfo($thread['user_id']);?>
		<div class="threads-box">
			<div class="thread-absolute">
				<div class="thread-status thread-<?=threadStatus($thread['status']);?>">
					<?=threadStatus($thread['status']);?>
				</div>
				<div class="thread-dated">
					<span>posted on</span> <?=convertDate($thread['created_on'], "d M, Y")?> at <?=convertDate($thread['created_on'], "h:i A")?>
				</div>
			</div>
			<div class="thread-boxL">
				<img src="<?=BASE_URL;?>/images/profile_pictures/<?=$userd['profile_picture']?>" alt="">
				<div class="thread-boxL-text">
					<h3><a href="<?=BASE_URL;?>/thread.php?id=<?=$thread['id'];?>"><?=$thread['title']?></a></h3>
					<p>posted by <a href="#"><?=$userd['username']?></a></p>
				</div>
			</div>
			<div class="thread-stats">
				<div class="thread-statsBox">
					<h2><?=$thread['views'];?></h2>
					<p>Views</p>
				</div>
				<div class="thread-statsBox">
					<h2><?=threadReplies($thread['id']);?></h2>
					<p>Replies</p>
				</div>
			</div>
		</div>

		<?php } ?>
	
		<div class="threads-pagination">
			<div class="btns">
				<?php if($page == 1) { ?>
					<a href="topic.php?id=<?=$id?>"><div class="btn-previous btn-prev-ended"></div></a>
				<?php } else { ?>
					<a href="topic.php?id=<?=$id?>&page=<?=$page-1?>"><div class="btn-previous"></div></a>
				<?php } ?>

				<?php if($page >= $pages) { ?>
					<a href="topic.php?id=<?=$id?>&page=<?=$page?>"><div class="btn-next btn-next-ended"></div></a>
				<?php } else { ?>
					<a href="topic.php?id=<?=$id?>&page=<?=$page+1?>"><div class="btn-next"></div></a>
				<?php } ?>
			</div>
		</div>
	
		<?php } else { ?>
            No threads found
        <?php } ?>

		</div>
</section>

<?php include 'layouts/footer.php'; ?>