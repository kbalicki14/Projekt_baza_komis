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
  
      
  
   <main>
    <center>
        <br>
        <h1 style='text-align: center;'>Nowa Transakcja:</h1><br>
        <form action='' method='POST' enctype="multipart/form-data">
            <p class='dodaj'>Klient:</p>
            <?php
         
            require "dbh.inc.php";
            $chose_client =  $conn->query("SELECT `id_client`, `name`, `surname`, `pesel`  FROM `client` WHERE 1 ORDER BY id_client desc");
            ?>
               
            <select name="client">
                        <?php
                            while ($row = $chose_client->fetch_assoc()) 
                            {
                                echo '<option value=" '.$row['id_client'].' "> '.$row['name'].' '.$row['surname'].' pesel: '.$row['pesel'].' </option>';
                            }
                            $conn->close();
                        ?>
            </select>
            <p class='dodaj'>Pojazd:</p>
            <?php
            require "dbh.inc.php";
         
            $chose_vehicle =  $conn->query("SELECT `id_vehicle`, brand.brand_name, `model_name`, `capacity`, `register_nr`, `production_year`, `car_milage`, `sold`, `price` 
            FROM `vehicle`
            INNER JOIN brand ON vehicle.id_brand = brand.id_brand
            WHERE sold = 'n' OR sold = 'r';");
            ?>
               
            <select name="vehicle">
                        <?php
                            while ($row = $chose_vehicle->fetch_assoc()) 
                            {
                                echo '<option value=" '.$row['id_vehicle'].' "> '.$row['brand_name'].' '.$row['model_name'].' '.$row['capacity'].' '.$row['production_year'].'r. '.$row['register_nr'].' przebieg: '.$row['car_milage'].' cena: '.$row['price'].' </option>';
                            }
                            $conn->close();
                        ?>
            </select>
            
            <p class='dodaj'>Typ transakcji:</p>
            <select name="tran_type">
                <option value="s" selected>Sprzedaż</option>
                <option value="b">Kupno</option>
            
            </select>

            
            <p class='dodaj'>Cena:</p>
             <input style='width: 40%;' type='number' class='text' name='price'> 
                <br>
            <p class='dodaj'>Data:</p>
            <input style='width: 40%;' type='date' class='text'  name='date'>
          
            <br>
            <br>
            <br>

            <input id="btn" class='button' type='submit' name='submitBtn' value='Potwierdz'>
        </form>
        <?php
        

                
                require "dbh.inc.php";
               if (isset($_POST['client'])) { 
        	   $id_client = $_POST['client'];
        	   $id_vehicle = $_POST['vehicle'];
        	   $date = $_POST['date'];
        	   $price = $_POST['price'];
        	   $tran_type = $_POST['tran_type'];
        	 
        	   
        	if( empty($id_client)||  empty($id_vehicle) ||  empty($date) || empty($price) || empty($tran_type) ){
					echo "Wypełnij wszystkie pola";
				}else {
                
                $sold = ($tran_type == 's' ?  'y' :  'n');
				$conn = new mysqli("localhost", "root", "", "komis");
                $conn -> autocommit(0);
					
         	$transaction_add = $conn->query("INSERT INTO `transactions`(`id_transaction`, `tran_type`, `id_client`, `id_vehicle`, `date`, `price`) 
            VALUES ('null','$tran_type','$id_client','$id_vehicle','$date','$price')");
            
                
            $update_vehicle = $conn ->query("UPDATE `vehicle` SET `sold`='$sold',`price`='$price' WHERE `id_vehicle` ='$id_vehicle'");    
                    
                if ($transaction_add and $update_vehicle) {
                    $conn -> commit();
                    echo "transakcja powiodła sie";

                    }
                 else {
                     
                     $conn ->rollBack();
                     echo "bład! transakcja nie powiodła sie";
                    }
                
                    $conn->close();
				}
				
			}
			
		?>
            
    </center>
</main>

  
</div>
    </div>
     

</body>
</html> 
