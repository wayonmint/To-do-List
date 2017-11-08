<?php

include ('dbms.php');
function getnote($user_id){
	$sql = "SELECT * FROM `note_tb` WHERE 'user_id' = '$user_id'  ORDER BY 'id' ASC " ;
	$result = mysqli_query($conn,$sql);
	
    return mysqli_fetch_assoc($result);
	
}
?>