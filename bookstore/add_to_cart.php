<?php
require 'functions.php';

if (!empty($_POST)) {
    addToCart($_POST['book_id'], $_POST['count']);
}
header('Location: /page.php?book_id=' . $_POST['book_id']);