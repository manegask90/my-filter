<?php

require_once __DIR__.'/database.php';
require_once __DIR__.'/function.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Slider - Range slider</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 500,
                values: [ 75, 300 ],
                slide: function( event, ui ) {
                    $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                }
            });
            $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
                " - $" + $( "#slider-range" ).slider( "values", 1 ) );
        } );
    </script>
</head>
<body>

<form method="GET" action="index.php">
    <p>
        <label for="amount">Price range:</label>
        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
    </p>

    <div id="slider-range"></div>

    <ul>
        <?php

        foreach ($products as  $product) { ?>
            <li>
                <label for="cat-<?php echo $product['id']; ?>"><?php echo $product['name']; ?></label>
                <input type="checkbox" id="cat-<?php echo $product['id']; ?>" name="categories[]" value="<?php echo $product['category']; ?>" />
            </li>
        <?php } ?>
    </ul>

    <input type="submit">
</form>

<div class="container">
    <ul>
        <?php

        if ($_GET['categories']) {
            $check_cat = implode(',', $_GET['categories']);
        }

        if (!empty($check_cat)) {

            if (!empty($check_cat)) $query_cat = " AND category IN $check_cat";

        }

        $sql = "SELECT * FROM Products WHERE category IN (\"$check_cat\")";
        $result = mysqli_query( $link, $sql );
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($products as $prod) { ?>
            <li>
                <?php echo $prod['name']; ?>
                <br>
                ID: <?php echo $prod['id']; ?>
                <br>
                Category: <?php echo $prod['id']; ?>
            </li>
        <?php } ?>
    </ul>
</div>


</body>
</html>
