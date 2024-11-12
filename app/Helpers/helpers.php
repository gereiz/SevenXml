<?php

// converte numeros para moeda
function formatReal($valor) {
    return 'R$ ' . number_format($valor, 2, ',', '.');
}


// converte a data para o formato brasileiro
function formatDate($date) {
    return date('d/m/Y', strtotime($date));
}
