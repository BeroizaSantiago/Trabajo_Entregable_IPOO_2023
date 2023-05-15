<?php
class Viaje{
    private $codViaje;
    private $dest;
    private $cantMaxPasajeros;
    private $pasajeros =[];
    private $responsable;
    private $costo;
    private $costoAbonado = 0;

    //constructor
    public function __construct($codigo, $destino, $cantidadMaxima,$objResp,$objPas, $costo)
    {
        $this->codViaje = $codigo;
        $this->dest = $destino;
        $this->cantMaxPasajeros = $cantidadMaxima;
        $this->responsable = $objResp;
        $this->pasajeros []= $objPas; 
        $this->costo = $costo;
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
    public function setPasajeros($objPas)
    {
        $this->pasajeros = $objPas;
    }

    public function getCostoAbonado()
    {
        return $this->costoAbonado;
    }
    public function setCostoAbonado($costAbonado)
    {
        $this->costoAbonado += $costAbonado;
    }


    public function getCosto()
    {
        return $this->costo;
    }
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }


    public function getResponsable()
    {
        return $this->responsable;
    }
    public function setResponsable($objResp)
    {
        $this->responsable = $objResp;
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

    //Funcion para agregar pasajeros
    public function agregarPasajero($pasajero){
        // $nuevoPasajeros = $this->getPasajeros();
        // $cond = true;

        $encontrado = false;
        foreach ($this->pasajeros as $p) {
            if ($p->getDocumento() === $pasajero->getDocumento()) {
                $encontrado = true;
            }

        }
        if (!$encontrado) {
            array_push($this->pasajeros, $pasajero);
        } else {
            echo "El pasajero con número de documento " . $pasajero->getDocumento() . " ya está agregado en este viaje.\n";
        }

    }


    //Funcion para modificar un pasajero

    public function modificarPasajero($documento, $nombre, $apellido, $telefono) {
        foreach ($this->pasajeros as $pasajero) {
            if ($pasajero->getDocumento() == $documento) {
                // Modificar los datos del pasajero
                $pasajero->setNombre($nombre);
                $pasajero->setApellido($apellido);
                $pasajero->setTelefono($telefono);
                return true; // Retornar true si se encontró y modificó al pasajero
            }
        }
        return false; // Retornar false si no se encontró al pasajero
    }


    //Funcion para mostrar los datos del pasajero en forma de string
    public function pasajerosStr() {
        echo "Pasajeros agregados:\n";
        foreach ($this->pasajeros as $pasajero) {
            echo $pasajero;
        }
    }



    //Datos del viaje
    public function __toString() {
        $cadena = "Información del Viaje:\n";
        $cadena .= "Código de Viaje: " . $this->codViaje . "\n";
        $cadena .= "Destino: " . $this->dest . "\n";
        $cadena .= "Cantidad Máxima de Pasajeros: " . $this->cantMaxPasajeros . "\n";
        $cadena .= "\nResponsable del Viaje: \n" . $this->responsable . "\n";
        $cadena .= "Pasajeros:\n";
        foreach ($this->pasajeros as $pasajero) {
            $cadena .= $pasajero . "\n";
        }
        return $cadena;
    }

    public function venderPasaje($objPasajero) {
        $ret=null;
        if (count($this->pasajeros) < $this->cantMaxPasajeros) {
            array_push($this->pasajeros, $objPasajero);
            $this->setCostoAbonado($this->costo);
            $ret = $this->calcularCostoFinal($this->costo);
        } else {
            $ret = "No hay espacio disponible en este viaje.";
        }

        return $ret;
    }

    private function calcularCostoFinal($costoPasajero) {
        $incremento = $costoPasajero * $this->pasajeros->darPorcentajeIncremento() / 100;
        $costoFinal = $costoPasajero + $incremento;
        return $costoFinal;
    }
            

    public function hayPasajesDisponibles() {
        $disponible = false;
        if(count($this->pasajeros) < $this->cantMaxPasajeros){
            $disponible= true;
        }
        return $disponible;
      }
}