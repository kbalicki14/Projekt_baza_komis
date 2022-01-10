<!DOCTYPE html>
<html lang="pl-PL">
<head>   
<title>Komis</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<link rel="stylesheet" href="style.css">
</head>   
<body>

<!-- Pasek zadań -->
<div class="w3-top w3-hide-small">
  <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="index.php" class="w3-bar-item w3-button">Samochody</a>
    <a href="dodaj.php" class="w3-bar-item w3-button">Dodaj Samochód</a>
    <a href="usun.php" class="w3-bar-item w3-button">Usuń Samochód</a>
    <a href="klient.php" class="w3-bar-item w3-button">Klienci</a>
    <a href="dodaj_klienta.php" class="w3-bar-item w3-button">Dodaj Klienta</a>
    <a href="transakcja.php" class="w3-bar-item w3-button">Transakcje</a>
    <a href="dodaj_transakcja.php" class="w3-bar-item w3-button">Nowa Transakcja</a>
    <a href="autorzy.php" class="w3-bar-item w3-button">Autorzy</a>
    
    
      
  </div>
</div>
   
<div class="w3-container w3-black w3-padding-64 w3-xxlarge">
  <div class="w3-content">


<h1>Klienci</h1>
      <br>
      
      

<?php
require "dbh.inc.php";
        
$query = $conn->query("SELECT client.id_client, client.name, client.surname, client.pesel, client.tel_nr, client.birthday_date, address.street_name, address.building_nr, address.aprt_nr, city.city_name, city.postcode 
FROM `client` 
INNER JOIN address ON address.id_address = client.id_address 
INNER JOIN city ON address.id_city = city.id_city 
WHERE 1
ORDER BY client.id_client desc");
      

      
while ($row = $query->fetch_object()) {
  $client[] = $row;
} ?>


<main>
 <center>
  <?php foreach ($client as $cli):  ?>
     
    
    <h1>Imie:</h1>
        <a><?php echo $cli->name; ?></a>
    <h1>Nazwisko:</h1>
        <a><?php echo $cli->surname; ?></a>  
    <h1>Pesel:</h1>
        <a><?php echo $cli->pesel; ?></a> 
    <h1>Numer telefonu: </h1>
        <a><?php echo $cli->tel_nr;  ?></a>
    <h1>Data urodzenia:</h1>
        <a><?php echo $cli->birthday_date; ?></a>
    <h1>Ulica:</h1>
        <a><?php echo $cli->street_name; ?></a> 
    <h1>Numer budynku:</h1>
        <a><?php echo $cli->building_nr; ?></a> 
    <h1>Numer mieszkania:</h1>
        <a><?php echo $cli->aprt_nr; ?></a>
    <h1>Miasto:</h1>
        <a><?php echo $cli->city_name; ?></a>
    <h1>Kod pocztowy:</h1>
        <a><?php echo $cli->postcode; ?></a>
    
     <hr>
     
    
  <?php endforeach; ?>
    
    
    
    </center>
</main>   
      
      
       
      
</div>
    </div>  

</body>
 
</html>
