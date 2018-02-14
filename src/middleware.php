<?php


/*  Este middleware 
lo unico que hace es checar que exista esa cabecera y en caso contrario mostrara error 401, a parte de esto en el archivo route se tiene que poner la siguiente linea en la funcion donde se va a necesitar este middleware 

})->add(new AutMiddleware());
*/
class AutMiddleware
{

    public function __invoke($request, $response, $next)
    {
        $token = $request->getHeader('APP-TOKEN');
        if(empty($token)){
        	return $response->withStatus(401);
        }
        return $response = $next($request, $response);
       

        
    }
}