<?php
// Routes

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Ejecutemos la ruta por defecto");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->group('/users/', function(){
	$this->get('getAll', function ($request, $response, $args) {
	/*	echo '<pre>';
		print_r($request->getHeaders('APP-TOKEN'));
		echo '</pre>';
	*/
	/*
		//Para alterar el response y mande error 500 los estados http
		return $response->withStatus(500);

	*/

			$usuarios = [['Nombre' => 'Alberto', 
						'Apellido'=> 'Sosa'],
						['Nombre' => 'Beto', 
						'Apellido'=> 'De la cruz'],
					];
					return $response
					//	->withHeader('Content-type', 'application/json')
						->write(json_encode($usuarios));

	});
	$this->get('get/{id}', function ($request, $response, $args) {
		return "Obteniendo usuario con ID ".$args['id'];
	});
	$this->post('insert', function ($request, $response, $args) {
		print_r($request->getParsedBody());

		$data = $request->getParsedBody();

		return "Se creo un nuevo usuario ".$data['Nombre'];
	});
	$this->put('update', function ($request, $response, $args) {
		return "Se actualizó un usuario";
	});
	$this->delete('delete/{id}', function ($request, $response, $args) {
		return "Se eliminó un usuario con el ID ".$args['id'];
	});

})->add(new AutMiddleware());





    