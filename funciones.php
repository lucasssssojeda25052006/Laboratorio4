<?php

function calcularDigitoVerificador($numero) {
    // verificar que la cedula tenga 7 dígitos
    if (strlen($numero) !== 7) {
        return false;
    }

    // numeros que se multiplican para cada posición
    $multiplicadores = [2, 9, 8, 7, 6, 3, 4];
    $suma = 0;

 
    for ($i = 0; $i < 7; $i++) {
        if ($numero[$i] < '0' || $numero[$i] > '9') {
            return false; // si encuentra un carácter que no es un numero, retorna falso
        }
        $suma += (int)$numero[$i] * $multiplicadores[$i];
    }

    // calculo del digito verificador
    $resto = $suma % 10; //es obvio pero por las dudas, se divide entre 10 para que el reusltado este entre 1 y 9
    if ($resto === 0) {
        return 0;
    } else {
        return 10 - $resto;
    }
}


function validarCI($ci) {
    // Verifica que la cedula tenga 8 dígitos
    if (strlen($ci) !== 8) {
        return false;
    }

    // saca ell num y el dígito verificador
    $numero = "";
    for ($i = 0; $i < 7; $i++) {
        if ($ci[$i] < '0' || $ci[$i] > '9') {
            return false; // si el numero no no es mayor a cero y menor a 9 , va aretornar falso
        }
        $numero .= $ci[$i]; //va agregando los numeros de la cedula a la variable numero
    }
    $digito_verificador = (int)$ci[7];

    // Calcula el dígito verificador esperado
    $digito_verificador_esperado = calcularDigitoVerificador($numero);

    // Compara el dígito verificador ingresado con el esperado
    return $digito_verificador === $digito_verificador_esperado;
}

function generarDigitoVerificador($numero) {
    // Verifica que el numero tenga 7 dígitos
    $longitud = 0;
    for ($i = 0; $i < strlen($numero); $i++) {
        if ($numero[$i] < '0' || $numero[$i] > '9') {
            return "no se puede generar digito verificador a cosas que no sean numeros";
        }
        $longitud++;
    }
    if ($longitud !== 7) {
        return "debe ingresar exactamente 7 dígitos.";
    }

    // Calcula el dígito verificador
    return calcularDigitoVerificador($numero);
}



?>
