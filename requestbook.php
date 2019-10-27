<?php
/* Template Name: RequestBook Page */

if (!is_user_logged_in()) {
    wp_redirect(get_home_url());
}
get_header();
?>


<?php

global $current_user;
$userID = $current_user->ID;
$user_login = $current_user->user_login;
$user_id = get_option('user_id');


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
            <li class="active">Request Resources</li>
        </ol>
    </section>


    <section class="content" style="min-height: 100%;">


        <div class="box box-default">
            <div class="box-header with-border">

            </div>

            <div class="box-body" style="" ng-controller="viewUserRequestBookCtrl">
                <div class="row">

                    <div class="col-md-9">
                        <form class="form-horizontal" id="lib_request_book">


                            <input type="hidden" name="action" value="request_book">

                            <div class="form-group">
                                <label for="book_name" class="col-sm-3 control-label pull-left reset_sm">Resources Name
                                    *</label>
                                <div class="col-sm-9">
                                    <input name="book_name" id="book_name"
                                           placeholder="Full Resources Name .Check Below To See If Same Resources Has Already Been Requested"
                                           class="form-control" type="text">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="book_url" class="col-sm-3 control-label pull-left reset_sm">Google/Amazon
                                    Book Url</label>
                                <div class="col-sm-9">
                                    <input name="book_url" id="book_url" placeholder="Resources Url If Any"
                                           class="form-control" type="text">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="note_on_book" class="col-sm-3 control-label pull-left reset_sm">Note
                                    *</label>
                                <div class="col-sm-9">
                                    <textarea rows="5" class="form-control fix_radius" id="note_on_book"
                                              name="note_on_book"
                                              placeholder="Why you required this Resources ? A Small note is required."></textarea>

                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button ng-click="sendRequest()"
                                            class="btn btn-primary fix_radius pull-right pmd-ripple-effect"><span
                                                class="fa fa-floppy-o"></span>&nbsp;Submit Request
                                    </button>
                                </div>
                            </div>


                        </form>


                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped tbluser"
                                   style="font-size: small;margin-bottom: 0px;overflow-x: scroll;">
                                <thead>
                                <tr>
                                    <th style="display:none;">?</th>
                                    <th class="" style="width: 15%;">Resources Name</th>
                                    <th class="">Url</th>
                                    <th class="" style="width: 45%;">Resources Desc</th>
                                    <th style="display:none;">User ID</th>
                                    <th class="" style="WIDTH: 11%;">Person Name</th>
                                    <th class="">Likes (<?php echo get_option('people_to_approve'); ?>)</th>
                                    <th class="" style="width: 9%;">Added On</th>
                                    <th class="" style="width: 80px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="9">
                                        <input type="text" ng-model="search.BookName"
                                               placeholder="Type Resources Name To Search For Before Placing Request.."
                                               class="form-control">
                                    </td>
                                </tr>
                                <tr ng-repeat="x in request_dataset | filter:search"
                                    ng-class="{'approved_book': x.Approved==1}">
                                    <td style="display:none;">{{x.Id}}</td>
                                    <td>{{x.BookName}}</td>
                                    <td><a target="_blank" href="{{x.BookUrl}}">Visit</a></td>
                                    <td>{{x.Notes}}</td>
                                    <td style="display:none;">{{x.UserId}}</td>
                                    <td>{{x.UserName}}</td>
                                    <td>{{x.Likes}}</td>
                                    <td>{{x.DateAdded}}</td>
                                    <td>
                                        <button class="btn btn-success" ng-click="like(x)"><i class="fa fa-thumbs-o-up"
                                                                                              aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
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