<?php
$student =	array(
    "voornaam" =>  "Jan",
    "naam" =>  "Janssens",
    "straat" =>  "Oude baan",
    "huisnr" =>  "22",
    "postcode" =>  2800,
    "gemeente" =>  "Mechelen",
    "geboortedatum" =>  "14/05/1991",
    "telefoon" =>  "015 24 24 26",
    "e-mail" =>  "jan.janssens@gmail.com"
);
function studentToTable($studentData)
{echo "<h1> Student </h1>";
    echo "<table>";
    foreach ($studentData as $key => $value){
        $key = ucfirst($key);
        echo "<tr><td>$key</td> <td>$value</td></tr> ";
    }
    echo "</table>";
}
print studentToTable($student)
?>


