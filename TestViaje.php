<?php
include 'Viaje.php';

// echo "INGRESE LOS DATOS DEL VIAJE:\n";
// echo "Codigo: ";
// $codViaje = trim(fgets(STDIN));
// echo "Destino: ";
// $destinoViaje = trim(fgets(STDIN));
// echo "Capacidad Maxima: ";
// $capMaxViaje = trim(fgets(STDIN));


// $objViaje = new Viaje($codViaje,$destinoViaje,$capMaxViaje);
// $objViaje = new Viaje(3323,"Santa Rosa",55);
$objViaje = new Viaje(5885,"San Martin De los Andes",60);
// $objViaje = new Viaje(6367,"El Chalten",30);
// $objViaje = new Viaje(5995,"La Pampa",68);
$finalizar = true;
do {
    echo menuPrincipal();
    $opcionPrincipal = trim(fgets(STDIN));
    switch ($opcionPrincipal) {
        case '1':
            echo $objViaje;
            break;

        case '2':
                echo menuModDatos();
                $opc = trim(fgets(STDIN));
                switch($opc){
                    case '1':
                        echo "El Codigo del Viaje es: ".$objViaje->getCodViaje(). "\n";
                        echo "Ingrese el nuevo codigo \n";
                        $codNuevo = trim(fgets(STDIN));
                        $objViaje->setCodViaje($codNuevo);
                        echo "El nuevo codigo es: ".$objViaje->getCodViaje();
                    break;

                    case '2':
                        echo "El Destino del Viaje es: ".$objViaje->getDest(). "\n";
                        echo "Ingrese el nuevo destino \n";
                        $destinoNuevo = trim(fgets(STDIN));
                        $objViaje->setDest($destinoNuevo);
                        echo "El nuevo destino es: ".$objViaje->getDest();
                    break;

                    case '3':
                        echo "La capacidad maxima del Viaje es: ".$objViaje->getCantMaxPasajeros(). "\n";
                        echo "Ingrese la nueva capacidad \n";
                        $capacidadNueva = trim(fgets(STDIN));
                        $objViaje->setCantMaxPasajeros($capacidadNueva);
                        echo "La nueva capacidad es: ".$objViaje->getCantMaxPasajeros();
                    break;

                }

            break;

        case '3':
            $objViaje->agregarPasajero();

            break;


        case '4':
            echo 
            "\n----------------------------\nLos Pasajeros del Viaje son:\n";
            echo $objViaje->pasajerosStr();
    
            break;

        case '5':
            echo "Ingrese el dni del pasajero a modificar:\n";
            $dni = trim(fgets(STDIN));
            $objViaje->modificarPasajero($dni);
        
            break;


        default:
            $finalizar = false;
            break;
    }

}while ($finalizar);








function menuPrincipal()
{
    $cadena = "\n-----MENU PRINCIPAL-----\n
    Elija una opción:\n
    1. Ver viaje de la empresa.\n
    2. Cambiar datos de un viaje.\n
    3. Vender un viaje a una persona.\n
    4. Ver lista de pasajeros.\n
    5. Modificar un pasajero.\n
    6. Salir.\n";
    return $cadena;
}


function menuModDatos(){
    $cadena = "\n----MENU DE MODIFICACION----\n
    Elija una opcion:\n
    1. Modificar el Codigo del Viaje.\n
    2. Modificar el Destino del Viaje.\n
    3. Modificar la Capacidad Maxima del Viaje.\n
    4. Salir.\n";
    return $cadena;
}



//MODIFICA EL VALOR DE LA CANTIDAD
// $objViaje->modCantidad();
// echo $objViaje."\n";

/*AGREGA Y MUESTRA A LOS PASAJEROS
print_r($objViaje->agregarPasajero()); */


