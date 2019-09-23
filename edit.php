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
                    $id = $_GET['id'];

                    $usersVisi = $crud->getEdit($id);
                    ?>
                    <form action="update.php?id=<?php echo $id; ?>" method="POST">
                        Vardas:<br>
                        <input tabindex="text" name="name" value="<?php echo $usersVisi['name']; ?>"><br>
                        Pavardė:<br>
                        <input tabindex="text" name="lastname" value="<?php echo $usersVisi['lastname']; ?>"><br>
                        Laikas: <br>
                        <input tabindex="time" name="time" value="<?php echo $usersVisi['time']; ?>"><br>
                        <input type="submit" value="pavėlinti"> 
                        <input type="submit" value="Išsagoti">
                    </form>
                </div>
            </section>
        </section>

    </body>
</html>
