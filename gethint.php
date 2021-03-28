<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Facebook_copy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


$q = $_REQUEST["q"];

$sql = "INSERT INTO chats (username, chat) VALUES ('John','" . $q . "')";
$conn->query($sql);


$sql = "SELECT chat FROM chats";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $text_msg[] = $row["chat"];
    }
}

$resp = "";
foreach ($text_msg as $txt)
{
    $resp .= $txt . "<br>";
}
echo $resp;
?>