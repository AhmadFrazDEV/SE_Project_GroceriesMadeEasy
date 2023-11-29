<?php
//checking method
if(isset($_POST['contact_submit'])){
    //get the data from the form
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $sub=$_POST['subject'];

    //save the data in the database
    $comment=$_POST['comment'];

    $message=file_get_contents("email.html");

    $variables= array(



        "{{name}}" => $name,
        "{{email}}" => $email,
        "{{phone}}" => $phone,
        "{{comment}}" => $comment

    );

    //replace the variables with the values
    foreach($variables as $key => $value){
        $message= str_replace($key, $value, $message);
    }

    $to = "Management@oppdripp.com";
    $subject = "$sub";

    $headers = NULL;
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "MIME-Version: 1.0\r\n";

    $email=mail($to,$subject,$message,$headers);


    if($email == true){
        //display success message
        echo "<script>alert('Message Sent Successfully!');</script>";
        echo "<script>location='index.php'</script>";
    }
    else{
        //display error message
        echo "<script>alert('Something Went Wrong!');</script>";
        echo "<script>location='contact.php'</script>";
    }
}
?>
