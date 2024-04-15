<?php


$servername = "localhost";
$username = "root";
$dbPassword = "";
$database = "tests_prog";

$conn = new mysqli($servername, $username, $dbPassword, $database);

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

global $firstname;
global $lastname;
global $klass;

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$klass = $_POST['klass'];

echo $firstname;
echo $lastname;
echo $klass;





$pyt_id = array();

$randomNumbers = [];
for ($i = 0; $i < 11; $i++) {
    $randomNumber = rand(1, 20);
    $randomNumbers[] = $randomNumber;
    //print_r($randomNumbers);
}


for ($i = 1; $i <= 20; $i++) {
    $sql = "SELECT pytania FROM pyt_otp WHERE id = $i";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pyt_id["pyt_id$i"] = $row['pytania'];

      
    }
  
}

$var1_id = array();

for ($i = 1; $i <= 20; $i++) {
    $sql = "SELECT var1 FROM pyt_otp WHERE id = $i";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $var1_id["var1_id$i"] = $row['var1'];

       // echo $var1_id["var1_id$i"]; // wszystkie var1
    }
    // Remove the following line, as it is printing var1_id6 inside the loop
    // echo $var1_id["var1_id6"];
}


$var2_id = array();

for ($i = 1; $i <= 20; $i++) {
    $sql = "SELECT var2 FROM pyt_otp WHERE id = $i";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $var2_id["var2_id$i"] = $row['var2'];

       // echo $var2_id["var2_id$i"]; // wszystkie var2
    }
}

$var3_id = array();

for ($i = 1; $i <= 20; $i++) {
    $sql = "SELECT var3 FROM pyt_otp WHERE id = $i";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $var3_id["var3_id$i"] = $row['var3'];

       // echo $var3_id["var3_id$i"]; // wszystkie var3
    }
}

$odpowiedz_id = array();

for ($i = 1; $i <= 20; $i++) {
    $sql = "SELECT odpowiedz FROM pyt_otp WHERE id = $i";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $odpowiedz_id["odpowiedz_id$i"] = $row['odpowiedz'];
       
    }
}

// && isset($_POST['myButton'])

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['myButton'])) {




    $q1 = isset($_POST['q1']) ? $_POST['q1'] : '';
    $q2 = isset($_POST['q2']) ? $_POST['q2'] : '';
    $q3 = isset($_POST['q3']) ? $_POST['q3'] : '';
    $q4 = isset($_POST['q4']) ? $_POST['q4'] : '';
    $q5 = isset($_POST['q5']) ? $_POST['q5'] : '';
    $q6 = isset($_POST['q6']) ? $_POST['q6'] : '';
    $q7 = isset($_POST['q7']) ? $_POST['q7'] : '';
    $q8 = isset($_POST['q8']) ? $_POST['q8'] : '';
    $q9 = isset($_POST['q9']) ? $_POST['q9'] : '';
    $q10 = isset($_POST['q10']) ? $_POST['q10'] : '';

    

   $score = 0;

   if ($q1 == $odpowiedz_id["odpowiedz_id$randomNumbers[0]"]){
        $score++;
   }

   if ($q2 == $odpowiedz_id["odpowiedz_id$randomNumbers[1]"]){
        $score++;
   }

   if ($q3 == $odpowiedz_id["odpowiedz_id$randomNumbers[2]"]){
        $score++;
   }

   if ($q4 == $odpowiedz_id["odpowiedz_id$randomNumbers[3]"]){
        $score++;
   }

   if ($q5 == $odpowiedz_id["odpowiedz_id$randomNumbers[4]"]){
        $score++;
   }

   if ($q6 == $odpowiedz_id["odpowiedz_id$randomNumbers[5]"]){
       $score++;
   }

   if ($q7 == $odpowiedz_id["odpowiedz_id$randomNumbers[6]"]){
       $score++;
   }

   if ($q8 == $odpowiedz_id["odpowiedz_id$randomNumbers[7]"]){
        $score++;
   }

   if ($q9 == $odpowiedz_id["odpowiedz_id$randomNumbers[8]"]){
       $score++;
   }

   if ($q10 == $odpowiedz_id["odpowiedz_id$randomNumbers[9]"]){
       $score++;
   }

$bytes_klass = mb_strlen($klass, '8bit');
$bytes_score = mb_strlen($score, '8bit');


   // Генерация хеш-значений
   $encrypted_firstname = openssl_encrypt($firstname, 'AES-256-CBC', 'R1C-158', 0);
   $encrypted_lastname = openssl_encrypt($lastname, 'AES-256-CBC', 'R1C-158', 0);
   $encrypted_klass = openssl_encrypt($klass, 'AES-256-CBC', 'R1C-158', $bytes_klass);
   $encrypted_score = openssl_encrypt($score, 'AES-256-CBC', 'R1C-158', 0, $bytes_);
   
   // Передача зашифрованных значений через URL
   header("Location:resultat.php?score=$encrypted_score&firstname=$encrypted_firstname&lastname=$encrypted_lastname&klass=$encrypted_klass");

   exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Egzamin ABC</title>
    <style>
                body {
            font-family: Arial, sans-serif;
        }

        #exam-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .question {
            margin-bottom: 15px;
        }
        
    </style>
</head>

<body>
    <form id="exam-form" method="post">
        <div id="exam-container">
            <h1>Egzamin z Bezpieczeństwa Informatycznego</h1>
            <h2>zaznacz wszystko!!!</h2>
            <img src="https://media.tenor.com/yk8nhx3fZGYAAAAj/sebas-bleizeffer.gif" alt="Opis obrazka" width="150" height="100">

            <div class="question">
                <p><?php echo '1.'. $pyt_id["pyt_id$randomNumbers[0]"]; ?></p>
                <input type="radio" name="q1" value="a"><?php echo $var1_id["var1_id$randomNumbers[0]"]; ?><br>
                <input type="radio" name="q1" value="b"><?php echo $var2_id["var2_id$randomNumbers[0]"]; ?><br>
                <input type="radio" name="q1" value="c"> <?php echo $var3_id["var3_id$randomNumbers[0]"]; ?><br>
            </div>

            <div class="question">
                <p><?php echo '2.'. $pyt_id["pyt_id$randomNumbers[1]"]; ?></p>
                <input type="radio" name="q2" value="a"><?php echo $var1_id["var1_id$randomNumbers[1]"]; ?><br>
                <input type="radio" name="q2" value="b"><?php echo $var2_id["var2_id$randomNumbers[1]"]; ?><br>
                <input type="radio" name="q2" value="c"><?php echo $var3_id["var3_id$randomNumbers[1]"]; ?><br>
            </div>

            <div class="question">
                <p><?php echo '3.'. $pyt_id["pyt_id$randomNumbers[2]"]; ?></p>
                <input type="radio" name="q3" value="a"><?php echo $var1_id["var1_id$randomNumbers[2]"]; ?><br>
                <input type="radio" name="q3" value="b"><?php echo $var2_id["var2_id$randomNumbers[2]"]; ?><br>
                <input type="radio" name="q3" value="c"><?php echo $var3_id["var3_id$randomNumbers[2]"]; ?><br>
            </div>

            <div class="question">
                <p><?php echo '4.'. $pyt_id["pyt_id$randomNumbers[3]"]; ?></p>
                <input type="radio" name="q4" value="a"> <?php echo $var1_id["var1_id$randomNumbers[3]"]; ?><br>
                <input type="radio" name="q4" value="b"> <?php echo $var2_id["var2_id$randomNumbers[3]"]; ?><br>
                <input type="radio" name="q4" value="c"> <?php echo $var3_id["var3_id$randomNumbers[3]"]; ?><br>
            </div>

            <div class="question">
                <p><?php echo '5.'. $pyt_id["pyt_id$randomNumbers[5]"]; ?></p>
                <input type="radio" name="q5" value="a"><?php echo $var1_id["var1_id$randomNumbers[4]"]; ?> <br>
                <input type="radio" name="q5" value="b"><?php echo $var2_id["var2_id$randomNumbers[5]"]; ?><br>
                <input type="radio" name="q5" value="c"><?php echo $var3_id["var3_id$randomNumbers[5]"]; ?><br>
            </div>

            <div class="question">
                <p><?php echo '6.'. $pyt_id["pyt_id$randomNumbers[6]"]; ?></p>
                <input type="radio" name="q6" value="a"> <?php echo $var1_id["var1_id$randomNumbers[6]"]; ?><br>
                <input type="radio" name="q6" value="b"> <?php echo $var2_id["var2_id$randomNumbers[6]"]; ?><br>
                <input type="radio" name="q6" value="c"> <?php echo $var3_id["var3_id$randomNumbers[6]"]; ?><br>
            </div>

            <div class="question">
                <p><?php echo '7.'. $pyt_id["pyt_id$randomNumbers[7]"]; ?></p>
                <input type="radio" name="q7" value="a"> <?php echo $var1_id["var1_id$randomNumbers[7]"]; ?><br>
                <input type="radio" name="q7" value="b"> <?php echo $var2_id["var2_id$randomNumbers[7]"]; ?><br>
                <input type="radio" name="q7" value="c"> <?php echo $var3_id["var3_id$randomNumbers[7]"]; ?><br>
            </div>

            <div class="question">
                <p><?php echo '8.'. $pyt_id["pyt_id$randomNumbers[8]"]; ?></p>
                <input type="radio" name="q8" value="a"><?php echo $var1_id["var1_id$randomNumbers[8]"]; ?><br>
                <input type="radio" name="q8" value="b"> <?php echo $var2_id["var2_id$randomNumbers[8]"]; ?><br>
                <input type="radio" name="q8" value="c"><?php echo $var3_id["var3_id$randomNumbers[8]"]; ?><br>
            </div>

            <div class="question">
                <p><?php echo '9.'. $pyt_id["pyt_id$randomNumbers[9]"]; ?></p>
                <input type="radio" name="q9" value="a"> <?php echo $var1_id["var1_id$randomNumbers[9]"]; ?><br>
                <input type="radio" name="q9" value="b"><?php echo $var2_id["var2_id$randomNumbers[9]"]; ?><br>
                <input type="radio" name="q9" value="c"> <?php echo $var3_id["var3_id$randomNumbers[9]"]; ?><br>
            </div>

            <div class="question">
                <p><?php echo '10.'. $pyt_id["pyt_id$randomNumbers[10]"]; ?></p>
                <input type="radio" name="q10" value="a"> <?php echo $var1_id["var1_id$randomNumbers[10]"]; ?><br>
                <input type="radio" name="q10" value="b"><?php echo $var2_id["var2_id$randomNumbers[10]"]; ?><br>
                <input type="radio" name="q10" value="c"> <?php echo $var3_id["var3_id$randomNumbers[10]"]; ?><br>
           </div>

           <input type="hidden" name="firstname" value="<?php echo $firstname; ?>">
            <input type="hidden" name="lastname" value="<?php echo $lastname; ?>">
            <input type="hidden" name="klass" value="<?php echo $klass; ?>">

           
            <input type="submit" name="myButton" value="Sprawdź odpowiedzi, powodzenia:3">
        </form>

      
        <div id="result-container"></div>
    </div>

    



</html>
</body>




