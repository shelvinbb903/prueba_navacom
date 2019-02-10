/**
* app_copiar_temas Module
*
* Descripcion: Modulo de obtener temas de URL externa, para pasarlos a un servicio
	que se encarga de guardarlos en una base de datos.
*/
angular.module('app_copiar_temas', []).
controller('controller_copiar_temas', function($scope, $http, $httpParamSerializerJQLike){
	//Array donde se guardan los temas
	$scope.datos = [];

	/*
     	Tipo: Funcion
     	Descripcion: Obtener los datos de una URL externa
  	*/
	$scope.ejecutar_proceso = function(){
		$http.get("https://www.reddit.com/reddits.json")
		.then(function(result){
			//Abrir modal cargando que indica que el proceso de copiar datos inico
			$("#modal_cargando").modal("show")
			//Se asiga al array los datos que retorno la conexion a la URL con el JSON de datos.
			$scope.datos = result.data.data.children

			//Se ejecuta la funcion que envia los datos al servicio en php para guardar los datos del array en la base de datos
			$scope.conectar_servicio($scope.datos);
		}, function(err){
			console.log(err)
		})

	}

	/*
     	Tipo: Funcion
     	Descripcion: Enviar los datos a un servicio en PHP, el cual los guarda en una base de datos.
  	*/
	$scope.conectar_servicio = function(datos){		
		$http({
			method: 'POST',
			url: "http://localhost/PruebaTecnica/index.php/TemasService/GuardarDatos",
			data: $httpParamSerializerJQLike({ jsonData : JSON.stringify(datos) }),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		})
		.then(function(data, status, headers, config){
			//Se oculta el modal de cargando, pues el proceso ya termino
			$("#modal_cargando").modal("hide")

			//Se genera una alerta en la vist con un mensaje, si hubo una alerta antes, se borra y se genera otra
			$(".jumbotron .alert").remove()
			$(".jumbotron").append('<div class="alert alert-success alert-dismissible fade show" role="alert">' +
			    '<span class="alert-inner--text"><strong>Proceso</strong> Proceso finalizado correctamente!</span>' +
			    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
			        '<span aria-hidden="true">&times;</span>' +
			    '</button></div>')
		}, function(err, status, headers, config){
			console.log(err)
		})	
	}

	
})