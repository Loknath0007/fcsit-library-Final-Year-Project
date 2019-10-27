<div ng-controller="sideBarCtrl">
  <header class="main-header">

    <a href="<?php echo get_url('dashboard'); ?>" class="logo">

      <span class="logo-mini"><b>LMS</b></span>

      <span class="logo-lg"><b>Admin Panel </b></span>
    </a>

    <nav class="navbar navbar-static-top">

      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


          <li class="dropdown notifications-menu">
            <a href="<?php echo get_url('view-request-book-data'); ?>">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">{{cnt_not_approved}}</span>
            </a>
          </li>
            <?php
            global $current_user;
            $userID = $current_user->ID;
            $photo_id = get_the_author_meta('pic_id', $userID);
            $fname = get_the_author_meta('lib_fname', $userID);
            $lname = get_the_author_meta('lib_lname', $userID);
            $udata = get_userdata($userID);
            $user_registerd = date("M Y", strtotime($udata->user_registered));
            ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height: 51px;">
              <img
                  ng-src="{{'<?php echo wp_get_attachment_image_src($photo_id)[0]; ?>' || '<?php echo get_template_directory_uri() . "/img/avatar.png" ?>'}}"
                  class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $fname . " " . $lname; ?></span>
            </a>
            <ul class="dropdown-menu">

              <li class="user-header">
                <img
                    ng-src="{{'<?php echo wp_get_attachment_image_src($photo_id)[0]; ?>' || '<?php echo get_template_directory_uri() . "/img/avatar.png" ?>'}}"
                    class="img-circle" alt="User Image">

                <p>
                    <?php echo $fname . " " . $lname; ?>
                  - <?php if (user_can($current_user, "Subscriber")) {
                        echo "User";
                    } else {
                        echo "Librarian";
                    } ?>
                  <small>Member since . <?php echo $user_registerd; ?></small>
                </p>
              </li>


              <li class="user-footer">
                <div class="" style="padding-left: 2%;">
                  <div class="pull-left">
                    <a href="<?php echo get_url('update-profile'); ?>"
                       class="btn btn-default btn-flat" style="height: 37px;">Profile</a>
                  </div>
                  <div class="pull-left">
                    <a target="_blank" href="<?php echo get_site_url(); ?>"
                       class="btn btn-default btn-flat" style="height: 37px;">Visit Site</a>
                  </div>
                  <div class="pull-left">
                    <a href="<?php echo wp_logout_url(get_home_url()); ?>"
                       class="btn btn-default btn-flat" style="height: 37px;">Sign out</a>
                  </div>
                </div>
              </li>
            </ul>
          </li>

          <li>
            <a href="<?php echo get_url('other-settings'); ?>"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">

    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
          <img
              ng-src="{{'<?php echo wp_get_attachment_image_src($photo_id)[0]; ?>' || '<?php echo get_template_directory_uri() . "/img/avatar.png" ?>'}}"
              class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $fname . " " . $lname; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <ul class="sidebar-menu">


        <li ng-class="{'treeview':true,active: isActive('<?php echo get_url('dashboard'); ?>','') }">
          <a href="<?php echo get_url('dashboard'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>

          </a>
        </li>


        <li id="MyPorfileMain" class="treeview">
          <a href="#">
            <i class="fa fa-gift"></i> <span>My Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ng-class="{ active: isActive('<?php echo get_url("change-password"); ?>','MyPorfileMain') }">
              <a href="<?php echo get_url("change-password"); ?>"><i class="fa fa-circle-o"></i> Change
                Password</a></li>
            <li ng-class="{ active: isActive('<?php echo get_url("update-profile"); ?>','MyPorfileMain') }">
              <a href="<?php echo get_url("update-profile"); ?>"><i class="fa fa-circle-o"></i> Update
                Details</a></li>
          </ul>
        </li>


        <li id="ManageBookMain" class="treeview">
          <a href="#">
            <i class="fa fa-gift"></i> <span>Manage Resources</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ng-class="{ active: isActive('<?php echo get_url("add-book"); ?>','ManageBookMain') }"><a
                  href="<?php echo get_url("add-book"); ?>"><i class="fa fa-circle-o"></i> Add
                Resources</a></li>
            <li ng-class="{ active: isActive('<?php echo get_url("manage-books"); ?>','ManageBookMain') }">
              <a href="<?php echo get_url("manage-books"); ?>"><i class="fa fa-circle-o"></i> View
                Resources</a></li>
          </ul>
        </li>

        <li id="ManageBookMain" class="treeview">
          <a href="#">
            <i class="fa fa-folder-open-o"></i> <span>Manage Issue Resources</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">

             <li ng-class="{'treeview':true,active: isActive('<?php echo get_url("issue-books"); ?>','') }">
          <a href="<?php echo get_url('issue-books'); ?>">
            <i class="fa fa-folder-open-o"></i> <span> Issue Resources</span>

          </a>
        </li>

         <li ng-class="{'treeview':true,active: isActive('<?php echo get_url("manage-issued-books"); ?>','') }">
          <a href="<?php echo get_url('manage-issued-books'); ?>">
            <i class="fa fa-list"></i> <span> View All Issued Resources</span>

          </a>
        </li>

          <li ng-class="{'treeview':true,active: isActive('<?php echo get_url("manage-return-archive"); ?>','') }">
          <a href="<?php echo get_url('manage-return-archive'); ?>">
            <i class="fa fa-clock-o "></i> <span> View All Archive Resources</span>

          </a>
        </li>     
       </ul>
        </li>


        <li id="MainUserMenu" class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Fines & Request Resources</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li ng-class="{'treeview':true,active: isActive('<?php echo get_url('manage-fines'); ?>','') }">
          <a href="<?php echo get_url('manage-fines'); ?>">
            <i class="fa fa-money"></i> <span>Manage Fines</span>

          </a>
        </li>
        <li ng-show="<?php echo get_option("do_online_payment"); ?>" ng-class="{'treeview':true,active: isActive('<?php echo get_url('manage-online-dues'); ?>','') }">
          <a href="<?php echo get_url('manage-online-dues'); ?>">
            <i class="fa fa-money"></i> <span>Manage Online Paid Dues</span>

          </a>
        </li>

        <li ng-class="{'treeview':true,active: isActive('<?php echo get_url('view-request-book-data'); ?>','') }">
          <a href="<?php echo get_url('view-request-book-data'); ?>">
            <i class="fa fa-heart-o "></i> <span> View Request Resources Data</span>

          </a>
        </li>

          </ul>
        </li>






        <li id="MainUserMenu" class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Manage Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ng-class="{ active: isActive('<?php echo get_url('add-user'); ?>','MainUserMenu') }"><a
                  href="<?php echo get_url('add-user'); ?>"><i class="fa fa-circle-o"></i> Add
                User</a></li>
            <li ng-class="{ active: isActive('<?php echo get_url('manage-users'); ?>','MainUserMenu') }"><a
                  href="<?php echo get_url('manage-users'); ?>"><i class="fa fa-circle-o"></i> View
                All Users</a></li>
          </ul>
        </li>


 <li id="ManageBookMain" class="treeview">
          <a href="#">
            <i class="fa fa-television"></i> <span>Manage Slides & Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            
            <li ng-class="{'treeview':true,active: isActive('<?php echo get_url('manage-slides'); ?>','') }">
          <a href="<?php echo get_url('manage-slides'); ?>">
            <i class="fa fa-television"></i> <span> Manage Slides</span>

          </a>
        </li>

        <li id="ManagePageMainMenu" class="treeview">
          <a href="#">
            <i class="fa fa-pagelines"></i> <span>Manage Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ng-class="{ active: isActive('<?php echo get_url('add-page'); ?>','ManagePageMainMenu') }">
              <a href="<?php echo get_url('add-page'); ?>"><i class="fa fa-circle-o"></i> Add Page</a></li>
            <li ng-class="{ active: isActive('<?php echo get_url('manage-pages'); ?>','ManagePageMainMenu') }">
              <a href="<?php echo get_url('manage-pages'); ?>"><i class="fa fa-circle-o"></i> List All Page</a>
            </li>
          </ul>
        </li>
          </ul>
  </li>

 
          <li id="ManageBookMain" class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

            <ul class="treeview-menu">

              <li ng-class="{'treeview':true,active: isActive('<?php echo get_url('manage-institution'); ?>','') }">
          <a href="<?php echo get_url('manage-institution'); ?>">
            <i class="fa fa-sliders "></i> <span> Institution Setup</span>

          </a>
        </li> 
              
              <li id="SettingMainMenu" class="treeview">
          <a href="#">
            <i class="fa fa-sliders"></i> <span>Courses Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu"> 

            <li ng-class="{ active: isActive('<?php echo get_url('manage-course'); ?>','SettingMainMenu') }">
              <a href="<?php echo get_url('manage-course'); ?>"><i class="fa fa-circle-o"></i> Manage
                Courses</a></li>
            <li ng-class="{ active: isActive('<?php echo get_url('manage-years'); ?>','SettingMainMenu') }">
              <a href="<?php echo get_url('manage-years'); ?>"><i class="fa fa-circle-o"></i> Manage Years</a>
            </li>
          </ul>
        </li>

         <li ng-class="{'treeview':true,active: isActive('<?php echo get_url('other-settings'); ?>','') }">
          <a href="<?php echo get_url('other-settings'); ?>">
            <i class="fa fa-gears"></i> <span>Master Settings</span>

          </a>
        </li>

            </ul>

        </li>

        
        <li ng-class="{'treeview':true,active: isActive('<?php echo get_url('report-bugs'); ?>','') }">
          <a href="<?php echo get_url('report-bugs'); ?>">
            <i class="fa fa-bug"></i> <span>Report Bugs</span>

          </a>
        </li>
        <li ng-class="{'treeview':true,active: isActive('<?php echo get_url('about-software'); ?>','') }">
          <a href="<?php echo get_url('about-software'); ?>">
            <i class="fa fa-clock-o "></i> <span> About Software</span>
          </a>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
</div>