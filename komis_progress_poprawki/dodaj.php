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
        <h1 style='text-align: center;'>Dodaj Samochód do bazy komisu:</h1><br>
        <form action='' method='POST' enctype="multipart/form-data">
            <p class='dodaj'>Marka:</p>
            <?php
            //$conn = new mysqli("localhost", "root", "", "komis");
            require "dbh.inc.php";
             $query = "SELECT * FROM `brand`";
            $res = mysqli_query($conn, $query);   
            ?>
               
            <select name="marka">
                        <?php
                            while ($row = $res->fetch_assoc()) 
                            {
                                echo '<option value=" '.$row['id_brand'].' "> '.$row['brand_name'].' </option>';
                            }
                            $conn->close();
                        ?>
            </select>
    
              
                <br>
            <p class='dodaj'>Model:</p>
            <input style='width: 40%;' type='text' class='text' name='model'>
                <br>
            <p class='dodaj'>Pojemność:</p>
            <input style='width: 40%;' type='text' class='text' name='capacity'>
                <br>
            <p class='dodaj'>Numer Rejestracyjny:</p>
            <input style='width: 40%;' type='text' class='text' name='register'>
                <br>
             <p class='dodaj'>Rok Produkcji:</p>
            <input style='width: 40%;' type='text' class='text' name='production'>
                <br>
             <p class='dodaj'>Przebieg:</p>
            <input style='width: 40%;' type='text' class='text' name='milage'>
                <br>
            <p class='dodaj'>Cena:</p>
            <input style='width: 40%;' type='number' class='text' name='price1'>
                <br>
                <br>

            <input id="btn" class='button' type='submit' name='submitBtn' value='Dodaj'>
        </form>
        <?php
        

               // $db = new mysqli('localhost', 'root', '', 'Komis');
                require "dbh.inc.php";
               if (isset($_POST['model'])) { 
        	   $id_brand = $_POST['marka'];
        	   $model_name = $_POST['model'];
        	   $capacity = $_POST['capacity'];
        	   $register_nr = $_POST['register'];
        	   $production_year = $_POST['production'];
        	   $car_milage = $_POST['milage'];
        	   $price = $_POST['price1'];
               $sold = "null";

        	   
        	if( empty($id_brand)||  empty($model_name) ||  empty($capacity)|| empty($register_nr)|| empty($production_year)|| empty($car_milage)|| empty($price) ){
					echo "Wypełnij wszystkie pola";
				}else {
					
				//$conn = new mysqli("localhost", "root", "", "komis");
                require "dbh.inc.php";
					
         	$query = $conn->query("INSERT INTO vehicle(id_brand, model_name, capacity,register_nr,production_year,car_milage,price,sold) VALUES ('$id_brand', '$model_name', '$capacity','$register_nr','$production_year','$car_milage','$price','$sold')");

                    
					if($query){
						echo "Dodano Samochód do bazy";
					}else {
						echo "Nie udało się dodać samochodu";
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
