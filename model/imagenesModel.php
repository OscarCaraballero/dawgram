<?php
require_once('/db/medoo.min.php');

$bbdd = new medoo();

function listImage(){
    return $return = $bbdd->select("images","*");
}