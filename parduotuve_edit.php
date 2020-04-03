<?php 
require "parduotuve_functions.php";
$prekiumasyvas = isfailo();

if (isset($_GET['preke']) && isset($_GET['kaina']) && isset($prekiumasyvas[$_GET['id']]))
{
    $prekiumasyvas[$_GET['id']]['preke']= trim ($_GET['preke']);
    $prekiumasyvas[$_GET['id']]['kaina']= trim ($_GET['kaina']);
 
    if (is_writable('./prekes.json'))
    {
        $ifaila = json_encode($prekiumasyvas);
        file_put_contents('./prekes.json', $ifaila);
    }
}
$redirect = true;
?>

<?php if (isset($_GET['redaguoti']) && isset($prekiumasyvas[$_GET['redaguoti']])): $redirect=false; ?>
<form>
    <input  type='hidden' 
            value='<?php echo $_GET['redaguoti']; ?>' 
            name='id' />
    <input  type='text' 
            value='<?php echo $prekiumasyvas[$_GET['redaguoti']]['preke']; ?>'
            name='preke'/>
    <input  type='number' step="0.01"
            value='<?php echo $prekiumasyvas[$_GET['redaguoti']]['kaina']; ?>'
            name='kaina'/>


    <input  type='submit' />
</form>
<?php endif; 

if ($redirect)
{
    header("Location: ./administracinis_sarasas.php");
}

?>