<?php 
#echo 'Thank you '. $_POST['pid'];
$pid = $_POST['pid'];

$servername = "localhost";
$mysqlusername = "ding";
$mysqlpassword = "151015";
$dbname = "feedbacksys";

$conn = new mysqli($servername, $mysqlusername, $mysqlpassword, $dbname);
if ($conn->connect_error) {
    die("Connection to MySQL database failed: " . $conn->connect_error . "\nThe  developer is notified with this problem. Sorry for the inconvenience!\n");
	#error_log("Attendance System:\nAdding New Member: Connection to MySQL database failed!", 1, "dingz@andrew.cmu.edu");	
} 
$select_sql = "SELECT * FROM presenter_info WHERE id='".$pid."';";
$select_result = $conn->query($select_sql);
$select_row = $select_result->fetch_assoc();
$presenter = $select_row["presenter_name"];
$title = $select_row["presentation_title"];
$tags = $select_row["tags"];

echo $presenter."|".$title."|".$tags;

?>