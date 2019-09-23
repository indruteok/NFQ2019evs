<?php
include 'config.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="bg-light">
        <section class="container mt-5">
            <section class="row justify-content-md-center">
                <div class="col col-lg-8 col-md-8 col-sm-8">
                    <p><b>Laukiančiųjų eilė:</b></p>
                    <?php
                    $crud->getAllToSpec();
                    ?>
                </div>
            </section>
        </section>
    </body>
</html>
