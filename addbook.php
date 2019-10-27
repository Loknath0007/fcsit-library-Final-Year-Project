<?php
/* Template Name: AddBook Page */
if (!is_user_logged_in()) {
    wp_redirect(get_home_url());
}
get_header();
?>
<?php
get_sidebar();
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Resources</li>
      </ol>
    </section>

    <section class="content" style="min-height: 100%;" ng-controller="AddBookCtrl">
      <form class="form-horizontal" id="book_add_form" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-3 col-sm-12">
            <img ng-src="{{book_src || '<?php echo get_template_directory_uri() . '/img/259x340.png' ?>'}}"
                 class="img-responsive" alt="Book Cover" width="100%">
          </div>
          <div class="col-md-9 col-sm-12">
            <div class="tab-content shadow" style="border: 0;padding:0;">
              <div class="tab-pane active">
                <div class="panel panel-custom">
                  <div class="panel-heading">
                    <div class="panel-title">
                      <strong>Add Resources</strong>
                    </div>
                  </div>
                  <div class="panel-body form-horizontal">
                    <input type="hidden" name="action" value="add_book_data">
               <input type="hidden" name="book_src" id="book_src">
                    <!--            <input type="hidden" name="attach_bill_id" id="attach_bill_id">-->
                    <input type="hidden" name="book_goo_id" id="book_goo_id">
                    <div class="form-group mb0 col-sm-6">
                      <label>ISBN/Resources No.<a class="book_sht_add"
                                      style="        position: absolute;margin-top: -18px;right: -15px;"
                                      target="_blank"
                                      tooltips
                                      tooltip-template="Open google books."
                                      tooltip-side="bottom"
                                      href="https://books.google.com"><i
                              class="fa fa-link" aria-hidden="true"></i></a></label>

                      <input name="book_isbn" placeholder="Enter ISBN/Resources No."
                             ng-model="book_isbn" "
                             class="form-control isbn_txt" type="text">

                    </div>
                    <div class="form-group mb0 col-sm-6">
                      <label>Author Name</label>

                      <input name="book_author" id="book_author" ng-model="book_author"
                             placeholder="Enter Author Name" class="form-control" type="text">

                    </div>
                    <div class="form-group mb0 col-sm-12">
                      <label>Resources Title *</label>

                      <input name="book_title" id="book_title" ng-model="book_title"
                             placeholder="Enter Resources Title" class="form-control" type="text">

                    </div>

                    <div class="form-group mb0 col-sm-6">
                      <label>Resources Category *</label>

                      <input name="book_category" tooltips
                             tooltip-template="Generally categories most of the books.Since it will become the menu in the front end.Make it short and simple."
                             tooltip-side="bottom" id="book_category" ng-model="book_category"
                             placeholder="Enter Category, EG: E-book, FYP Thesis, Journals, Books" class="form-control" type="text">

                    </div>
                    <div class="form-group mb0 col-sm-6">
                      <label>Publisher</label>

                      <input name="book_publisher" id="book_publisher" ng-model="book_publisher"
                             placeholder="Enter Publisher Name" class="form-control" type="text">

                    </div>

                    <div class="form-group mb0 col-sm-12">
                      <label>Google Book Url</label>
                      <input name="book_url" id="book_url" ng-model="book_url"
                             placeholder="Google Book Preview Will Auto Populate here" tooltips
                             tooltip-template="Google Book Preview Will Auto Populate here if there are no preview available then you can upload pdf book below."
                             tooltip-side="top" class="form-control fix_radius pull-left"
                             style="width: 94%;height: 37px;" type="text" readonly>
                      <button class="btn btn-primary fix_radius pull-right" ng-click="visitUrl()" style="width: 5%;"><i
                            class="fa fa-external-link" aria-hidden="true"></i></button>
                    </div>


                    <!-- <div class="form-group">
                        <label for="book_url" class="col-sm-2 control-label">Book Url</label>
                        <div class="col-sm-8">
                            <input name="book_url" id="book_url" ng-model="book_url" placeholder="Eg : https://drive.google.com/open?id=0BwiX2HTj2EuFaURvUWcxTERjblU" tooltips tooltip-template="Google Book Preview Will Auto Populate here if there are no preview available then you can upload book in your Gdrive & paste the link here."  tooltip-side="top" class="form-control fix_radius pull-left" style="width: 91%;height: 37px;" type="text">
                            <button class="btn btn-primary fix_radius pull-right" ng-click="visitUrl()"><i class="fa fa-external-link" aria-hidden="true"></i></button>
                        </div>
                    </div> -->

                    <div class="form-group mb0 col-sm-6">
                      <label>Upload Resources Img</label>

                      <input type="file" class="form-control" id="book_upload_img"  name="book_upload_img" tooltips
                             tooltip-template="Upload image if no google image preview availabe.">

                    </div>
                    <div class="form-group mb0 col-sm-6">
                      <label>Upload Pdf</label>

                      <input type="file" class="form-control" id="book_upload_pdf" name="book_upload_pdf" tooltips
                             tooltip-template="Upload pdf if no preview availabe."
                             tooltip-side="bottom">

                    </div>
                    <div class="form-group mb0 col-sm-12">
                      <label>External Url</label>

                      <input name="book_external_url" id="book_external_url" ng-model="book_external_url"
                             placeholder="Enter exteral url" class="form-control fix_radius" type="text" tooltips
                             tooltip-template="When you enter the external url the user will be redirected to this link instead of a preview."
                             tooltip-side="bottom">

                    </div>
                    <div class="form-group mb0 col-sm-6">
                      <label>Price *</label>

                      <input name="book_price" id="book_price" ng-model="book_price"
                             placeholder="Enter Price" class="form-control fix_radius" type="text">

                    </div>
                    <div class="form-group mb0 col-sm-6">
                      <label>Quantity *</label>

                      <input type="text" id="book_qty" name="book_qty" ng-model="book_qty"
                             placeholder="Enter Resources Quantity" class="form-control fix_radius">

                    </div>
                    <div class="form-group mb0 col-sm-12">
                      <label>Resources Desc</label>

                      <textarea rows="4" id="book_desc" class="form-control" ng-model="book_desc"
                                name="book_desc" placeholder="Enter Resources Description"></textarea>

                    </div>
                    <div class="form-group md0 col-sm-12" style="    padding-right: 0px;">
                      <button type="button" ng-click="saveBook()"
                              class="btn btn-primary fix_radius pmd-ripple-effect pull-right add_btn_book"><span
                            class="fa fa-floppy-o"></span> Add Resources
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
  </div>
  <!-- </div> -->
<?php
get_footer();
?>