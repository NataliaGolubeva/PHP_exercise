<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "library/autoload.php";


//Define and execute query
echo PrintHead();
echo PrintJumbo($title = "Bewerk afbeelding", $subtitle = "");
echo PrintNavbar();

?>

<div class="container">
    <div class="row">

        <?php
       if ( ! is_numeric( $_GET['img_id']) ) die("Ongeldig argument " . $_GET['img_id'] . " opgegeven");

        //get data
        $data = GetData( "select * from images where img_id=" . $_GET['img_id'] );
        $row = $data[0]; //there's only 1 row in data

        //add extra elements
        $extra_elements['csrf_token'] = GenerateCSRF( "stad_form.php"  );
        $extra_elements['select_land'] = MakeSelect( $fkey = 'img_lan_id',
                                                    $value = $row['img_lan_id'] ,
                                                    $sql = "select lan_id, lan_naam from landen" );
        $output = file_get_contents("./templates/form.html");

        //merge
        $output = MergeViewWithData( $output, $data );
        $output = MergeViewWithExtraElements( $output, $extra_elements );
        $output = MergeViewWithErrors( $output, $errors );
        $output = RemoveEmptyErrorTags( $output, $data );

        print $output;

        //get template




        ?>
    </div>

</div>
</body>
</html>


