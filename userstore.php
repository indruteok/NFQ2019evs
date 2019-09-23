<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta http-equiv="refresh" content="5">
    </head>
    <body class="bg-light">
        <section class="container mt-5">
            <section class="row justify-content-md-center">
                <div class="col col-lg-4 col-md-4 col-sm-4">
                    <?php
                    include 'config.php';
                    $crud->identification();

                    echo "Sveiki, <br>";
                    if (array_key_exists("number", $_SESSION)) {
                        echo "Jūsų eilės numerys yra: ";
                        echo $_SESSION['number'];
                        echo "<br> Jums liko laukti apie:  ";
                        
                        ;
                        $crud->getLeftTime($crud->countAverageTimeReturn());
                        echo " minutes(-čių) <br>";
                        $crud->getUserId($_SESSION['number']);
                    } else {
                        echo "Įvyko klaida, kreipkitės telefonu +370 6xx xxxxx ";
                    }
                    ?>


                    <a href="index.php"> grįžti atgal į pagrindinį puslapį</a>
                </div>
            </section>
        </section>
    </body>
</html>
