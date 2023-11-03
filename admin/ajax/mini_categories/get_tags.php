<?php
session_start();
require_once("../database.php");

$id = $_POST ['id'];

//fetching sub categories

$query = "SELECT * from article_tag where article_id='$id'";
$article_tags = db::getRecords($query);



$empty= "Select Option";
$no_result= "No Resluts Found";
$article_tag=NULL;

if($article_tags!=NULL)
{   

    $flag=0;

    if($article_tags!=NULL)
    {
        $flag=1;   
    }

    $size=sizeof($article_tags);

    $article_tag=NULL;

    for($i=0;$i<$size;$i++)
    {
        if($i==($size-1))
        {
            //this code concatinates tags name
            $article_tag=$article_tag.$article_tags[$i]['name'];

        }
        else
        {
            //this code concatinates tags name
            $article_tag=$article_tag.$article_tags[$i]['name'].",";

        }

    }
}

// echo "$article_tag";
//
//  echo "<div class='bs-input' >                          
//                       <input type='text' class='input'  name='tags[]'  data-role='tagsinput' value='".$article_tag."'> </div>";
?>
<head>
<script src="dist/bootstrap-tagsinput.min.js"></script>
<script src="assets/app.js"></script>
<script src="assets/app_bs3.js"></script>
</head>
<div class="bs-input">
                            
<input type="text" class="input" name="edit_tags[]" id="edit_form-tags" value="<?php  echo $article_tag; ?>" data-role="tagsinput" required multiple />

</div>
<script>
    //This Enables the Confirm Keys of Input which is Enter, space, Comma.
    //By pressing these keys tags were written!!
    $('.input').tagsinput({
        confirmKeys: [13, 32, 44]
    });
</script>
<script>
    //this fuction changes the enterkey function (i.e submit the form) after this fuction enter key don't submits the form!
    $('.bootstrap-tagsinput input').keydown(function (event) {
        debugger;
        if ( event.which == 13) {
            $(this).blur();
            $(this).focus();
            return false;
        }
    });
</script>
