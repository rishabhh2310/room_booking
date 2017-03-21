<?php
    $to = 'b14130@students.iitmandi.ac.in';
    $subject = 'Your room booking';
    $message = 'Your room has been booked with bookid= 34234. please dont reply to this mail';
    $headers = 'From:bathlasaksham@gmail.com';
    if (mail($to,$subject,$message,$headers)){
        echo("<p>sent</p>");
    }else{
        echo("<p>failed</p>");
    }
?>
