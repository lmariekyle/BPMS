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
            'sitioID' => '1',
            'houseNumber' => '1'
        ]);

        //household 1
        Households::create([
            'id'=>'2',
            'sitioID' => '2',
            'houseNumber' => '1',
            'street'=>'Bonifacio',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'Insanitary',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2023,
            'quarterNumber'=>3,
            'dateOfVisit'=>'2023-8-15',
            'respondentName'=>'Andres',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        
        Households::create([
            'id'=>'3',
            'sitioID' => '2',
            'houseNumber' => '1',
            'street'=>'Bonifacio',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'Insanitary',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2023,
            'quarterNumber'=>4,
            'dateOfVisit'=>'2023-11-14',
            'respondentName'=>'Andres',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        Households::create([
            'id'=>'4',
            'sitioID' => '2',
            'houseNumber' => '1',
            'street'=>'Bonifacio',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'Insanitary',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2024,
            'quarterNumber'=>1,
            'dateOfVisit'=>'2024-1-14',
            'respondentName'=>'Andres',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        
        //household 2
        Households::create([
            'id'=>'5',
            'sitioID' => '2',
            'houseNumber' => '2',
            'street'=>'Bonifacio',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'Sanitary',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L1',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2023,
            'quarterNumber'=>3,
            'dateOfVisit'=>'2023-8-15',
            'respondentName'=>'James',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        
        Households::create([
            'id'=>'6',
            'sitioID' => '2',
            'houseNumber' => '2',
            'street'=>'Bonifacio',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'Sanitary',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L1',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2023,
            'quarterNumber'=>4,
            'dateOfVisit'=>'2023-11-14',
            'respondentName'=>'James',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        Households::create([
            'id'=>'7',
            'sitioID' => '2',
            'houseNumber' => '2',
            'street'=>'Bonifacio',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'Sanitary',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L1',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2024,
            'quarterNumber'=>1,
            'dateOfVisit'=>'2024-1-14',
            'respondentName'=>'James',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        //household 3
        Households::create([
            'id'=>'8',
            'sitioID' => '2',
            'houseNumber' => '3A',
            'street'=>'Bonifacio',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'Shared',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2023,
            'quarterNumber'=>3,
            'dateOfVisit'=>'2023-8-15',
            'respondentName'=>'Juan',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        Households::create([
            'id'=>'9',
            'sitioID' => '2',
            'houseNumber' => '3B',
            'street'=>'Bonifacio',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'Shared',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2023,
            'quarterNumber'=>3,
            'dateOfVisit'=>'2023-8-15',
            'respondentName'=>'Emily',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        Households::create([
            'id'=>'10',
            'sitioID' => '2',
            'houseNumber' => '3A',
            'street'=>'Bonifacio',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'Shared',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2023,
            'quarterNumber'=>4,
            'dateOfVisit'=>'2023-11-14',
            'respondentName'=>'Juan',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        Households::create([
            'id'=>'11',
            'sitioID' => '2',
            'houseNumber' => '3B',
            'street'=>'Bonifacio',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'Shared',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2023,
            'quarterNumber'=>4,
            'dateOfVisit'=>'2023-11-14',
            'respondentName'=>'Emily',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        
        Households::create([
            'id'=>'12',
            'sitioID' => '2',
            'houseNumber' => '3A',
            'street'=>'Bonifacio',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'Shared',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2024,
            'quarterNumber'=>1,
            'dateOfVisit'=>'2024-1-14',
            'respondentName'=>'Juan',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        Households::create([
            'id'=>'13',
            'sitioID' => '2',
            'houseNumber' => '3B',
            'street'=>'Bonifacio',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'Shared',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2024,
            'quarterNumber'=>1,
            'dateOfVisit'=>'2024-1-14',
            'respondentName'=>'Emily',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        //household 4
        Households::create([
            'id' => '14',
            'sitioID' => '2',
            'houseNumber' => '4',
            'street'=>'Aguinaldo',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'Sanitary',
            'IP'=>'IP',
            'accessToWaterSupply'=>'Doubtful',
            'remarksOfWaterSupply'=>'concerning',
            'yearOfVisit'=>2023,
            'quarterNumber'=>3,
            'dateOfVisit'=>'2023-7-27',
            'respondentName'=>'Milo',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        Households::create([
            'id' => '15',
            'sitioID' => '2',
            'houseNumber' => '4',
            'street'=>'Aguinaldo',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'Sanitary',
            'IP'=>'IP',
            'accessToWaterSupply'=>'Doubtful',
            'remarksOfWaterSupply'=>'concerning',
            'yearOfVisit'=>2024,
            'quarterNumber'=>1,
            'dateOfVisit'=>'2024-1-14',
            'respondentName'=>'Milo',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        //household 5
        Households::create([
            'id' => '16',
            'sitioID' => '2',
            'houseNumber' => '5',
            'street'=>'Aguinaldo',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'None',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2023,
            'quarterNumber'=>3,
            'dateOfVisit'=>'2023-8-15',
            'respondentName'=>'Maria',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        Households::create([
            'id' => '17',
            'sitioID' => '2',
            'houseNumber' => '5',
            'street'=>'Aguinaldo',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'None',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2023,
            'quarterNumber'=>4,
            'dateOfVisit'=>'2023-11-14',
            'respondentName'=>'Maria',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        Households::create([
            'id' => '18',
            'sitioID' => '2',
            'houseNumber' => '5',
            'street'=>'Aguinaldo',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'None',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2024,
            'quarterNumber'=>1,
            'dateOfVisit'=>'2024-1-14',
            'respondentName'=>'Maria',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        //household 1
        Households::create([
            'id' => '19',
            'sitioID' => '3',
            'houseNumber' => '1',
            'street'=>'Rizal',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'None',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L1',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2023,
            'quarterNumber'=>3,
            'dateOfVisit'=>'2023-8-15',
            'respondentName'=>'Peter',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        Households::create([
            'id' => '20',
            'sitioID' => '3',
            'houseNumber' => '1',
            'street'=>'Rizal',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'None',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L1',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2023,
            'quarterNumber'=>4,
            'dateOfVisit'=>'2023-11-14',
            'respondentName'=>'Peter',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        Households::create([
            'id' => '21',
            'sitioID' => '3',
            'houseNumber' => '1',
            'street'=>'Rizal',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'None',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L1',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2024,
            'quarterNumber'=>1,
            'dateOfVisit'=>'2024-2-15',
            'respondentName'=>'Peter',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        Households::create([
            'sitioID' => '4',
            'houseNumber' => '1'
        ]);

        Households::create([
            'sitioID' => '4',
            'houseNumber' => '2'
        ]);

        Households::create([
            'sitioID' => '4',
            'houseNumber' => '3'
        ]);
        
        Households::create([
            'sitioID' => '4',
            'houseNumber' => '4'
        ]);

        Households::create([
            'sitioID' => '5',
            'houseNumber' => '1'
        ]);

        Households::create([
            'sitioID' => '5',
            'houseNumber' => '2'
        ]);

        Households::create([
            'sitioID' => '5',
            'houseNumber' => '3'
        ]);

        Households::create([
            'sitioID' => '6',
            'houseNumber' => '1'
        ]);

        Households::create([
            'sitioID' => '6',
            'houseNumber' => '2'
        ]);

        Households::create([
            'sitioID' => '6',
            'houseNumber' => '3'
        ]);

        Households::create([
            'sitioID' => '7',
            'houseNumber' => '1'
        ]);

        Households::create([
            'sitioID' => '7',
            'houseNumber' => '2'
        ]);

        Households::create([
            'sitioID' => '8',
            'houseNumber' => '1'
        ]);

        Households::create([
            'sitioID' => '8',
            'houseNumber' => '2'
        ]);

        Households::create([
            'sitioID' => '9',
            'houseNumber' => '1'
        ]);

        Households::create([
            'sitioID' => '9',
            'houseNumber' => '2'
        ]);

        Households::create([
            'sitioID' => '10',
            'houseNumber' => '1'
        ]);

        Households::create([
            'sitioID' => '10',
            'houseNumber' => '2'
        ]);

        Households::create([
            'sitioID' => '11',
            'houseNumber' => '1'
        ]);

        Households::create([
            'sitioID' => '11',
            'houseNumber' => '2'
        ]);

        Households::create([
            'sitioID' => '11',
            'houseNumber' => '3'
        ]);

        Households::create([
            'sitioID' => '11',
            'houseNumber' => '4'
        ]);

        Households::create([
            'sitioID' => '11',
            'houseNumber' => '5A'
        ]);

        Households::create([
            'sitioID' => '11',
            'houseNumber' => '5B'
        ]);

        Households::create([
            'sitioID' => '11',
            'houseNumber' => '6'
        ]);

        Households::create([
            'sitioID' => '12',
            'houseNumber' => '1'
        ]);

        Households::create([
            'sitioID' => '12',
            'houseNumber' => '1'
        ]);

        Households::create([
            'sitioID' => '13',
            'houseNumber' => '2'
        ]);

        Households::create([
            'sitioID' => '13',
            'houseNumber' => '2'
        ]);

        Households::create([
            'sitioID' => '14',
            'houseNumber' => '1'
        ]);

        Households::create([
            'sitioID' => '14',
            'houseNumber' => '2'
        ]);
        
    }
}
