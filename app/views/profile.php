<?php include 'layouts/header.php'; ?>
<?php include 'layouts/searchbar.php'; ?>

<section>
	<div id="profile">
		<div class="profile-inner">		

            <div class="profileLeft">
                <div class="profileThreads">
                    <div class="profileLHeading">
                        <h1><?=$userBase['username']?>'s threads</h1>
                    </div>

                    <?php 
                        $threads = threadListByUser($id); 
                        $replies = replyListByUser($id); 
                    
                        if(count($threads) > 0) {

                        foreach($threads as $thread) { ?>

                        <div class="pThreadRow">
                            <h5><?=convertDate($thread['created_on'], "d M, Y")?> at <?=convertDate($thread['created_on'], "h:i A")?></h5>
                            <a href="<?=BASE_URL;?>/thread.php?id=<?=$thread['id'];?>"><h3><?=$thread['title']?></h3></a>
                            <p><?=substr(strip_tags(html_entity_decode($thread['content'])),0,70)?></p>
                        </div>
                    <?php } } else { ?>
                        <div class="pNoThread">
                            <p>Sorry, no thread found</p>
                        </div>
                    <?php } ?>
                </div>
                <div class="profileThreads">
                    <div class="profileLHeading">
                        <h1><?=$userBase['username']?>'s posts</h1>
                    </div>

                    <?php if(count($replies) > 0) {
                    foreach($replies as $reply) { ?>
                        <div class="pThreadRow">
                            <h5><?=convertDate($reply['created_on'], "d M, Y")?> at <?=convertDate($reply['created_on'], "h:i A")?></h5>
                            <p><?=substr(strip_tags(html_entity_decode($reply['content'])),0,70)?></p>

                            <?php $info = isThread($reply['thread_id']); ?>

                            <div class="onThread">
                                <a href="<?=BASE_URL;?>/thread.php?id=<?=$reply['thread_id'];?>"><h3><span>Replied on: </span> <?=$info['title']?></h3></a>
                            </div>
                        </div>
                    <?php } } else { ?>
                        <div class="pNoThread">
                            <p>Sorry, no post found</p>
                        </div>
                    <?php } ?>

                </div>
            </div>

            <div class="profileRight">
                <div class="profileRHeading">
                    <h1>Profile / <?=$userBase['username']?></h1>
                </div>
                <div class="profilePicture">
                    <img src="<?=BASE_URL?>/images/profile_pictures/<?=$userBase['profile_picture']?>" alt="<?=$userBase['username']?>">
                </div>
                <div class="profileDetails">
                    <h3><?=$userBase['f_name']?> <?=$userBase['l_name']?></h3>
                    <ul>
                        <li><span>Registered on</span> <?=convertDate($userBase['reg_date'], "d M, Y")?></li>
                        <li><span>Last active</span> <?=$last_login?></li>
                        <li><span>Total posts</span> <?=totalThreadsByUser($id)?></li>
                        <li><span>Email</span> <a href="mailto:<?=$userBase['email']?>"><?=$userBase['email']?></a></li>
                        <li><span>Designation</span> <?=$userBase['designation']?></li>
                        <li><span>Place of Posting</span> <?=$userBase['posting_place']?></li>
                        <li><span>Contact Number</span> <?=$userBase['m_number']?></li>
                    </ul>
                </div>
            </div>


        </div>
	</div>
</section>

<?php include 'layouts/footer.php'; ?>