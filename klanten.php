<?php
//invoegen van database.php
require_once 'inc/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klantgegevens</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<div class="container">
    <?php
        include 'inc/menu.php';
        echo '<header class="head">';
        //url om nieuwe klant aan te maken

        echo '</header>';

        //grid opmaak met main
        echo '<main class="main-content">';
    ?>
    <!-- tabel met klantgegevens -->
    <table id="customers">
        <tr>
            <th>klantnr</th>
            <th>klantnaam</th>
            <th>contactpersoon</th>
            <th>straat</th>
            <th>huisnr</th>
            <th>postcode</th>
            <th>plaats</th>
            <th>telefoon</th>
            <th>notitie</th>
            <th>actie</th>
        </tr>
        <?php
            //ophalen van gegevens uit database
            $query = "SELECT * 
                        FROM klant
                        ORDER BY naam, plaats
                        LIMIT 1, 10;";
            //resultaat bepalen
            $result = mysqli_query($dbconn, $query);
            //aantal records bepalen
            $aantal = mysqli_num_rows($result);
            $contentTable = "";

            //tabel aanvullen met klantgegevens
            if($aantal > 0) {
                while($row = mysqli_fetch_array($result)) {
                    $contentTable .= "<tr>
                                        <td>" . $row['id'] . "</td>
                                        <td>" . $row['naam'] . "</td>
                                        <td>" . $row['cp'] . "</td>
                                        <td>" . $row['straat'] . "</td>
                                        <td>" . $row['huisnummer'] . "</td>
                                        <td>" . $row['postcode'] . "</td>
                                        <td>" . $row['plaats'] . "</td>
                                        <td>" . $row['telefoon'] . "</td>
                                        <td>" . $row['notitie'] . "</td>
                                        <td>
                                            <a href='klant_edit.php?id={$row['id']}' class='btn-edit'><i class='material-icons md-24'>edit</i></a>
                                            <a href='klant_delete.php?id={$row['id']}' class='btn-delete'><i class='material-icons md-24'>delete</i></a>
                                        </td>
                                    </tr>";
                }
            } else {
                $contentTable = '<tr><td colspan="9">Geen klantgevens gevonden...</td></tr>';
            }

            //weergeven van contentTable
            $contentTable .= '</table><br>';
            echo $contentTable;

            //paginering voor tabel

            //footer
        
        echo '</main>';
        ?>

</div>  
</body>
</html>