<?php include VIEWS_URL.'/layouts/admin_header.php'; ?>
<h1 class="uk-heading-bullet">Admin Panel</h1>
  <ul class="uk-breadcrumb">
      <li><a href="<?=BASE_URL;?>">Forum</a></li>
      <li><span href="<?=BASE_URL;?>/admin">Admin Dashboard</span></li>
  </ul>

  <div class="uk-text-center" uk-grid>
      <div class="uk-width-1-3">
          <div class="uk-card uk-card-default uk-card-body">
            <h1 style="color: #253a7e;"><?=totalUsers()?></h1>
            <p>Users Registered</p>
          </div>
      </div>
      <div class="uk-width-1-3">
          <div class="uk-card uk-card-default uk-card-body">
        <h1 style="color: #253a7e;"><?=totalPosts()?></h1>
            <p>Posts Created</p>
          </div>
      </div>
      <div class="uk-width-1-3">
          <div class="uk-card uk-card-default uk-card-body">
            <h1 style="color: #253a7e;"><?=totalThreads()?></h1>
            <p>Threads Posted</p>
          </div>
      </div>
  </div>


<?php include VIEWS_URL.'/layouts/admin_footer.php'; ?>
