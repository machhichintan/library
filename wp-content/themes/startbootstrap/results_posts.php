<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include('../../../wp-load.php');

$term = $_GET["term"];

//$my_args = array(
//    'post_type'  => 'book',  // post type name
//    "s" => $term              //term we are putting in the textbox
//    );
$args = array("post_type" => "book", "s" => $term);
$query = get_posts($args);
$json = array();

foreach ($query as $dataa) {
    $json[] = array('value' => $dataa->post_title);
} //loop ends

echo json_encode($json);
?>