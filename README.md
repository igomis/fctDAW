# repositoriBasic

 * Estructura de directoris bàsica
    * config
    * helpers
    * templates
    * public
    * tests
    * .docker

 
 domini: batoi2021.my
 
 per funcionar: 
  
  * Obrir terminal i executar 
  
    > sh start.sh
    
    > sh composer.sh
    
  
  * Per finalitzar, executar
    
    > sh stop.sh 

  * Per executar test, amb màquina apagada executar
    
    > sh test.sh 
                                                        
  Exercisis:   
  
  * Hem de desenvolupar una web de presentació de la classe. 
  * Anem a partir de la plantilla de [bootstrap] (https://getbootstrap.com/docs/4.5/examples/cover/), encara que podries baixar-te un altra.
  * Les funcions necessaries les posarem en el fitxer **myHelpers.php**, que haurem d'incloure en el nostre index.php
  * Constarà de les pàgines index.php, pupils.php,  upload.php
     
##index.php
  
  * En el directori config crea un fitxer config.php
  * Crea les variables **$grup, $aula, $centre , $descripcio i $webCentre** i dona-li valors descriptius de la classe. El text ha d'estar escrit en minúscules. La descripció ha de tindre, al meyns, dos frases.
  * Substitueix el text 'Cover your page.' pel grup i aula entre parèntesi. Totes dos han de aparèixer amb la primera lletra en majúscula.
  * Crea un funció de nom **ucParagraph($text)** que torne el text transformant en majúscules les primeres lletres de cada frase del text. 
  * Posa la descripció transformada amb la funció anterior com a descripció en la pàgina substituint al text que comença en Cover is a one-page
  * Posa el nom del centre al botó amb un enllaç a la $webCentre 
  
#### capçalera
  
  *  Cal modificar-la per que el menú porte a les altres pàgines.  
  
  * Crea una funció de nom **greetings()** que salude a la forma valenciana. Bon dia en les hores que hi ha claror i bona nit quan ja és fosc. 
  Anem a suposar que l'hora d'eixida del sol és les 7:00 per a tot l'any l'hora de posta de sol és:
  
  		* 22:00 per a juny i juliol 
  		* 21:00 per a agost i maig
  		* 20:00 per a setembre,octubre,març i abril
  		* 19:00 per a novembre i febrer
  		* 18:00 per a desembre i gener
  	La funció aceptarà com a paràmetre l'hora en format h:i i si no te paràmetres pendrà l'hora actual.
  		
	Substitueix el text **Cover** de la capçalera per la salutació.
	
#### peu 
 	
  * Crea una funció de nom **valDate()** per a que mostre la data en valencià de la forma: 9 d'octubre de 2020
  		* El mes en minuscula i apostrof si cal
        * La funció acceptarà com a paràmetre en dia en format (Y/m/d) i si no pendrà el dia actual.
	Substitueix el **peu de la pàgina** per la data
  		
## pupils.php  

 * Inclou el fitxer config/alumnes.php
 * Utilitzant la funció explode crea un array d'alumnes.
 * Utilitzant l'array anterior crea una matriu per a generar la taula on cada alumne estarà format per un array amb el nom del alumne, el cognom, la ciutat on viu i el grup en el que està.
 * Crea un funció **paintLine($array)** que pinte una fila de una taula amb tants camps com longitut de l'array.
 * Pinta una taula on es mostren els alumnes (nom i grup), utilitzant la funció anterior.
 * Fes que ixquen també la capçalera i el peu de pàgina de index.php

## upload.php 
  		
* Fes un formulari per a que cada alumne puga pujar la seua foto.
* Eixirà un select amb el nom dels alumnes pèr a que l'usuari el puga seleccionar
* Hi haurà un camp on es demanarà la ciutat de l'alumne
* Hi haurà un camp per penjar la foto de l'alumne.
* En acceptar el formulari la foto es penjarà en la carpeta fotos si s'ha encertat la ciutat de l'alumne i la foto té un format vàlid (soles .jpg). 
* Es guardarà amb el nom 'numeroArray.jpg' on numeroArray és la possició que ocupa l'alumne en l'array.

## final

* Fes que la foto aparega en pupils.php
  		                                        