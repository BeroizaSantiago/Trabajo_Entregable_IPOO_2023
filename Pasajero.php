<?php
class Pasajero {
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;
    
    public function __construct($nombre, $apellido, $documento, $telefono) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->telefono = $telefono;
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
    

    
    public function __toString() {
        $cadena = "Nombre: " . $this->nombre . "\n" .
               "Apellido: " . $this->apellido . "\n" .
               "Documento: " . $this->documento . "\n" .
               "Teléfono: " . $this->telefono . "\n";

        return $cadena;
    }
}