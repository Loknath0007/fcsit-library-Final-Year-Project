<?php
/* Template Name: Dashboard Page */
if (!is_user_logged_in()) {
    wp_redirect(get_home_url());
}
global $current_user;
if (user_can($current_user, "Subscriber")) {
    wp_redirect(get_permalink(get_page_by_path("list-book-for-user")));
}
get_header();
?>

<?php
get_sidebar();
?>


<div class="content-wrapper" ng-controller="DashBoardCtrl">

  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">

    <div class="row">
      <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-aqua"
             ng-click="redirect('<?php echo get_permalink(get_page_by_path('manage-issued-books')); ?>')">
          <div class="inner">
            <h3>{{book_issued}}</h3>
            <p>Issued Resources</p>
          </div>
          <div class="icon">
            <i class="ion-ios-book-outline"></i>
          </div>

        </div>
      </div>

      <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-green"
             ng-click="redirect('<?php echo get_permalink(get_page_by_path('manage-users')); ?>')">
          <div class="inner">
            <h3>{{total_users}}</h3>

            <p>Manage Users</p>
          </div>
          <div class="icon">
            <i class="ion-ios-people-outline"></i>
          </div>

        </div>
      </div>

      <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-yellow"
             ng-click="redirect('<?php echo get_permalink(get_page_by_path('manage-books')); ?>')">
          <div class="inner">
            <h3>{{total_books}} | {{total_books_type}}</h3>

            <p>Manage Resources</p>
          </div>
          <div class="icon">
            <i class="ion-ios-book-outline"></i>
          </div>

        </div>
      </div>

      <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-red"
             ng-click="redirect('<?php echo get_permalink(get_page_by_path('manage-fines')); ?>')">
          <div class="inner">
            <h3>{{total_fine_collected}}</h3>

            <p>Fine Collected</p>
          </div>
          <div class="icon">
            <i class="ion-social-euro-outline"></i>
          </div>

        </div>
      </div>

    </div>

    <div class="row">
      <div id="chartContainer" class="img-responsive"></div>


    </div>
  </section>


</div>

<?php
get_footer();
?>  

