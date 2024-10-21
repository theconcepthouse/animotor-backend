<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            'England' => [
                'currency_code' => '£',
                'currency_symbol' => 'GBP',
                'timezone' => 'Europe/London',
                'states' => [
                    'Bedfordshire' => [
                        'cities' => 'Bedford, Luton, Dunstable',
                    ],
                    'Berkshire' => [
                        'cities' => 'Reading, Slough, Windsor',
                    ],
                    'Buckinghamshire' => [
                        'cities' => 'Aylesbury, Milton Keynes, High Wycombe',
                    ],
                    'Cambridgeshire' => [
                        'cities' => 'Cambridge, Peterborough, Ely, Huntingdon',
                    ],
                    'Cheshire' => [
                        'cities' => 'Chester, Warrington, Crewe, Macclesfield',
                    ],
                    'Cornwall' => [
                        'cities' => 'Truro, Falmouth, Penzance',
                    ],
                    'Cumbria' => [
                        'cities' => 'Carlisle, Kendal, Barrow-in-Furness',
                    ],
                    'Derbyshire' => [
                        'cities' => 'Derby, Chesterfield, Buxton',
                    ],
                    'Devon' => [
                        'cities' => 'Exeter, Plymouth, Torquay, Barnstaple',
                    ],
                    'Dorset' => [
                        'cities' => 'Bournemouth, Poole, Weymouth',
                    ],
                    'Durham' => [
                        'cities' => 'Durham, Darlington, Hartlepool, Stockton-on-Tees',
                    ],
                    'East Sussex' => [
                        'cities' => 'Brighton, Eastbourne, Hastings',
                    ],
                    'Essex' => [
                        'cities' => 'Chelmsford, Colchester, Basildon',
                    ],
                    'Gloucestershire' => [
                        'cities' => 'Gloucester, Cheltenham, Stroud',
                    ],
                    'Hampshire' => [
                        'cities' => 'Winchester, Southampton, Portsmouth, Basingstoke, Aldershot',
                    ],
                    'Hertfordshire' => [
                        'cities' => 'Watford, St Albans, Stevenage',
                    ],
                    'Kent' => [
                        'cities' => 'Canterbury, Maidstone, Ashford, Tunbridge Wells',
                    ],
                    'Lancashire' => [
                        'cities' => 'Lancaster, Blackpool, Preston, Blackburn',
                    ],
                    'Leicestershire' => [
                        'cities' => 'Leicester, Loughborough, Hinckley',
                    ],
                    'Lincolnshire' => [
                        'cities' => 'Lincoln, Grimsby, Scunthorpe, Grantham',
                    ],
                    'Norfolk' => [
                        'cities' => 'Norwich, King’s Lynn, Great Yarmouth',
                    ],
                    'Northamptonshire' => [
                        'cities' => 'Northampton, Kettering, Corby',
                    ],
                    'Northumberland' => [
                        'cities' => 'Alnwick, Hexham, Blyth',
                    ],
                    'Nottinghamshire' => [
                        'cities' => 'Nottingham, Mansfield, Newark-on-Trent',
                    ],
                    'Oxfordshire' => [
                        'cities' => 'Oxford, Banbury, Bicester',
                    ],
                    'Somerset' => [
                        'cities' => 'Bath, Wells, Taunton, Yeovil',
                    ],
                    'Surrey' => [
                        'cities' => 'Guildford, Woking, Epsom',
                    ],
                    'Warwickshire' => [
                        'cities' => 'Warwick, Leamington Spa, Stratford-upon-Avon',
                    ],
                    'West Sussex' => [
                        'cities' => 'Chichester, Crawley, Worthing',
                    ],
                    'Wiltshire' => [
                        'cities' => 'Salisbury, Swindon, Chippenham',
                    ],
                    'Yorkshire' => [
                        'cities' => 'York, Leeds, Sheffield, Harrogate, Scarborough, Doncaster',
                    ],
                ],
            ],
            'Scotland' => [
                'currency_code' => '£',
                'currency_symbol' => 'GBP',
                'timezone' => 'Europe/London',
                'states' => [
                    'Aberdeenshire' => [
                        'cities' => 'Aberdeen, Peterhead, Stonehaven',
                    ],
                    'Angus' => [
                        'cities' => 'Arbroath, Forfar',
                    ],
                    'Ayrshire' => [
                        'cities' => 'Ayr, Kilmarnock, Irvine',
                    ],
                    'Clackmannanshire' => [
                        'cities' => 'Alloa',
                    ],
                    'Dumfries and Galloway' => [
                        'cities' => 'Dumfries, Stranraer',
                    ],
                    'Fife' => [
                        'cities' => 'Kirkcaldy, Dunfermline, St Andrews',
                    ],
                    'Glasgow' => [
                        'cities' => 'Glasgow',
                    ],
                    'Highland' => [
                        'cities' => 'Inverness, Fort William',
                    ],
                    'Midlothian' => [
                        'cities' => 'Edinburgh, Dalkeith, Bonnyrigg',
                    ],
                ],
            ],
            'Wales' => [
                'currency_code' => '£',
                'currency_symbol' => 'GBP',
                'timezone' => 'Europe/London',
                'states' => [
                    'Anglesey' => [
                        'cities' => 'Holyhead, Llangefni',
                    ],
                    'Cardiff' => [
                        'cities' => 'Cardiff',
                    ],
                    'Carmarthenshire' => [
                        'cities' => 'Carmarthen, Llanelli',
                    ],
                    'Gwynedd' => [
                        'cities' => 'Bangor, Caernarfon',
                    ],
                    'Monmouthshire' => [
                        'cities' => 'Abergavenny, Monmouth',
                    ],
                    'Pembrokeshire' => [
                        'cities' => 'Haverfordwest, Pembroke',
                    ],
                    'Swansea' => [
                        'cities' => 'Swansea, Gorseinon, Mumbles',
                    ],
                ],
            ],
            'Northern Ireland' => [
                'currency_code' => '£',
                'currency_symbol' => 'GBP',
                'timezone' => 'Europe/Belfast',
                'states' => [
                    'Antrim' => [
                        'cities' => 'Belfast, Lisburn, Ballymena, Carrickfergus',
                    ],
                    'Armagh' => [
                        'cities' => 'Armagh, Portadown, Lurgan',
                    ],
                    'Down' => [
                        'cities' => 'Newry, Bangor, Downpatrick',
                    ],
                    'Fermanagh' => [
                        'cities' => 'Enniskillen',
                    ],
                    'Londonderry' => [
                        'cities' => 'Derry, Limavady, Coleraine',
                    ],
                    'Tyrone' => [
                        'cities' => 'Omagh, Dungannon',
                    ],
                ],
            ],
        ];

        $country = Country::where('name','Northern Ireland')->first();

        if($country) {
            return;
        }

//        Region::query()->update(['is_active' => false]);

        Region::query()->delete();


        foreach ($countries as $item => $data) {

            $country = Country::where('name',$item)->first();

            if(!$country) {
                $country = Country::create([
                    'name' => $item,
                    'currency_code' => $data['currency_code'],
                    'currency_symbol' => $data['currency_symbol'],
                ]);
            }


            foreach ($data['states'] as $state => $locations) {

                $region = Region::where('name',$state)->first();

                if(!$region) {
                    Region::create([
                        'name' => $state,
                        'currency_code' => $data['currency_code'],
                        'currency_symbol' => $data['currency_symbol'],
                        'timezone' => $data['timezone'],
                        'cities' => $locations['cities'],
                        'is_active' => true,
                        'country_id' => $country->id,
                    ]);
                }
            }
        }

    }
}
