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
  
   
   <?php
  require "dbh.inc.php";

  $vehicle = null;

  if (isset($_GET['id'])) {

  $id= (int)$_GET['id'];

  $vehicle = $conn->query("SELECT vehicle.id_vehicle, vehicle.id_brand,	vehicle.model_name,	vehicle.capacity,	vehicle.register_nr, vehicle.production_year,	vehicle.car_milage,	vehicle.sold,	vehicle.price,	brand.brand_name
FROM vehicle
LEFT JOIN brand
ON vehicle.id_vehicle = brand.brand_name
WHERE vehicle.id_vehicle = {$id}")->fetch_object();

  }



?>



<main>
    <center>  
     <?php    
        $logo = $vehicle->id_brand; 
        $logo .= ".png";?>
    <img width="450px" height="300px" src="<?php echo "marka/$logo"; ?>" alt="pic"> 
        <?php if ($vehicle): ?>

 <h3>Model:</h3>
    <a><?php echo $vehicle->model_name; ?></a>
    <h3>Pojemność:</h3>
    <a><?php echo $vehicle->capacity; printf(" l");?></a>  
    <h3>Numer Rejestracyjny:</h3>
    <a><?php echo $vehicle->register_nr; ?></a> 
    <h3>Rok Produkcji:</h3>
    <a><?php echo $vehicle->production_year; printf(" rok")?></a> 
    <h3>Przebieg:</h3>
    <a><?php echo $vehicle->car_milage; printf(" km") ?></a> 
    <h3>Cena: </h3><a><?php echo $vehicle->price; printf(" zł") ?></a>
  <h1 style="color:green">
        <?php
    if ( $vehicle->sold == "n") {printf("Aktualna Oferta");
                            } 
        elseif ($vehicle->sold == "y"){
        ?><h1 style="color:red"><?php  printf("Sprzedany");
                                           
        }
        else {
        ?><h1 style="color:orange"><?php  printf("Zarezerwowany");
        }
        ?></h1></h1></h1>
    
           <form action='' method='POST' enctype="multipart/form-data">
    <input id="dele" class='button' type='submit' name='dele' value='Usuń samochód z komisu'>
    </form>
    <?php
    if (isset($_POST['dele'])){
   
    require "dbh.inc.php";
   $query = $conn->query("
   DELETE FROM vehicle WHERE vehicle.id_vehicle = $id ");
    	if($query){
						echo "usunięto samochód z komisu";
					}else {
						echo "Nie udało się usunąć samochodu z komisu";
					}
    $conn->close();
}?>
        <?php endif; ?>
    </center>
</main>   
      
  
</div>
    </div>
    


    
    
     

</body>
</html>