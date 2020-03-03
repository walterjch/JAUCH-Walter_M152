<?php
require_once "./database/database.php";

function saveFiles($files, $uploads_dir){
    foreach ($files["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $typeFichier = $files["type"][$key];
            $typesVoulus = array("image/gif", "image/png", "image/jpeg", "video/mp4", "audio/mpeg");
            if(in_array($typeFichier, $typesVoulus)){
                $tmp_name = $files["tmp_name"][$key];
                $nomFichier = basename($files["name"][$key]);
                $temp = explode(".", $nomFichier);
                //Upload + nouveau nom de fichier
                $newFileName = array_values($temp)[0] . round(microtime(true)) . rand() . '.' . end($temp); 
                $finalName = basename($newFileName);
                move_uploaded_file($tmp_name, "$uploads_dir/$finalName");
            }
        }
    }
}