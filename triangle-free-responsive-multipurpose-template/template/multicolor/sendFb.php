<?php 
#echo 'Thank you '. $_POST['title'] . ' ' . $_POST['presenter'] . ' ' .  $_POST['criteria'] . ', says the PHP file';
$feedback = $_POST['feedback'];
$session_id = $_POST['session_id'];
$tag_name = $_POST['tag_name'];

#$feedback = "bad";
#$session_id = "4e7068bf516df9c1ff44cda160b1b9f5";
#$tag_name = "gesture";

$servername = "localhost";
$mysqlusername = "ding";
$mysqlpassword = "151015";
$dbname = "feedbacksys";

$conn = new mysqli($servername, $mysqlusername, $mysqlpassword, $dbname);
if ($conn->connect_error) {
    die("Connection to MySQL database failed: " . $conn->connect_error . "\nThe  developer is notified with this problem. Sorry for the inconvenience!\n");
	#error_log("Attendance System:\nAdding New Member: Connection to MySQL database failed!", 1, "dingz@andrew.cmu.edu");	
} 
#$max_sql = "SELECT MAX(id) AS cur_max FROM presenter_info;";
#$max_result = $conn->query($max_sql);
#$max_row = $max_result->fetch_assoc();
#$pid = $max_row["cur_max"] + 1;
$insert_sql = "INSERT INTO feedback_detail(listener_id,session_id,tag_name,feedback) VALUES(1,'".$session_id."','".$tag_name."','".$feedback."');";
if($conn->query($insert_sql) === TRUE){
		echo "MySQL Users table updated!\n";
		#echo $pid;
}else{
		echo "Data insertion to MySQL table failed...\n";
}

?>

