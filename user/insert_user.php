<?php
     
        include '../db/connect.php';
 
        if ( !empty($_POST)) {
            if( !empty($_FILES['file']['name'])){
        $uploadedFile = '';
        if(!empty($_FILES["file"]["type"])){
            $fileName = time().'_'.$_FILES['file']['name'];
            $valid_extensions = array("jpeg", "jpg", "png");
            $temporary = explode(".", $_FILES["file"]["name"]);
            $file_extension = end($temporary);
            if((($_FILES["hard_file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
                $sourcePath = $_FILES['file']['tmp_name'];
                $targetPath = "images/".$fileName;
                if(move_uploaded_file($sourcePath,$targetPath)){
                    $uploadedFile = $fileName;
                }
            }
        }
    
 
         
        // keep track post values
        $name = $_POST['name'];
        $password = $_POST['confirmpassword'];
         
        // validate input
        $valid = true;
        if (empty($name)) {
            $valid = false;
        }
         
        if (empty($password)) {
            $valid = false;
        }
         
     

        $target = 'images/user_placeholder.jpg';
        $pdo = Database::connect();
        // insert data
        if ($valid) {
            $sql = "INSERT INTO user (name,password,image_url) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$password,$uploadedFile));
            Database::disconnect();
            header("Location: ../index.php");
        }
    }
}
?>