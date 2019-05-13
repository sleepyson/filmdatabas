<!--'formEditMovie.php'. Sida som visar formulär för redigering av en post.-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Edit movie info</title>
</head>

<body>
    <?php
        /*
        //  Inkluderar filen 'functions.php' som innehåller funktioner för anslutning till databasen,
        //	sanering av user input och att lägga till/radera/redigera filmer. Ansluter sedan till databasen.
        */
        include 'functions.php';
        $connection = connect_to_DB();

        $movieId = $movieTitle = $movieYear = $movieCategory = $movieDirector = "";
        /*
        //  OM 'movieId' existerar i $_GET-arrayn skapas en anslutning till databasen, en query skickas
        //  och informationen om filmen med matchande id lagras i variablerna som deklarerades ovanför.
        //  ('movieId' skickas från 'index.php' via EDIT-länken)
        */
        if (isset($_GET['movieId']))
        {
            $movieId = mysql_entities_fix_string($connection, $_GET['movieId']);
            $stmt = $connection->prepare("SELECT * FROM movies WHERE id='$movieId'");
            $stmt->execute();
            $result = $stmt->get_result();

            foreach ($result as $row)
            {
                $movieId       = $row['id'];
                $movieTitle    = $row['title'];
                $movieDirector = $row['director'];
                $movieYear     = $row['year'];
                $movieCategory = $row['category'];
            }
            $result->close();
            $stmt->close();
        /*
        //  ANNARS visa felmeddelande:
        */
        }else print("Invalid movie-id!");
        $connection->close();
    ?>
    <!--
        Visar ett formulär med förinställda värden beroende på vilken film användaren valt att redigera.
        Det finns två gömda värden: ett för filmID och ett för att skriptet i 'editData.php' ska veta att
        vi vill redigera istället för att radera/lägga till. IF-satserna ser till att rätt kategori är förvald.
        'Submit' skickar värdena via POST till 'editData.php' som sedan uppdaterar databasen.
    -->
    <fieldset>
        <legend>Edit data:</legend>
        <pre>
        <form method="POST" action="editData.php">
            <input type="hidden" name="editData" value="true">
            <input type="hidden" name="movieId" value="<?php echo "$movieId" ?>">
            Category: <select name="inputCategory"  required>
                        <option value="0" <?php if($movieCategory == 0) echo 'selected="selected"';?> >Thriller</option>
                        <option value="1" <?php if($movieCategory == 1) echo 'selected="selected"';?> >Romance </option>
                        <option value="2" <?php if($movieCategory == 2) echo 'selected="selected"';?> >Swedish </option>
                        <option value="3" <?php if($movieCategory == 3) echo 'selected="selected"';?> >Animated</option>
                        <option value="4" <?php if($movieCategory == 4) echo 'selected="selected"';?> >Comedy  </option>
                        <option value="5" <?php if($movieCategory == 5) echo 'selected="selected"';?> >Sci-Fi  </option>
                        <option value="6" <?php if($movieCategory == 6) echo 'selected="selected"';?> >Drama   </option>
                        <option value="7" <?php if($movieCategory == 7) echo 'selected="selected"';?> >Fantasy </option>
                      </select><br>
            Title:    <input type="text"   name="inputTitle" value='<?php echo $movieTitle?>' required><br>
            Director: <input type="text"   name="inputDirector" value='<?php echo $movieDirector?>' required><br>
            Year:     <input type="number" name="inputYear" min="1900" max="2155" value='<?php echo $movieYear?>' required><br>
            <input type="submit" name="submit" value="Save changes"><br>
            <a href='index.php'>Cancel</a>
        </form>
        </pre>
    </fieldset>
</body>

</html>