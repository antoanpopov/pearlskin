<?php

$single = mb_convert_case('процедура', MB_CASE_TITLE, "UTF-8");
$multiple = mb_convert_case('процедури', MB_CASE_TITLE, "UTF-8");

return [
    'list' => 'Списък',
    'destroy' => 'Триене на ' . $multiple,
    'create' => 'Създай ' . $single,
    'edit' => 'Редактирай ' . $single,

    'title' => [
        'module' => $multiple,
        'list' => 'Списк с ' . $multiple,
        'create' => 'Създаване на ' . $single,
        'edit' => 'Редактиране на ' . $single,
    ],
];
