<?php
if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $text = $_POST['text'];
    $images = $_POST['images'];
    
    
    echo "Titel: ".$title."<br>";
    echo "Beschreibung: ".$description."<br>";
    echo "Text: ".$text."<br>";
    echo "Bild: ".$images."<br>";
}else {
    echo "God is a woman";
}

?>