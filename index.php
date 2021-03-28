
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Facebook_copy";
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

// Create database
$sql = "CREATE DATABASE " . $dbname;
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: <br>" . $conn->error;
}
echo "<br>";
$conn->close();
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "CREATE TABLE chats (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(30) NOT NULL,
	chat VARCHAR(2048) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
	echo "Table MyGuests created successfully";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}
$conn->close();
?>



<html>
<head>
	<link rel="stylesheet" href="style.css">
	
</head>
<body>
	<p id = "asd">  chat </p>
	<div id = "texts"> 
		
	</div>
	<form  action="">
        <input id = "inp" class = "contact" type="text">
    </form>

	<button type = "submit" class = "button1" onClick = dothis()> click me </button>

	
	<script>
		function dothis() 
		{
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					//var text = document.getElementById("txtHint").innerHTML = this.responseText;

					document.getElementById("inp").value = "";
					
					var txt = this.response.split("<br>");
					
					Parent = document.getElementById("texts");
					Parent.innerHTML = '';
					
					for(var i = 0;i < txt.length; i++)
					{
						var textBox = document.createTextNode(txt[i]);
						document.getElementById("texts").appendChild(textBox);
						
						var br = document.createElement("br");
						document.getElementById("texts").appendChild(br);
					}
				}
			}
			
			var value = document.getElementById("inp").value;
			xmlhttp.open("GET", "gethint.php?q=" + value, true);
			xmlhttp.send();

			
			//document.getElementById("asd").innerHTML = text;

		}
	</script>
</body>
</html>