<!--run http://localhost/Practice_php/index1.php(turn on apache, mysql on xampp) in the browser to see the front end, insert data and find it in http://localhost/phpmyadmin/(turn on mysql admin) database-->
<?php
$insert=false;
if(isset($_POST['name'])){
    $server= "localhost";
    $username= "root";
    $password= "";
    //$dbname="thiland_trip"

    $conn = mysqli_connect($server,$username,$password);

    if(!$conn){
        die("Connection to the database failed due to ".mysqli_connect_error());
    }
    //echo("Successfully established connection with the database");
    
    $name=$_POST["name"];
    $age=$_POST["age"];
    $gender=$_POST["gender"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $desc=$_POST["desc"];

    $sql= "INSERT INTO `thiland_trip`.`table` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Other Info`, `Date_of_insertion`)
    VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";
    //echo $sql;

    if($conn->query($sql) == true) {
        //echo "Successfully inserted";
        $insert=true;
    }
    else {
        echo "Error: ". $sql. "<br>". mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore the Great Beyond</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Neonderthaw&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="cu" src="cu.jpg" alt="Chandigarh University">
    <div class="container">
        <h3>Welocome to Chandigarh University Thiland Trip</h3>
        <p>Enter your details to confirm your participation in the trip</p>
        <?php
        if($insert == true){
        echo "<P>Thanks for submitting. Enjoy the Trip!!!</p>";
        }
        ?>
        <form action="index1.php" method="post">
            <input type="Text" name="name" id="name" placeholder="Enter your name">
            <input type="Text" name="age" id="age" placeholder="Enter your age">
            <input type="Text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
    <!--INSERT INTO `table` (`S.no`, `Name`, `Age`, `Gender`, `Email`, `Phone`, `Other Info`, `Date_of_insertion`)
     VALUES ('2', 'Ashish', '24', 'M', 'abc@gmail.com', '9087654323', 'He is Anirban\'s friend.', '');-->
</body>
</html>

 