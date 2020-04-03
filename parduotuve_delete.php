<?php 
require "parduotuve_functions.php";
$prekiumasyvas = isfailo();

//var_dump($prekiumasyvas);
if (isset($_GET['delete']) && isset($prekiumasyvas[$_GET['delete']]) )
{
    unset($prekiumasyvas[$_GET['delete']]);
    var_dump($prekiumasyvas);
    
    if (is_writable('./prekes.json'))
    {
        $ifaila = json_encode($prekiumasyvas);
        file_put_contents('./prekes.json', $ifaila);
    }
}

header("Location: ./administracinis_sarasas.php");
?>