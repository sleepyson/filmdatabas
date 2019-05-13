<!--'getData.php'. Det här skriptet skriver ut filmdatabasen som en HTML-tabell.-->
<?php
/*
//  Inkluderar filen 'functions.php' som innehåller funktioner för anslutning till databasen,
//	sanering av user input och att lägga till/radera/redigera filmer. Ansluter därefter till databasen.
*/
include 'functions.php';
$connection = connect_to_DB();
/*
//  Förebereder en query som hämtar alla värden från både 'movies'-tabellen och 'categories'-tabellen,
//  joinar matchande värden med varandra(kategori och kategori-id) och lagrar resultatet i '$result'.
*/
$stmt = $connection->prepare("SELECT movies.id,
                                     movies.title,
                                     movies.director,
                                     movies.year,
                                     categories.categoryName
                              FROM movies
                              LEFT JOIN categories
                              ON movies.category=categories.category;");
$stmt->execute();
$result = $stmt->get_result();
$result = $result->fetch_all();
/*
//  Skriver ut resultatet som en HTML-tabell. Varje rad får dessutom en länk för att radera/redigera.
*/
echo "<fieldset><legend>Movie database:</legend>
        <pre>
            <form action='edit.php' method='post'><table id='dataTable'>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Director</th>
                    <th>Year</th>
                    <th>Category</th>
                    <th>DELETE</th>
                    <th>EDIT</th>
                </tr>";
foreach($result as $row)
{
    echo "<tr>
            <td>{$row[0]}</td>
            <td>{$row[1]}</td>
            <td>{$row[2]}</td>
            <td>{$row[3]}</td>
            <td>{$row[4]}</td>
            <td><a href='editData.php?movieId=" . $row[0] ."&deleteData=".'true'."'>DELETE</a></td>
            <td><a href='formEditMovie.php?movieId=". $row[0] . "&editData=".'true'."'>EDIT</a></td>
        </tr>";
}
echo "</table></form></pre></fieldset>";

$stmt->close();
$connection->close();
?>