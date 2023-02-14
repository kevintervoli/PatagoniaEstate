<?php
$property_id_temp=$_GET['id'];

$dbhost = "localhost";
$dbname = "real_estate";
$dbuser = "root";
$dbpass = "";

try{
    $pdo = new PDO("mysql:host=127.0.0.1:3306;dbname=$dbname", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //filtering and validating the integer from the URL with min and max range
    $property_id = filter_var($property_id_temp, FILTER_SANITIZE_NUMBER_INT);
    
    $range=array('min_range'=>1,'max_range'=>5);
    $options=array('options'=>$range);

    $id=filter_var($property_id, FILTER_VALIDATE_INT, $options);
    if(!filter_var($property_id, FILTER_VALIDATE_INT, $options)){
        echo "<script> alert('Invalid property ID') </script>";
        exit;
    }

    
    

    $stmt = $pdo->prepare("select * from property where Property_Id=:id;");
    $stmt->execute(
        [':id'=>$id]
    );

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!is_null($row['Property_Id'])){
        echo "<strong> Property ID:</strong> ".$row['Property_Id']."\n";
        echo "<br>";
        echo "<strong> Property Name:</strong> ".$row['Property_Name']."\n";
        echo "<br>";
        echo "<strong> Property Description:</strong> ".$row['Description']."\n";
        echo "<br>";
        echo "<strong> Nr of Bedrooms: </strong>".$row['Nr_Bedrooms']."\n";
        echo "<br>";
        echo "<strong> Nr of Bathrooms: </strong>".$row['Nr_Bathrooms']."\n";
        echo "<br>";
        echo "<strong> Area: </strong>".$row['Area']."\n";
        echo "<br>";
        
        echo "<strong> Image: </strong>".$row['Image']."\n";
        echo "<br>";

        $path=$row['Image'];
        $path=".".$path;
        echo "<strong> Image: </strong> <div>
        <img src='".$path."' alt='Apartment' class='w-100' width=300px height=300px>
        </div>";
    }
    else{
        echo "No property found";
    }
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
?>