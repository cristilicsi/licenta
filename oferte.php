<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Pagină cu Meniu</title>
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<header> 
    <nav class="navbar">
    <a href="index.html"> <div class="logo"><span style="color:white" >Inter</span>Nexa</div> </a>
        <ul class="nav-links"> <!-- Lista de linkuri de navigare -->
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
    <section class="internships"> 
    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "internships";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Conexiunea la baza de date a eșuat: " . $conn->connect_error); 
    }

    $sql = "SELECT * FROM oferte";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) { 
            echo "<a href='/oferte/oferta" . $row["id"] . ".php' class='internship'>";
            echo "<img src='" . $row["poza"] . "' alt='" . $row["nume_firma"] . "'>";
            echo "<h1>" . $row["nume_firma"] . "</h1>"; 
            echo "<p>Domeniu: " . $row["domeniu"] . "<br>Salariu: " . $row["salariu"] . " RON<br>Perioadă: " . $row["perioada"] . " luni</p>"; // Afișăm detalii despre ofertă
            echo "</a>"; 
        }
    } else {
        echo "Nu există oferte disponibile.";
    }

    $conn->close();
    ?>
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
