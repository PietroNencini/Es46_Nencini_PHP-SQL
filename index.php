<?php
    include "./php/connection.php";
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=ù, initial-scale=1.0">
    <!--* TITOLO DELLA PAGINA-->
    <title>Esercizio 46</title>
    <!--* FAVICON-->
    <link rel="icon" type="image/x-icon" href="./images/world-wide-web.png">
    <!--* BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--* CSS PERSONALE-->
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    
    <h1 class="bg-primary text-white text-center p-3"> ELIMINAZIONE DI RECENSIONI </h1>

    
    <?php

        $query_review = "SELECT F.titolo AS titolo, R.* FROM recensioni R INNER JOIN film F ON R.CodFilm = F.CodFilm";

        if(!$result = $conn->query($query_review)) {
            echo "Errore nella query";
            exit();
        }

    ?>

    <form action="./php/delete_review.php" method="post">    
        <table class="table w-75 mx-auto my-3 rounded-3">

            <?php
                if($result->num_rows > 0) {

                echo "<tr class='fs-3'> ";
                while($field = $result->fetch_field()) {
                    if($field->name != "IDRecensione") {
                        echo "<th> $field->name </th>";
                    }
                }
                echo "<th class='text-center bg-warning-subtle'> ELIMINA </th>";
                echo "</tr>";

                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    foreach($row as $field_name => $value) {
                        if($field_name != "IDRecensione") {
                            echo "<td> $value </td>";
                        }
                    }
                    echo "<td class=' text-center bg-warning-subtle'> <input type='checkbox' name='choiceReview[]' value='$row[IDRecensione]'> </td>";
                }

                } else {
                    echo "<p> Nessuna recensione presente nel DB </p>";
                }
            ?>
            
        </table>
        <div class="d-flex justify-content-center w-100 mb-3">
            <button type="submit" class="btn btn-danger fs-3"> ELIMINA SELEZIONATE </button>
        </div>
    </form>
    <!--? SCRIPT DI BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!--? JAVASCRIPT PERSONALE-->
    <script src="./javascript/script.js"></script>
</body>
</html>