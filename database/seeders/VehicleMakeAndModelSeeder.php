<?php

namespace Database\Seeders;

use App\Models\VehicleMake;
use App\Models\VehicleModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleMakeAndModelSeeder extends Seeder
{

    protected array $make_and_models = [
        'taxi'=> [
            'Acura' => [
                'CL',
                'ILX',
                'Integra',
                'Legend',
                'MDX',
                'NSX',
                'RDX',
                'RL',
                'RLX',
                'RSX',
                'TL',
                'TLX',
                'TSX',
            ],
            'Alfa Romeo' => [
                '4C',
                'Giulia',
                'Stelvio',
            ],
            'Aston Martin' => [
                'V8 Vantage'
            ],
            'Audi' => [
                'A3',
                'A4',
                'A5',
                'A6',
                'A7',
                'A8',
                'Allroad',
                'F250',
                'Q3',
                'Q5',
                'Q7',
                'Q8',
                'R8',
                'RS 3',
                'RS 5',
                'RS 7',
                'RS5',
                'S3',
                'S4',
                'S5',
                'S6',
                'S7',
                'S8',
                'SQ5',
                'TT',
                'TTS',
            ],
            'BMW' => [
                '1 Series',
                '2 Series',
                '230i',
                '3 Series',
                '330i',
                '4 Series',
                '440i',
                '5 Series',
                '530e',
                '530i',
                '540i',
                '6 Series',
                '640xi',
                '7-Series',
                '740e',
                '740i',
                '750XI',
                'M2',
                'M240i',
                'M3',
                'M340XI',
                'M340i',
                'M4',
                'M5',
                'M550i',
                'M6',
                'M760i',
                'M850i',
                'X1',
                'X2',
                'X3',
                'X4',
                'X5',
                'X5 M',
                'X5 eDrive',
                'X6',
                'X6 M',
                'X7',
                'Z3',
                'Z4',
                'i3',
                'i8',
            ],
            'Bentley' => [
                'Continental GT',
                'Continental GTC',
            ],
            'Buick' => [
                'Cascada',
                'Century',
                'Enclave',
                'Encore',
                'Envision',
                'LaCrosse',
                'LeSabre',
                'Lucerne',
                'Park Avenue',
                'Rainier',
                'Regal',
                'Regal Sportback',
                'Regal Tourx',
                'Rendezvous',
                'Skylark',
                'Terraza',
                'Verano',
            ],
            'Cadillac' => [
                'ATS',
                'ATS-V',
                'Brougham',
                'CT6',
                'CTS',
                'CTS-V',
                'DTS',
                'Deville',
                'ELR',
                'Eldorado',
                'Escalade',
                'SRX',
                'STS',
                'XT4',
                'XT5',
                'XTS',
            ],
            'Chevrolet' => [
                '3500',
                '4500',
                '4500 HD',
                '4500xd',
                '5500XD',
                '5500hd',
                'Astro',
                'Avalanche',
                'Aveo',
                'Black Diamond Avalanche',
                'Blazer',
                'Bolt EV',
                'C/K 10',
                'C/K 1500',
                'C/K 2500',
                'Camaro',
                'Captiva Sport',
                'Cavalier',
                'Celebrity',
                'Chevy Van',
                'City Express',
                'Classic',
                'Cobalt',
                'Colorado',
                'Corvette',
                'Corvette Stingray',
                'Cruze',
                'Cruze Limited',
                'Equinox',
                'Express',
                'Express 2500',
                'Express 3500',
                'Express 4500',
                'Express Cargo',
                'Gm515 - Silverado',
                'HHR',
                'Impala',
                'Impala Limited',
                'Lumina',
                'Malibu',
                'Malibu Classic',
                'Malibu Limited',
                'Malibu Maxx',
                'Monte Carlo',
                'Prizm',
                'S-10',
                'S10 Pickup',
                'SS',
                'SSR',
                'Silverado',
                'Silverado 1500',
                'Silverado 2500HD',
                'Silverado 3500',
                'Silverado 3500HD',
                'Silverado HD',
                'Silverado LD',
                'Silverado Legacy',
                'Sonic',
                'Spark',
                'Spark EV',
                'Suburban',
                'TRAVERSE',
                'Tahoe',
                'Tracker',
                'TrailBlazer',
                'TrailBlazer EXT',
                'Traverse',
                'Trax',
                'Uplander',
                'Venture',
                'Volt',
            ],
            'Chrysler' => [
                '200',
                '300',
                '300M',
                'Aspen',
                'Concorde',
                'Crossfire',
                'LHS',
                'PT Cruiser',
                'Pacifica',
                'Sebring',
                'Town & Country',
                'Town and Country',
                'Voyager',
            ],
            'Dodge' => [
                'Avenger',
                'Caliber',
                'Caravan',
                'Caravan/Grand Caravan',
                'Challenger',
                'Charger',
                'Dakota',
                'Dart',
                'Durango',
                'Grand Caravan',
                'Intrepid',
                'Journey',
                'Magnum',
                'Neon',
                'Nitro',
                'Ram 1500',
                'Ram 2500',
                'Ram 3500',
                'Stratus',
                'Viper',
            ],
            'FIAT' => [
                '124 Spider',
                '500',
                '500L',
                '500X',
                '500e',
            ],
            'Ferrari' => [
                'California'
            ],
            'Fisker' => [
                'Karma'
            ],
            'Ford' => [
                'C-Max',
                'C-Max Energi',
                'Club Wagon',
                'Contour',
                'Crown Victoria',
                'E-350',
                'E-350SD',
                'E-Series Van',
                'E-Series Wagon',
                'EcoSport',
                'Econoline',
                'Econoline Cargo',
                'Econoline Wagon',
                'Edge',
                'Escape',
                'Escort',
                'Excursion',
                'Expedition',
                'Expedition MAX',
                'Explorer',
                'Explorer Sport',
                'Explorer Sport Trac',
                'F-150',
                'F-250',
                'F-250 SD',
                'F-350',
                'F-350 SD',
                'F-450',
                'F-450 SD',
                'F-550',
                'F650',
                'Fiesta',
                'Five Hundred',
                'Flex',
                'Focus',
                'Focus RS',
                'Focus ST',
                'Freestar',
                'Freestyle',
                'Fusion',
                'Fusion Energi',
                'Mustang',
                'Mustang SVT Cobra',
                'Ranger',
                'Shelby GT350',
                'Shelby GT500',
                'Taurus',
                'Thunderbird',
                'Transit Connect',
                'Transit Van',
                'Transit Wagon',
                'Windstar',
            ],
            'GMC' => [
                'Acadia',
                'Acadia Limited',
                'Canyon',
                'Envoy',
                'Envoy XL',
                'Envoy XUV',
                'Jimmy',
                'Safari',
                'Savana',
                'Savana 2500',
                'Savana Cargo',
                'Savana VAN',
                'Sierra',
                'Sierra 1500',
                'Sierra 2500',
                'Sierra 2500HD',
                'Sierra 3500',
                'Sierra 3500HD',
                'Sierra C/K 1500',
                'Sierra C/K 2500',
                'Sierra Limited',
                'Sonoma',
                'Suburban',
                'Terrain',
                'Yukon',
                'Yukon Denali',
                'Yukon XL',
            ],
            'HUMMER' => [
                'H1',
                'H2',
                'H2 SUT',
                'H3',
            ],
            'Honda' => [
                'Accord',
                'Accord Crosstour',
                'CBR1000RR',
                'CR-V',
                'CR-Z',
                'Civic',
                'Clarity',
                'Crosstour',
                'Element',
                'Fit',
                'Goldwing',
                'HR-V',
                'Insight',
                'Odyssey',
                'Passport',
                'Passport UV',
                'Pilot',
                'Prelude',
                'Ridgeline',
                'S2000',
                'VT750C2B',
                'VT750CA',
            ],
            'Hyundai' => [
                'Accent',
                'Azera',
                'Elantra',
                'Elantra GT',
                'Elantra Touring',
                'Entourage',
                'Equus',
                'Genesis',
                'Ioniq',
                'Ioniq Electric ',
                'Kona',
                'Santa',
                'Santa FE XL',
                'Santa Fe',
                'Santa Fe Sport',
                'Sonata',
                'Tiburon',
                'Tucson',
                'Veloster',
                'Veracruz',
            ],
            'INFINITI' => [
                'EX',
                'EX35',
                'FX',
                'FX35',
                'G',
                'G Convertible',
                'G Sedan',
                'G20',
                'G35',
                'G37',
                'G37 Convertible',
                'G37 Sedan',
                'I30',
                'I35',
                'J30',
                'JX',
                'M',
                'M35',
                'M37',
                'M45',
                'M56',
                'Q40',
                'Q45',
                'Q50',
                'Q60',
                'Q70',
                'Q70L',
                'QX',
                'QX30',
                'QX4',
                'QX50',
                'QX56',
                'QX60',
                'QX70',
                'QX80',
            ],
            'Isuzu' => [
                'Ascender',
                'Axiom',
                'NPR/ NPR-HD/ NPR-XD',
                'Rodeo',
                'Trooper',
            ],
            'Jaguar' => [
                'E-Pace',
                'F-Pace',
                'F-Type',
                'S-Type',
                'X-Type',
                'XE',
                'XF',
                'XJ',
                'XK',
            ],
            'Jeep' => [
                'Cherokee',
                'Commander',
                'Compass',
                'Gladiator',
                'Grand Cherokee',
                'Grand Cherokee SRT',
                'Liberty',
                'Patriot',
                'Renegade',
                'Wrangler',
                'Wrangler JK',
            ],
            'Kia' => [
                'Amanti',
                'Borrego',
                'Cadenza',
                'Forte',
                'K900',
                'Niro',
                'Optima',
                'Optima/Plug-In',
                'Rio',
                'Rondo',
                'SUV',
                'Sedona',
                'Sorento',
                'Soul',
                'Soul EV',
                'Spectra',
                'Sportage',
                'Stinger',
                'Telluride',
            ],
            'Land Rover' => [
                'Discovery',
                'Discovery Sport',
                'LR2',
                'LR3',
                'LR4',
                'Range Rover',
                'Range Rover Evoque',
                'Range Rover Sport',
                'Range Rover Velar',
            ],
            'Lexus' => [
                'CT 200h',
                'ES',
                'ES 300',
                'ES 300h',
                'ES 330',
                'ES 350',
                'GS',
                'GS 200t',
                'GS 300',
                'GS 350',
                'GS 430',
                'GS 450h',
                'GX',
                'GX 460',
                'GX 470',
                'GX, LX',
                'HS 250h',
                'IS 200t',
                'IS 250',
                'IS 250 C',
                'IS 300',
                'IS 350',
                'IS 350 C',
                'LC 500',
                'LS 400',
                'LS 430',
                'LS 460',
                'LS 500',
                'LX 470',
                'LX 570',
                'NX 200t',
                'NX 300',
                'NX 300h',
                'RC 200t',
                'RC 300',
                'RC 350',
                'RC F',
                'RCF',
                'RX 300',
                'RX 330',
                'RX 350',
                'RX 350L',
                'RX 400h',
                'RX 450h',
                'SC 400',
                'SC 430',
                'UX',
            ],
            'Lincoln' => [
                'Aviator',
                'Blackwood',
                'Continental',
                'LS',
                'MKC',
                'MKS',
                'MKT',
                'MKX',
                'MKZ',
                'Mark LT',
                'Mark VIII',
                'Nautilus',
                'Navigator',
                'Town Car',
                'Zephyr',
            ],
            'MINI' => [
                'Clubman',
                'Convertible',
                'Cooper',
                'Countryman',
                'Countryman Plug-in',
                'Hardtop 2 Door',
                'Hardtop 4 Door',
                'Roadster',
            ],
            'Maserati' => [
                'Ghibli',
                'GranTurismo',
                'GranTurismo Convertible',
                'Levante',
                'Quattroporte',
            ],
            'Mazda' => [
                'B-Series Truck',
                'CX-3',
                'CX-5',
                'CX-7',
                'CX-9',
                'MPV',
                'MX-5 Miata',
                'Mazda3',
                'Mazda5',
                'Mazda6',
                'Mazdaspeed 3',
                'Mazdaspeed3',
                'Millenia',
                'Mx-5',
                'Protege',
                'Protege5',
                'RX-7',
                'RX-8',
                'Tribute',
            ],
            'Mercedes-Benz' => [
                '420-Class',
                '560',
                'A-Class',
                'AMG GT',
                'C-Class',
                'CL-Class',
                'CLA-Class',
                'CLK-Class',
                'CLS',
                'CLS-Class',
                'E-Class',
                'G-Class',
                'GL-Class',
                'GLA-Class',
                'GLC',
                'GLC-Class',
                'GLE',
                'GLE 350',
                'GLE-Class',
                'GLK-Class',
                'GLS-Class',
                'M-Class',
                'Metris',
                'S-Class',
                'SL-Class',
                'SLC - Class',
                'SLC-Class',
                'SLK-Class',
                'Sprinter',
            ],
            'Mercury' => [
                'Cougar',
                'Grand Marquis',
                'Marauder',
                'Mariner',
                'Milan',
                'Montego',
                'Monterey',
                'Mountaineer',
                'Mystique',
                'Sable',
                'Villager',
            ],
            'Mitsubishi' => [
                'Diamante',
                'Eclipse',
                'Eclipse Cross',
                'Eclipse Spyder',
                'Endeavor',
                'Galant',
                'Lancer',
                'Lancer Evolution',
                'Lancer Sportback',
                'Mirage',
                'Mirage G4',
                'Montero',
                'Montero Sport',
                'Outlander',
                'Outlander - PHEV',
                'Outlander Sport',
                'Raider',
            ],
            'Nissan' => [
                '200SX',
                '350Z',
                '370Z',
                'Altima',
                'Armada',
                'Cube',
                'Frontier',
                'GT-R',
                'Juke',
                'Kicks',
                'Leaf',
                'Maxima',
                'Murano',
                'Murano CrossCabriolet',
                'NV',
                'NV Cargo',
                'NV Passenger',
                'NV200',
                'NV3500',
                'Pathfinder',
                'Pickup',
                'Quest',
                'Rogue',
                'Rogue Select',
                'Rogue Sport',
                'Rogue Sports',
                'Sentra',
                'Titan',
                'Titan XD',
                'Truck',
                'Versa',
                'Versa Note',
                'Xterra',
            ],
            'Oldsmobile' => [
                '88',
                'Achieva',
                'Alero',
                'Bravada',
                'Intrigue',
                'Silhouette',
            ],
            'Plymouth' => [
                'Grand Voyager',
                'Neon',
                'Voyager',
            ],
            'Pontiac' => [
                'Aztek',
                'Bonneville',
                'Firebird',
                'G5',
                'G6',
                'G8',
                'Grand Am',
                'Grand Prix',
                'Montana',
                'Montana SV6',
                'Solstice',
                'Sunfire',
                'Torrent',
                'Trans Sport',
                'Vibe',
            ],
            'Porsche' => [
                '718',
                '718 Boxster',
                '718 Cayman',
                '911',
                '944',
                'Boxster',
                'Cayenne',
                'Cayman',
                'Cayman S',
                'Macan',
                'Panamera',
            ],
            'Ram' => [
                '1500',
                '2500',
                '2500 P',
                '3500',
                '4500',
                '5500',
                'C/V Tradesman',
                'CV Tradesman',
                'Dakota',
                'Laramie',
                'ProMaster 1500',
                'ProMaster 2500',
                'Promaster Cargo Van',
                'Promaster City',
            ],
            'Rolls-Royce' => [
                'Phantom',
            ],
            'Saab' => [
                '3-Sep',
                '5-Sep',
                '9-7X',
            ],
            'Saturn' => [
                'Aura',
                'ION',
                'L-Series',
                'L300',
                'Outlook',
                'S-Series',
                'SL',
                'Sky',
                'VUE',
            ],
            'Scion' => [
                'FR-S',
                'iA',
                'iM',
                'iQ',
                'tC',
                'xA',
                'xB',
                'xD',
            ],
            'Subaru' => [
                'Ascent',
                'B9 Tribeca',
                'BRZ',
                'Crosstrek',
                'Forester',
                'Impreza',
                'Impreza WRX',
                'Legacy',
                'Legacy Wagon',
                'Outback',
                'Tribeca',
                'WRX',
                'XV Crosstrek',
            ],
            'Suzuki' => [
                'Forenza',
                'GSX-R1000',
                'GSX600F',
                'Grand Vitara',
                'Kizashi',
                'Reno',
                'SX4',
                'Sidekick',
                'XL7',
            ],
            'Tesla' => [
                'Model 3',
                'Model S',
                'Model X',
            ],
            'Toyota' => [
                '4-Runner',
                '4Runner',
                '86',
                'Avalon',
                'C-HR',
                'Camry',
                'Camry Solara',
                'Celica',
                'Corolla',
                'Corolla iM',
                'ECHO',
                'FJ Cruiser',
                'Highlander',
                'Land Cruiser',
                'MR2 Spyder',
                'Matrix',
                'Pickup',
                'Prius',
                'Prius Plug-in',
                'Prius Prime',
                'Prius V',
                'Prius c',
                'RAV4',
                'Sequoia',
                'Sienna',
                'Supra',
                'T100',
                'Tacoma',
                'Tundra',
                'Venza',
                'Yaris',
                'Yaris iA',
                'tC',
            ],
            'Volkswagen' => [
                'Arteon',
                'Arteon 2.0T',
                'Atlas',
                'Beetle',
                'Beetle Convertible',
                'CC',
                'Eos',
                'GLI',
                'GTI',
                'Golf',
                'Golf Alltrack',
                'Golf GTI',
                'Golf R',
                'Golf SportWagen',
                'Jetta',
                'Jetta SportWagen',
                'New Beetle',
                'Passat',
                'R32',
                'Rabbit',
                'Routan',
                'Tiguan',
                'Tiguan Limited',
                'Touareg',
                'Touareg 2',
            ],
            'Volvo' => [
                '940',
                'C30',
                'C70',
                'S40',
                'S60',
                'S80',
                'S90',
                'V50',
                'V60',
                'V60 Cross Country',
                'V70',
                'V90',
                'V90 Cross Country',
                'XC60',
                'XC70',
                'XC90',
            ],
            'smart' => [
                'Fortwo'
            ],
        ],

        'motor_bike'=> [
            'Aprilia' => [
                'Amico',
                'Area 51',
                'Atlantic 125',
                'Atlantic 250',
                'Atlantic 500',
                'Caponord 1000',
                'Classic 125',
                'Classic 50',
                'Gulliver 50',
                'Habana 125',
                'Habana 50',
                'Leonardo 125',
                'Leonardo 150',
                'Leonardo 250',
                'Leonardo 300',
                'Mcgulliver 50',
                'Moto 6.5',
                'MX 125',
                'MX Super Motard 50',
                'Pegaso 650',
                'Rally 50',
            ],
            'Bajaj' => [
                'Classic SL 125',
                'Classic SL 150',
                'Sprint',
                'Sunny',
            ],

        ],

    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::transaction(function () {
            $allMakesDB = VehicleMake::all();

            foreach ($this->make_and_models as $vehicle_make_for => $makes ) {

                // dd($makes);

                foreach ($makes as $make => $models) {

                    $makeId = null;


                    $makeFound = $allMakesDB->first(function ($item) use ($make) {
                        return $item->name === $make;
                    });


                    if ($makeFound) {
                        $makeId = $makeFound->id;
                    }

                    if (!$makeId) {
                        $createdMake = VehicleMake::create(['name' => $make, 'make_for' => $vehicle_make_for]);

                        $makeId = $createdMake->id;

                    }
                    $allModelsForMake = VehicleModel::where('make_id', $makeId)->get();

                    foreach ($models as $model) {

                        $modelFound = $allModelsForMake->first(function ($item) use ($model) {
                            return $item->name === $model;
                        });


                        if (!$modelFound) {
                            $data = [
                                'name' => $model,
                                'make_id' => $makeId,
                            ];
                            // dd($data);

                            VehicleModel::create($data);
                        }

                    }
                }
            }
        });
    }
}
