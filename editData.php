<!--'formEditMovie.php'. Skript som körs när en film ska skapas/raderas/redigeras.-->
<?php
/*
//  Inkluderar filen 'functions.php' som innehåller funktioner för anslutning till databasen,
//	sanering av user input och att skapa/radera/redigera filmer. Ansluter därefter till databasen.
*/
include 'functions.php';
$connection = connect_to_DB();
/*	
//	OM titel, regissör, årtal och kategori har skickats via POST fortsätter IF-satsen.
*/
if (isset($_POST['inputTitle']) && isset($_POST['inputDirector']) && 
    isset($_POST['inputYear'])  && isset($_POST['inputCategory'])) 
{
	/*
	//	Användar-input saneras och lagras i nya variabler.
	*/
	$title    = mysql_entities_fix_string($connection, $_POST['inputTitle']);
	$director = mysql_entities_fix_string($connection, $_POST['inputDirector']);
	$year     = mysql_entities_fix_string($connection, $_POST['inputYear']);
	$category = mysql_entities_fix_string($connection, $_POST['inputCategory']);
	/*
	//	OM 'editData OCH 'movieID' har skickats via POST så kallas editMovie()-funktionen
	//	som uppdaterar en existerande film med matchande id. ANNARS kallas add_movie().
	//  (funktionerna finns i filen 'functions.php')
	*/
	if (isset($_POST['editData']) && isset($_POST['movieId']))
	{
		$movieId = mysql_entities_fix_string($connection, $_POST['movieId']);
		edit_movie($connection, $movieId, $title, $director, $year, $category);
	}else
	{
		$movieId       = '';
		add_movie($connection, $movieId, $title, $director, $year, $category);
	}
	header('Location: index.php');
/*
//	ANNARS OM 'deleteData' och 'movieId' existerar i GET-array'n kallas funktionen delete_movie()
//	som raderar filmen med matchande 'movieId' från databasen. 'deleteData' existerar endast om
//  användaren klickat på DELETE-länken.
*/
}else if(isset($_GET['deleteData']) && isset($_GET['movieId']))
{
	$movieId = $_GET['movieId'];
	delete_movie($connection, $movieId);
	header('Location: index.php');
/*
//ANNARS visa felmeddelande och länk tillbaka till 'index.php'.
*/
}else
{
	print("Not all information was filled in correctly. Please try again.<br>");
	print("<a href='index.php'>Click here to go back.</a>");
}
?>