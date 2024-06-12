<?php
// Conectare la baza de date
$servername = "localhost"; // Adresa serverului MySQL
$username = "root"; // Numele utilizatorului MySQL
$password = ""; // Parola utilizatorului MySQL
$database = "internships"; // Numele bazei de date

$conn = new mysqli($servername, $username, $password, $database); // Crearea unei noi conexiuni MySQL

if ($conn->connect_error) { 
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $nume_firma = $_POST["nume_firma"]; 
    $domeniu = $_POST["domeniu"]; // 
    $salariu = $_POST["salariu"]; 
    $perioada = $_POST["perioada"]; 
    $descriere = $_POST["descriere"]; 
    $email_contact = $_POST["email"]; 
    $telefon_contact = $_POST["telefon"]; 
    $poza = $_FILES["poza"]["name"]; 


    $target_dir = "img/"; 
    $target_file = $target_dir . basename($_FILES["poza"]["name"]); 
    move_uploaded_file($_FILES["poza"]["tmp_name"], $target_file); 
    $poza = $target_file; 

    $sql = "INSERT INTO oferte (nume_firma, domeniu, salariu, perioada, descriere, email_contact, telefon_contact, poza) VALUES ('$nume_firma', '$domeniu', '$salariu', '$perioada', '$descriere', '$email_contact', '$telefon_contact', '$poza')";
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        $nume_fisier_oferta = "oferte/oferta$last_id.php"; 
        $oferta_content = <<<EOT
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">A
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ofertă - $nume_firma</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<header>
        <nav class="navbar">
        <a href="index.html"> <div class="logo"><span style="color:white" >Inter</span>Nexa</div> </a>
            <ul class="nav-links">
                <li><a href="index.html">Acasa</a></li>
                <li><a href="http://localhost:3000/oferte.php">Oferte</a></li>
                <li><a href="despre.html">Despre</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <div class="nav-icons">
                <a href="http://localhost:3000/upload.php"><i class="fas fa-plus"></i></a>
            </div>
        </nav>
    </header>
    <main>
        <section class="oferta">
            <div class="oferta-details">
                <h1>$nume_firma</h1>
                <p><strong>Domeniu:</strong> $domeniu</p>
                <p><strong>Salariu:</strong> $salariu RON</p>
                <p><strong>Perioadă:</strong> $perioada luni</p>
                <p><strong>Descriere:</strong> $descriere</p>
                <p><strong>Contact:</strong> Email: $email_contact<br> Telefon: $telefon_contact</p>
            </div>
            <div class="oferta-image">
                <img src="../$poza" alt="$nume_firma">
            </div>
        </section>
    </main>
    <footer>
        <div class="footer-container">
            <div class="footer-logo">InterNexa</div>
            <ul class="footer-links">
                <li><a href="index.html">Acasa</a></li>
                <li><a href="despre.html">Despre</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <div class="footer-address">
                <p>info@internexa.com</p>
            </div>
        </div>
    </footer>
</body>
</html>
EOT;

        // Scrierea conținutului în fișier
        file_put_contents($nume_fisier_oferta, $oferta_content);

        // Redirectare către pagina de oferte după adăugarea cu succes a internship-ului
        header("Location: http://localhost:3000/oferte.php"); 
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; 
    }
    }
    
    $conn->close(); // Închidem conexiunea la baza de date pentru a elibera resursele
    ?>