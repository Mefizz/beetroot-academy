<?php
require 'vendor/autoload.php';
//if (!empty($_POST['feedback'])) {
$class = new Mailer();
$class->notifyFeedback();
//echo "thx for feedback";
//<!--<script language="javascript" type="text/javascript">-->
//<!--    alert('Thank you for your feedback, have a nice day!')-->
//<!--</script>-->
header('Location: /');
//else {
//    echo 'error';
//}
//} else { "ty loh";
//<script language="javascript" type="text/javascript">
//    alert('Error , please check forms or try later')
//</script>
//}
?>
