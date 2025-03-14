<?php
    include "connection.php";
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
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    
    <h1 class="bg-primary text-white text-center p-3"> RISULTATO ELIMINAZIONE </h1>

    <?php
        function delete_review($connect, $id_review) {
            $query_review = "DELETE FROM recensioni WHERE IDRecensione = $id_review";
            if(!$result = $connect->query($query_review)) 
                echo "Errore nell'eliminazione della recensione con id $id_review";
        }
    ?>

    <div class="w-75 mx-auto border border-3 border-black rounded-3 bg-secondary-subtle fs-5 text-center">
        <?php
            if(isset($_POST["choiceReview"])) {
                
                foreach($_POST["choiceReview"] as $id_review) {
                    delete_review($conn, $id_review);
                }

                echo "<p> Recensioni eliminate: <b>".count($_POST["choiceReview"])."</b></p>";
            } else {
                echo "<p> Nessuna recensione eliminata </p>";
            }
        ?>
    </div>
    
    <!--? SCRIPT DI BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!--? JAVASCRIPT PERSONALE-->
    <script src="../javascript/script.js"></script>
</body>
</html>