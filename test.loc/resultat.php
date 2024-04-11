<?php
if (isset($_GET['score']) && isset($_GET['firstname']) && isset($_GET['lastname']) && isset($_GET['klass'])) {
    $score = $_GET['score'];
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $klass = $_GET['klass'];

    echo "Score: $score / 10 <br>";
    echo "First Name: $firstname <br>";
    echo "Last Name: $lastname <br>";
    echo "Class: $klass <br>";
} else {
    echo "One or more parameters are missing.";
}
?>
