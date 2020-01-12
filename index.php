<?php
include 'DataProcess.php';
$tableDataArray = [
    [
        "id"=>1,
        "name" => "আবেদনকারীর নাম ",
        "address" => "মালিকের নাম ",
        "mobile_no" => "01683748483",
        "national_id_no" => "645645645",
        "application_citizen_type_id" => "1",
    ],
    [
        "id"=>2,
        "name" => "আবেদনকারীর নাম ",
        "address" => "মালিকের নাম ",
        "mobile_no" => "01683748483",
        "national_id_no" => "645645645",
        "application_citizen_type_id" => "1",
    ],
    [
        "id"=>3,
        "name" => "আবেদনকারীর নাম ",
        "address" => "মালিকের নাম ",
        "mobile_no" => "01683748483",
        "national_id_no" => "645645645",
        "application_citizen_type_id" => "1",
    ],
    [
        "id"=>4,
        "name" => "আবেদনকারীর নাম ",
        "address" => "মালিকের নাম ",
        "mobile_no" => "01683748483",
        "national_id_no" => "645645645",
        "application_citizen_type_id" => "1",
    ],
    [
        "id"=>5,
        "name" => "আবেদনকারীর নাম ",
        "address" => "মালিকের নাম ",
        "mobile_no" => "01683748483",
        "national_id_no" => "645645645",
        "application_citizen_type_id" => "1",
    ]
];


$tableContent = new DataProcess($tableDataArray);

$tableContent
    ->addColumn('action', function ($addrow) {
        return '<a href="/edit/' . $addrow['id'] . '">' . $addrow['name'] . '</a>';
    })
    ->editColumn('address', function ($editRow) {
        return $editRow['address'] . ' ও ঠিকানা';
    })
    ->deleteColumn('application_citizen_type_id')
    ->toTable();
