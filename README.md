# repositoriBasic

 * Estructura de directoris bàsica
    * config
    * helpers
    * layouts
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
                                                        
 Enllaç a l'explicació de la construcció de tot plegat: [wiki](https://github.com/igomis/fctDAW/wiki)
 
 ### Exercisi : 
 
 Es demana completar l'aplicació amb el següent:
 
 * Volen que els alumnes siguen capaços de triar les seues preferències. Aixì que cada alumne podrà triar 5 empreses de la llista per ordre de preferència. L'alumne haurà de ser capaç de loguejar-se, vore el llistat d'empreses, triar-ne 5 i canviar la seua elecció.
 
 * Coses que cal fer:
 	* Crear les taules d'alumnes i alumne-empresa
	* Importació del fitxer d'alumnes des de alumnes.txt
 	* Login d'alumne amb correu electrònic i NIA.
	* Recordatori de contrasenyan utilitzant correu electronic de l'alumne.
	* Crear les classes Alumne i AlumneEmpresa amb els mètodes necessaris, al meyns:
		* Alumne
			* find($id):Object
			* update($id,$array):bool
			* static:selectAll():array Objects
		* AlumneEmpresa:
			* find($id):Object
			* update($id,$array):bool
			* delete($id):bool
			* store($array):integer
			* static selectAlumne($id):Array Object
			* static selectEmpresa($id):Array Object
	* Llistat de les seues preferències, amb opció d'esborrar empresa i pujar/baixar d'ordre.
	* Llistat d'empreses per poder afegir al llistat anterior.
	* S'hauran de dissenyar tests per a provar els mètodes de dalt. 
	
