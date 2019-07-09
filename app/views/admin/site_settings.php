<?php include VIEWS_URL.'/layouts/admin_header.php'; ?>
<h1 class="uk-heading-bullet">Site Settings</h1>
  <ul class="uk-breadcrumb">
      <li><a href="<?=BASE_URL;?>">Forum</a></li>
      <li><a href="<?=BASE_URL;?>/admin">Admin</a></li>
      <li><span href="<?=BASE_URL;?>/admin/site_settings.php">Site Settings</span></li>
      </ul>

<form action="site_settings.php" method="POST">
    <fieldset class="uk-fieldset">

        <legend class="uk-legend">Modify Any Settings</legend>


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
            <label class="uk-form-label" for="form-stacked-text">Site URL</label>
            <input class="uk-input" type="text" name="site_url" value="<?=getSettings('site_url')?>">
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text">Site Title</label>
            <input class="uk-input" type="text" name="site_title" value="<?=getSettings('site_title')?>">
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text">Image Type Accepted</label>
            <input class="uk-input" type="text" name="image_type" value="<?=getSettings('image_accepted')?>">
        </div>

        
        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text">Default Usergroup</label>
            <input class="uk-input" type="text" name="default_user" value="<?=getSettings('default_usergroup')?>">
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text">Default Confirmed</label>
            <input class="uk-input" type="text" name="default_confirmed"  value="<?=getSettings('default_confirmed')?>">
        </div>

        <div class="uk-margin">
            <input class="uk-button uk-button-primary" type="submit" name="settings_update" value="Update">
            <input class="uk-button uk-button-default" type="reset" value="Reset">
        </div>



    </fieldset>
</form>


<?php include VIEWS_URL.'/layouts/admin_footer.php'; ?>
