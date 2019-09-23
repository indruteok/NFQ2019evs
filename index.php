<?php
include 'config.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            .font1{
                font-size: 300px;
            }
        </style>
    </head>
    <body class="bg-light mt-5">
        <p class="mb-2 ml-5"><b> <a href="create.php">Užsiregistruoti atvykus (Administravimo puslapis)</a> </b></p>
        <p class="mb-2 ml-5"> <a href="user.php">Lankytojo puslapis</a></p>
        <p class="mb-2 ml-5 text-black-50">laukimo vidurkis vienam asmeniui apie: 
            <?php
            echo $crud->countAverageTimeReturn();
            ?>
            minutes(-čių).
        </p>
        <section class="container">
            <section class="row">
                <div class="col col-lg-4 col-md-4 col-sm-4">
                    <h5>Greitu metu kviesime:</h5>
                    <p><?php
                        $crud->getRowInvite($crud->countAverageTimeReturn());
                        ?></p>
                </div>
                <div class="col col-lg-8 col-md-8 col-sm-8">
                    <h1>Kviečiame užeiti:</h1>
                    <p class="font1 text-danger font-weight-bold pl-5"> 
                        <?php
                        $crud->getInvite();
                        ?></p>
                </div>
            </section>
            <a href="spec.php">Specialistui</a>
    </body>
</html>
