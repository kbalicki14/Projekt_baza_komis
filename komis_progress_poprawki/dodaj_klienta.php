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
        <h1 style='text-align: center;'>Dodaj klienta:</h1><br>
        <form action='' method='POST' enctype="multipart/form-data">
            <p class='dodaj'>Imie:</p>
             <input style='width: 40%;' type='text' class='text' name='name'> 
                <br>
            <p class='dodaj'>Nazwisko:</p>
            <input style='width: 40%;' type='text' class='text' name='surname'>
                <br>
            <p class='dodaj'>Pesel:</p>
            <input style='width: 40%;' type='text' class='text' name='pesel'>
                <br>
            <p class='dodaj'>Numer telefonu:</p>
            <input style='width: 40%;' type='text' class='text' name='tel_nr'>
                <br>
             <p class='dodaj'>Data urodzenia</p>
            <input style='width: 40%;' type='date' class='text' name='birthday'>
                <br>
             <p class='dodaj'>Ulica:</p>
            <input style='width: 40%;' type='text' class='text' name='street_name'>
                <br>
            <p class='dodaj'>Numer budynku:</p>
            <input style='width: 40%;' type='text' class='text' name='building_nr'>
                <br>
            <p class='dodaj'>Numer mieszkania:</p>
            <input style='width: 40%;' type='text' class='text' name='aprt_nr'>
                <br>
            <p class='dodaj'>Miasto:</p>
            <?php
            require "dbh.inc.php";
            $city =$conn ->query("SELECT * FROM `city` ORDER BY city_name");
             
            ?>
               
            <select name="city">
                        <?php
                            while ($row = $city->fetch_assoc()) 
                            {
                                echo '<option value=" '.$row['id_city'].' "> '.$row['city_name'].' </option>';
                            }
                            $conn->close();
                        ?>
            </select>
            <br>
            <br>

            <input id="btn" class='button' type='submit' name='submitBtn' value='Dodaj'>
        </form>
        <?php
        
        require "dbh.inc.php";
               // $db = new mysqli('localhost', 'root', '', 'komis');
               if (isset($_POST['name'])) { 
        	   $name = $_POST['name'];
        	   $surname = $_POST['surname'];
        	   $pesel = $_POST['pesel'];
        	   $tel_nr = $_POST['tel_nr'];
        	   $birthday = $_POST['birthday'];
        	   $street_name = $_POST['street_name'];
               $building_nr = $_POST['building_nr'];
               $aprt_nr = $_POST['aprt_nr'];
               $city = $_POST['city'];

        	   
        	if( empty($name)||  empty($surname) ||  empty($pesel)|| empty($tel_nr)|| empty($birthday)|| empty($street_name)|| empty($building_nr)|| empty($aprt_nr)|| empty($city) ){
					echo "Wypełnij wszystkie pola";
				}else {
                
				require "dbh.inc.php";	
                $conn -> autocommit(0);
					
         	$address_add = $conn->query("INSERT INTO `address`(`id_address`, `street_name`, `building_nr`, `aprt_nr`, `id_city`) VALUES ('null','$street_name','$building_nr','$aprt_nr','$city');");
                  
                
         	$client_add = $conn->query("INSERT INTO `client`(`id_client`, `name`, `surname`, `pesel`, `tel_nr`, `birthday_date`, `id_address`)
            VALUES ('null','$name','$surname','$pesel','$tel_nr','$birthday',(SELECT MAX(id_address) FROM address));");

                    
                if ($address_add and $client_add) {
                    $conn -> commit();
                    echo "dodano $name $surname ";

                    }
                 else {
                     
                     $conn ->rollBack();
                     echo "bład! nie dodano klienta";
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
