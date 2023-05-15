<?php
class PasajeroVIP extends Pasajero{
    private $nroPasajeroFrecuente;
    private $cantidadMillas;

    public function __construct($nombre, $apellido, $documento, $telefono,$numeroAsiento,$numeroTicket,$nroPasajFrec,$cantMillas)
    {
        parent ::__construct($nombre, $apellido, $documento, $telefono,$numeroAsiento,$numeroTicket);
        $this->nroPasajeroFrecuente = $nroPasajFrec;
        $this->cantidadMillas = $cantMillas;
    }

    public function getNroPasajeroFrecuente() {
        return $this->nroPasajeroFrecuente;
    }
    
    public function setNroPasajeroFrecuente($nroPasajFrec) {
        $this->nroPasajeroFrecuente = $nroPasajFrec;
    }
    public function getCantidadMillas() {
        return $this->cantidadMillas;
    }
    
    public function setCantidadMillas($cantMillas) {
        $this->cantidadMillas = $cantMillas;
    }


    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena .="\nNumero de Pasajero Frecuente: ". $this->nroPasajeroFrecuente.
                "\nCantidad de Millas: ". $this->cantidadMillas;

        return $cadena;
    }

    public function darPorcentajeIncremento() {
        $incremento = 35;

        if ($this->cantidadMillas > 300) {
            $incremento += 30;
        }

        return $incremento;
    }
}