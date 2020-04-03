<?php
if (isset($_GET['preke']) && isset($_GET['kaina']))
{
    $elementai = [];
    if (file_exists('./prekes.json'))
    {
        if (is_writable('./prekes.json'))
        {
            $contents = file_get_contents('./prekes.json');
            $elementai = json_decode($contents, JSON_OBJECT_AS_ARRAY);
            var_dump($elementai);
            array_push($elementai,
            [
                //"id" => $elementai[count($elementai)-1]['id']+1,
                "id" => end($elementai)['id']+1,
                "preke" => trim($_GET['preke']),
                "kaina" => trim($_GET['kaina'])        
            ]);
        }
    }

    else 
    {
        $elementai = 
        [[
            'id' => 0,
            "preke" => trim($_GET['preke']),
            "kaina" => trim($_GET['kaina'])        
        ]];
    }
    if (is_writable('./prekes.json') || !file_exists('./prekes.json'))
    {
        $ifaila = json_encode($elementai);
        file_put_contents('./prekes.json', $ifaila);
    }
}
header("Location: ./administracinis_sarasas.php");