<?php include 'layouts/header.php'; ?>
<?php include 'layouts/searchbar.php'; ?>


<section>
	<div id="category">

		<div class="category-heading">
			<h1><?=$info['name']?></h1>
		</div>

        <?php $topics = topicsList($info['id']);
            if(count($topics) > 0) { 
            foreach($topics as $topic) { ?>
                <div class="category-box">
                    <div class="category-boxL">
                        <img src="<?=BASE_URL;?>/images/topic_pictures/<?=$topic['icon'];?>" alt="<?=$topic['name']?>">
                        <div class="cat-boxL-text">
                            <h3><a href="<?=BASE_URL;?>/topic.php?id=<?=$topic['id'];?>"><?=$topic['name']?></a></h3>
                            <p><?=$topic['description'];?></p>
                        </div>
                    </div>
                    <div class="category-stats">
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
</section>

<?php include 'layouts/footer.php'; ?>