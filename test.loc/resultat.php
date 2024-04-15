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

    ini_set('display_errors', 0);
    
    $secretKey = 'R1CONE';

    $encrypted_score = $_GET['score'];
    $encrypted_firstname = $_GET['firstname'];
    $encrypted_lastname = $_GET['lastname'];
    $encrypted_klass = $_GET['klass'];

    $firstname = openssl_decrypt($encrypted_firstname, 'AES-256-CBC', $secretKey, 0, $secretKey);
    $lastname = openssl_decrypt($encrypted_lastname, 'AES-256-CBC', $secretKey, 0, $secretKey);
    $klass = openssl_decrypt($encrypted_klass, 'AES-256-CBC', $secretKey, 0, str_repeat("\0", 16));
    $score = openssl_decrypt($encrypted_score, 'AES-256-CBC', $secretKey, 0, $secretKey);



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
