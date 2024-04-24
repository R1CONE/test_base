<?php
function decrypt($data, $password) {
    $data = base64_decode($data);
    $iv_length = openssl_cipher_iv_length($cipher="AES-256-CBC");
    $iv = substr($data, 0, $iv_length);
    $encrypted = substr($data, $iv_length);
    return openssl_decrypt($encrypted, $cipher, $password, $options=0, $iv);
}

if(isset($_GET['score']) && isset($_GET['firstname']) && isset($_GET['lastname']) && isset($_GET['klass'])) {

    $servername = "localhost";
    $username = "root";
    $dbPassword = "";
    $database = "tests_prog";
    
    $conn = new mysqli($servername, $username, $dbPassword, $database);
    
    if ($conn->connect_error) {
        die("Błąd połączenia: " . $conn->connect_error);
    }

    $password = "R1CONE";
    
    $score = $_GET['score'];
    $encrypted_firstname = $_GET['firstname'];
    $encrypted_lastname = $_GET['lastname'];
    $encrypted_klass = $_GET['klass'];

    $decrypted_firstname =  decrypt($encrypted_firstname, $password);
    $decrypted_lastname = decrypt($encrypted_lastname, $password);
    $decrypted_klass = decrypt($encrypted_klass, $password);
    $decrypted_score = decrypt($score, $password); // Исправлено

    echo "Score: $decrypted_score / 10 <br>";
    echo "First Name: $decrypted_firstname <br>";
    echo "Last Name: $decrypted_lastname <br>";
    echo "Class: $decrypted_klass <br>";

    $sql = "INSERT INTO resultat (Name, Lastname, klass, resultat) VALUES ('$decrypted_firstname', '$decrypted_lastname', '$decrypted_klass', '$decrypted_score')";

    if ($conn->query($sql) === TRUE) {
        echo "Данные успешно добавлены в базу данных.";
    } else {
        echo "Ошибка: " . $conn->error;
    }

    $conn->close();
}
?>
