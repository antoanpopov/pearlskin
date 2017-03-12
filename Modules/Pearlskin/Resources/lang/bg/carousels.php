<?php

$single = mb_convert_case('слайдер', MB_CASE_TITLE, "UTF-8");
$multiple = mb_convert_case('слайдери', MB_CASE_TITLE, "UTF-8");

return [
    'list' => $single,
    'destroy' => 'Триене на ' . $multiple,
    'create' => 'Създай ' . $single,
    'edit' => 'Редактирай ' . $single,

    'title' => [
        'module' => ucfirst($multiple),
        'list' => 'Списк със ' . $multiple,
        'create' => 'Създаване на ' . $single,
        'edit' => 'Редактиране на ' . $single,
    ],
];