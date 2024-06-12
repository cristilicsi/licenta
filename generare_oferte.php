<?php
// Conectăm la baza de date
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "internships"; 

$conn = new mysqli($servername, $username, $password, $database); 
if ($conn->connect_error) { 
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}

// Verificăm dacă folderul "oferte" există și, dacă nu, îl creăm
if (!is_dir('oferte')) { 
    mkdir('oferte'); 
}

// Interogăm baza de date pentru a obține toate ofertele de internship
$sql = "SELECT * FROM oferte"; 
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) { // 
    
    while($row = $result->fetch_assoc()) { 
        
        $id_oferta = $row["id"]; //
        $nume_fisier = "oferte/oferta$id_oferta.php";

        // Construim conținutul paginii pentru ofertă
        $nume_firma = $row["nume_firma"];
        $domeniu = $row["domeniu"];
        $salariu = $row["salariu"];
        $perioada = $row["perioada"];
        $descriere = $row["descriere"];
        $email_contact = $row["email_contact"];
        $telefon_contact = $row["telefon_contact"];
        $poza = $row["poza"];

        $oferta_content = <<<EOT
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
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

        // Scriem conținutul în fișier
        if (file_put_contents($nume_fisier, $oferta_content) !== false) { // Verificăm dacă scrierea în fișier a avut succes
            echo "Pagina pentru oferta cu ID-ul $id_oferta a fost generată cu succes.<br>"; // Afisăm un mesaj de succes
        } else {
            echo "Eroare la generarea paginii pentru oferta cu ID-ul $id_oferta.<br>"; // Afisăm un mesaj de eroare în caz de eșec
        }
    }
}
 else {
echo "Nu există oferte disponibile sau interogarea bazei de date a eșuat."; // Afisăm un mesaj în cazul în care nu există oferte sau interogarea bazei de date a eșuat
}

$conn->close(); // Închidem conexiunea la baza de date
?>
