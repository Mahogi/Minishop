<?php
session_start();
//session_destroy();

require "parduotuve_functions.php";
$prekiumasyvas = isfailo();

if (!isset($_SESSION["wishlist"])) {
    $_SESSION["wishlist"] = array();
}
if (!is_array($_SESSION["wishlist"]))
{
    $_SESSION["wishlist"] = array();
}
//var_dump($pmasyvas);
if (isset($_GET['add']) && isset($prekiumasyvas[$_GET['add']]) )
    {
    $duplicate = false;   
        foreach ($_SESSION["wishlist"] as $w) 
        {
            if ($w['id'] == $prekiumasyvas[$_GET['add']]['id']):
            {
                echo "Šią prekę jau pridėjote prie wishlist'o.";
                $duplicate = true;
            }

            endif;
        } 
        if (isset($prekiumasyvas[$_GET['add']]) && $duplicate == false):
            {
                array_push($_SESSION["wishlist"], 
                [ 
                    "id" => $prekiumasyvas[$_GET['add']]["id"],
                    "preke" => $prekiumasyvas[$_GET['add']]["preke"],
                    "kaina" => $prekiumasyvas[$_GET['add']]["kaina"]
                ]);
            }
            //else: unset($_SESSION["wishlist"][$_GET['add']]);
        endif;
        
    }
    //print_r($_SESSION["wishlist"]) ;

if (isset($_GET['delete']) && isset($_SESSION['wishlist'][$_GET['delete']]) )
{
    unset($_SESSION['wishlist'][$_GET['delete']]);
}
?>

<html>
    <body>
    <?php 
        
        if (!empty($prekiumasyvas))
        { ?>
            <table border="1">
            <tr>
                <th></th>
                <th>Preke</th>
                <th>Kaina</th>
                <th>Wishlist</th>
            </tr>

            <?php foreach ($prekiumasyvas as $i => $e):?>
                <tr>
                    <td> <?php echo $i+1; ?></th>
                    <td> <?php echo $e["preke"]; ?></td>
                    <td> <?php echo $e["kaina"]; ?></td>
                    <td> <a href=<?php echo "\"?add=" .$i . "\""; ?>> <center><3</center> </td>
                </tr>
            <?php endforeach; 
        }
        else echo "Šiuo metu prekių nėra.";
        ?>
        </table>
        <hr>

        <h2> Wishlist </h2>
        <?php if (!empty($_SESSION["wishlist"]))
        { 
            ?>
            <table border="1">
            <tr>
                <th></th>
                <th>Preke</th>
                <th>Kaina</th>
                <th>Istrinti</th>
            </tr>
            <?php foreach ($_SESSION["wishlist"] as $w => $e):?>
            <?php //if (isset($pmasyvas[$w])): ?>
                <tr>
                    <td> <?php echo $w+1; ?></th>
                    <td> <?php echo $e["preke"]; ?></td>
                    <td> <?php echo $e["kaina"]; ?></td>
                    <td> <a href=<?php echo "\"?delete=" .$w . "\""; ?>> <center> X </center> </td>
                </tr>
            <?php //else: unset($_SESSION["wishlist"][$w]); ?>
            <?php //endif; ?>
            <?php endforeach; ?>


            </table>
        <?php var_dump ($_SESSION["wishlist"]);
        }
        else echo "Šiuo metu jūsų wishlist yra tuščias."; ?>

    <body>
</html>