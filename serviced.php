<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
<body class="bg-light">
    <section class="container mt-5">
        <section class="row justify-content-md-center">
            <div class="col col-lg-8 col-md-8 col-sm-8">
                <?php
                include 'config.php';
                $crud->servised($_GET['id']);
                ?>
                aptarnauta, <a href="index.php"> grįžti atgal</a>
            </div>
        </section></section>
</section>
</section>
</body>
</html>
