<?php
require 'functions.php';
if (!empty($_POST['comment']) && !empty($_POST['book_id'])) {
    addComment($_POST['comment'], $_POST['book_id']);
}
header("Location: /page.php?book_id={$_POST['book_id']}");
