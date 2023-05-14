<?php 

function formatoSC($dato)
{
    return str_replace("\"", "", $dato);
}

function limitar_cadena($cadena, $limite, $sufijo){
	if(strlen($cadena) > $limite){
		return substr($cadena, 0, $limite) . $sufijo;
	}
	return $cadena;
}

?>
