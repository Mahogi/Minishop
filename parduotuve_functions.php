<?php function isfailo ()
{
    $filename = "./prekes.json";
        if (is_readable($filename))
        {
            $filecontents = file_get_contents("./prekes.json");
            $json_data = json_decode($filecontents,true);
            $prekiumasyvas = array();

            if (!empty($json_data))
            {
                foreach ($json_data as $i => $e):
                    array_push($prekiumasyvas, ["id" => $i, "preke" => $e["preke"], "kaina" => $e["kaina"]]);
                endforeach; 
            }
        }
        else
        {
            echo "Prekių failo nebuvo įmanoma nuskaityti.";
        }       
        return $prekiumasyvas;
} ?>