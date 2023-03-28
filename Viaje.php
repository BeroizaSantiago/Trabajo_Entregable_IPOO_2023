<?php
class Viaje{
    private $codViaje;
    private $dest;
    private $cantMaxPasajeros;
    private $pasajeros = [];


    //constructor
    public function __construct($codigo, $destino, $cantidadMaxima)
    {
        $this->codViaje = $codigo;
        $this->dest = $destino;
        $this->cantMaxPasajeros = $cantidadMaxima;
        $this->pasajeros[] =   [
                                    "nombre"=>"",
                                    "apellido"=>"",
                                    "nro doc"=>""
                                ] ;
    }

    //get - set
    public function getCodViaje()
    {
        return $this->codViaje;
    }

    public function setCodViaje($cod)
    {
        $this->codViaje = $cod;
    }
    public function getDest()
    {
        return $this->dest;
    }

    public function setDest($destino)
    {
        $this->dest = $destino;
    }
    public function getCantMaxPasajeros()
    {
        return $this->cantMaxPasajeros;
    }

    public function setCantMaxPasajeros($cantMaxima)
    {
        $this->cantMaxPasajeros = $cantMaxima;
    }

    public function getpasajeros()
    {
        return $this->pasajeros;
    }
    public function setPasajeros($arrayPasajeros)
    {
        $this->pasajeros = $arrayPasajeros;
    }


    //Funcion que modifica el codigo del viaje
    public function modCodigo(){
        echo "El viaje posee el código: {$this->codViaje}. \n";
        echo "Ingrese el nuevo código: \n";
        $codigo = trim(fgets(STDIN));
        $codigo = intval($codigo);
        $this->setCodViaje($codigo) ;
    }

    //Funcion que modifica el destino del viaje
    public function modDestino(){
        echo "El viaje posee como destino a: {$this->dest}. \n";
        echo "Ingrese el nuevo destino: \n";
        $destino = trim(fgets(STDIN));
        $this->setDest($destino) ;
    }

    
    //Funcion que modifica la cantidad maxima de personas del viaje
    public function modCantidad(){
        echo "\n\nEl viaje posee {$this->cantMaxPasajeros} asientos. \n";
        echo "Ingrese la nueva cantidad de asientos: \n";
        $cantidadAsientos = trim(fgets(STDIN));
        $cantidadAsientos = intval($cantidadAsientos);
        $this->setCantMaxPasajeros($cantidadAsientos) ;

    }


    public function agregarPasajero(){
        $arrayPasajeros = $this->getPasajeros();
        $cond = true;
        $i = 0;
        while($cond){
            echo "--------------------------------\n";
            echo "¿Desea ingresar un pasajero? \nResponda: (s/n)";
            $resp  = trim(fgets(STDIN));
            if($resp == "s"){
                echo "Ingrese el nombre del pasajero: \n";
                $nombAgregar  = trim(fgets(STDIN));
                echo "Ingrese el apellido del pasajero: \n";
                $apellAgregar  = trim(fgets(STDIN));
                echo "Ingrese el documento del pasajero: \n";
                $docAgregar  = trim(fgets(STDIN));

                $arrayPasajeros[$i]["nombre"] = $nombAgregar;
                $arrayPasajeros[$i]["apellido"] = $apellAgregar;
                $arrayPasajeros[$i]["nro doc"] = $docAgregar;
                $this->setPasajeros($arrayPasajeros[$i]);
                $cond =true;
            }else{
                $cond =false;
            }

            $i++;
            

        }
        
        return $arrayPasajeros;
    }


    public function __toString()
    {
        $cadena = "---------------------------------\nNumero de codigo viaje: ".$this->codViaje.
                  "\nDestino:".$this->dest.
                  "\nCantidad Maxima de pasajeros: ".$this->cantMaxPasajeros.
                  "\n--------------------------------";

        return $cadena;
    }

            
}