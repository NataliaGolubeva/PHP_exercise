<?php

require_once "./library/get_data.php";
require_once "./library/html_components.php";
require_once "./library/connection.php";
//require_once "./library/save.php";


//Define and execute query
echo PrintHead();
echo PrintJumbo($title = "Bewerk afbeelding", $subtitle = "");

?>

<div class="container">
    <div class="row">

        <?php

        // get data
        $id = $_GET['img_id'];

        $form = "SELECT * FROM images JOIN landen ON lan_id = img_lan_id WHERE img_id =" .  $id ;
        $rows = getData($form);

        // get template
       $template = file_get_contents("./templates/form.html");

        //merge
        $body = MergeViewWithData( $template, $rows );
        $selectCountries = "Select * from landen order by lan_naam";
        $countries = getData($selectCountries);
        $options = '<option value ="NULL">Kies een land</option>';
        foreach ($countries as $country ) {
            $selected = '';
            if ($rows[0]['img_lan_id'] == $country['lan_id']) $selected = ' selected ';
            unset($id, $name);
            $id = $country['lan_id'];
            $name = $country['lan_naam'];
            $options .= '<option value ="' . $id . '">' . $name . '</option> ';
        }
        $body = str_replace('@options@', $options , $body);


        print $body;


        ?>
    </div>

</div>
</body>
</html>


