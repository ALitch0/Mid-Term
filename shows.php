<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shows</title>
    <script src="js/app.js" defer></script>
</head>
<body>
    <?php 
    //capturing the value using $_POST array and storing into a variable
    $name = $_POST['name'];
    //connecting to database
    $db = new PDO('mysql:host=172.31.22.43;dbname=Alish200535161','Alish200535161','wXXqdNueNA');
    //creating sql insert command
    $sql = "SELECT * FROM services WHERE name = :name;";
    //preparing and binding sql insert
    $cmd=$db->prepare($sql);
    $cmd->bindParam(':name',$name,PDO::PARAM_STR);
    $cmd->execute();
    //fetching data to service variable
    $service= $cmd->fetch();
    
    //using fetched data to get serviceId
    $serviceId = $service['serviceId'];
    
    //setting up new sql insert for shows table
    $sql = "SELECT * FROM shows WHERE serviceId = :serviceId;";
    
    //preparing and binding sql insert
    $cmd=$db->prepare($sql);
    $cmd->bindParam(':serviceId',$serviceId,PDO::PARAM_INT);
    $cmd->execute();
    
    //fetching all data into shows
    $shows=$cmd->fetchAll();

    //creating a list for the selected services shows
    echo '<h1>Shows for '.$name.'</h1>';
    echo '<ol>';
    foreach($shows as $show){
        echo '
        <li><a href="delete.php?showId='.$show['showId'].'" onclick= "return confirmDelete();">'.$show['title'].'</a></li>
        ';
    }
    ?>
</body>
</html>