<?php

$single = mb_convert_case('цена', MB_CASE_TITLE, "UTF-8");
$multiple = mb_convert_case('цени', MB_CASE_TITLE, "UTF-8");

return [
    'list' => 'Списък',
    'destroy' => 'Триене на ' . $multiple,
    'create' => 'Създай ' . $single,
    'edit' => 'Редактирай ' . $single,

    'title' => [
        'module' => 'Ценоразпис',
        'list' => 'Списк с ' . $multiple,
        'create' => 'Създаване на ' . $single,
        'edit' => 'Редактиране на ' . $single,
    ],
];