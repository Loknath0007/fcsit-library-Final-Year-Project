<?php $is_connected = is_connected(); ?>
  <!DOCTYPE html>
  <html ng-app="myApp">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta charset="ISO-8859-15">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="<?php echo get_option('inst_meta_keyword'); ?>"/>
    <meta name="description" content="<?php echo get_option('inst_meta_desc'); ?>"/>
    <?php wp_head();?>
  <meta name="author" content="">
    <title><?php echo get_option('inst_meta_title'); ?></title>
    <link href="<?php echo get_template_directory_uri(); ?>/fonts/fonts.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/iziToast.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style5.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/front.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animate.min.css">
      
    <style>
      a.slidesjs-next,
      a.slidesjs-previous,
      a.slidesjs-play,
      a.slidesjs-stop {
        background-image: url(<?php echo get_template_directory_uri(); ?>/img/btns-next-prev.png);
        background-repeat: no-repeat;
        display: block;
        width: 12px;
        height: 18px;
        overflow: hidden;
        text-indent: -9999px;
        float: left;
        margin-right: 5px;
      }

      .back_book_holder_img {
        background-image: url(<?php echo get_template_directory_uri(); ?>/img/stand.png);
        width: 100%;
        background-size: cover;
      }

      .slidesjs-pagination li a {
        display: block;
        width: 13px;
        height: 0;
        padding-top: 13px;
        background-image: url(<?php echo get_template_directory_uri(); ?>/img/pagination.png);
        background-position: 0 0;
        float: left;
        overflow: hidden;
      }

      .submit {
        color: black;
      }

      .comment-respond {
        width: 70%;
      }

      .comment {
        background-color: aliceblue;
        margin-top: 15px;
        padding: 10px;
      }

      #comments {
        margin-bottom: 3%;
      }

      .comment-reply-link {
        color: blue;
      }

      .reply {
        margin-bottom: 15px;
      }

      .avatar {
        border-radius: 50% !important;
      }

      ol li {
        list-style-type: none;
      }

      .more_style {
        width: 17px;
        padding-top: 15px;
      }

      .more_menu {

        position: absolute;
        top: 100%;
        right: 0%;
        background: #ffffff;
        width: 20%;
        padding: 20px;
        padding-top: 10px;
        z-index: 12;
        border: 1px solid lightgray;
      }

      .show_menu_stl {
        padding: 8px;
        list-style: none;
      }

      .show_menu_stl:hover {
        background-color: #d4d3d140;
      }

      #scrollUp {
        bottom: 0;
        right: 30px;
        width: 70px;
        height: 70px;
        margin-bottom: -10px;
        padding: 10px 5px;
        font: 14px/20px sans-serif;
        text-align: center;
        text-decoration: none;
        /* text-shadow: 0 1px 0 #fff; */
        color: #f5f5f5;
        -webkit-box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.2);
        box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.2);
        background-color: #101010;
        background-image: -moz-linear-gradient(top, #EBEBEB, #DEDEDE);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#EBEBEB), to(#DEDEDE));
        background-image: -webkit-linear-gradient(top, #EBEBEB, #DEDEDE);
        background-image: -o-linear-gradient(top, #EBEBEB, #DEDEDE);
        background-image: linear-gradient(to bottom, #292323, #151111);
        background-repeat: repeat-x;
        -webkit-transition: margin-bottom 150ms linear;
        -moz-transition: margin-bottom 150ms linear;
        -o-transition: margin-bottom 150ms linear;
        transition: margin-bottom 150ms linear;
      }

      #scrollUp:hover {
        margin-bottom: 0;
      }

      #sidebar {
        background: <?php echo get_option("custom_theme_color")?>;
      }

      #sidebar ul li.active > a, a[aria-expanded="true"] {
        background: <?php echo get_option("custom_theme_color")?>;
      }

      #sidebar ul.components {
        border: 0px;
      }

      #sidebar .sidebar-header {
        background: <?php echo get_option("custom_theme_color")?>;
      }

      .book_m_hlder, .slide_h {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/new_loading.gif");
        background-repeat: no-repeat;
        background-position: 50% 50%;
      }

      <?php
      $find = ["link","script","http","https","eval","$","jQuery","function","javascript"];
      $replace = [""];
      echo str_replace($find,$replace,get_option("custom_css_front_page"));
      $var_img_css = "margin: auto;width: 100%;border: 1px solid;height: 278px;";
      ?>
    </style>

  </head>
  <body>
  <div class="wrapper">

      <?php include_once("frontmenu.php") ?>
    <div id="content" ng-controller="CtrlBookLoadFront">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" id="sidebarCollapse" style="width:15% !important;" class="navbar-btn">
              <span></span>
              <span></span>
              <span></span>
            </button>

            <div class="logo_frnt" style="width:85% !important;">
              <a style="float: left;" href="<?php echo get_site_url(); ?>"><img
                    src="<?php $src = wp_get_attachment_image_src(get_option('inst_attach_photo_id'), "full")[0];
                    if (!empty($src)) {
                        echo $src;
                    } else {
                        echo get_template_directory_uri() . '/img/default_university.png';
                    } ?>" class="univ_img"
                    style="<?php echo get_option("logo_css", "width: 53px;float: none;margin-left: 5px;margin-top: 3px;"); ?>"
                    class="img-responsive"/>
                </a>
            </div>
            
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php
                global $wpdb;
                $full_data = $wpdb->get_results("select DISTINCT (category) as Category from tblbooks where Qty>0");
                $count = 0;
                foreach ($full_data as $obj) {
                    $count++;
                    if ($count <= get_option('nos_of_menu_to_show', "5")) {
                        ?>
                      <li class="show_pointer menu_nav_<?php echo $count; ?>"><a
                            onclick="$('#<?php $t_val = $obj->Category;
                            $t_val = str_replace(" ", "_", $t_val);
                            echo $t_val; ?>').animatescroll();"><?php echo ucfirst(strtolower($obj->Category)); ?></a>
                      </li>
                        <?php
                    } else {
                        ?>
                      <li class="show_pointer more_style_li"><img
                            src="<?php echo get_template_directory_uri() . '/img/more.png'; ?>"
                            class="img-responsive more_style"></li>
                        <?php
                        break;
                    }
                }
                ?>

            </ul>
            <div class="more_menu">
                <?php
                $count = 0;
                foreach ($full_data as $obj) {
                    $count++;
                    if ($count > get_option('nos_of_menu_to_show', "5")) { ?>
                      <li class="show_pointer show_menu_stl"><a onclick="$('#<?php $t_val = $obj->Category;
                          $t_val = str_replace(" ", "_", $t_val);
                          echo $t_val; ?>').animatescroll();"><?php echo ucfirst(strtolower($obj->Category)); ?></a>
                      </li>
                        <?php
                    }
                }
                ?>
            </div>
          </div>
        </div>
      </nav>

      <div class="slide_holder" ng-controller="CtrlSlides">
        <div id="slides" ng-show="full_slides.length>1">
          <img ng-src="{{slide.img_url}}" ng-repeat="slide in full_slides" class="img-responsive">
        </div>
        <img ng-src="{{slide.img_url}}" ng-show="full_slides.length==1" style="height: 480px;width: 100%;"
             ng-repeat="slide in full_slides" class="img-responsive">
        <img ng-src="<?php echo get_template_directory_uri() . '/img/default_holder.jpg' ?>"
             class="img-responsive slide_h"
             style="height: 480px;width: 100%;" ng-show="full_slides.length==0">
      </div>
      <hr/>

      <div class="full_bk_container">

        <div style="height: 134px;background-color: #f5f5f5;padding-top: 21px;">
          <div class="strike"><span
                style="font-size: 36px;color: #555;-webkit-font-smoothing: antialiased;font-family: 'Raleway';    font-weight: 700;"><?php echo get_option("front_page_s1","FCSIT Library Books") ?></span>
          </div>
          <hr class="hr_new">
        </div>
        <div id="book_list">
            <?php
            global $wpdb;
            $full_data = $wpdb->get_results("select DISTINCT (category) as Category from tblbooks where Qty>0");
            foreach ($full_data as $obj) {
                ?>
              <div id="<?php $t_val = $obj->Category;
              $t_val = str_replace(" ", "_", $t_val);
              echo $t_val; ?>">
                <h2 style="padding-bottom: 24px; border-bottom: 1px solid lightgray;margin-bottom: 20px;"><?php echo $obj->Category; ?></h2>
                <div class="row">
                    <?php $sub_data = $wpdb->get_results("select * from tblbooks where Category like '" . $obj->Category . "' and Qty>0 limit " . get_option('nos_of_book_to_show', '20'));
                    foreach ($sub_data as $obj_sub) { ?>
                      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 book_f"
                          <?php
                          $todo = "showFullData('" . $obj_sub->ISBN . "','" . $obj_sub->BookUrl . "','basic');";
                          if (!empty($obj_sub->ExternalUrl)) {
                              $todo = "redirect('" . $obj_sub->ExternalUrl . "')";
                          }
                          ?>
                           ng-click="<?php echo $todo; ?>">
                          <?php
                          $img_url = "";
                          if ($obj_sub->MainCoverId != "") {
                              $img_url = wp_get_attachment_image_src($obj_sub->MainCoverId, "full", false)[0];
                          } else {
                              $img_url = $obj_sub->MainCoverUrl;
                          }
                          //var_dump($obj_sub);
                          ?>
                        <div>
                          <div class="book_m_hlder">
                            <img data-src='<?php echo $img_url; ?>' class="img-responsive lazyMain"
                                 style="<?php echo $var_img_css; ?>"/>
                              <?php
                              $issued_qty = $wpdb->get_var("select count(id) as Cnt from tblsubbooks where Available=1 and Active=1 and ParentBookId=" . $obj_sub->Id);
                              ?>
                              <?php if ($issued_qty > 0) { ?>
                                <div class="ribbon-green"><span>Available</span></div>
                              <?php } else { ?>
                                <div class="ribbon-red"><span>All Issued</span></div>
                              <?php } ?>
                          </div>
                        </div>
                      </div>

                    <?php } ?>
                </div>
              </div>
                <?php
            }
            if (empty($full_data)) { ?>
              <div class="no_books">No Books Available Right Now.Come Back Later.</div>
                <?php
            }
            ?>

        </div>


        <div id="contact_us" class="contact_us row hidden-sm hidden-xs">


          <div class="section-content">
            <h1 class="section-header">Get in <span class="content-header wow fadeIn " data-wow-delay="0.2s"
                                                    data-wow-duration="2s"> Touch with us</span></h1>
          </div>

          <div class="row contact-section" style="margin: 0px;">
            <div class="col-lg-7 col-md-6 col-sm-6">
                <?php if ($is_connected) { ?>
                  <iframe width="100%" height="350" src="<?php echo get_option('inst_gmap'); ?>" frameborder="0"
                          scrolling="no" marginheight="0" marginwidth="0"><a
                        href="https://www.maps.ie/create-google-map/">Google Maps iframe generator</a>
                  </iframe>
                <?php } else { ?>
                  <img
                      src="<?php echo strpos(get_option('inst_gmap'), "google") !== false ? get_template_directory_uri() . '/img/map.png' : get_option('inst_gmap'); ?>"
                      class="img-responsive">
                <?php } ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <h3 style="margin-top: 5px;">About us</h3>
              <address>
                  <?php echo get_option('inst_frnt_desc'); ?>
              </address>
              <p class="white_p">Address : <?php echo get_option('inst_address'); ?></p>
              <p class="white_p">Phone : <a
                    href="tel:<?php echo get_option('inst_phone'); ?>"><?php echo get_option('inst_phone'); ?></a><span
                    ng-init="fax='<?php echo get_option('inst_fax'); ?>'"
                    ng-show="fax!=''"> | Fax : <?php echo get_option('inst_fax'); ?></span></p>
              <p class="white_p">E-mail : <a
                    href="mailto:<?php echo get_option('inst_email'); ?>"><?php echo get_option('inst_email'); ?></a>
              </p>
            </div>
            <div class="col-md-12 colsm-12" style="border-top: 1px solid #b29999;margin-top: 10px;">
              <form id="sendContactsForm">
                <input type="hidden" name="action" value="frnt_contact"/>
                <div class="col-md-6 form-line" style="padding-top: 2%;padding-bottom: 4%;">
                  <div class="form-group">
                    <label for="exampleInputUsername">Your name</label>
                    <input type="text" class="form-control" ng-model="c_name" name="c_name"
                           placeholder=" Enter Name" autocomplete="name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail">Email Address</label>
                    <input type="email" class="form-control" name="c_email" ng-model="c_email"
                           placeholder=" Enter Email id" autocomplete="email">
                  </div>
                  <div class="form-group">
                    <label for="telephone">Mobile No.</label>
                    <input type="tel" class="form-control" name="c_phone" ng-model="c_phone"
                           placeholder=" Enter mobile no." autocomplete="tel-national">
                  </div>
                </div>
                <div class="col-md-6" style="padding-top: 2%;">
                  <div class="form-group">
                    <label for="description"> Message</label>
                    <textarea class="form-control" id="c_desc" name="c_desc" ng-model="c_desc"
                              placeholder="Enter Your Message"></textarea>
                  </div>
                  <div>
                    <button ng-click="sendContactDetails()" class="btn btn-default submit"><i
                          class="fa fa-paper-plane" aria-hidden="true"></i> Send Message
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="row" style="margin: 0px;padding: 15px;background-color: white;color: black;">
            <div class="pull-right hidden-xs">
              <b>Version</b>1.0
            </div>
            <strong>Copyright © 2018-<?php echo date("Y"); ?> <a
                  href="http://fcsitlibrary.tk/">FCSIT</a>.</strong> All rights
            reserved. Best Viewed in Chrome & Firefox and above at resolution 1024 X 768

          </div>

           
        </div>

      </div>


    </div>
  </div>
  <div class="modal fade" id="showBookFromGoogle" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
       aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content fix_radius">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                class="sr-only">Close</span></button>
          <h3 class="modal-title" id="lineModalLabel">Books Preview</h3>
        </div>
        <div class="modal-body">
          <div class="row" style="padding: 10px;margin: auto;">
            <div id="viewerCanvas" style="width: 100%; height: 500px"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="animatedModal">
    <!--THIS IS IMPORTANT! to close the modal, the class name has to match the name given on the ID  class="close-animatedModal" -->
    <div class="close-animatedModal">
      <img class="closebt pull-right show_pointer" src="<?php echo get_template_directory_uri(); ?>/img/closebtn.png"
           style="    width: 30px;margin-right: 3%;margin-top: 3%;">
    </div>

    <div class="modal-contents">
      <input type="text" class="form-control" placeholder="Search for books.." style="width: 80%;margin-top: 7%;height: 60px;
                  margin-left: 11%;padding: 20px;font-size: 20px;" id="adv_search_text">
      <br/>
      <div class="grid" style="width: 80%;margin: auto;" ng-controller="CtrlBookLoadFront">
        <div class="row reset_margin" style="margin-top: 3%;">
            <?php
            global $wpdb;
            $full_data = $wpdb->get_results("select DISTINCT (category) as Category from tblbooks where Qty>0");
            foreach ($full_data as $obj) {
                ?>

                <?php $sub_data = $wpdb->get_results("select * from tblbooks where Category like '" . $obj->Category . "' and Qty>0");
                foreach ($sub_data as $obj_sub) { ?>
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 book_f grid-item"
                      <?php
                      $todo = "showFullData('" . $obj_sub->ISBN . "','" . $obj_sub->BookUrl . "','adv_search');";
                      if (!empty($obj_sub->ExternalUrl)) {
                          $todo = "redirect('" . $obj_sub->ExternalUrl . "')";
                      }
                      ?>
                       ng-click="<?php echo $todo; ?>">
                    <p class="b_name" style="display: none;"><?php echo $obj_sub->BookTitle; ?></p>
                      <?php
                      $img_url = "";
                      if ($obj_sub->MainCoverId != "") {
                          $img_url = wp_get_attachment_image_src($obj_sub->MainCoverId, "full", false)[0];
                      } else {
                          $img_url = $obj_sub->MainCoverUrl;
                      }
                      ?>
                    <div>
                      <div class="book_m_hlder">
                        <img data-src='<?php echo $img_url; ?>' class="img-responsive img-book-frnt lazyPopup"
                             style="<?php echo $var_img_css; ?>"/>
                          <?php
                          $issued_qty = $wpdb->get_var("select count(id) as Cnt from tblsubbooks where Available=1 and Active=1 and ParentBookId=" . $obj_sub->Id);
                          ?>
                          <?php if ($issued_qty > 0) { ?>
                            <div class=" ribbon-green"><span>Available</span></div>
                          <?php } else { ?>
                            <div class="ribbon-red"><span>All Issued</span></div>
                          <?php } ?>
                      </div>
                    </div>
                  </div>

                <?php } ?>


                <?php
            }
            ?>
        </div>
      </div>
    </div>
  </div>

  <a id="btnSearch" href="#animatedModal" style="font-size: 12px!important;color: #fff!important;background-color: #0c0c0c !important;border-radius: 50%;    border: none;display: inline-block;outline: 0;padding: 8px 16px;vertical-align: middle;overflow: hidden;text-decoration: none;color: inherit;background-color: inherit;text-align: center;cursor: pointer;white-space: nowrap;bottom: 7%;
            left: 2%;position: fixed;border-radius: 50px !important;">+ Search Books</a>


  <!-- jQuery CDN -->
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.12.0.min.js"></script>
  <!-- Bootstrap Js CDN -->
  <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/iziToast.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/offline.min.js"></script>
  <?php if ($is_connected) { ?>
    <script type="text/javascript" src="https://www.google.com/books/jsapi.js"></script>
  <?php } ?>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.slides.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/isotope.pkgd.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/animatedmodal.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.scrollUp.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.lazy.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.lazy.plugins.min.js"></script>
  <script type="text/javascript">
    var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";
    var site_path = "<?php echo get_template_directory_uri(); ?>";
    var is_connected = "<?php echo $is_connected;?>";
    $(document).ready(function () {
        <?php if ($is_connected) { ?>
      google.books.load();
        <?php } ?>
      $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
      });

      $('.lazyMain').Lazy();
      if (screen.width >= 1024) {
        $("#sidebarCollapse").hide();
        $(".logo_frnt").css("float", "left");
      }

      $("#btnSearch").animatedModal({
        "color": "rgb(255, 255, 255)",
        "animatedIn": "lightSpeedIn",
        "animateOut": "bounceOutDown",
        "beforeOpen": function () {
          $('.lazyPopup').Lazy({appendScroll:"#animatedModal"});
        },
        "afterClose":function()
        {
          $("#adv_search_text").val("");
        }
      });
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0;
    });

    $(function () {
      $.scrollUp({
        scrollName: 'scrollUp',
        topDistance: '300',
        topSpeed: 300,
        animation: 'fade', // Fade, slide, none
        animationInSpeed: 200, // Animation in speed (ms)
        animationOutSpeed: 200, // Animation out speed (ms)
        scrollText: 'Scroll to top', // Text for element
        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
      });
    });


  </script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/animatescroll.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/angular.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.blockUI.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/front_custom.js"></script>
  </body>
  <?php wp_footer();?>
  </html>
