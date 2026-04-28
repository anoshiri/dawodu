<?php

function getYoutubeEmbedLink($url)
{
    $youtube = config('dawodu.youtube_embed_url');

    return preg_replace(
        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
        $youtube.'$2',
        $url
    );
}

function getIcon($document)
{
    $list = explode('.', $document);
    $ext = $list[count($list) - 1];

    switch ($ext) {
        case 'pdf':
            $icon = 'fa-file-pdf';
            break;
        case 'doc':
        case 'docx':
        case 'dot':
        case 'docm':
        case 'dotx':
            $icon = 'fa-file-word';
            break;
        case 'xls':
        case 'xlsb':
        case 'xlsx':
        case 'xlt':
        case 'xml':
            $icon = 'fa-file-excel';
            break;
        case 'csv':
            $icon = 'fa-file-csv';
            break;
        case 'odp':
        case 'pot':
        case 'potm':
        case 'potx':
        case 'ppa':
        case 'ppt':
        case 'pptx':
            $icon = 'fa-file-powerpoint';
            break;
        case 'jpg':
        case 'jpeg':
        case 'bmp':
        case 'png':
        case 'gif':
        case 'svg':
        case 'webp':
            $icon = 'fa-file-image';
            break;
        default:
            $icon = 'fa-file';
    }

    return '<i class="fa '.$icon.' fa-5x"></i>';
}

function getIdFromSlug($slug, $ord = 'last')
{
    $array = explode('-', $slug);

    if ($ord !== 'last') {
        return $array[0];
    }

    return end($array);
}

function makeTime($time)
{
    return date(config('dawodu.timeFormat'), strtotime($time));
}

function makeDateTime($date)
{
    return makeDate($date, config('dawodu.dateFormat').' '.config('dawodu.timeFormat'));
}

function makeDate($date, $date_format = 'M d, Y')
{
    if (empty($date)) {
        return '';
    }

    return date($date_format, strtotime($date));
}
