<?php

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
require_once "./library/autoload.php";
require_once "./library/search.php";


// PRINT HEAD
echo PrintHead();
echo PrintNavigation2();
?>;
<div class="container">
    <section class="list">

        <?php
        $resultList = [];
        $search = $_POST["search"];
        $list = explode(" ", $search);

        foreach ($list as $a) {

        $sql = "SELECT * FROM user join specialty on usr_spec_id = spec_id  WHERE spec_name LIKE '%$a%' ";
        $data = getData($sql);
            //mysqli_num_rows($result);

        foreach ($data as $row) {
            $resultList[$row['usr_id']] = $row; }
            foreach($resultList as $row)

        {
                echo  '<div class="doctor">
                    <div class="fname"> Dr. '. $row["usr_name"]. ' ' .$row["usr_last_name"]. '</div>
                     <div class="specialty">' . $row["spec_name"] . ' </div>
                        <div class="address">
                            <div> '. $row["usr_street"]. ' ' .$row["usr_h_nr"] . ' </div>
                            <div> ' . $row["usr_postcode"]. ' ' .$row["usr_city"] .'   </div>
                            <div> ' . $row["usr_country"] .'   </div> 
                            <div>Phone number: ' . $row["usr_phone_nr"] .'  </div> 
                        </div>
                        </div>
                        <br>
                        <br>
';

            }
        }

        ?>

    </section>
   <section class="date">


<?php
date_default_timezone_set("Europe/Brussels");
setlocale(LC_TIME, 'nl_NL');
$now = time();
$strtime = date("H:i:s", $now);
echo "Today is " . date("Y-m-d") . "<br>";


?>
   </section>
</div>

</header>
<script src="../src/js/index.js"></script>
<script src="../dist/icomoon/svgxuse.js"></script>
</body>
</html>

