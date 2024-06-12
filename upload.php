<!DOCTYPE html> 
<html lang="ro"> 
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Adaugă Internship</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
</head>
<body>
<header> 
        <nav class="navbar">
        <a href="index.html"> <div class="logo"><span style="color:white" >Inter</span>Nexa</div> </a>
            <ul class="nav-links"> <!-- Lista de link-uri -->
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
        <section class="form-section"> 
            <h2>Adaugă un nou Internship</h2>
            <br> 
            <form action="procesare_internship.php" method="POST" enctype="multipart/form-data"> <!-- Formularul pentru adaugarea unui nou internship -->
                <div class="form-group"> 
                    <label for="nume_firma">Nume Firmă:</label>
                    <input type="text" id="nume_firma" name="nume_firma" required> 
                </div>
                <div class="form-group"> 
                    <label for="domeniu">Domeniu:</label> 
                    <input type="text" id="domeniu" name="domeniu" required> 
                </div>
                <div class="form-group"> 
                    <label for="salariu">Salariu (RON):</label>
                    <input type="number" id="salariu" name="salariu" required> 
                </div>
                <div class="form-group">
                    <label for="perioada">Perioadă (luni):</label> <
                    <input type="number" id="perioada" name="perioada" required> 
                </div>
                <div class="form-group">
                    <label for="descriere">Descriere:</label> 
                    <textarea id="descriere" name="descriere" rows="4" required></textarea> 
                </div>
                <div class="form-group"> 
                    <label for="email">Email Contact:</label> 
                    <input type="email" id="email" name="email" required> 
                </div>
                <div class="form-group">
                    <label for="telefon">Telefon Contact:</label>
                    <input type="tel" id="telefon" name="telefon" pattern="[0-9]{10}" required>
                    <small>Introduceți un număr de telefon format din 10 cifre.</small> 
                </div>
                <div class="form-group">
                    <label for="poza">Poza:</label> <!-- Eticheta pentru poza -->
                    <input type="file" id="poza" name="poza" accept="image/*" required> 
                </div>
                <button type="submit">Adaugă Internship</button> <!-- Buton pentru trimiterea formularului -->
            </form>
        </section>
    </main>
    <footer> <!-- Sectiunea footer -->
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
