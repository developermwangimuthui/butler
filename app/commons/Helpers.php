<?php

use App\Models\Customer;
use Illuminate\Support\Facades\File;

const DIR_DELIVERY_NOTES_IMAGES = "delivery_notes";

const LOADING_POINT = [
    "0" => "ICD, Nairobi",
    "1" => "Kiamaiko",
    "2" => "Kiambu",
    "3" => "CBD",
    "4" => "Mlolongo",
    "6" => "Industrial Area",
    "7" => "Ballore Embakasi",
    "8" => "SGR",
    "9" => "Ruiru",
    "10" => "Thika",
    "11" => "Naivasha",
    "12" => "Nakuru",
    "13" => "Nyeri",
    "14" => "Meru",
    "15" => "Isiolo",
    "16" => "Garissa",
    "17" => "Kisumu",
    "18" => "Eldoret",
    "19" => "Busia",
    "20" => "Bungoma",
    "21" => "Kitale",
    "22" => "Malaba",
];

const ORDER_PAYMENT_STATUS = [
    "0" => "Partially Paid (25%)- Balance Invoiced",
    "1" => "Partially Paid (30%)- Balance Invoiced",
    "2" => "Partially Paid (50%)- Balance Invoiced",
    "3" => "Partially Paid (75%)- Balance Invoiced",
    "4" => "Invoiced and fully paid",
    "5" => "Invoiced awaiting payment",
    "6" => "Awaiting consolidation for invoice",
];

const TRIP_CHALLENGES = [
    "0" => "Delay- Police Arrest ",
    "1" => "Delay- Await Loading",
    "2" => "Delay- Await Off Loading",
    "3" => "Delay- Security/Unrest",
    "4" => "Delay- Awaiting Truck Repair",
    "5" => "Delay- Accident",
    "6" => "Delay- Slow Speed(Bumpy Road)",
    "7" => "Delay- Slow Speed(Muddy Road)",
    "8" => "Delay- Slow Speed(Traffic)",
    "7" => "Delay- Lost Direction",
    "8" => "None",
];

const ORDER_DELIVERY_STATUS = [
    "0" => "On Time, in-Full, No Damage ",
    "1" => "On Time, in-Transit-Damages",
    "2" => "On Time, in-Transit-Losses",
    "3" => "Late,in-Full, No Damage",
    "4" => "Late, in-Full, on-Transit-Damages",
    "5" => "Late, in-Transit-Losses",
];


function uploadImage($file, $dir)
{
    dd($file);
    //$file = $request->file('image');
    $extension = $file->getClientOriginalExtension();

    $filename = uniqid() . '_' . time() . '.' . $extension;

    $file->move("uploads/{$dir}", $filename);

    return $filename;
}

function deleteImage($path)
{
    return File::delete('uploads/'.$path);
}
