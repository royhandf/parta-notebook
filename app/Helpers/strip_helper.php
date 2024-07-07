<?php

function stripHtmlTags($text)
{
    $strippedText = preg_replace('/<[^>]*?>/', '', $text);
    return $strippedText;
}

function stripRpAndComma($text)
{
    $strippedText = preg_replace('/[^0-9]/', '', $text);
    $nominal = intval($strippedText);

    return $nominal;
}