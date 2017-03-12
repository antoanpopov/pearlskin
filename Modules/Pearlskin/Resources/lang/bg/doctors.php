<?php

$single = mb_convert_case('доктор', MB_CASE_TITLE, "UTF-8");
$multiple = mb_convert_case('доктори', MB_CASE_TITLE, "UTF-8");

return [
    'list' => $single,
    'destroy' => 'Триене на ' . $multiple,
    'create' => 'Създай ' . $single,
    'edit' => 'Редактирай ' . $single,

    'title' => [
        'module' => ucfirst($multiple),
        'list' => 'Списк с ' . $multiple,
        'create' => 'Създаване на ' . $single,
        'edit' => 'Редактиране на ' . $single,
    ],
];