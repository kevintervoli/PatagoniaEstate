<?php
include 'connect_to_database.php';
// select the property with area union with area table
$sql = "SELECT * FROM property";
$result  = $conn->query($sql);
$i = 1;
while ($row = $result->fetch_assoc()) {
    echo '  
    <figure class="gallery__item__'.strval($i).'">
    <img src=".' . $row['Image'] . '" alt="Comfortable Apartment" class="gallery__img" >
    </figure>';
    $i++;
}
