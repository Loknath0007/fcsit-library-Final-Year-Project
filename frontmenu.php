<!-- Sidebar Holder -->
<style>
  .actv {
    color: #000;
    background: #fff;
  }
</style>
<nav id="sidebar">
  <div class="sidebar-header">
    <a href="<?php echo get_home_url(); ?>"><h3><?php echo get_option('inst_name'); ?></h3></a>
  </div>

  <ul class="list-unstyled components">
    <li class="show_pointer">
        <?php if (is_home()) { ?>
          <a onclick="$('#book_list').animatescroll();">Books</a>
        <?php } else { ?>
          <a href="<?php echo get_home_url(); ?>">Home</a>
        <?php } ?>
    </li>
    <li class="show_pointer">
      <a href="<?php echo get_site_url() . '/login/'; ?>">Login (Admin & User)</a>
    </li>
      <?php
      global $wpdb;
      $fulldata = $wpdb->get_results("select * from " . $wpdb->prefix . "postmeta where meta_key='_wp_page_template' and meta_value='basic_template.php'");
      foreach ($fulldata as $obj) {
          if (get_post_status($obj->post_id) == "publish") {
              ?>
            <li class="show_pointer">
              <a class="show_pointer"
                 href="<?php echo get_permalink($obj->post_id); ?>"><?php echo get_post_meta($obj->post_id, "menu_name")[0]; ?></a>
            </li>
              <?php
          }
      }
      ?>
    <li class="show_pointer">
      <a
          <?php if(!is_home()){ echo "href='".get_home_url()."#contact_us'";} ?>
          onclick="$('#contact_us').animatescroll();">Contact</a>
    </li>
    <li class="show_pointer">
      <a class="show_pointer"  <?php if(!is_home()){ echo "href='".get_home_url()."#contact_us'";} ?>
         onclick="$('#contact_us').animatescroll();">About</a>
    </li>

  </ul>


</nav>