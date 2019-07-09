<?php include 'layouts/header.php'; ?>
<?php include 'layouts/searchbar.php'; ?>

<?php $categories = categoryList(); ?>

<section>
	<div id="categories">
		<div class="categories-inner">
			
<?php if(count($categories) > 0) { 
    foreach($categories as $category) { ?>

            <div class="categories-row">
				<div class="categories-title">
                <a href="<?=BASE_URL;?>/category.php?id=<?=$category['id'];?>"><h1><?=$category['name']?></h1></a>
				</div>

                <?php $topics = topicsList($category['id']);
                    if(count($topics) > 0) { 
                    foreach($topics as $topic) { ?>
				<div class="categories-sub">
					<div class="categories-sub-left">
						<img src="<?=BASE_URL;?>/images/topic_pictures/<?=$topic['icon'];?>">
						<div class="categories-sub-text">
							<h3><a href="<?=BASE_URL;?>/topic.php?id=<?=$topic['id'];?>"><?=$topic['name']?></a></h3>
							<p><?=$topic['description'];?></p>
						</div>
					</div>
					<div class="categories-stats">
						<div class="cat-stats-box">
							<h2><?=catThreads($topic['id'])?></h2>
							<p>Threads</p>
						</div>
						<div class="cat-stats-box">
							<h2><?=catReplies($topic['id'])?></h2>
							<p>Replies</p>
						</div>
					</div>
				</div>
                <?php }
                } else { ?>
                    No topics found
                <?php } ?>

			</div>        

<?php } } ?>


        </div>
	</div>
</section>


<?php include 'layouts/footer.php'; ?>