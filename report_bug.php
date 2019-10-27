<?php
/* Template Name: ReportBugs Page */
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
      <li class="active">Report Bugs</li>
    </ol>
  </section>


  <section class="content" style="min-height: 100%;">
    <div class="">
      <div class="box-header with-border">

      </div>

      <div class="box-body" style="">
        <div class="row">

          <div class="col-md-12" ng-controller="reportBugCtrl">
            <div class="tab-content shadow">
              <div class="tab-pane active">
                <div class=" panel panel-custom">
                  <div class="panel-heading">
                    <div class="panel-title">
                      <strong>Report Bugs</strong>
                    </div>
                  </div>
                  <div class="panel-body form-horizontal">
                    <form class="form-horizontal" id="frm_reportbug">

                      <input type="hidden" name="action" value="other_settings">
                      <div class="form-group mb0 col-sm-6">
                        <label>Name</label>
                        <input name="person_name" id="person_name" placeholder="Your Name"
                               class="form-control" ng-model="person_name"
                               type="text" required>

                      </div>

                      <div class="form-group mb0 col-sm-6">
                        <label>Choose Type Of Request</label>
                        <select class="form-control selectpicker" id="type_to_report">
                          <option value="bugs">Bugs</option>
                          <option value="feature">Feature</option>
                          <option value="others">Others</option>
                        </select>

                      </div>

                      <div class="form-group mb0 col-sm-12">
                        <label>Description</label>
                        <textarea required rows="9" class="form-control" ng-model="email_desc"
                                  placeholder="Describe in details about the request you are facing issues. Note : Your details will forward to 007loknathdas@gmail.com "></textarea>
                      </div>
                      <div class="form-group mb0 col-sm-12">


                        <button ng-click="sendInfo()"
                                class="btn btn-primary fix_radius pull-right pmd-ripple-effect"><span
                              class="fa fa-floppy-o"></span>&nbsp;Send Email
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </section>
</div>


<?php
get_footer();
?>
<!-- Adding Javascript -->
<script type="text/javascript">
  jQuery(document).ready(function ($) {


  });
</script>