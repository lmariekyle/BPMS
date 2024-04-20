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

        //household 2A
        Households::create([
            'id' => '22',
            'sitioID' => '3',
            'houseNumber' => '2A',
            'street'=>'Rizal',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'Shared',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L3',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2023,
            'quarterNumber'=>3,
            'dateOfVisit'=>'2023-8-28',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        Households::create([
            'id' => '23',
            'sitioID' => '3',
            'houseNumber' => '2A',
            'street'=>'Rizal',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'Shared',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L3',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2024,
            'quarterNumber'=>4,
            'dateOfVisit'=>'2023-11-13',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        Households::create([
            'id' => '24',
            'sitioID' => '3',
            'houseNumber' => '2A',
            'street'=>'Rizal',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'Shared',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L3',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2024,
            'quarterNumber'=>1,
            'dateOfVisit'=>'2024-3-9',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        //household 2B
        Households::create([
            'id' => '25',
            'sitioID' => '3',
            'houseNumber' => '2B',
            'street'=>'Rizal',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'Shared',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L3',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2023,
            'quarterNumber'=>3,
            'dateOfVisit'=>'2023-8-28',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        Households::create([
            'id' => '26',
            'sitioID' => '3',
            'houseNumber' => '2B',
            'street'=>'Rizal',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'Shared',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L3',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2024,
            'quarterNumber'=>4,
            'dateOfVisit'=>'2023-11-13',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        Households::create([
            'id' => '27',
            'sitioID' => '3',
            'houseNumber' => '2B',
            'street'=>'Rizal',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'Shared',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L3',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2024,
            'quarterNumber'=>1,
            'dateOfVisit'=>'2024-3-9',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        //household 2C
        Households::create([
            'id' => '28',
            'sitioID' => '3',
            'houseNumber' => '2C',
            'street'=>'Rizal',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'Shared',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L3',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2023,
            'quarterNumber'=>3,
            'dateOfVisit'=>'2023-8-28',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        Households::create([
            'id' => '29',
            'sitioID' => '3',
            'houseNumber' => '2C',
            'street'=>'Rizal',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'Shared',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L3',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2024,
            'quarterNumber'=>4,
            'dateOfVisit'=>'2023-11-13',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        Households::create([
            'id' => '30',
            'sitioID' => '3',
            'houseNumber' => '2C',
            'street'=>'Rizal',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'Shared',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L3',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2024,
            'quarterNumber'=>1,
            'dateOfVisit'=>'2024-3-9',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        //household 3
        Households::create([
            'id' => '31',
            'sitioID' => '3',
            'houseNumber' => '3',
            'street'=>'Rizal',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'Sanitary',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2023,
            'quarterNumber'=>3,
            'dateOfVisit'=>'2023-8-28',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        Households::create([
            'id' => '32',
            'sitioID' => '3',
            'houseNumber' => '3',
            'street'=>'Rizal',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'Sanitary',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2023,
            'quarterNumber'=>4,
            'dateOfVisit'=>'2023-10-28',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        Households::create([
            'id' => '33',
            'sitioID' => '3',
            'houseNumber' => '3',
            'street'=>'Rizal',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'Sanitary',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2024,
            'quarterNumber'=>1,
            'dateOfVisit'=>'2024-1-21',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        //household 4
        Households::create([
            'id' => '34',
            'sitioID' => '3',
            'houseNumber' => '4',
            'street'=>'Rizal',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'Insanitary',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L1',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2023,
            'quarterNumber'=>3,
            'dateOfVisit'=>'2023-11-28',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        Households::create([
            'id' => '35',
            'sitioID' => '3',
            'houseNumber' => '4',
            'street'=>'Rizal',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'Insanitary',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L1',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2024,
            'quarterNumber'=>1,
            'dateOfVisit'=>'2024-1-13',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        //household 5
        Households::create([
            'id' => '36',
            'sitioID' => '3',
            'houseNumber' => '5',
            'street'=>'Rizal',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'None',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L1',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2023,
            'quarterNumber'=>3,
            'dateOfVisit'=>'2023-7-14',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        Households::create([
            'id' => '37',
            'sitioID' => '3',
            'houseNumber' => '5',
            'street'=>'Rizal',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'None',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L1',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2023,
            'quarterNumber'=>4,
            'dateOfVisit'=>'2023-11-14',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        Households::create([
            'id' => '38',
            'sitioID' => '3',
            'houseNumber' => '5',
            'street'=>'Rizal',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NonNHTS',
            'householdToiletFacilities'=>'None',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L1',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2024,
            'quarterNumber'=>1,
            'dateOfVisit'=>'2024-3-9',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        //household 1
        Households::create([
            'id' => '39',
            'sitioID' => '4',
            'houseNumber' => '1',
            'street'=>'Mabini',
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
            'dateOfVisit'=>'2023-7-9',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        Households::create([
            'id' => '40',
            'sitioID' => '4',
            'houseNumber' => '1',
            'street'=>'Mabini',
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
            'dateOfVisit'=>'2023-12-9',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        Households::create([
            'id' => '41',
            'sitioID' => '4',
            'houseNumber' => '1',
            'street'=>'Mabini',
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
            'dateOfVisit'=>'2024-3-9',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        //household 2
        Households::create([
            'id' => '42',
            'sitioID' => '4',
            'houseNumber' => '2',
            'street'=>'Mabini',
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
            'dateOfVisit'=>'2023-9-12',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        Households::create([
            'id' => '43',
            'sitioID' => '4',
            'houseNumber' => '2',
            'street'=>'Mabini',
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
            'quarterNumber'=>4,
            'dateOfVisit'=>'2024-12-2',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        Households::create([
            'id' => '44',
            'sitioID' => '4',
            'houseNumber' => '2',
            'street'=>'Mabini',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'None',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2024,
            'quarterNumber'=>1,
            'dateOfVisit'=>'2024-3-9',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        //household 3
        Households::create([
            'id'=>'45',
            'sitioID' => '4',
            'houseNumber' => '3',
            'street'=>'Mabini',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'None',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2024,
            'quarterNumber'=>1,
            'dateOfVisit'=>'2024-3-9',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);
        
        //household 4
        Households::create([
            'id'=>'48',
            'sitioID' => '4',
            'houseNumber' => '4',
            'street'=>'Magbanua',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'None',
            'IP'=>'NonIP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2024,
            'quarterNumber'=>1,
            'dateOfVisit'=>'2024-3-9',
            'respondentName'=>'XXXX',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        //hosuehold 1
        Households::create([
            'id'=>'51',
            'sitioID' => '5',
            'houseNumber' => '1'
        ]);
        Households::create([
            'id'=>'52',
            'sitioID' => '5',
            'houseNumber' => '1'
        ]);
        Households::create([
            'id'=>'53',
            'sitioID' => '5',
            'houseNumber' => '1'
        ]);

        //household 2
        Households::create([
            'id'=>'54',
            'sitioID' => '5',
            'houseNumber' => '2'
        ]);
        Households::create([
            'id'=>'55',
            'sitioID' => '5',
            'houseNumber' => '2'
        ]);
        Households::create([
            'id'=>'56',
            'sitioID' => '5',
            'houseNumber' => '2'
        ]);

        //household 3
        Households::create([
            'id'=>'57',
            'sitioID' => '5',
            'houseNumber' => '3'
        ]);
        Households::create([
            'id'=>'58',
            'sitioID' => '5',
            'houseNumber' => '3'
        ]);
        Households::create([
            'id'=>'59',
            'sitioID' => '5',
            'houseNumber' => '3'
        ]);

        //househodl 1
        Households::create([
            'id'=>'60',
            'sitioID' => '6',
            'houseNumber' => '1'
        ]);
        Households::create([
            'id'=>'61',
            'sitioID' => '6',
            'houseNumber' => '1'
        ]);

        Households::create([
            'id'=>'62',
            'sitioID' => '6',
            'houseNumber' => '1'
        ]);

        //household 2
        Households::create([
            'id'=>'63',
            'sitioID' => '6',
            'houseNumber' => '2'
        ]);
        Households::create([
            'id'=>'64',
            'sitioID' => '6',
            'houseNumber' => '2'
        ]);
        Households::create([
            'id'=>'65',
            'sitioID' => '6',
            'houseNumber' => '2'
        ]);

        //household 3
        Households::create([
            'id'=>'66',
            'sitioID' => '6',
            'houseNumber' => '3'
        ]);
        Households::create([
            'id'=>'67',
            'sitioID' => '6',
            'houseNumber' => '3'
        ]);
        Households::create([
            'id'=>'68',
            'sitioID' => '6',
            'houseNumber' => '3'
        ]);

        //household 1
        Households::create([
            'id'=>'69',
            'sitioID' => '7',
            'houseNumber' => '1'
        ]);
        Households::create([
            'id'=>'70',
            'sitioID' => '7',
            'houseNumber' => '1'
        ]);
        Households::create([
            'id'=>'71',
            'sitioID' => '7',
            'houseNumber' => '1'
        ]);

        //household 2
        Households::create([
            'id'=>'72',
            'sitioID' => '7',
            'houseNumber' => '2'
        ]);
        Households::create([
            'id'=>'73',
            'sitioID' => '7',
            'houseNumber' => '2'
        ]);
        Households::create([
            'id'=>'74',
            'sitioID' => '7',
            'houseNumber' => '2'
        ]);

        //household 1
        Households::create([
            'id'=>'75',
            'sitioID' => '8',
            'houseNumber' => '1'
        ]);
        Households::create([
            'id'=>'76',
            'sitioID' => '8',
            'houseNumber' => '1'
        ]);
        Households::create([
            'id'=>'77',
            'sitioID' => '8',
            'houseNumber' => '1'
        ]);

        //household 2
        Households::create([
            'id'=>'78',
            'sitioID' => '8',
            'houseNumber' => '2'
        ]);
        Households::create([
            'id'=>'79',
            'sitioID' => '8',
            'houseNumber' => '2'
        ]);
        Households::create([
            'id'=>'80',
            'sitioID' => '8',
            'houseNumber' => '2'
        ]);

        //household 1
        Households::create([
            'id'=>'81',
            'sitioID' => '9',
            'houseNumber' => '1'
        ]);
        Households::create([
            'id'=>'82',
            'sitioID' => '9',
            'houseNumber' => '1'
        ]);
        Households::create([
            'id'=>'83',
            'sitioID' => '9',
            'houseNumber' => '1'
        ]);

        //household 2
        Households::create([
            'id'=>'84',
            'sitioID' => '9',
            'houseNumber' => '2'
        ]);
        Households::create([
            'id'=>'85',
            'sitioID' => '9',
            'houseNumber' => '2'
        ]);
        Households::create([
            'id'=>'86',
            'sitioID' => '9',
            'houseNumber' => '2'
        ]);

        //household 1
        Households::create([
            'id'=>'87',
            'sitioID' => '10',
            'houseNumber' => '1'
        ]);
        Households::create([
            'id'=>'88',
            'sitioID' => '10',
            'houseNumber' => '1'
        ]);
        Households::create([
            'id'=>'89',
            'sitioID' => '10',
            'houseNumber' => '1'
        ]);

        //household 2
        Households::create([
            'id'=>'90',
            'sitioID' => '10',
            'houseNumber' => '2'
        ]);
        Households::create([
            'id'=>'91',
            'sitioID' => '10',
            'houseNumber' => '2'
        ]);
        Households::create([
            'id'=>'92',
            'sitioID' => '10',
            'houseNumber' => '2'
        ]);

        //household 1
        Households::create([
            'id'=>'93',
            'sitioID' => '11',
            'houseNumber' => '1'
        ]);
        Households::create([
            'id'=>'94',
            'sitioID' => '11',
            'houseNumber' => '1'
        ]);
        Households::create([
            'id'=>'95',
            'sitioID' => '11',
            'houseNumber' => '1'
        ]);

        //household 2
        Households::create([
            'id'=>'96',
            'sitioID' => '11',
            'houseNumber' => '2'
        ]);
        Households::create([
            'id'=>'97',
            'sitioID' => '11',
            'houseNumber' => '2'
        ]);
        Households::create([
            'id'=>'98',
            'sitioID' => '11',
            'houseNumber' => '2'
        ]);

        //household 3
        Households::create([
            'id'=>'99',
            'sitioID' => '11',
            'houseNumber' => '3'
        ]);
        Households::create([
            'id'=>'100',
            'sitioID' => '11',
            'houseNumber' => '3'
        ]);
        Households::create([
            'id'=>'101',
            'sitioID' => '11',
            'houseNumber' => '3'
        ]);

        //household 4
        Households::create([
            'id'=>'102',
            'sitioID' => '11',
            'houseNumber' => '4'
        ]);
        Households::create([
            'id'=>'103',
            'sitioID' => '11',
            'houseNumber' => '4'
        ]);
        Households::create([
            'id'=>'104',
            'sitioID' => '11',
            'houseNumber' => '4'
        ]);

        //household 5
        Households::create([
            'id'=>'105',
            'sitioID' => '11',
            'houseNumber' => '5A'
        ]);
        Households::create([
            'id'=>'106',
            'sitioID' => '11',
            'houseNumber' => '5A'
        ]);

        Households::create([
            'id'=>'107',
            'sitioID' => '11',
            'houseNumber' => '5A'
        ]);


        //household 5B
        Households::create([
            'id'=>'108',
            'sitioID' => '11',
            'houseNumber' => '5B'
        ]);
        Households::create([
            'id'=>'109',
            'sitioID' => '11',
            'houseNumber' => '5B'
        ]);
        Households::create([
            'id'=>'110',
            'sitioID' => '11',
            'houseNumber' => '5B'
        ]);

        //household 6
        Households::create([
            'id'=>'111',
            'sitioID' => '11',
            'houseNumber' => '6'
        ]);
        Households::create([
            'id'=>'112',
            'sitioID' => '11',
            'houseNumber' => '6'
        ]);
        Households::create([
            'id'=>'113',
            'sitioID' => '11',
            'houseNumber' => '6'
        ]);

        //household 1
        Households::create([
            'id'=>'114',
            'sitioID' => '12',
            'houseNumber' => '1'
        ]);
        Households::create([
            'id'=>'115',
            'sitioID' => '12',
            'houseNumber' => '1'
        ]);
        Households::create([
            'id'=>'116',
            'sitioID' => '12',
            'houseNumber' => '1'
        ]);

        //household 1
        Households::create([
            'id'=>'117',
            'sitioID' => '12',
            'houseNumber' => '1'
        ]);
        Households::create([
            'id'=>'118',
            'sitioID' => '12',
            'houseNumber' => '1'
        ]);
        Households::create([
            'id'=>'119',
            'sitioID' => '12',
            'houseNumber' => '1'
        ]);

        //household 2
        Households::create([
            'id'=>'120',
            'sitioID' => '13',
            'houseNumber' => '2'
        ]);
        Households::create([
            'id'=>'121',
            'sitioID' => '13',
            'houseNumber' => '2'
        ]);
        Households::create([
            'id'=>'122',
            'sitioID' => '13',
            'houseNumber' => '2'
        ]);

        //household 3
        Households::create([
            'id'=>'123',
            'sitioID' => '13',
            'houseNumber' => '3'
        ]);
        Households::create([
            'id'=>'124',
            'sitioID' => '13',
            'houseNumber' => '3'
        ]);
        Households::create([
            'id'=>'125',
            'sitioID' => '13',
            'houseNumber' => '3'
        ]);

        //household 1
        Households::create([
            'id'=>'126',
            'sitioID' => '14',
            'houseNumber' => '1'
        ]);
        Households::create([
            'id'=>'127',
            'sitioID' => '14',
            'houseNumber' => '1'
        ]);
        Households::create([
            'id'=>'128',
            'sitioID' => '14',
            'houseNumber' => '1'
        ]);

        //household 2
        Households::create([
            'id'=>'129',
            'sitioID' => '14',
            'houseNumber' => '2'
        ]);
        
        Households::create([
            'id'=>'130',
            'sitioID' => '14',
            'houseNumber' => '2'
        ]);
        Households::create([
            'id'=>'131',
            'sitioID' => '14',
            'houseNumber' => '2'
        ]);
    }
}
