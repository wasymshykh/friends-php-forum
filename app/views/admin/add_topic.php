<?php include VIEWS_URL.'/layouts/admin_header.php'; ?>

<?php 
$allTopics = allTopicsList();
?>
                <h1 class="uk-heading-bullet">Add/Edit Topics</h1>
				<ul class="uk-breadcrumb">
				    <li><a href="<?=BASE_URL;?>">Forum</a></li>
				    <li><a href="<?=BASE_URL;?>/admin">Admin</a></li>
				    <li><span href="#">Add/Edit Topics</span></li>
				</ul>

				<div class="uk-overflow">
				    <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
				        <thead>
				            <tr>
				                <th class="uk-table-shrink">Id</th>
				                <th class="uk-table-shrink">Photo</th>
				                <th class="uk-table-small uk-text-nowrap">Name</th>
				                <th class="uk-table-small uk-text-nowrap">Description</th>
                                <th class="uk-table-shrink uk-text-nowrap">Category</th>
				                <th class="uk-width-small"></th>
				            </tr>
				        </thead>
				        <tbody>
                        <?php foreach($allTopics as $allTopic) { ?>
				            <tr>
				                <td><?=$allTopic['id']?></td>

				                <td><img class="uk-preserve-width uk-border-circle" src="<?=BASE_URL;?>/images/topic_pictures/<?=$allTopic['icon']?>" width="40" alt=""></td>

				                <td><?=$allTopic['name']?></td>

				               	<td class="uk-text-truncate"><?=$allTopic['description']?></td>
                                
                                <td class="uk-table-small uk-text-nowrap">
                                    <?=findCategoryName($allTopic['cat_id'])?>
                                </td>

				                <td>
									<div class="uk-button-group">
									    <button class="uk-button uk-button-default">Action</button>
									    <div class="uk-inline">
									        <button class="uk-button uk-button-default" type="button"><span uk-icon="icon:  triangle-down"></span></button>
									        <div uk-dropdown="mode: click; boundary: ! .uk-button-group; boundary-align: true;">
									            <ul class="uk-nav uk-dropdown-nav">
									                <li class="uk-active"><a href="#"  uk-toggle="target: #my-id-<?=$allTopic['id']?>">Edit</a></li>
									                <li class="uk-nav-divider"></li>
									                <li><a href="<?=BASE_URL;?>/admin/remove_topic.php?id=<?=$allTopic['id']?>">Delete</a></li>
									            </ul>
									        </div>
									    </div>
									</div>
				                </td>
				            </tr>


                            <div id="my-id-<?=$allTopic['id']?>" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body">
                                    <h2 class="uk-modal-title">Edit Topic</h2>
                                    <form action="add_topic.php" method="POST" enctype="multipart/form-data">
                                        <fieldset class="uk-fieldset">
                                        <div class="uk-margin">
                                        <input class="uk-input" type="text" name="topic_name" value="<?=$allTopic['name']?>">
                                    </div>
            
                                    <div class="uk-margin">
                                        <input class="uk-input" type="text" name="topic_description" value="<?=$allTopic['description']?>">
                                    </div>
            
                                    <div class="uk-margin">
                                        <div uk-form-custom="target: true">
                                            <input type="file" name="topic_icon">
                                            <input class="uk-input uk-form-width-medium" type="text" placeholder="Select Image" disabled>
                                        </div>
                                    </div>
            
                                    <div class="uk-margin">
                                        <select class="uk-select" name="topic_category" required>
                                            <option value="">Select Category</option>
                                            <?php selectCategoryList(); ?>
                                        </select>
                                    </div>
            
            
                                    <div class="uk-margin">
                                        <input class="uk-button uk-button-primary" type="submit" name="topic_submit" value="Add">
                                        <input class="uk-button uk-button-default" type="reset" value="Reset">
                                    </div>

                                        </fieldset>
                                    </form>
                                    <button class="uk-modal-close" type="button"></button>
                                </div>
                            </div>

                        <?php } ?>

				        </tbody>
				    </table>

				 </div>

				 <hr class="uk-divider-icon">

				 <form action="add_topic.php" method="POST" enctype="multipart/form-data">
				    <fieldset class="uk-fieldset">

				        <legend class="uk-legend">Add New Topic</legend>

                        
                        <?php if(!empty($error_msg)) { ?>
                            <div class="uk-alert-danger" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p><?=$error_msg?></p>
                            </div>
                        <?php } else if(!empty($success_msg)) { ?>
                            <div class="uk-alert-success" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p><?=$success_msg?></p>
                            </div>
                        <?php }    ?>

				        <div class="uk-margin">
				            <input class="uk-input" type="text" name="topic_name" placeholder="Topic Name">
				        </div>

				        <div class="uk-margin">
				            <input class="uk-input" type="text" name="topic_description" placeholder="Topic Description">
				        </div>

				        <div class="uk-margin">
				            <div uk-form-custom="target: true">
					            <input type="file" name="topic_icon">
					            <input class="uk-input uk-form-width-medium" type="text" placeholder="Select Image" disabled>
					        </div>
				        </div>

				        <div class="uk-margin">
				            <select class="uk-select" name="topic_category" required>
					            <option value="">Select Category</option>
					            <?php selectCategoryList(); ?>
					        </select>
				        </div>


				        <div class="uk-margin">
				            <input class="uk-button uk-button-primary" type="submit" name="topic_submit" value="Add">
				            <input class="uk-button uk-button-default" type="reset" value="Reset">
				        </div>



				    </fieldset>
				</form>


<?php include VIEWS_URL.'/layouts/admin_footer.php'; ?>