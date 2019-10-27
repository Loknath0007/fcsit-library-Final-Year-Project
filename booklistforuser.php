<?php
/* Template Name: BookListForUsers Page */

if (!is_user_logged_in()) {
    wp_redirect(get_home_url());
}
get_header();
?>

<?php
get_sidebar("user");
?>


<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Resources List For User</li>
        </ol>
    </section>


    <section class="content">


        <div class="box box-default" ng-controller="ListofbooksUserCtrl">
            <div class="box-header with-border">


            </div>

            <div class="box-body" style="">
                <div class="row">
                    <div class="col-md-12">


                        <div class="" style="padding: 10px;">
                            <form class="form-inline">

                                <label class="sr-only" for="inlineFormBookId">Resources Name</label>
                                <div class="input-group col-md-6" style="float: left;">
                                    <div class="input-group-addon fix_radius fix_filter"><i class="fa fa-filter"
                                                                                            aria-hidden="true"></i>
                                    </div>
                                    <input type="text" class="form-control fix_radius" ng-change="onBookName()"
                                           ng-model="filter_BookName" id="inlineFormBookName"
                                           placeholder="Type Resources Name">
                                </div>


                                <label class="sr-only" for="inlineFormUserID">ISBN</label>
                                <div class="input-group col-md-6">
                                    <div class="input-group-addon fix_radius fix_filter"><i class="fa fa-filter"
                                                                                            aria-hidden="true"></i>
                                    </div>
                                    <input type="text" class="form-control fix_radius" ng-change="onISBNChange()"
                                           ng-model="filter_ISBN" id="inlineFormISBN" placeholder="Type ISBN">
                                </div>


                            </form>

                        </div>


                        <table class="table table-bordered table-striped"
                               style="font-size: small; margin-bottom: 0px;   padding: 10px;">
                            <thead>
                            <tr>
                                <th style="display:none;">?</th>
                                <th class="" style="width: 120px;">ISBN</th>
                                <th class="" style="width: 155px;">Resources Name</th>
                                <th class="" style="width: 270px;">Resources Desc</th>
                                <th class="">Category</th>
                                <th class="">Price</th>
                                <th class="">Oty</th>
                                <th class="">Borrowed</th>

                            </tr>
                            </thead>
                            <tbody id="tb_managebook_container">

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>

            <div class="box-footer">
            </div>
        </div>
    </section>
</div>


<?php
get_footer();
?>	