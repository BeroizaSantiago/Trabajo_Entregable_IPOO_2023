<?php
class Pasajero {
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;
    private $numeroAsiento;
    private $numeroTicket;
    
    public function __construct($nombre, $apellido, $documento, $telefono,$numeroAsiento,$numeroTicket) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->telefono = $telefono;
        $this->telefono = $numeroAsiento;
        $this->telefono = $numeroTicket;
    }
    
    // Métodos getters y setters para $nombre, $apellido, $documento y $telefono
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function getApellido() {
        return $this->apellido;
    }
    
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    
    public function getDocumento() {
        return $this->documento;
    }
    
    public function setDocumento($documento) {
        $this->documento = $documento;
    }
    
    public function getTelefono() {
        return $this->telefono;
    }
    
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    public function getNumeroAsiento() {
        return $this->numeroAsiento;
    }
    
    public function setNumeroAsiento($numeroAsiento) {
        $this->numeroAsiento = $numeroAsiento;
    }
    public function getNumeroTicket() {
        return $this->numeroTicket;
    }
    
    public function setNumeroTicket($numeroTicket) {
        $this->numeroTicket = $numeroTicket;
    }
    

    
    public function __toString() {
        $cadena = "Nombre: " . $this->nombre . "\n" .
               "Apellido: " . $this->apellido . "\n" .
               "Documento: " . $this->documento . "\n" .
               "Teléfono: " . $this->telefono . "\n".
               "Numero de Asiento: " . $this->numeroAsiento . "\n".
               "Numero de Ticket: " . $this->numeroTicket . "\n";

        return $cadena;
    }


    public function darPorcentajeIncremento(){
        return 10;
    }
}