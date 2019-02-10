/**
* app_copiar_temas Module
*
* Descripcion: Modulo de listado de temas con las funciones usadas dentro de la vista
*/
angular.module('app_listar_temas', []).
controller('controller_listar_temas', function($scope, $http, $httpParamSerializerJQLike){
	//Array donde se guardan los temas que se obtuen de la base de datos.
	$scope.datos = [];
	//Objeto que guarda los datos de un tema seleccionado.
	$scope.tema_seleccionado = {};

	/*
     	Tipo: Funcion
     	Descripcion: Obtener todos los datos de los temas registrados en la base de datos.
  	*/
	$scope.obtener_datos = function(datos){		
		$http({
			method: 'POST',
			url: "http://localhost/PruebaTecnica/index.php/TemasService/ObtenerDatos",
			data: $httpParamSerializerJQLike({  }),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		})
		.then(function(data, status, headers, config){				
			//Se asiga al array los datos que retorno la conexion al servicio PHP que genera los datos.
			$scope.datos = data.data			
		}, function(err, status, headers, config){
			console.log(err)
		})	
	}

	//Se ejecuta la funcion de cargar los datos de todos los temas cuando se carga la pagina.
	$scope.obtener_datos()
	
	/*
     	Tipo: Funcion
     	Descripcion: Obtener todos los datos un tema seleccionado
  	*/	
	$scope.vista_previa = function(id){
		$http({
			method: 'POST',
			url: "http://localhost/PruebaTecnica/index.php/TemasService/ObtenerTema",
			data: $httpParamSerializerJQLike({ id: id}),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		})
		.then(function(data, status, headers, config){				
			//Se asiga al objeto los datos que retorno la conexion al servicio PHP que genera los datos de un tema seleccionado.
			$scope.tema_seleccionado = data.data
			$("#modal_datos").modal("show")			
		}, function(err, status, headers, config){
			console.log(err)
		})	
		
	}
})