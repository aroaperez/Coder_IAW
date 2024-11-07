<?php

function es_primo($numero){
    for($divisor=2; $divisor < sqrt($numero)+1 ; $divisor += 2 ){
        if ($numero % $divisor == 0 ) {
            return false;
        }
    }
    return true;
}

function es_par($numero) {
    if ($numero % 2 == 0) {
        return true;
    }
    else {
        return false;
    }
}

function es_capicua($numero){
    if ( !is_numeric($numero) ) {
        return false;
    }
    $cadena = "$numero";
    $cadena_al_reves = strrev("$cadena");
    return $cadena == $cadena_al_reves;
}

// function busca_primo_grande_capicua(){
//     for( $n = 1000000; true ; $n +=1 ) {
//         if (es_primo($n) && es_capicua($n) ){
//             return $n;
//         }
//     }
//     die("No me lo explico");
// }
// echo (busca_primo_grande_capicua());
