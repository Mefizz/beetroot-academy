<?php
require 'functions.php' ;
//if (!empty($_POST)) {
$orderId = createOrder();
//}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heroic Features - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css" rel="stylesheet">
<style>
    body {
        margin-top: 20px;
        padding-top: 0px;
        /*position:relative;*/
    }
    footer {
        position: absolute;
        bottom: 0;
        left: 0;
        width:100%;
    }
</style>
</head>

<body>

<!-- Navigation -->
<?php require_once './templates/header.php' ?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
 $items = getCartItems();
?>
<div class="container">
    <div class="row">
        <div class="col-xs-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            <div class="col-xs-6">
                                <h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
                            </div>
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-primary btn-sm btn-block">
                                    <span class="glyphicon glyphicon-share-alt"></span> Continue shopping
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <?php foreach (getCartItems() as $item) : ?>
                    <div class="row">
                        <div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
                        </div>
                        <div class="col-xs-4">
                            <h4 class="product-name"><strong><?=$item['title'] ?></strong></h4><h4><small>Product description</small></h4>
                        </div>
                        <div class="col-xs-6">
                            <div class="col-xs-6 text-right">
                                <h6><strong><?=$item['cost'] ?> <span class="text-muted">x</span></strong></h6>
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control input-sm" value="<?=$item['count'] ?>">
                            </div>
                            <div class="col-xs-2">
                                <button type="button" class="btn btn-link btn-xs">
                                    <span class="glyphicon glyphicon-trash"> </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php endforeach; ?>
                    <div class="row">
                        <div class="text-center">
                            <div class="col-xs-9">
                                <h6 class="text-right">Added items?</h6>
                            </div>
                            <div class="col-xs-3">
                                <button type="button" class="btn btn-default btn-sm btn-block">
                                    Update cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row text-center">
                        <div class="col-xs-9">
                            <h4 class="text-right">Total <strong>₴ <?=getOrderTotal() ?></strong></h4>
                        </div>
                        <div class="col-xs-3">
                            <form method="POST" accept-charset="utf-8" action="https://www.liqpay.ua/api/3/checkout">
                                <input type="hidden" name="data" value="<?=getData($orderId) ?>" />
                                <input type="hidden" name="signature" value="<?=getSignature($orderId) ?>" />
                                <button style="border: none !important; display:inline-block !important;text-align: center !important;padding: 7px 20px !important;
		color: #fff !important; font-size:16px !important; font-weight: 600 !important; font-family:OpenSans, sans-serif; cursor: pointer !important; border-radius: 2px !important;
		background: rgb(122,183,43) !important;"onmouseover="this.style.opacity='0.5';" onmouseout="this.style.opacity='1';">
                                    <img src="https://static.liqpay.ua/buttons/logo-small.png" name="btn_text"
                                         style="margin-right: 7px !important; vertical-align: middle !important;"/>
                                    <span style="vertical-align:middle; !important">Pay <?=getOrderTotal() ?> UAH</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
