<?php 
        require "parduotuve_functions.php";
        $prekiumasyvas = isfailo();
        //print_r($prekiumasyvas) ;

?>

<html>
    <body>
        <p>  
        <form method="get" action="./parduotuve_add.php">
        Preke:  <input type="text" name="preke" />
        Kaina:   <input type="number" step="0.01" name="kaina" value="0"/>
        <input type="submit">
        </form>

        

        <form action="" method="post">
        
        <?php if (!empty($prekiumasyvas))
        { ?>
            <table border="1">
            <tr>
                <th></th>
                <th>Preke</th>
                <th>Kaina</th>
                <th>Redaguoti</th>
                <th>Istrinti</th>
            </tr>

            <?php foreach ($prekiumasyvas as $i => $e):?>
                <tr>
                    <td> <?php echo $i+1;  ?></th>
                    <td> <?php echo $e["preke"]; ?></td>
                    <td> <?php echo $e["kaina"]; ?></td>
                    <td><a href='./parduotuve_edit.php?redaguoti=<?php echo $i; ?>'><center>R</center></tdh>
                    <td><a href='./parduotuve_delete.php?delete=<?php echo $i; ?>'> <center>X</center> </a></td>
                </tr>
                <?php endforeach; 
        }
        else echo "Šiuo metu prekių nėra.";
        ?>

       


        </table>

    <body>
</html>