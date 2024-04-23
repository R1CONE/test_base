<?php


if(isset($_GET['score']) && isset($_GET['firstname']) && isset($_GET['lastname']) && isset($_GET['klass'])) {

    $servername = "localhost";
    $username = "root";
    $dbPassword = "";
    $database = "tests_prog";
    
    $conn = new mysqli($servername, $username, $dbPassword, $database);
    
    if ($conn->connect_error) {
        die("Błąd połączenia: " . $conn->connect_error);
    }
    
    $score = $_GET['score'];
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $klass = $_GET['klass'];


    echo "Score: $score / 10 <br>";
    echo "First Name: $firstname <br>";
    echo "Last Name: $lastname <br>";
    echo "Class: $klass <br>";

    $sql = "INSERT INTO resultat (Name, Lastname, klass, resultat) VALUES ('$firstname', '$lastname', '$klass', '$score')";

    if ($conn->query($sql) === TRUE) {
        echo "Данные успешно добавлены в базу данных.";
    } else {
        echo "Ошибка: " . $conn->error;
    }

    $conn->close();
}
?>

