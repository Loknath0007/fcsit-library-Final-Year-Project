<?php
/* Template Name: ChangePassword Page */
if (!is_user_logged_in()) {
    wp_redirect(get_home_url());
}
get_header();
?>
<?php
if (current_user_can('administrator')) {
    get_sidebar();
} else {
    get_sidebar("user");
}

?>

    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Change Password</li>
            </ol>
        </section>
        <section class="content" style="min-height: 100%;">
            <div class="box box-default" ng-controller="changePasswordCtrl">
                <div class="box-header with-border">

                </div>
                <div class="box-body" style="">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" id="lib_password_form" style="width: 94%;">
                                <input type="hidden" name="action" value="change_password"/>
                                <h3>Change password</h3>
                                <p>Hints on getting your new password right:</p>
                                <p>Your new password must be between 8 and 15 characters in length.</p>
                                <hr/>
                                <div class="form-group">
                                    <label for="first_name" class="col-sm-4 control-label pull-left reset_sm">New
                                        Password</label>
                                    <div class="col-sm-8">
                                        <input name="new_pass" id="new_pass" ng-model="frm_ChangePassData.new_pass"
                                               placeholder="New Password" class="form-control fix_radius pull-left"
                                               type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="first_name" class="col-sm-4 control-label pull-left reset_sm">Confirm
                                        New Pasword</label>
                                    <div class="col-sm-8">
                                        <input name="confirm_pass" id="confirm_pass"
                                               ng-model="frm_ChangePassData.confirm_pass" placeholder="Confirm Password"
                                               class="form-control fix_radius pull-left" type="text">
                                    </div>
                                </div>


                                <hr/>


                            </form>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button ng-click="updatePass()" id="btn_chg_pass"
                            class="btn btn-primary pull-right fix_radius pmd-ripple-effect btn_change_password"><span
                                class="fa fa-floppy-o"></span>&nbsp; Change Password
                    </button>
                </div>
            </div>
    </div>
    </section>
    </div>

<?php
get_footer();
?>