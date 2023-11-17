<?php

include("header.php");


$status = "";
if(isset($_GET['status']))
{
    $status = $_GET['status'];
}

?>

<script>
    function old1(){
        var a = document.getElementById("old_password");
        if (a.type === "password") {
            a.type = "text";
        } else {
            a.type = "password";
        }
    }

    function new1(){
        var b = document.getElementById("new_password");
        if (b.type === "password") {
            b.type = "text";
        } else {
            b.type = "password";
        }
    }

    function confirm1(){
        var c = document.getElementById("confirm_password");
        if (c.type === "password") {
            c.type = "text";
        } else {
            c.type = "password";
        }
    }


</script>

<script type="text/javascript">
    var status = "<?php echo $status; ?>";
    if(status==1)
    {
        swal({
            title: "Password Updated Successfully!",
            text: " ",
            //   text: "Please Complete 2nd Step !",

            type: "success",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/gme/admin/users/user_change_password.php';
            const nextTitle = '';
            const nextState = { additionalInformation: '' };

            // This will create a new entry in the browser's history, without reloading
            window.history.pushState(nextState, nextTitle, nextURL);

            // This will replace the current entry in the browser's history, without reloading
            window.history.replaceState(nextState, nextTitle, nextURL);
            //   window.location.href = "started.php";
        });
    }
    if(status==2)
    {
        swal({
            title: "Passwords are not matched...",
            text: " ",
            //   text: "Please Complete 2nd Step !",

            type: "warning",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/gme/admin/users/user_change_password.php';
            const nextTitle = '';
            const nextState = { additionalInformation: '' };

            // This will create a new entry in the browser's history, without reloading
            window.history.pushState(nextState, nextTitle, nextURL);

            // This will replace the current entry in the browser's history, without reloading
            window.history.replaceState(nextState, nextTitle, nextURL);
            //   window.location.href = "started.php";
        });
    }
    if(status==3)
    {
        swal({
            title: "Old Password is not correct...!",
            text: " ",
            //   text: "Please Complete 2nd Step !",

            type: "warning",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/gme/admin/users/user_change_password.php';
            const nextTitle = '';
            const nextState = { additionalInformation: '' };

            // This will create a new entry in the browser's history, without reloading
            window.history.pushState(nextState, nextTitle, nextURL);

            // This will replace the current entry in the browser's history, without reloading
            window.history.replaceState(nextState, nextTitle, nextURL);
            //   window.location.href = "started.php";
        });
    }

    if(status==5)
    {
        swal({
            title: "Something Went Wrong!",
            //   text: "Please Complete 2nd Step !",
            type: "warning",
            timer: 3000,
            showConfirmButton: true
        }, function(){
            // Current URL: https://my-website.com/page_a
            const nextURL = 'https://dev.single-solution.com/gme/admin/users/user_change_password.php';
            const nextTitle = '';
            const nextState = { additionalInformation: '' };

            // This will create a new entry in the browser's history, without reloading
            window.history.pushState(nextState, nextTitle, nextURL);

            // This will replace the current entry in the browser's history, without reloading
            window.history.replaceState(nextState, nextTitle, nextURL);
            //   window.location.href = "started.php";
        });
    }

</script>

<div class="content-body"><div class="auth-wrapper auth-v1 px-2">
    <div class="auth-inner py-2">
        <!-- Reset Password v1 -->
        <div class="card mb-0">
            <div class="card-body">

                <h4 class="card-title mb-1">Change Password 🔒</h4>
                <p class="card-text mb-2">Your new password must be different from previously used passwords</p>

                <form class="auth-reset-password-form mt-2" action="../action.php" method="POST">
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <label for="reset-password-new">Old Password</label>
                        </div>
                        <input type="password" class="form-control" name="old_password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" id="old_password" autofocus required />
                        <input class="mt-2 mr-1" type="checkbox" onclick="old1()">Show Password


                    </div>


                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <label for="reset-password-new">New Password</label>
                        </div>
                        <input type="password" class="form-control" name="new_password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"  id="new_password" required />
                        <input class="mt-2 mr-1" type="checkbox" onclick="new1()">Show Password

                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <label for="reset-password-confirm">Confirm Password</label>
                        </div>
                        <input type="password" class="form-control" name="confirm_password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" id="confirm_password" required />
                        <input class="mt-2 mr-1" type="checkbox" onclick="confirm1()">Show Password

                    </div>
                    <button class="btn btn-primary btn-block" name="edit_user_password" tabindex="3">Set New Password</button>
                </form>


            </div>
        </div>
        <!-- /Reset Password v1 -->
    </div>
    </div>

</div>







<?php

include("footer.php");

?>
