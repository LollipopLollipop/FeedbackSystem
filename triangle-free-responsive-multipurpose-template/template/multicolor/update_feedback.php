<?php 
//connecting db
$servername = "localhost";
$mysqlusername = "xiannv";
$mysqlpassword = "151102";
$dbname = "feedbacksys";
$conn = new mysqli($servername, $mysqlusername, $mysqlpassword, $dbname);
if ($conn->connect_error) {
    die("Connection to MySQL database failed: " . $conn->connect_error . "\nThe  developer is notified with this problem. Sorry for the inconvenience!\n");
	#error_log("Attendance System:\nAdding New Member: Connection to MySQL database failed!", 1, "dingz@andrew.cmu.edu");	
} 

#if (!isset($_SERVER["HTTP_HOST"])) {
#  parse_str($argv[1], $_GET);
#  parse_str($argv[1], $_POST);
#}


//getting params passed from html
$num = $_POST['num'];
$pid = $_POST['pid'];
echo 'num is '.$num."\n";
echo 'pid is '.$pid."\n";
#$num = 5;
#$pid = '466e2095089ea31028df784889bee023';
$pos_and_total = array();
$tag_sql;
//for some certain presentation session, retrieve user feedback for each tag
for($i = 0; $i < $num; $i++){

    //dynamically getting contents of tags from using $_POST
    $string = 'param'.$i;
    #${'tag'.$i} = $_POST[$string];
    $tag_content = $_POST[$string];
    echo 'tag'.$i.' is '.$tag_content."\n";
    //query to get the most recent feedback from each user
    $tag_sql = "SELECT * FROM (SELECT id, listener_id, feedback, submission_date FROM feedback_detail WHERE session_id='".$pid."' AND tag_name='".$tag_content."' ORDER BY submission_date DESC) AS tmp_table GROUP BY listener_id;";
    $tag_result = $conn->query($tag_sql);//pushing query to mysql and save result
   if (is_object($tag_result)){
    $user_count = $tag_result->num_rows;
echo "inside if\n";
echo 'user_count is '.$user_count."\n";
    //2-d array to save number of user who give positive feedback and total feedback for each tag
    $pos_and_total[$i] = array();
    $pos_and_total[$i]['total'] = $user_count;
    $pos = 0;
    while(is_object($tag_result) && ($tag_row = $tag_result->fetch_assoc())) {
	if($tag_row["feedback"]=='good'){
	    $pos++;
	}       

    }
    $pos_and_total[$i]['positive'] = $pos;
        }
}

//if query execute successfully, return number of positive feedback and total feedback for each tag.
if(!is_null($tag_result)){#($conn->query($tag_sql) === TRUE){
		#echo "MySQL Feedback_detail table data pulled!\n”;
		echo json_encode($pos_and_total)."\n";
}else{
		echo "Data insertion to MySQL table failed...\n";
}

?>

