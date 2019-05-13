<!--'index.php'. Startsida som visar 'lägg till-formuläret' och resultattabellen.-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Movie database</title>
</head>

<body>
    <!--
        Visar ett formulär för användaren där man kan lägga till en ny film i databasen.
        Varje kategori har ett numerisk värde som matchar med kategoritabellen.
        'Submit' skickar ifyllda värden till 'editData.php' via POST.
    -->
    <fieldset>
        <legend>Add a movie:</legend>
        <pre>
        <form method="POST" action="editData.php">
            Category: <select id="categoryList" name="inputCategory" required>
                        <option value="0">Thriller</option>
                        <option value="1">Romance </option>
                        <option value="2">Swedish </option>
                        <option value="3">Animated</option>
                        <option value="4">Comedy  </option>
                        <option value="5">Sci-Fi  </option>
                        <option value="6">Drama   </option>
                        <option value="7">Fantasy </option>
                      </select><br>
            Title:    <input type="text"   name="inputTitle" required>   <br>
            Director: <input type="text"   name="inputDirector" required><br>
            Year:     <input type="number" name="inputYear" min="1900" max="2155" required><br>
            <input type="submit" name="submit" value="Add movie">
        </form>
        </pre>
    </fieldset><br>
    <!--
        Kör filen 'getData.php' där ett skript skriver ut filmdatabasen i en tabell.
    -->
    <?php include 'getData.php'; ?>
</body>

</html>