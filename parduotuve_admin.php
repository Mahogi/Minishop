<?php 
session_start();
if (!is_array($_SESSION['parduotuve'])) {
    $_SESSION['parduotuve'] = array();
}
$file = 'prekes.txt';
    if (isset($_GET['preke']) && isset($_GET['kaina'])) 
    {
        $preke=trim($_GET['preke']);
        $kaina=trim($_GET['kaina']);
        array_push($_SESSION['parduotuve'], array('preke' => $preke, 'kaina' => $kaina));
        file_put_contents($file, $preke . "\t" . $kaina . "\n", FILE_APPEND);
        
    }
    if (isset($_GET['delete']) && isset($_SESSION['parduotuve'][$_GET['delete']]) )
    {
        unset($_SESSION['parduotuve'][$_GET['delete']]);
        file_put_contents($file, "");
        foreach ($_SESSION['parduotuve'] as $i => $r):
            file_put_contents($file, $r['preke'] . "\t" . $r['kaina'] . "\n", FILE_APPEND);
        endforeach; 
    }

?>

<html>
    <head></head>
    <body>
        <p>  
        <form method="get">
        Preke:  <input type="text" name="preke" />
        Kaina:   <input type="number" step="0.01" name="kaina" />
        <input type="submit">
        </form>

        <form action="" method="post">
        <table border="1">
        <tr>
            <th></th>
            <th>Preke</th>
            <th>Kaina</th>
            <th>Redaguoti</th>
            <th>Istrinti</th>
        </tr>

        <?php foreach ($_SESSION['parduotuve'] as $i => $r):?>
        <tr>
            <td> <?php echo $i ?>
            <td> <?php echo ($r['preke']) ?> </td> 
            <td> <?php echo $r['kaina'] ?> </td> 
            <td> <a href='./parduotuve_edit.php?redaguoti=<?php echo $i; ?>'> <center>R</center> </a></td>
            <td> <a href=<?php echo "\"?delete=" .$i . "\""; ?>> <center>X</center> </a></td>
           
        </tr>
        <?php endforeach; ?>

        </table>

        </body>
</html>