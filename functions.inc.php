<?php
require_once "./database/database.php";

$lastInsertId = null;

function saveFiles($files, $uploads_dir, $postTitle, $postComment){
    foreach ($files["error"] as $key => $error) {
        try {
            if ($error == UPLOAD_ERR_OK) {
                $typeFichier = $files["type"][$key];
                $typesVoulus = array("image/gif", "image/png", "image/jpeg", "video/mp4", "audio/mpeg");
                if(in_array(mime_content_type($files["tmp_name"][$key]), $typesVoulus)){
                    $tmp_name = $files["tmp_name"][$key];
                    $nomFichier = basename($files["name"][$key]);
                    $temp = explode(".", $nomFichier);
                    //Upload + nouveau nom de fichier
                    $newFileName = array_values($temp)[0] . round(microtime(true)) . rand() . '.' . end($temp); 
                    $finalName = basename($newFileName);
                    move_uploaded_file($tmp_name, "$uploads_dir/$finalName");
                    addPost($typeFichier, $finalName, $postTitle, $postComment);
                }
            }
        } catch (\Throwable $th) {
            throw new Exception("Probleme a l'envoi du media vers le serveur.");
        }
        
    }
}


function addPost($fileType, $fileName, $title, $comment){

    try {
        EDatabase::beginTransaction();

        $sql = 'INSERT INTO post(titrePost, comment, creationDate, modificationDate) VALUES(:title, :comment, NOW(), NOW())';
        $req = EDatabase::prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
        $req->execute(array(
            'title' => $title,
            'comment' => $comment
            ));
        $idPost = EDatabase::lastInsertId();

        if (!empty($fileName)) {
            $idPost = EDatabase::lastInsertId();
            $sql = 'INSERT INTO media(fileType, nomFichierMedia, idPost, creationDate, modificationDate) VALUES(:typeFichier, :nomFichier, :idPost, NOW(), NOW())';
            $req = EDatabase::prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
            $req->execute(array(
                'typeFichier' => $fileType,
                'nomFichier' => $fileName,
                'idPost' => $idPost
            ));

        }
        EDatabase::commit();
    } catch (\Throwable $th) {
        EDatabase::rollBack();
    }
}

 function getAllPosts(){
    $sql = $sql = 'SELECT p.idPost,p.commentaire,p.creationDate,p.modificationDate,m.idMedia,m.nomFichierMedia,m.typeMedia,m.creationDate,m.modificationDate,m.idPost_Media
    FROM post as p
    LEFT OUTER JOIN media as m
    ON p.idPost = m.idPost_media';
    $req = EDatabase::prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
    $req->execute();
    $res = $req->fetchAll(PDO::FETCH_ASSOC);
    return $res;
 }


//////////////////////OLD/////////////////////
// function newPostToDb($fileType, $fileName, $title, $comment){

//     $sql = 'INSERT INTO post(titrePost, comment, creationDate, modificationDate) VALUES(:title, :comment, NOW(), NOW())';
//     $req = EDatabase::prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
//     $req->execute(array(
//             'title' => $title,
//             'comment' => $comment
//             ));
    
//     $lastInsertId = EDatabase::lastInsertId();
//     newMediaToDb($fileType, $fileName, $lastInsertId);
//     return $lastInsertId;
// }

// function newMediaToDb($fileType, $fileName, $idPost)
//  {
//     $sql = 'INSERT INTO media(fileType, nomFichierMedia, idPost, creationDate, modificationDate) VALUES(:typeFichier, :nomFichier, :idPost, NOW(), NOW())';
//     $req = EDatabase::prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
//     $req->execute(array(
//             'typeFichier' => $fileType,
//             'nomFichier' => $fileName,
//             'idPost' => $idPost
//             ));
//     return EDatabase::lastInsertId();
//  }