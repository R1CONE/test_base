<?php
if (isset($_GET['score'])) {

    $servername = "localhost";
    $username = "root";
    $dbPassword = "";
    $database = "tests_prog";
    
    $conn = new mysqli($servername, $username, $dbPassword, $database);
    
    if ($conn->connect_error) {
        die("Błąd połączenia: " . $conn->connect_error);
    }

    $encrypted_score = $_GET['score'];
    $encrypted_firstname = $_GET['firstname'];
    $encrypted_lastname = $_GET['lastname'];
    $encrypted_klass = $_GET['klass'];

    $firstname = openssl_decrypt($encrypted_firstname, 'AES-256-CBC', 'R1C-158', 0);
$lastname = openssl_decrypt($encrypted_lastname, 'AES-256-CBC', 'R1C-158', 0);
$klass = openssl_decrypt($encrypted_klass, 'AES-256-CBC', 'R1C-158', 0);
$score = openssl_decrypt($encrypted_klass, 'AES-256-CBC', 'R1C-158', 0);



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
