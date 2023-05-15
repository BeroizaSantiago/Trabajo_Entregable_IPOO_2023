<?php
class PasajeroEspecial extends Pasajero{
    private $requiereSillaRuedas;
    private $requiereAsistencia;
    private $requiereComidaEspecial;

    public function __construct($nombre, $apellido, $documento, $telefono,$numeroAsiento,$numeroTicket,$silla,$asistencia,$comidaEs)
    {
        parent:: __construct($nombre, $apellido, $documento, $telefono,$numeroAsiento,$numeroTicket);
        $this->requiereSillaRuedas = $silla;
        $this->requiereAsistencia = $asistencia;
        $this->requiereComidaEspecial = $comidaEs;
    }

    public function getRequiereSillaRuedas(){
        return $this->requiereSillaRuedas;
    }

    public function setRequiereSillaRuedas($silla){
        $this->requiereSillaRuedas = $silla;
    }

    public function getRequiereAsistencia(){
        return $this->requiereAsistencia;
    }

    public function setRequiereAsistencia($asistencia){
        $this->requiereAsistencia = $asistencia;
    }

    public function getRequiereComidaEspecial(){
        return $this->requiereComidaEspecial;
    }

    public function setRequiereComidaEspecial($comidaEs){
        $this->requiereComidaEspecial = $comidaEs;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena .="\nSilla: ". $this->requiereSillaRuedas.
                "\nAsiestencia: ". $this->requiereAsistencia.
                "\nComida Especial: ". $this->requiereComidaEspecial;

        return $cadena;
    }

    public function darPorcentajeIncremento() {
        $incremento = 0;

        if ($this->requiereSillaRuedas && $this->requiereAsistencia && $this->requiereComidaEspecial) {
            $incremento = 30;
        } elseif ($this->requiereSillaRuedas || $this->requiereAsistencia || $this->requiereComidaEspecial) {
            $incremento = 15;
        }

        return $incremento;
    }

}