<!DOCTYPE html>
<html>
<head>
    <title>Awesome Search Box</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css">


</head>
<!-- Coded with love by Mutiullah Samim-->
<body>
<div class="container h-100">
    <img id="preloader" src="css/Preloader.gif" style="position: fixed; width: 1500px; display: none">
    <div class="d-flex justify-content-center h-100">
        <div class="searchbar">
            <input class="search_input" type="text" name="" placeholder="Search...">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="templateType" id="main" value="main" checked>
                <label class="form-check-label" for="main">Main</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="templateType" id="table" value="table">
                <label class="form-check-label" for="table">Table</label>
            </div>
            <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
            <div id="output"></div>
        </div>
    </div>
</div>
<script>
    $('.search_input').on('keypress', function(e) {
        if (e.which == 13) {
            $('#preloader').show();
            $.ajax({
                url : '/ajax.php',
                method: 'post',
                data : {
                    search: $(this).val(),
                    type: $('input[name=templateType]:checked').val()
                    }
            }).done(function(data) {
                $('#output').html(data);
            }).fail(function(xhr, error) {
                console.log(arguments);
            }).always(function() {
                $('#preloader').hide();
            })
        }
    });
</script>
</body>
</html>
