<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body class="bg-light">
        <section class="container mt-5">
            <section class="row justify-content-md-center">
                <div class="col col-lg-4 col-md-4 col-sm-4">
                    <?php
                    include 'config.php';

                    if (array_key_exists("name", $_POST) && array_key_exists("lastname", $_POST)) {
                        $crud->create($_POST['name'], $_POST['lastname']);
                    } else {
                        echo "Patikrinkite ar nepalikote tučių laukelių. ";
                        echo "Įvyko klaida, kreipkitės telefonu +370 6xx xxxxx ";
                    }
                    ?>
                    <p>Užregistruota sėkmingai</p>
                    <a href="index.php"> grįžti atgal</a>
                </div>
            </section>
        </section>
    </body>
</html>
