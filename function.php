<?php

function get_products($link) {

    $sql = "SELECT * FROM Products";

    $result = mysqli_query( $link, $sql );

    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $products;
}

$products = get_products($link);