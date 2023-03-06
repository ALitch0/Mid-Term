<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Select Services</h1>
    <form action="shows.php" method="post">
        <fieldset>
            <label for="name">Services: </label>
            <select name="name" id="name">
    <?php 
    //connecting to database
    $db = new PDO('mysql:host=172.31.22.43;dbname=Alish200535161','Alish200535161','wXXqdNueNA');
    
    //setting up sql insert command
    $sql = "SELECT * FROM services;";

    //execute the select command
    $cmd = $db->prepare($sql);
    $cmd->execute();

    //store the results using fetchAll
    $services = $cmd->fetchAll();

    //creating a dropdown menu
    //displaying data by using foreach loop where $services = all data, $service = current item in the loop
    foreach($services as $service){
        echo '<option>'.$service['name'].'
        </option>
        ';
    }
    echo '</select>';
    //disconnecting database
    $db= null;
    ?>
    <button>Get Shows</button>
    </form>
</body>
</html>