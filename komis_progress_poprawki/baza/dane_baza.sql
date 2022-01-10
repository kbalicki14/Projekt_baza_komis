-- city
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Wrocław","28-152");
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Poznan","58-985");
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Zielona Gora","26-851");
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Wałbrzych","45-952");
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Lubin","26-963");
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Warszawa","96-256");
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Katowice","41-789");
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Kraków","45-852");
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Szczecin","52-967");
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Leszno","12-345");
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Zary","761-834");
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Kalisz","73-246");
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Gniezno","48-962");
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Bolesławiec","28-974");
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Chojnów","36-784");
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Złotoryja","32-647");
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Świtnica","41-859");
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Karpacz","65-791");
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Polkowice","13-121");
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Żagan","14-918");
INSERT INTO `city`(`id_city`, `city_name`, `postcode`) VALUES ('null',"Legnica","59-220");

-- brand
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Alfa Romeo");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Ford");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"BMW");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Chevrolet");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Audi");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Citrolen");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Dacia");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Fiat");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Honda");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Skoda");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Kia");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Jaguar");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Jeep");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Lexus");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Volkswagen");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Mazda");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Mercedes-Bezn");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Nissan");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Opel");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Mitsubishi");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Seat");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Toyota");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Renault");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Volvo");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Porsche");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Lamborghini");
INSERT INTO `brand`(`id_brand`, `brand_name`) VALUES ('null',"Peugeot");
 

-- vehicle
INSERT INTO `vehicle`(`id_vehicle`, `id_brand`, `model_name`, `capacity`, `register_nr`, `production_year`, `car_milage`, `sold`, `price`) VALUES ('null',7,"a6","2.0","DLE 21313","2006","250000","n","25000");
INSERT INTO `vehicle`(`id_vehicle`, `id_brand`, `model_name`, `capacity`, `register_nr`, `production_year`, `car_milage`, `sold`, `price`) VALUES ('null',4,"focus","1.6","DLE 79874","2014","150000","n","35000");


-- client and addres
INSERT INTO `address`(`id_address`, `street_name`, `building_nr`, `aprt_nr`, `id_city`) VALUES ('null',"Pocztowa","5","5",2);

INSERT INTO `client`(`id_client`, `name`, `surname`, `pesel`, `tel_nr`, `birthday_date`, `id_address`) VALUES ('null',"Jan","Kowalski","54216578954","562896325","2000-06-25",2);

INSERT INTO `address`(`id_address`, `street_name`, `building_nr`, `aprt_nr`, `id_city`) VALUES ('null',"Daszynskiego","12","7",2);

INSERT INTO `client`(`id_client`, `name`, `surname`, `pesel`, `tel_nr`, `birthday_date`, `id_address`) VALUES ('null',"Janusz","Nowak","87952145692","123456789","1976-05-14",3);








