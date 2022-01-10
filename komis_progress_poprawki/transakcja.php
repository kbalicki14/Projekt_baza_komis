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

 
<h1>Transakcje</h1>
      <br>
      
      

<?php
require "dbh.inc.php";
        
$query = $conn->query("SELECT `id_transaction`, `tran_type`, transactions.id_client, transactions.id_vehicle, `date`, transactions.price, client.name, client.surname, client.pesel, brand.brand_name, vehicle.model_name, vehicle.register_nr, vehicle.production_year
FROM `transactions`
INNER JOIN vehicle ON transactions.id_vehicle = vehicle.id_vehicle 
INNER JOIN client ON transactions.id_client = client.id_client 
INNER JOIN brand ON vehicle.id_brand = brand.id_brand 
WHERE 1
ORDER BY id_transaction desc");
     
      

      
while ($row = $query->fetch_object()) {
  $transaction[] = $row;
} ?>


<main>
 <center>
  <?php foreach ($transaction as $tran):  ?>
     
    <h1>Typ transakcji:</h1>
    <a><?php  echo ($tran->tran_type == 's' ?  'Sprzedaż' :  'Kupno'); ?></a>
    <h1>Imie:</h1>
    <a><?php echo $tran->name; ?></a>
    <h1>Nazwisko:</h1>
    <a><?php echo $tran->surname; ?></a>  
    <h1>Pesel:</h1>
    <a><?php echo $tran->pesel; ?></a> 
    <h1>Marka: </h1>
    <a><?php echo $tran->brand_name; ?></a>
    <h1>Model:</h1>
    <a><?php echo $tran->model_name; ?></a>
    <h1>Numer rejestracyjny:</h1>
    <a><?php echo $tran->register_nr; ?></a> 
    <h1>Rok produkcji:</h1>
    <a><?php echo $tran->production_year; ?></a> 
    <h1>Data:</h1>
    <a><?php echo $tran->date; ?></a>
    <h1>Cena:</h1>
    <a><?php echo $tran->price; ?></a>
  
     <hr>
     
    
  <?php endforeach; ?>
     
    
    
    </center>
</main>   
      
      
       
      
</div>
    </div>  

</body>
 
</html>
