<h1>MySQLi Example</h1>
<?php
require_once "connection.php";

$sql = "select * from team";
$result = $conn->query($sql);

//show results (if there are any)
if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc()){
        echo $row["tea_id"] . "<br>";
        echo $row["tea_naam"] . "<br>";
        echo $row["tea_stadion"] . "<br>";
        echo "<br>";
    }
}
else{
    echo "No records found";
}
$conn->close();
?>