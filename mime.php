<?php

function get_mime_type($file)
{

    // our list of mime types
    $mime_types = array(
        "pdf" => "application/pdf"
    , "exe" => "application/octet-stream"
    , "zip" => "application/zip"
    , "docx" => "application/msword"
    , "doc" => "application/msword"
    , "xls" => "application/vnd.ms-excel"
    , "ppt" => "application/vnd.ms-powerpoint"
    , "gif" => "image/gif"
    , "png" => "image/png"
    , "jpeg" => "image/jpg"
    , "jpg" => "image/jpg"
    , "mp3" => "audio/mpeg"
    , "wav" => "audio/x-wav"
    , "mpeg" => "video/mpeg"
    , "mpg" => "video/mpeg"
    , "mpe" => "video/mpeg"
    , "mov" => "video/quicktime"
    , "avi" => "video/x-msvideo"
    , "3gp" => "video/3gpp"
    , "css" => "text/css"
    , "jsc" => "application/javascript"
    , "js" => "application/javascript"
    , "php" => "text/html"
    , "htm" => "text/html"
    , "html" => "text/html"
    , "mp4" => "video/mp4"
    );

    $extension = strtolower(end(explode('.', $file)));

    return $mime_types[$extension] == "video/mp4" ? $mime_types[$extension] : "File type must be mp4." ;
}

?>