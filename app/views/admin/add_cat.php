<?php include VIEWS_URL.'/layouts/admin_header.php'; ?>

<h1 class="uk-heading-bullet">Add/Edit Categories</h1>
<ul class="uk-breadcrumb">
    <li><a href="<?=BASE_URL;?>">Forum</a></li>
    <li><a href="<?=BASE_URL;?>/admin">Admin</a></li>
    <li><span href="#">Add/Edit Categories</span></li>
</ul>

<?php 
    $allCategories = allCategoryList();
?>

<div class="uk-overflow">

<?php if(!empty($errorMsg)) { ?>
    <div class="uk-alert-danger" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p><?=$errorMsg?></p>
    </div>
<?php } else if(!empty($successMsg)) { ?>
    <div class="uk-alert-success" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p><?=$successMsg?></p>
    </div>
<?php }    ?>

    <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
        <thead>
            <tr>
                <th class="uk-table-shrink uk-text-nowrap">Id</th>
                <th class="uk-table-small uk-text-nowrap">Name</th>
                <th class="uk-table-small uk-text-nowrap">Description</th>
                <th class="uk-width-small"></th>
            </tr>
        </thead>
        <tbody>

        <?php foreach($allCategories as $allCategory) { ?>
            <tr>
                <td><?=$allCategory['id']?></td>

                <td><?=$allCategory['name']?></td>

                <td><?=$allCategory['description']?></td>

                <td>
                    <div class="uk-button-group">
                        <button class="uk-button uk-button-default">Action</button>
                        <div class="uk-inline">
                            <button class="uk-button uk-button-default" type="button"><span uk-icon="icon:  triangle-down"></span></button>
                            <div uk-dropdown="mode: click; boundary: ! .uk-button-group; boundary-align: true;">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li class="uk-active"><a href="" uk-toggle="target: #my-id-<?=$allCategory['id']?>">Edit</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a href="<?=BASE_URL;?>/admin/remove_cat.php?id=<?=$allCategory['id']?>">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </td>

            </tr>

            <div id="my-id-<?=$allCategory['id']?>" uk-modal>
                <div class="uk-modal-dialog uk-modal-body">
                    <h2 class="uk-modal-title">Edit Category</h2>
                    <form action="add_cat.php" method="POST">
                        <input type="hidden" name="cat_id" value="<?=$allCategory['id']?>">
                        <fieldset class="uk-fieldset">
                            <div class="uk-margin">
                                <input class="uk-input" name="cat_name" type="text" value="<?=$allCategory['name']?>">
                            </div>

                            <div class="uk-margin">
                                <input class="uk-input" name="cat_description" type="text" value="<?=$allCategory['description']?>">
                            </div>


                            <div class="uk-margin">
                                <input class="uk-button uk-button-primary" name="cat_update" type="submit" value="Update">
                                <input class="uk-button uk-button-default" type="reset" value="Default">
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

    <form action="add_cat.php" method="POST">
        <fieldset class="uk-fieldset">

            <legend class="uk-legend">Add New Category</legend>
            
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
                <input class="uk-input" name="cat_name" type="text" placeholder="Category Name">
            </div>

            <div class="uk-margin">
                <input class="uk-input" name="cat_description" type="text" placeholder="Category Description">
            </div>


            <div class="uk-margin">
                <input class="uk-button uk-button-primary" name="cat_submit" type="submit" value="Add">
                <input class="uk-button uk-button-default" type="reset" value="Reset">
            </div>



        </fieldset>
    </form>



<?php include VIEWS_URL.'/layouts/admin_footer.php'; ?>