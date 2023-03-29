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

    public function getPasajeros()
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
                $this->setPasajeros($arrayPasajeros);
                $cond =true;
            }else{
                $cond =false;
            }

            $i++;
            

        }
        
        return $arrayPasajeros;
    }



    public function modificarPasajero($dni){
        $boolean = false;
        $arrayDePaso = $this->getPasajeros();
        $count = count($arrayDePaso);
        $noEncontrado = true;
        $i = 0;
        $posicion = 0;
        
        //Busqueda del pasajero
        while($noEncontrado && $i < $count){
            $pasajeroSeleccionado = $arrayDePaso[$i];
            $dniSeleccionado = $pasajeroSeleccionado["nro doc"];
            if($dni == $dniSeleccionado){
                $noEncontrado = false;
                $posicion = $i;
                $boolean = true;
            }else{
                echo "DNI no encontrado";
            }
            $i++;
       }

       if(!$noEncontrado){
        $pasajero = $arrayDePaso[$posicion];
        $this->menuModificar($pasajero);
        $arrayDePaso[$posicion] = $pasajero;
    }

       return $boolean;
    }   



    private function menuModificar($pasajMod){
        $menuModificar = "
        1. Modificar nombre.\n
        2. Modificar apellido.\n
        3. Modificar dni.\n
        4. Salir.\n";
        $salir = true;
        do {
            echo $menuModificar;
            $seleccion = trim(fgets(STDIN));
            switch ($seleccion) {
                case '1':
                    echo "El nombre a cambiar es: ".$pasajMod["nombre"];
                    echo "\nIngrese el nuevo nombre: \n";
                    $nuevoNombre = trim(fgets(STDIN));
                    $pasajMod["nombre"]=$nuevoNombre;
                    break;

                case '2':
                    echo "El apellido a cambiar es: ".$pasajMod["apellido"];
                    echo "Ingrese el nuevo apellido: \n";
                    $nuevoApellido = trim(fgets(STDIN));
                    $pasajMod["apellido"]=$nuevoApellido;
                    break;

                case '3':
                    echo "El documento a cambiar es: ".$pasajMod["nro doc"];
                    echo "Ingrese el nuevo dni: \n";
                    $nuevoDni = intval(trim(fgets(STDIN)));
                    $pasajMod["nro doc"]=$nuevoDni;
                    break;

                default:
                    $salir = false;
                    break;
            }
        } while ($salir);
        $this->setPasajeros($pasajMod);
        return $pasajMod;
    }


    public function __toString()
    {
        $cadena = "\n---------------------------------\nNumero de codigo viaje: ".$this->codViaje.
                  "\nDestino:".$this->dest.
                  "\nCantidad Maxima de pasajeros: ".$this->cantMaxPasajeros.
                  "\n--------------------------------\n";

        return $cadena;
    }

            
}