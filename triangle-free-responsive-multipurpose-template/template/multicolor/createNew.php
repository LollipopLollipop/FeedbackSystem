<?php 
#echo 'Thank you '. $_POST['title'] . ' ' . $_POST['presenter'] . ' ' .  $_POST['criteria'] . ', says the PHP file';
$title = $_POST['title'];
$presenter = $_POST['presenter'];
$criteria = $_POST['criteria'];

$servername = "localhost";
$mysqlusername = "ding";
$mysqlpassword = "151015";
$dbname = "feedbacksys";

$conn = new mysqli($servername, $mysqlusername, $mysqlpassword, $dbname);
if ($conn->connect_error) {
    die("Connection to MySQL database failed: " . $conn->connect_error . "\nThe  developer is notified with this problem. Sorry for the inconvenience!\n");
	#error_log("Attendance System:\nAdding New Member: Connection to MySQL database failed!", 1, "dingz@andrew.cmu.edu");	
} 
$max_sql = "SELECT MAX(id) AS cur_max FROM presenter_info;";
$max_result = $conn->query($max_sql);
$max_row = $max_result->fetch_assoc();
$pid = $max_row["cur_max"] + 1;
$insert_sql = "INSERT INTO presenter_info VALUES(".$pid.",'".$presenter."','".$title."','".$criteria."');";
if($conn->query($insert_sql) === TRUE){
		#echo "MySQL Users table updated!\n";
		echo $pid;
}else{
		echo "Data insertion to MySQL table failed...\n";
}

?>

