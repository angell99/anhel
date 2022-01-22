<?php

var_dump($_FILES)['archivo'];

$llega = isUploadedFile('archivo');

echo '<br>Valor de llega' . $llega . '<br>';
var_dump ($llega);

main('archivo');

function main($name){
    $result = uploadFile($name);
    if($result){
        echo 'todo bien';
        echo "$uploadedFile";
    } else {
        header('location' . $server['HTTP_REFERER']);
    }
}

function isUploadedFile($name) {
    return isset($_FILES[$name]);
}

function isValidUploadedFile($file) {
    $result = true;
    $error = $file['error'];
    $name = $file['name'];
    $size = $file['size'];
    $tmp_name = $file['tmp_name'];
    $type = $file['type'];
    if($error != 0 || $name == '' || $size == 0 || strpos($type, 'image/') === false || !is_uploaded_file($tmp_name)) {
        $result = false;
    } else {
        $mcType = mime_content_type($tmp_name);
        if(strpos($mcType, 'image/') === false) {
            $result = false;
        }
    }
    return $result;
}

function uploadFile($paramName) {
    $result = false;
    if(!isUploadedFile($paramName)) {
        return false;
    }
    $file = $_FILES[$paramName];
    if(!isValidUploadedFile($file)) {
        return false;
    }
    return moveFile($file);
}

function moveFile($file) {
    $target = 'upload';
    $uniqueName = uniqid('image_');
    $name = $file['name'];
    $extension = pathinfo($name, PATHINFO_EXTENSION);
    $tmp_name = $file['tmp_name'];
    #$uploadedFile = $uniqueName . '.' . $extension;
    $uploadedFile = $target . '/' . $uniqueName . '.' . $extension;
    
    $value = $uploadedFile;
    setcookie("TestCookie", $value);
    setcookie("TestCookie", $value, time()+3600);

    if(move_uploaded_file($tmp_name, $uploadedFile)) {
        return [$uploadedFile, $uniqueName . '.' . $extension, $uniqueName, $extension,];
    }
    echo 'ha fallado';
    return false;
}

header('Location: https://informatica.ieszaidinvergeles.org:10055/pia/env/subir_bucket_1.php?file=' . $file . '&name=' . $name);
?>

