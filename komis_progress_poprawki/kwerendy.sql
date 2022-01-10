-- kwerendy do projektu
-- city
SELECT * FROM `city`;
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"","");

-- brand
SELECT * FROM `brand`;
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"");

-- klienci, pełny adres
SELECT client.id_client, client.name, client.surname, client.pesel, client.tel_nr, client.birthday_date, address.street_name, address.building_nr, address.aprt_nr, city.city_name, city.postcode 
FROM `client` 
INNER JOIN address ON address.id_address = client.id_address 
INNER JOIN city ON address.id_city = city.id_city 
WHERE 1;

-- klient do formularza transakcji 
SELECT `id_client`, `name`, `surname`, `pesel`, `id_address` FROM `client` WHERE 1;

-- wszystkie pojazdy 
SELECT `id_vehicle`, `brand.brand_name`, `model_name`, `capacity`, `register_nr`, `production_year`, `car_milage`, `sold`, `price` 
FROM `vehicle`
INNER JOIN brand ON vehicle.id_brand = brand.id_brand
WHERE 1;

-- pojazdy sprzedane 
SELECT `id_vehicle`, brand.brand_name, `model_name`, `capacity`, `register_nr`, `production_year`, `car_milage`, `sold`, `price` 
FROM `vehicle`
INNER JOIN brand ON vehicle.id_brand = brand.id_brand
WHERE sold = 'y';

-- pojazdy na stanie 
SELECT `id_vehicle`, brand.brand_name, `model_name`, `capacity`, `register_nr`, `production_year`, `car_milage`, `sold`, `price` 
FROM `vehicle`
INNER JOIN brand ON vehicle.id_brand = brand.id_brand
WHERE sold = 'n';

-- wszystkie transakcje raport
SELECT `id_transaction`, `tran_type`, transactions.id_client, transactions.id_vehicle, `date`, transactions.price, client.name, client.surname, client.pesel, brand.brand_name, vehicle.model_name, vehicle.register_nr, vehicle.production_year
FROM `transactions`
INNER JOIN vehicle ON transactions.id_vehicle = vehicle.id_vehicle 
INNER JOIN client ON transactions.id_client = client.id_client 
INNER JOIN brand ON vehicle.id_brand = brand.id_brand 
WHERE 1
ORDER BY id_transaction desc;

-- sprzedane pojazdy (raport)
SELECT `id_transaction`, `tran_type`, transactions.id_client, transactions.id_vehicle, `date`, transaction.price, client.name, client.surname, client.pesel, brand.brand_name, vehicle.model_name, vehicle.register_nr, vehicle.production_year
FROM `transaction`
INNER JOIN vehicle ON transactions.id_vehicle = vehicle.id_vehicle 
INNER JOIN client ON transactions.id_client = client.id_client 
INNER JOIN brand ON vehicle.id_brand = brand.id_brand 
WHERE tran_type = 's';

-- kupione pojzady (raport)
SELECT `id_transaction`, `tran_type`, transactions.id_client, transactions.id_vehicle, `date`, transactions.price, client.name, client.surname, client.pesel, brand.brand_name, vehicle.model_name, vehicle.register_nr, vehicle.production_year
FROM `transaction`
INNER JOIN vehicle ON transactions.id_vehicle = vehicle.id_vehicle 
INNER JOIN client ON transactions.id_client = client.id_client 
INNER JOIN brand ON vehicle.id_brand = brand.id_brand 
WHERE tran_type = 'b';

-- dodanie nowego klienta
-- 1 do listy wyboru miasta
SELECT * FROM `city`;
-- 2 
INSERT INTO `address`(`id_address`, `street_name`, `building_nr`, `aprt_nr`, `id_city`) VALUES ('null',"","","",city);
-- 3
INSERT INTO `client`(`id_client`, `name`, `surname`, `pesel`, `tel_nr`, `birthday_date`, `id_address`)
VALUES ('null',"","","","","",(SELECT MAX(id_address) FROM address));

-- dodanie nowego samochodu
-- 1 do listy wyboru marki
SELECT * FROM `brand`;
-- 2
INSERT INTO `vehicle`(`id_vehicle`, `id_brand`, `model_name`, `capacity`, `register_nr`, `production_year`, `car_milage`, `sold`, `price`)
VALUES ('null',brand,"",""," ","","","y or n","");

-- transakcja, sprzedarz tran_type = s,  kupno tran_type = b
-- 1 do listy wyboru klienta
SELECT `id_client`, `name`, `surname`, `pesel`, `id_address` FROM `client` WHERE 1;
-- 2 do listy wyboru samochodu
SELECT `id_vehicle`, brand.brand_name, `model_name`, `capacity`, `register_nr`, `production_year`, `car_milage`, `sold`, `price` 
FROM `vehicle`
INNER JOIN brand ON vehicle.id_brand = brand.id_brand
WHERE 1; -- WHERE sold = 'n'
-- 3
INSERT INTO `transactions`(`id_transaction`, `tran_type`, `id_client`, `id_vehicle`, `date`, `price`) 
VALUES ('null',"s",client,vehicle,"",-);
-- 4
UPDATE `vehicle` SET `sold`="",`price`="" WHERE `id_vehicle` ='' ;





-- ------------------------- transakcja
 $conn -> autocommit(0);
               // mysqli_query($conn,"begin");
                
              $a = $conn -> query("INSERT INTO `address`(`id_address`, `street_name`, `building_nr`, `aprt_nr`, `id_city`) 
VALUES ('null','cos','cos','cos','5');
  ");
              $b = $conn -> query("INSERT INTO `client`(`id_client`, `name`, `surname`, `pesel`, `tel_nr`, `birthday_date`, `id_address`)
VALUES ('null','dupa','dupa','dupa','dupa','dupa',(SELECT MAX(id_address) FROM address));");

              
                if ($a and $b) {
                    echo "dodano";
                   
                  $conn -> commit();
                }
                else {
                    $conn ->rollBack();
                   
                        echo "bład! nie dodano klienta";
                }

            
					
					$conn->close();

-- ================================================================


