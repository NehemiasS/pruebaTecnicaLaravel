# prueba tecnica laravel

## Entorno de desarrolo 
se usos laravel sail para poder tener la parte del backen de una forma dockerizada, se realizaron las configuraciones dadas por la docmumentacion oficial.
en la parte del front-end en angular se trato de trabajar con con la documentacion ofifical y atra ves de docker-compose  
### comandos backend
curl -s https://laravel.build/back-end | bash

cd back-end
 
./vendor/bin/sail up

./vendor/bin/sail artisan migrate

### comandos front-end

npm install -g @angular/cli

ng new <front-end>

cd front-end

npm start

##Frontend
crear alumno
![](https://github.com/NehemiasS/pruebaTecnicaLaravel/blob/feature/NehemiasSimon/Captura%20desde%202025-02-24%2019-50-23.png)

consultar alumno
![](https://github.com/NehemiasS/pruebaTecnicaLaravel/blob/feature/NehemiasSimon/Captura%20desde%202025-02-24%2019-50-55.png)


##Test
tabien se le agrego test a la parte del back-end que sepuede ejecutar con: ./vendor/bin/sail test

![](https://github.com/NehemiasS/pruebaTecnicaLaravel/blob/feature/NehemiasSimon/Captura%20desde%202025-02-24%2019-50-55.png)

