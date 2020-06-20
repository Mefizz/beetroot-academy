<?php
$feedback =[
        'name' => null,
        'email' => null,
        'phone' => null,
        'text' => null
];
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"
        xmlns="http://www.w3.org/1999/html"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<div class="container">
    <div class="col-sm-6" style="padding-top:50px;">
        <div class="well">
            <h2>Post your feedback about products here</h2>
        </div>
        <div class="col-md-12">
            <div class="form-area">
                <form role="form" id="feedback" name="feedback" method="post" action="feedback_callback.php">
                    <div class="alert alert-success hide"></div>
                    <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Feedback Form</h3>

                    <div class="alert alert-danger hide"></div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" value="<?=$feedback['name'] ?>" name="name" placeholder="Name"/>
                        <label
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" value="<?=$feedback['email'] ?>" name="email" placeholder="Email" />
                    </div>
                    <div class="form-group">
                        <input type="number" pattern="[0-9]*"  class="form-control" value="<?=$feedback['phone'] ?>" id="phone" name="phone" placeholder="Mobile Number" />
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" type="text" id="comments" value="<?=$feedback['text'] ?>"  name="text" placeholder="text" maxlength="140" rows="7"></textarea>
                    </div>
                    <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Send feedback</button>

                </form>
            </div>
        </div>
    </div>
</div>
