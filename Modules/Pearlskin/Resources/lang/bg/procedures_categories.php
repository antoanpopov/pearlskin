<?php

$single = ucwords('категория');
$multiple = ucwords('категории');

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