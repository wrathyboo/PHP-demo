<?php
function generateClientFilename($name, $extention)
{
    # code...
    // $name = $username . '_' . date('m-d-y') . $extention;
    return str_replace(" ", "-", $name) . '.' . $extention;
}