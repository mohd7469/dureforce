<?php
$path = 'storage/logs';
if(!empty($_GET['name'])){
echo file_get_contents($path.'/'.$_GET['name']);
}
else {

    $files = scandir($path);
    foreach ($files as $file) {
        echo "<a href='/logs.php?name=$file'>$file</a><br>";
    }
}
?>
