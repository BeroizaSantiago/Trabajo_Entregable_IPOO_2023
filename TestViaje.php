<?php
include 'Viaje.php';
include 'Pasajero.php';
include 'ResponsableV.php';




$objResp =new ResponsableV(123,33,"Rodolfo","Martinez");
$objPas =new Pasajero("","","","","","");
$finalizar = true;
do {
    echo menuPrincipal();
    $opcionPrincipal = trim(fgets(STDIN));
    switch ($opcionPrincipal) {
        case '1':
            echo "INGRESE LOS DATOS DEL VIAJE:\n";
            echo "Codigo: ";
            $codViaje = trim(fgets(STDIN));
            echo "Destino: ";
            $destinoViaje = trim(fgets(STDIN));
            echo "Capacidad Maxima: ";
            $capMaxViaje = trim(fgets(STDIN));
            echo "Costo: ";
            $costo = trim(fgets(STDIN));
            $objViaje = new Viaje($codViaje,$destinoViaje,$capMaxViaje,$objResp,$objPas,$costo);
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
            echo "Ingrese el nombre del pasajero: ";
            $nombre = trim(fgets(STDIN));
            echo "Ingrese el apellido del pasajero: ";
            $apellido = trim(fgets(STDIN));
            echo "Ingrese el número de documento del pasajero: ";
            $documento = trim(fgets(STDIN));
            echo "Ingrese el teléfono del pasajero: ";
            $telefono = trim(fgets(STDIN));
            echo "Ingrese el numero de asiento: ";
            $asiento = trim(fgets(STDIN));
            echo "Ingrese el numero de ticket: ";
            $ticket = trim(fgets(STDIN));
            
            // Crear una instancia de la clase Pasajero con los datos ingresados
            $pasajero = new Pasajero($nombre, $apellido, $documento, $telefono,$asiento,$ticket);
            
            $objViaje->agregarPasajero($pasajero);

            break;


        case '4':
            echo 
            "\n----------------------------\nLos Pasajeros del Viaje son:\n";
            echo $objViaje->pasajerosStr();
    
            break;

        case '5':
            echo "Ingrese el número de documento del pasajero a modificar: ";
            $documento = trim(fgets(STDIN));
            echo "Ingrese el nuevo nombre: ";
            $nombre = trim(fgets(STDIN));
            echo "Ingrese el nuevo apellido: ";
            $apellido = trim(fgets(STDIN));
            echo "Ingrese el nuevo teléfono: ";
            $telefono = trim(fgets(STDIN));
            
            if ($objViaje->modificarPasajero($documento, $nombre, $apellido, $telefono)) {
                echo "Pasajero modificado exitosamente.";
            } else {
                echo "No se encontró al pasajero con el número de documento especificado.";
            }
        
            break;
        
        case '6':
            echo $objViaje;
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
    1. Agregar viaje de la empresa.\n
    2. Cambiar datos de un viaje.\n
    3. Vender un viaje a una persona.\n
    4. Ver lista de pasajeros.\n
    5. Modificar un pasajero.\n
    6. Ver viaje.\n
    7. Salir.\n";
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


