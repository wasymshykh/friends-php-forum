<?php include VIEWS_URL.'/layouts/admin_header.php'; ?>

<?php $allUsers = allUsers(); ?>

<h1 class="uk-heading-bullet">Users</h1>
<ul class="uk-breadcrumb">
    <li><a href="<?=BASE_URL;?>">Forum</a></li>
    <li><a href="<?=BASE_URL;?>/admin">Admin</a></li>
    <li><span href="#">Users</span></li>
</ul>

<div class="uk-overflow">
<table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
    <thead>
        <tr>
            <th class="uk-table-shrink">Id</th>
            <th class="uk-table-shrink">Photo</th>
            <th class="uk-table-shrink">Username</th>
            <th class="uk-width-shrink  uk-text-nowrap">Full Name</th>
            <th class="uk-width-shrink uk-text-nowrap">Email</th>
            <th class="uk-width-shrink uk-text-nowrap">Registered on</th>
            <th class="uk-width-small"></th>
        </tr>
    </thead>
    <tbody>

    <?php foreach($allUsers as $allUser) { ?>

        <tr>
            <td><?=$allUser['id']?></td>

            <td><img class="uk-preserve-width uk-border-circle" src="<?=BASE_URL?>/images/profile_pictures/<?=$allUser['profile_picture']?>" width="40" alt=""></td>

            <td class="uk-table-link">
                <a class="uk-link-reset"><?=$allUser['username']?></a>
            </td>

            <td><?=$allUser['f_name']?> <?=$allUser['l_name']?></td>
            <td><?=$allUser['email']?></td>

            <td><?=convertDate($allUser['reg_date'], "d M, Y")?></td>

            <td>
                <div class="uk-button-group">
                    <button class="uk-button uk-button-default">Action</button>
                    <div class="uk-inline">
                        <button class="uk-button uk-button-default" type="button"><span uk-icon="icon:  triangle-down"></span></button>
                        <div uk-dropdown="mode: click; boundary: ! .uk-button-group; boundary-align: true;">
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class="uk-active"><a href="#" uk-toggle="target: #my-id-<?=$allUser['id']?>">View Details</a></li>
                                <li class="uk-nav-divider"></li>
                                <li><a href="<?=BASE_URL;?>/admin/user_edit.php?id=<?=$allUser['id']?>">Edit User Data</a></li>
                                <li class="uk-nav-divider"></li>
                                <li><a href="<?=BASE_URL;?>/admin/user_ban.php?id=<?=$allUser['id']?>">Ban User</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </td>
        </tr>

        <div id="my-id-<?=$allUser['id']?>" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <h2 class="uk-modal-title">User Details</h2>
                
                <img class="uk-align-center uk-align-right@xl uk-margin-remove-adjacent uk-border-circle" src="<?=BASE_URL?>/images/profile_pictures/<?=$allUser['profile_picture']?>" alt="" width="120">

                <ul class="uk-list uk-list-striped">
                <li><b style="padding-right: 15px;">User Group</b> <?php $name = badgeDetails($allUser['user_group'])['group_name']; echo $name;?></li>
                <li><b style="padding-right: 15px;">Username</b> <?=$allUser['username']?></li>
                <li><b style="padding-right: 15px;">First name</b> <?=$allUser['f_name']?></li>
                <li><b style="padding-right: 15px;">Middle name</b> <?=$allUser['m_name']?></li>
                <li><b style="padding-right: 15px;">Last name</b> <?=$allUser['l_name']?></li>
                <li><b style="padding-right: 15px;">Email</b> <?=$allUser['email']?></li>
                <li><b style="padding-right: 15px;">Cast</b> <?=$allUser['cast']?></li>
                <li><b style="padding-right: 15px;">designation</b> <?=$allUser['designation']?></li>
                <li><b style="padding-right: 15px;">Posting_place</b> <?=$allUser['posting_place']?></li>
                <li><b style="padding-right: 15px;">Phone Number</b> <?=$allUser['p_number']?></li>
                <li><b style="padding-right: 15px;">Mobile Number</b> <?=$allUser['m_number']?></li>
                <li><b style="padding-right: 15px;">Office Number</b> <?=$allUser['o_number']?></li>
                <li><b style="padding-right: 15px;">Present Address</b> <?=$allUser['present_add']?></li>
                <li><b style="padding-right: 15px;">Permenent Address</b> <?=$allUser['permanent_add']?></li>
                </ul>

                
            <div class="uk-margin">
                <a href="<?=BASE_URL;?>/admin/user_edit.php?id=<?=$allUser['id']?>"><button class="uk-button uk-button-primary">Edit User</button></a>
                <a href="<?=BASE_URL;?>/admin/user_ban.php?id=<?=$allUser['id']?>"><button class="uk-button uk-button-danger">Ban</button></a>
                <button class="uk-modal-close uk-button uk-button-default" type="button">Close</button>
                </div>
            </div>
        </div>

    <?php } ?>


    </tbody>
</table>

</div>

<?php include VIEWS_URL.'/layouts/admin_footer.php'; ?>