<?php




$mydb = new mysqli('127.0.0.1','root','root','myforum');

if ($mydb->errno != 0){

        echo "Failed to connect to database: ".$mydb->error.PHP_EOL;
        exit(0);

}

//Javascript get hyperlink name for title in new post....WIP
//$topictest "<script>document.write(myAnchor);</script>";

$topic = 'Inception'; //how to get this to change?
$detail = 'Discuss this movie!';
$name = 'MovieBuddy';
$datetime = date("d/m/y h:i:s"); //create date time

$check = mysqli_query($mydb, "SELECT * FROM fquestions WHERE topic = '$topic'");
$count = mysqli_num_rows($check);

if ($count == 1){

	//There is already a post
	echo "<br><br> A forum board already exists! Redirecting you!";
	header("Location: main_forum.php");/* Redirect browser */
	sleep(5);
	exit();
}else{
	//Create a topic post 

	$query = mysqli_query($mydb,"INSERT INTO fquestions (topic, detail, name, datetime) VALUES ('$topic', '$detail', '$name', '$datetime')");

	echo "<br><br> It appears you are the first to visit this page! Creating a forum post and redirecting you!";

	header("Location: main_forum.php");/* Redirect browser */
	sleep(5);
	exit();

}

exit();
?>
