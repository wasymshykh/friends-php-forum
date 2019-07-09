<?php include 'layouts/header.php'; ?>

<section>
	<div class="thread-create-bg">

		<div class="threads-heading">
			<h1><a href="<?=BASE_URL?>/category.php?id=<?=$info['cat_id']?>"><?=findCategoryName($info['cat_id'])?></a> / 
            <a href="<?=BASE_URL?>/topic.php?id=<?=$info['topic_id']?>"><?=findTopicName($info['topic_id'])?></a> / Edit Thread</h1>
		</div>

        <div class="thread-create">

               
    <?php if(!empty($error_msg)) { ?>
        <div class="login-msg error-msg">
            <p><?=$error_msg?></p>
        </div>
    <?php } ?>
    
            <form action="edit_thread.php?id=<?=$id?>" method="POST">

                <input type="text" name="title" value="<?=$info['title']?>">
                <textarea name="content" style="width:100%" rows="20">
                    <?=$info['content']?>
                </textarea>
                <input type="submit" value="Edit" name="edit">

            </form>
        </div>

    </div>
</section>

<script>
$(function() {
    $("textarea").sceditor({
        plugins: "xhtml",
        style: "minified/jquery.sceditor.default.min.css",
        toolbarExclude: "font,emoticon,print,maximize,source"
    });
});
</script>

<?php include 'layouts/footer.php'; ?>