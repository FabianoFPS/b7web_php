<?php
$arquivo = $_FILES['arquivo'];

print_r($arquivo);

if(isset($arquivo['tmp_name']) && !empty($arquivo['tmp_name'])){

     move_uploaded_file($arquivo['tmp_name'], 'files/'.$arquivo['name']);
}