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

 
<h1>Usuń pojazd </h1>
      <br>
      <br>
      <br>

<?php
require "dbh.inc.php";
        
$query = $conn->query("SELECT vehicle.id_vehicle, vehicle.id_brand,	vehicle.model_name,	vehicle.capacity,	vehicle.register_nr, vehicle.production_year,	vehicle.car_milage,	vehicle.sold,	vehicle.price,	brand.brand_name
FROM vehicle
LEFT JOIN brand
ON vehicle.id_vehicle = brand.brand_name
GROUP BY vehicle.id_vehicle
ORDER BY vehicle.sold");

      
while ($row = $query->fetch_object()) {
  $vehicle[] = $row;
} ?>



<main>
 <center>
  <?php foreach ($vehicle as $veh):  ?>
     

     <h1><a href="cardel.php?id=<?php echo $veh->id_vehicle; ?>"><?php 
   
        $logo = $veh->id_brand;
        $logo .= ".png";?>
       <img width="450px" height="300px" src="<?php echo "marka/$logo"; ?>" alt="pic">  <a/></h1>

    
    <h1>Model:</h1>
    <a><?php echo $veh->model_name; ?></a>
    <h1>Pojemność:</h1>
    <a><?php echo $veh->capacity; printf(" l");?></a>  
    <h1>Przebieg:</h1>
    <a><?php echo $veh->car_milage; printf(" km") ?></a> 
    <h1>Cena: </h1>
    <a><?php echo $veh->price; printf(" zł") ?></a>
   <h1 style="color:green">
        <?php
    if ( $veh->sold == "n") {printf("Aktualna Oferta");
                            } 
        elseif ($veh->sold == "y"){
        ?><h1 style="color:red"><?php  printf("Sprzedany");
                                           
        }
        else {
        ?><h1 style="color:orange"><?php  printf("Zarezerwowany");
        }
        ?></h1></h1></h1>

        <hr>
  <?php endforeach; ?>
    </center>
</main>   
      
      </main>
      
      
      
</div>
    </div>
    


   

     

</body>
 
</html>
