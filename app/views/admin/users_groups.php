<?php include VIEWS_URL.'/layouts/admin_header.php'; ?>

<h1 class="uk-heading-bullet">Add/Edit Categories</h1>
<ul class="uk-breadcrumb">
    <li><a href="<?=BASE_URL;?>">Forum</a></li>
    <li><a href="<?=BASE_URL;?>/admin">Admin</a></li>
    <li><span href="#">Users Groups</span></li>
</ul>

<?php 
    $allGroups = allUsersGroups();
?>

<div class="uk-overflow">

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

<table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
    <thead>
        <tr>
            <th class="uk-table-shrink uk-text-nowrap">Id</th>
            <th class="uk-table-shrink uk-text-nowrap">Group Key</th>
            <th class="uk-table-small uk-text-nowrap">Name</th>
            <th class="uk-width-small  uk-text-nowrap">Badge Bg</th>
            <th class="uk-width-small uk-text-nowrap">Badge Text</th>
            <th class="uk-width-small"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($allGroups as $allGroup) { ?>
        <tr>
            <td><?=$allGroup['id']?></td>

            <td><?=$allGroup['group_key']?></td>

            <td><?=$allGroup['group_name']?></td>

            <td><?=$allGroup['badge_bg']?></td>
            <td><?=$allGroup['badge_text']?></td>


            <td>
                <div class="uk-button-group">
                    <button class="uk-button uk-button-default">Action</button>
                    <div class="uk-inline">
                        <button class="uk-button uk-button-default" type="button"><span uk-icon="icon:  triangle-down"></span></button>
                        <div uk-dropdown="mode: click; boundary: ! .uk-button-group; boundary-align: true;">
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class="uk-active"><a href="" uk-toggle="target: #my-id-<?=$allGroup['id']?>">Edit</a></li>
                                <li class="uk-nav-divider"></li>
                                <li><a href="<?=BASE_URL;?>/admin/remove_group.php?id=<?=$allGroup['id']?>">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </td>

        </tr>

<div id="my-id-<?=$allGroup['id']?>" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">Edit Users Group</h2>
        <form action="users_groups.php" method="POST">

            <input type="hidden" name="ug_id" value="<?=$allGroup['id']?>">

            <fieldset class="uk-fieldset">
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Group Key</label>
                    <input class="uk-input" name="ug_key" type="text" value="<?=$allGroup['group_key']?>">
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Group Name</label>
                    <input class="uk-input" name="ug_name" type="text" value="<?=$allGroup['group_name']?>">
                </div>

                <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Badge Bg Color</label>
                <input class="uk-input" name="ug_bg" type="text" value="<?=$allGroup['badge_bg']?>">
            </div>
        
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Badge Text Color</label>
                <input class="uk-input" name="ug_text" type="text" value="<?=$allGroup['badge_text']?>">
            </div>


                <div class="uk-margin">
                    <input class="uk-button uk-button-primary" name="ug_update" type="submit" value="Edit">
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

<form action="users_groups.php" method="POST">
<fieldset class="uk-fieldset">

    <legend class="uk-legend">Add New Group</legend>

    <?php if(!empty($addError)) { ?>
        <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?=$addError?></p>
        </div>
    <?php } else if(!empty($addSuccess)) { ?>
        <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?=$addSuccess?></p>
        </div>
    <?php }    ?>

    <div class="uk-margin">
        <input class="uk-input" type="text" name="group_key" placeholder="Group Key">
    </div>

    <div class="uk-margin">
        <input class="uk-input" type="text" name="group_name" placeholder="Group Name">
    </div>

    <div class="uk-margin">
        <input class="uk-input" type="text" name="group_bg" placeholder="Badge bg Color">
    </div>

    <div class="uk-margin">
        <input class="uk-input" type="text" name="group_text" placeholder="Badge Text Color">
    </div>


    <div class="uk-margin">
        <input class="uk-button uk-button-primary" name="add_group" type="submit" value="Add">
        <input class="uk-button uk-button-default" type="reset" value="Reset">
    </div>



</fieldset>
</form>



<?php include VIEWS_URL.'/layouts/admin_footer.php'; ?>