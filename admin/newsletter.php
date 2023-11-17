<?php

include("header.php");

$query = "SELECT * from newsletter";
$newsletters = db::getRecords($query);




?>


<section id="breadcrumb-alignment">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between breadcrumb-wrapper">
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb mt-2">
                                <li class="breadcrumb-item"><a href="javascript:void(0)"><i class='bx bx-home-alt mx-1'></i>Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Newsletters</a></li>


                            </ol>

                        </nav>
                        <nav aria-label="breadcrumb ">
                            <div class="ml-auto">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info bg-info bg-darken-2 m-1 " data-toggle="modal" data-target="#create-banner">Send Email By Intrests</button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success bg-success bg-darken-2 m-1 " data-toggle="modal" data-target="#create-banner1">Send Email By Users</button>
                                </div>

                                <div class="modal fade" id="create-banner" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content radius-30">
                                            <div class="modal-header bg-primary bg-darken-2 border-bottom-0">
                                                <h3 class="text-white m-1">Send Newsletter</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body p-5">

                                                <form action="action.php" method="post" enctype="multipart/form-data">

                                                    <div class="form-group">
                                                        <label class="h4">Intrest</label>

                                                        <select class="form-control form-control-lg" name="c_id" required>
                                                            <option value="" selected disabled>Select Intrest</option>
                                                            <option value="0">All</option>
                                                            <?php

                                                            $query = "SELECT * from category";
                                                            $categories = db::getRecords($query);

                                                            if($categories!=NULL)
                                                            {
                                                                foreach($categories as $category)

                                                                {

                                                            ?>
                                                            <option value="<?php echo $category['id']; ?>"><?php echo $category['c_name']; ?> </option>
                                                            <?php
                                                                }
                                                            }

                                                            else{

                                                            ?>
                                                            <option value="" disabled><?php echo "No Intrest Found" ; ?> </option>
                                                            <?php
                                                            }


                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="h4">Description</label>
                                                        <textarea type="text" name="description" rows="4" id="desc_text" class="form-control form-control-lg radius-30" required> </textarea>
                                                    </div>

                                                    <hr />
                                                    <div class="form-group">
                                                        <span onclick="preview()" data-dismiss="edit_view" data-toggle="modal" data-target="#view-details<?php echo $product['id']; ?>">
                                                            <button data-toggle="popover" data-trigger="hover" data-original-title="View Newsletter" type="button" class="btn btn-linkedin"><i class="fa fa-eye"></i></button>
                                                        </span>



                                                        <button type="submit" class="btn btn-primary float-right radius-30 btn-lg" name="send_newsletter">Send</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="create-banner1" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content radius-30">
                                            <div class="modal-header bg-success bg-darken-2 border-bottom-0">
                                                <h3 class="text-white m-1">Send Newsletter</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body p-5">

                                                <form action="action.php" method="post" enctype="multipart/form-data">

                                                    <div class="form-group">
                                                        <label class="h4">Users</label>

                                                        <select class="form-control form-control-lg select2" name="users[]" required multiple>

                                                            <?php
                                                            $q=1;
                                                            $query="SELECT * from users where status='0' && verify='1' && newsletter='1'";
                                                            $users=db::getRecords($query);

                                                            if($users!=NULL)
                                                            {
                                                                $q=2;
                                                                ?>
                                                            <option value="0">All</option>
                                                            <?php
                                                                foreach($users as $user)

                                                                {

                                                            ?>
                                                            <option value="<?php echo $user['email']; ?>"><?php echo $user['f_name']; ?>&nbsp;<?php echo $user['l_name']; ?> </option>
                                                            <?php
                                                                }
                                                            }
                                                            else{

                                                            ?>
                                                            <!--                                                            <option value="" disabled><?php echo "No User Found" ; ?> </option>-->
                                                            <?php
                                                            }


                                                            $query = "SELECT * from newsletter";
                                                            $userss=db::getRecords($query);
                                                            if($userss!=NULL)
                                                            {
                                                                if($q==1){
                                                                ?>
                                                            <option value="0">All</option>
                                                            <?php
                                                                    }
                                                                foreach($userss as $users)

                                                                {
                                                                    $u_id = $users['email'];

                                                                    $query="SELECT * from users where status='0' && verify='1' && email='$u_id'";
                                                                    $user=db::getRecord($query);

                                                            ?>
                                                            <option value="<?php echo $user['email']; ?>"><?php echo $user['f_name']; ?>&nbsp;<?php echo $user['l_name']; ?> </option>
                                                            <?php
                                                                }
                                                            }
                                                            else{

                                                            ?>
                                                            <!--                                                            <option value="" disabled><?php echo "No User Found" ; ?> </option>-->
                                                            <?php
                                                            }


                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="h4">Description</label>
                                                        <textarea type="text" name="description" rows="4" id="desc_text" class="form-control form-control-lg radius-30" required> </textarea>
                                                    </div>

                                                    <hr />
                                                    <div class="form-group">
                                                        <span onclick="preview()" data-dismiss="edit_view" data-toggle="modal" data-target="#view-details<?php echo $product['id']; ?>">
                                                            <button data-toggle="popover" data-trigger="hover" data-original-title="View Newsletter" type="button" class="btn btn-linkedin"><i class="fa fa-eye"></i></button>
                                                        </span>



                                                        <button type="submit" class="btn btn-primary float-right radius-30 btn-lg" name="send_newsletter_to_users">Send</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>

                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Alignment Ends -->


<div class="card">
    <div class="card-body">

        <!-- Row grouping -->
        <section id="row-grouping-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-title">
                            <h2 class="mb-0 text-center h1 text-primary uppercase">Newsletters</h2>
                        </div>
                        <hr>
                        <div class="card-datatable">
                            <table id="example" class="table   table-bordered" style="width:100%">
                                <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>Email</th>
                                        <th>Intrests</th>
                                        <th>Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count=0;
                                    if($newsletters!=NULL)
                                    {

                                        foreach($newsletters as $newsletter)

                                        {
                                            $count++;

                                    ?>
                                    <tr>

                                        <td> <?php echo $count; ?></td>
                                        <td> <?php echo $newsletter['email']; ?></td>

                                        <td> <?php
                                            $newsletter_email = $newsletter['email'];

                                            $query="SELECT * from newsletter_intrests where email='$newsletter_email'";
                                            $newsletter_intrests=db::getRecords($query);

                                            if($newsletter_intrests!=NULL){

                                                foreach($newsletter_intrests as $newsletter_intrest){
                                                    $newsletter_c_id =$newsletter_intrest['c_id'];

                                                    $query = "SELECT * from category where id = '$newsletter_c_id'";
                                                    $newsletter_intrest_name = db::getRecord($query);

                                            ?>
                                            <span><?php echo $newsletter_intrest_name['c_name']; ?></span>,
                                            <?php
                                                }
                                            }else{

                                                echo "-";
                                            }


                                            ?>
                                        </td>


                                        <td>
                                            <span onclick="delete_newsletter('<?php echo $newsletter['email']; ?>')">
                                                <a data-toggle="popover" data-trigger="hover" data-original-title="Delete Newsletter" class="btn btn-pinterest m-1"><i class="bx bx-trash"></i></a>
                                            </span>
                                        </td>
                                    </tr>
                                    <!-- Modal -->

                                    <?php
                                        }

                                    }


                                    $query = "SELECT * from users where newsletter='1'";
                                    $user_newsletters =db::getRecords($query);

                                    if($user_newsletters!=NULL)
                                    {

                                        foreach($user_newsletters as $user_newsletter)

                                        {
                                            $count++;

                                    ?>
                                    <tr>

                                        <td> <?php echo $count; ?></td>
                                        <td> <?php echo $user_newsletter['email']; ?></td>
                                        <td> <?php echo "-"; ?></td>
                                        <td>
                                            <span onclick="delete_newsletter('<?php echo $user_newsletter['email']; ?>')">
                                                <a data-toggle="popover" data-trigger="hover" data-original-title="Delete Newsletter" class="btn btn-pinterest m-1"><i class="bx bx-trash"></i></a>
                                            </span>
                                        </td>

                                    </tr>
                                    <!-- Modal -->

                                    <?php
                                        }

                                    }

                                    ?>





                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Row grouping -->

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="delete_modal" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content  border-0">
            <div class="modal-header bg-danger bg-darken-2 border-bottom-0">
                <h5 class="modal-title" style="color:white;">Delete Newsletter</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="action.php" method="POST">
                    <div class="modal-body">
                        <p class="text-danger">Are You Sure to Delete This</p>
                    </div>
                    <input type="text" id="delete_email" name="delete_email" hidden>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="delete_newsletter" class="btn btn-outline-danger">Delete</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade text-left" data-backdrop="false" id="preview_modal" tabindex="-2" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title  my-1">View Newsletter </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-start">


                    <div class="col-md-12">
                        <!DOCTYPE html>
                        <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

                        <head>
                            <meta charset="utf-8">
                            <!-- utf-8 works for most cases -->
                            <meta name="viewport" content="width=device-width">
                            <!-- Forcing initial-scale shouldn't be necessary -->
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <!-- Use the latest (edge) version of IE rendering engine -->
                            <meta name="x-apple-disable-message-reformatting">
                            <!-- Disable auto-scale in iOS 10 Mail entirely -->
                            <title></title>
                            <!-- The title tag shows in email notifications, like Android 4.4. -->
                            <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
                            <!-- CSS Reset : BEGIN -->
                            <style>
                                /* What it does: Remove spaces around the email design added by some email clients. */
                                /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
                                html,
                                body {
                                    margin: 0 auto !important;
                                    padding: 0 !important;
                                    height: 100% !important;
                                    width: 100% !important;
                                    background: #f1f1f1;
                                }

                                /* What it does: Stops email clients resizing small text. */
                                * {
                                    -ms-text-size-adjust: 100%;
                                    -webkit-text-size-adjust: 100%;
                                }

                                /* What it does: Centers email on Android 4.4 */
                                div[style*="margin: 16px 0"] {
                                    margin: 0 !important;
                                }

                                /* What it does: Stops Outlook from adding extra spacing to tables. */
                                table,
                                td {
                                    mso-table-lspace: 0pt !important;
                                    mso-table-rspace: 0pt !important;
                                }

                                /* What it does: Fixes webkit padding issue. */
                                table {
                                    border-spacing: 0 !important;
                                    border-collapse: collapse !important;
                                    table-layout: fixed !important;
                                    margin: 0 auto !important;
                                }

                                /* What it does: Uses a better rendering method when resizing images in IE. */
                                img {
                                    -ms-interpolation-mode: bicubic;
                                }

                                /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
                                a {
                                    text-decoration: none;
                                }

                                /* What it does: A work-around for email clients meddling in triggered links. */
                                *[x-apple-data-detectors],
                                /* iOS */
                                .unstyle-auto-detected-links *,
                                .aBn {
                                    border-bottom: 0 !important;
                                    cursor: default !important;
                                    color: inherit !important;
                                    text-decoration: none !important;
                                    font-size: inherit !important;
                                    font-family: inherit !important;
                                    font-weight: inherit !important;
                                    line-height: inherit !important;
                                }

                                /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
                                .a6S {
                                    display: none !important;
                                    opacity: 0.01 !important;
                                }

                                /* What it does: Prevents Gmail from changing the text color in conversation threads. */
                                .im {
                                    color: inherit !important;
                                }

                                /* If the above doesn't work, add a .g-img class to any image in question. */
                                img.g-img+div {
                                    display: none !important;
                                }

                                /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
                                /* Create one of these media queries for each additional viewport size you'd like to fix */
                                /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
                                @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
                                    u~div .email-container {
                                        min-width: 320px !important;
                                    }
                                }

                                /* iPhone 6, 6S, 7, 8, and X */
                                @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
                                    u~div .email-container {
                                        min-width: 375px !important;
                                    }
                                }

                                /* iPhone 6+, 7+, and 8+ */
                                @media only screen and (min-device-width: 414px) {
                                    u~div .email-container {
                                        min-width: 414px !important;
                                    }
                                }

                            </style>
                            <!-- CSS Reset : END -->
                            <!-- Progressive Enhancements : BEGIN -->
                            <style>
                                .primary {
                                    background: #17bebb;
                                }

                                .bg_white {
                                    background: #222;
                                }

                                .bg_light {
                                    background: #f7fafa;
                                }

                                .bg_black {
                                    background: #000000;
                                }

                                .bg_dark {
                                    background: rgba(0, 0, 0, .8);
                                }

                                .email-section {
                                    padding: 2.5em;
                                }

                                /*BUTTON*/
                                .btn {
                                    padding: 10px 15px;
                                    display: inline-block;
                                }

                                .btn.btn-primary {
                                    border-radius: 5px;
                                    background: #17bebb;
                                    color: #E1800C;
                                }

                                .btn.btn-white {
                                    border-radius: 5px;
                                    background: #E1800C;
                                    color: #000000;
                                }

                                .btn.btn-white-outline {
                                    border-radius: 5px;
                                    background: transparent;
                                    border: 1px solid #fff;
                                    color: #fff;
                                }

                                .btn.btn-black-outline {
                                    border-radius: 0px;
                                    background: transparent;
                                    border: 2px solid #000;
                                    color: #000;
                                    font-weight: 700;
                                }

                                .btn-custom {
                                    color: rgba(0, 0, 0, .3);
                                    text-decoration: underline;
                                }

                                h1,
                                h2,
                                h3,
                                h4,
                                h5,
                                h6 {
                                    font-family: 'Poppins', sans-Roboto Slab;
                                    color: #000000;
                                    margin-top: 0;
                                    font-weight: 500;
                                }

                                body {
                                    font-family: 'Poppins', sans-Roboto Slab;
                                    font-weight: 400;
                                    font-size: 15px;
                                    line-height: 1.8;
                                    color: rgba(0, 0, 0, .4);
                                }

                                a {
                                    color: #17bebb;
                                }

                                table {}

                                /*LOGO*/
                                .logo h1 {
                                    margin: 0;
                                }

                                .logo h1 a {
                                    color: #17bebb;
                                    font-size: 24px;
                                    font-weight: 700;
                                    font-family: 'Poppins', sans-Roboto Slab;
                                }

                                /*HERO*/
                                .hero {
                                    position: relative;
                                    z-index: 0;
                                }

                                .hero .text {
                                    color: rgba(0, 0, 0, .3);
                                }

                                .hero .text h2 {
                                    color: #000;
                                    font-size: 34px;
                                    margin-bottom: 0;
                                    font-weight: 200;
                                    line-height: 1.4;
                                }

                                .hero .text h3 {
                                    font-size: 24px;
                                    font-weight: 300;
                                }

                                .hero .text h2 span {
                                    font-weight: 600;
                                    color: #000;
                                }

                                .text-author {
                                    bordeR: 1px solid rgba(0, 0, 0, .05);
                                    max-width: 50%;
                                    margin: 0 auto;
                                    padding: 2em;
                                }

                                .text-author img {
                                    border-radius: 50%;
                                    padding-bottom: 20px;
                                }

                                .text-author h3 {
                                    margin-bottom: 0;
                                }

                                ul.social {
                                    padding: 0;
                                }

                                ul.social li {
                                    display: inline-block;
                                    margin-right: 10px;
                                }

                                /*FOOTER*/
                                .footer {
                                    border-top: 1px solid rgba(0, 0, 0, .05);
                                    color: rgba(0, 0, 0, .5);
                                }

                                .footer .heading {
                                    color: #000;
                                    font-size: 20px;
                                }

                                .footer ul {
                                    margin: 0;
                                    padding: 0;
                                }

                                .footer ul li {
                                    list-style: none;
                                    margin-bottom: 10px;
                                }

                                .footer ul li a {
                                    color: rgba(0, 0, 0, 1);
                                }

                                @media screen and (max-width: 500px) {}

                            </style>
                        </head>

                        <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
                            <center style="width: 100%; background-color: #f1f1f1;">
                                <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-Roboto Slab; ">
                                    &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                                </div>
                                <div style="max-width: 600px; margin: 0 auto;" class="email-container">
                                    <!-- BEGIN BODY -->
                                    <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
                                        <tr>
                                            <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
                                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td class="logo" style="text-align: center;">
                                                            <h1 style="color: white">Newsletter</h1>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
                                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">

                                                    <tr>
                                                        <td style="text-align: center;">
                                                            <div class="text">
                                                                <img src="https://oppdripp.com/assets/images/logo.png" style="width: 250px; text-align: center;">
                                                                <br>
                                                                <br>

                                                                <h4 style="color: white" id="desc_id"></h4>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <!-- end tr -->
                                        <!-- 1 Column Text + Button : END -->
                                    </table>
                                </div>
                            </center>
                        </body>

                        </html>

                    </div>





                </div>

            </div>

        </div>
    </div>
</div>



<?php
include("footer.php");
?>

<script>
    function delete_newsletter(email) {
        //        alert();
        document.getElementById("delete_email").value = email;


        $("#delete_modal").modal('show');
    }

    function preview() {

        var desc = document.getElementById("desc_text").value;
        document.getElementById("desc_id").innerHTML = desc;
        $("#preview_modal").modal('show');
    }

</script>
