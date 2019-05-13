<!--'functions.php'. Den här filen innehåller funktioner för anslutning till databasen,
     sanering av user input och att lägga till/radera/redigera filmer.-->
<?php
/*
//	Ansluter till databasen.
//	OM anslutning misslyckas visas felmeddelande, ANNARS returneras mysqli-anslutningen.
*/
function connect_to_DB()
{
    require_once 'login.php';
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) return die("Could not connect to database"); else return $connection;
}
/*
//	Lägger till en ny film i databasen.
//	Kräver 6 parametrar, returnerar ingenting.
*/
function add_movie($connection, $id, $title, $director, $year, $category)
{
	$stmt = $connection->prepare('INSERT INTO movies VALUES(?,?,?,?,?)');
	$stmt->bind_param('issii', $id, $title, $director, $year, $category);
	$stmt->execute();
	$stmt->close();
	$connection->close();
}
/*
//	Uppdaterar information om en vald film.
//	Kräver 6 parametrar, returnerar ingenting.
*/
function edit_movie($connection, $id, $title, $director, $year, $category)
{
	$stmt = $connection->prepare('UPDATE movies SET title=?, director=?, year=?, category=? WHERE id=?');
	$stmt->bind_param('ssiii', $title, $director, $year, $category, $id);
	$stmt->execute();
	$stmt->close();
	$connection->close();
}
/*
//	Raderar en film ur databasen.
//	Kräver 2 parametrar, returnerar ingenting.
*/
function delete_movie($connection, $id)
{
	$stmt = $connection->prepare('DELETE FROM movies WHERE id=?');
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$stmt->close();
	$connection->close();
}
/*
//	Funktioner som sanerar input från användaren. Fick dessa från läroboken.
*/
function mysql_entities_fix_string($connection, $string)
{
    return htmlentities(mysql_fix_string($connection, $string));
}	
function mysql_fix_string($connection, $string)
{
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $connection->real_escape_string($string);
}
?>