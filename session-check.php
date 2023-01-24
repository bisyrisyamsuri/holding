<?php
//check_login.php
include 'config.php';

session_start();
$query = "
	SELECT session_id FROM tb_user 
	WHERE id_user = '" . $_SESSION['id_user'] . "'
";
$result = $conn->query($query);

foreach ($result as $row) {
	if ($_SESSION['session_id'] != $row['session_id']) {
		$data['output'] = 'logout';
	} else {
		$data['output'] = 'login';
	}
}
echo json_encode($data);
?>