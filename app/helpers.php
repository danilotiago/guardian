<?php

/**
 * Cria um slug baseado no texto recebido
 * com a possibilidade de insercao de timestamps no inicio
 *
 * @param $text
 * @return null|string|string[]
 */
function create_slug($text, $timestamps = false)
{
    if (empty($text)) {
        return 'slug-vazio';
    }
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    // transliterate
    //$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    // trim
    $text = trim($text, '-');
    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);
    // lowercase
    $text = strtolower($text);
    // cria o slug com timestamps no inicio no formato dia-mes-ano
    if($timestamps)
    {
        return date('d-m-Y') . '-' . $text;
    }
    return $text;
}