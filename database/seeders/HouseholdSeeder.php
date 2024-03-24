<?php

namespace Database\Seeders;

use App\Models\Households;
use Illuminate\Database\Seeder;

class HouseholdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Households::create([
            'sitioID' => '2',
            'houseNumber' => '1'
        ]);

        Households::create([
            'sitioID' => '2',
            'houseNumber' => '3',
            'street'=>'Twee',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'None',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2022,
            'quarterNumber'=>4,
            'dateOfVisit'=>'2022-10-15',
            'respondentName'=>'Rook',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        
        Households::create([
            'sitioID' => '2',
            'houseNumber' => '4',
            'street'=>'Fooo',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'None',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2022,
            'quarterNumber'=>4,
            'dateOfVisit'=>'2022-10-15',
            'respondentName'=>'Rook',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        Households::create([
            'sitioID' => '2',
            'houseNumber' => '5',
            'street'=>'Fiy',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'None',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2022,
            'quarterNumber'=>4,
            'dateOfVisit'=>'2022-10-15',
            'respondentName'=>'Rook',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        Households::create([
            'sitioID' => '2',
            'houseNumber' => '6A',
            'street'=>'Sixa',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'None',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2022,
            'quarterNumber'=>4,
            'dateOfVisit'=>'2022-10-15',
            'respondentName'=>'Rook',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        Households::create([
            'sitioID' => '2',
            'houseNumber' => '6B',
            'street'=>'Sixb',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'None',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2022,
            'quarterNumber'=>4,
            'dateOfVisit'=>'2022-10-15',
            'respondentName'=>'Rook',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        Households::create([
            'sitioID' => '3',
            'houseNumber' => '8'
        ]);

        Households::create([
            'sitioID' => '3',
            'houseNumber' => '9'
        ]);

        Households::create([
            'sitioID' => '3',
            'houseNumber' => '10'
        ]);
        
        Households::create([
            'sitioID' => '3',
            'houseNumber' => '11'
        ]);

        Households::create([
            'sitioID' => '3',
            'houseNumber' => '12'
        ]);

        Households::create([
            'sitioID' => '3',
            'houseNumber' => '13'
        ]);

        Households::create([
            'sitioID' => '3',
            'houseNumber' => '14'
        ]);

        Households::create([
            'sitioID' => '3',
            'houseNumber' => '15'
        ]);

        Households::create([
            'sitioID' => '4',
            'houseNumber' => '16'
        ]);

        Households::create([
            'sitioID' => '4',
            'houseNumber' => '17'
        ]);

        Households::create([
            'sitioID' => '4',
            'houseNumber' => '18'
        ]);

        Households::create([
            'sitioID' => '4',
            'houseNumber' => '19'
        ]);

        Households::create([
            'sitioID' => '4',
            'houseNumber' => '20'
        ]);

        Households::create([
            'sitioID' => '4',
            'houseNumber' => '21'
        ]);

        Households::create([
            'sitioID' => '5',
            'houseNumber' => '22'
        ]);

        Households::create([
            'sitioID' => '5',
            'houseNumber' => '23'
        ]);

        Households::create([
            'sitioID' => '5',
            'houseNumber' => '24'
        ]);

        Households::create([
            'sitioID' => '6',
            'houseNumber' => '25'
        ]);
    }
}
