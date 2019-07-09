<?php include VIEWS_URL.'/layouts/admin_header.php'; ?>

<?php $allUnconfirmed = allUnconfirmedUsers(); ?>

<h1 class="uk-heading-bullet">Unconfirmed Users</h1>
<ul class="uk-breadcrumb">
    <li><a href="<?=BASE_URL;?>">Forum</a></li>
    <li><a href="<?=BASE_URL;?>/admin">Admin</a></li>
    <li><span href="#">Unconfirmed Users</span></li>
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

    <?php foreach($allUnconfirmed as $unconfirmed) { ?>

        <tr>
            <td><?=$unconfirmed['id']?></td>

            <td><img class="uk-preserve-width uk-border-circle" src="<?=BASE_URL?>/images/profile_pictures/<?=$unconfirmed['profile_picture']?>" width="40" alt=""></td>

            <td class="uk-table-link">
                <a class="uk-link-reset"><?=$unconfirmed['username']?></a>
            </td>

            <td><?=$unconfirmed['f_name']?> <?=$unconfirmed['l_name']?></td>
            <td><?=$unconfirmed['email']?></td>

            <td><?=convertDate($unconfirmed['reg_date'], "d M, Y")?></td>

            <td>
                <div class="uk-button-group">
                    <button class="uk-button uk-button-default">Action</button>
                    <div class="uk-inline">
                        <button class="uk-button uk-button-default" type="button"><span uk-icon="icon:  triangle-down"></span></button>
                        <div uk-dropdown="mode: click; boundary: ! .uk-button-group; boundary-align: true;">
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class="uk-active"><a href="#" uk-toggle="target: #my-id-<?=$unconfirmed['id']?>">View Details</a></li>
                                <li class="uk-nav-divider"></li>
                                <li><a href="<?=BASE_URL;?>/admin/user_approve.php?id=<?=$unconfirmed['id']?>">Approve</a></li>
                                <li class="uk-nav-divider"></li>
                                <li><a href="<?=BASE_URL;?>/admin/user_ban.php?id=<?=$unconfirmed['id']?>">Decline</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </td>
        </tr>

        <div id="my-id-<?=$unconfirmed['id']?>" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <h2 class="uk-modal-title">User Details</h2>
                
                <img class="uk-align-center uk-align-right@xl uk-margin-remove-adjacent uk-border-circle" src="<?=BASE_URL?>/images/profile_pictures/<?=$unconfirmed['profile_picture']?>" alt="" width="120">

                <ul class="uk-list uk-list-striped">
                <li><b style="padding-right: 15px;">Username</b> <?=$unconfirmed['username']?></li>
                <li><b style="padding-right: 15px;">First name</b> <?=$unconfirmed['f_name']?></li>
                <li><b style="padding-right: 15px;">Middle name</b> <?=$unconfirmed['m_name']?></li>
                <li><b style="padding-right: 15px;">Last name</b> <?=$unconfirmed['l_name']?></li>
                <li><b style="padding-right: 15px;">Email</b> <?=$unconfirmed['email']?></li>
                <li><b style="padding-right: 15px;">Cast</b> <?=$unconfirmed['cast']?></li>
                <li><b style="padding-right: 15px;">designation</b> <?=$unconfirmed['designation']?></li>
                <li><b style="padding-right: 15px;">Posting_place</b> <?=$unconfirmed['posting_place']?></li>
                <li><b style="padding-right: 15px;">Phone Number</b> <?=$unconfirmed['p_number']?></li>
                <li><b style="padding-right: 15px;">Mobile Number</b> <?=$unconfirmed['m_number']?></li>
                <li><b style="padding-right: 15px;">Office Number</b> <?=$unconfirmed['o_number']?></li>
                <li><b style="padding-right: 15px;">Present Address</b> <?=$unconfirmed['present_add']?></li>
                <li><b style="padding-right: 15px;">Permenent Address</b> <?=$unconfirmed['permanent_add']?></li>
                </ul>

                
            <div class="uk-margin">
                <a href="<?=BASE_URL;?>/admin/user_approve.php?id=<?=$unconfirmed['id']?>"><button class="uk-button uk-button-primary">Approve</button></a>
                <a href="<?=BASE_URL;?>/admin/user_ban.php?id=<?=$unconfirmed['id']?>"><button class="uk-button uk-button-default">Disapprove</button></a>
            </div>

                <button class="uk-modal-close" type="button"></button>
            </div>
        </div>

    <?php } ?>


    </tbody>
</table>

</div>

<?php include VIEWS_URL.'/layouts/admin_footer.php'; ?>