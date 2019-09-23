<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
                    <p class="mt-5 font-weight-bold">Registracija</p>
                    <form class="mb-5" action="store.php" method="POST">
                        <div class="mt-3">  Įveskite savo vardą:<br>
                            <input tabindex="name" name="name" value="">
                        </div>
                        <div class="mt-3">Įveskite savo pavardę:<br>
                            <input tabindex="lastname" name="lastname" value="">
                        </div>
                        <br>

                        <input type="submit" value="Išsagoti">
                    </form>

                    <a  href="index.php"> Atšaukti registraciją</a>
                </div>
            </section>


    </body>
</html>
