<?php
// Conexiune la baza de date MySQL
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "internships";

// Creare conexiune
$conn = mysqli_connect($servername, $username, $password, $database); 

// Verificare conexiune
if (!$conn) { 
    die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error());
}

// Preia datele din formular
$nume = $_POST['nume'] ?? ''; 
$prenume = $_POST['prenume'] ?? ''; 
$email = $_POST['email'] ?? ''; 

if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) { 
    $upload_directory = 'uploads/';
    $cv_name = $_FILES['cv']['name']; 
    $cv_path = $upload_directory . $cv_name; 
    if (move_uploaded_file($_FILES['cv']['tmp_name'], $cv_path)) {
        $sql = "INSERT INTO aplicari_internship (nume, prenume, email, cv) VALUES ('$nume', '$prenume', '$email', '$cv_path')";

        if (mysqli_query($conn, $sql)) { 
            echo "Aplicația a fost trimisă cu succes!"; 
        } else {
            echo "Eroare la trimiterea aplicației: " . mysqli_error($conn); 
        }
    } else {
        echo "Eroare la mutarea fișierului încărcat."; 
    }
} else {
    echo "Eroare la încărcarea fișierului."; 
}

mysqli_close($conn); // Se închide conexiunea la baza de date pentru a elibera resursele
?>
