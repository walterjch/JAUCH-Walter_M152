<?php
require_once "./database/database.php";

$lastInsertId = null;

function saveFiles($files, $uploads_dir, $postTitle, $postComment){
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
                newPostToDb($typeFichier, $finalName, $postTitle, $postComment);
            }
        }
    }
}

function newPostToDb($fileType, $fileName, $title, $comment){

    $sql = 'INSERT INTO post(titrePost, comment, creationDate, modificationDate) VALUES(:title, :comment, NOW(), NOW())';
    $req = EDatabase::prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
    $req->execute(array(
            'title' => $title,
            'comment' => $comment
            ));
    
    $lastInsertId = EDatabase::lastInsertId();
    newMediaToDb($fileType, $fileName, $lastInsertId);
    return EDatabase::lastInsertId();
}

function newMediaToDb($fileType, $fileName, $idPost)
 {
    $sql = 'INSERT INTO media(fileType, nomFichierMedia, idPost, creationDate, modificationDate) VALUES(:typeFichier, :nomFichier, :idPost, NOW(), NOW())';
    $req = EDatabase::prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
    $req->execute(array(
            'typeFichier' => $fileType,
            'nomFichier' => $fileName,
            'idPost' => $idPost
            ));
    return EDatabase::lastInsertId();
 }