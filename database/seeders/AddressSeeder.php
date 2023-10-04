<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        $cities = collect([
            [
                "name" => "L'Aquila",
                "zip" => "67100",
                "state" => "AQ",
            ],
            [
                "name" => "Potenza",
                "zip" => "85100",
                "state" => "PZ",
            ],
            [
                "name" => "Catanzaro",
                "zip" => "88100",
                "state" => "CZ",
            ],
            [
                "name" => "Napoli",
                "zip" => "80100",
                "state" => "NA",
            ],
            [
                "name" => "Bologna",
                "zip" => "40100",
                "state" => "BO",
            ],
            [
                "name" => "Trieste",
                "zip" => "34100",
                "state" => "TS",
            ],
            [
                "name" => "Roma",
                "zip" => "00100",
                "state" => "RM",
            ],
            [
                "name" => "Genova",
                "zip" => "16121",
                "state" => "GE",
            ],
            [
                "name" => "Milano",
                "zip" => "20121",
                "state" => "MI",
            ],
            [
                "name" => "Ancona",
                "zip" => "60100",
                "state" => "AN",
            ],
            [
                "name" => "Campobasso",
                "zip" => "86100",
                "state" => "CB",
            ],
            [
                "name" => "Torino",
                "zip" => "10121",
                "state" => "TO",
            ],
            [
                "name" => "Bari",
                "zip" => "70121",
                "state" => "BA",
            ],
            [
                "name" => "Cagliari",
                "zip" => "09100",
                "state" => "CA",
            ],
            [
                "name" => "Palermo",
                "zip" => "90100",
                "state" => "PA",
            ],
            [
                "name" => "Firenze",
                "zip" => "50100",
                "state" => "FI",
            ],
            [
                "name" => "Trento",
                "zip" => "38100",
                "state" => "TN",
            ],
            [
                "name" => "Perugia",
                "zip" => "06122",
                "state" => "PG",
            ],
            [
                "name" => "Aosta",
                "zip" => "11100",
                "state" => "AO",
            ],
            [
                "name" => "Venezia",
                "zip" => "30100",
                "state" => "VE",
            ],
        ]);

        for ($i = 1; $i < 20; $i++) {

            $city = $cities[$i];

            $response = Http::get('https://api.geoapify.com/v1/geocode/search', [
                'apiKey' => '18cce45cf9f34366aa43ac56c6d85870',
                'format' => 'json',
                'limit' => 1,
                'lang' => 'it',
                'country' => 'it',
                'type' => 'street',
                'city' => $city['name'],
                'street' => 'Viale',
            ]);

            $response_json = $response->json();

            $street = $response_json['results'][0]['street'];
            $lon = $response_json['results'][0]['lon'];
            $lat = $response_json['results'][0]['lat'];

            Address::create([
                'store_id' => $i,
                'street' => $street,
                'city' => $city['name'],
                'zip' => $city['zip'],
                'state' => $city['state'],
                'lat' => $lat,
                'long' => $lon,
            ]);
        }
    }
}