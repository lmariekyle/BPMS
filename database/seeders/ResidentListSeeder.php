<?php

namespace Database\Seeders;

use App\Models\ResidentList;
use Illuminate\Database\Seeder;

class ResidentListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin
        ResidentList::create([
            'residentID'=>'1',
            'houseID'=>'1',
            'houseNumber'=>1,
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        //Andres
        ResidentList::create([
            'residentID' => '2',
            'houseID' => '2',
            'houseNumber'=>'1',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Rio
        ResidentList::create([
            'residentID' => '3',
            'houseID' => '2',
            'houseNumber'=>'1',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Miles
        ResidentList::create([
            'residentID' => '4',
            'houseID' => '2',
            'houseNumber'=>'1',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Andres
        ResidentList::create([
            'residentID' => '5',
            'houseID' => '3',
            'houseNumber'=>'1',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Rio
        ResidentList::create([
            'residentID' => '6',
            'houseID' => '3',
            'houseNumber'=>'1',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Miles
        ResidentList::create([
            'residentID' => '7',
            'houseID' => '3',
            'houseNumber'=>'1',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Andres
        ResidentList::create([
            'residentID' => '8',
            'houseID' => '4',
            'houseNumber'=>'1',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Rio
        ResidentList::create([
            'residentID' => '9',
            'houseID' => '4',
            'houseNumber'=>'1',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Miles
        ResidentList::create([
            'residentID' => '10',
            'houseID' => '4',
            'houseNumber'=>'1',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Joseph
        ResidentList::create([
            'residentID' => '11',
            'houseID' => '4',
            'houseNumber'=>'1',
            'memberNumber'=>4,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        //Gwen
        ResidentList::create([
            'residentID' => '12',
            'houseID' => '5',
            'houseNumber'=>'2',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //James
        ResidentList::create([
            'residentID' => '13',
            'houseID' => '5',
            'houseNumber'=>'2',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Gwen
        ResidentList::create([
            'residentID' => '14',
            'houseID' => '6',
            'houseNumber'=>'2',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //James
        ResidentList::create([
            'residentID' => '15',
            'houseID' => '6',
            'houseNumber'=>'2',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Gwen
        ResidentList::create([
            'residentID' => '16',
            'houseID' => '7',
            'houseNumber'=>'2',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //James
        ResidentList::create([
            'residentID' => '17',
            'houseID' => '7',
            'houseNumber'=>'2',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        //Francine
        ResidentList::create([
            'residentID'=>'18',
            'houseID'=>'8',
            'houseNumber'=>'3A',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        
        //Juan
        ResidentList::create([
            'residentID'=>'19',
            'houseID'=>'8',
            'houseNumber'=>'3A',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Francine
        ResidentList::create([
            'residentID'=>'20',
            'houseID'=>'10',
            'houseNumber'=>'3A',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        
        //Juan
        ResidentList::create([
            'residentID'=>'21',
            'houseID'=>'10',
            'houseNumber'=>'3A',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Francine
        ResidentList::create([
            'residentID'=>'22',
            'houseID'=>'12',
            'houseNumber'=>'3A',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        
        //Juan
        ResidentList::create([
            'residentID'=>'23',
            'houseID'=>'12',
            'houseNumber'=>'3A',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Frances
        ResidentList::create([
            'residentID'=>'24',
            'houseID'=>'12',
            'houseNumber'=>'3A',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        //Emily
        ResidentList::create([
            'residentID'=>'25',
            'houseID'=>'9',
            'houseNumber'=>'3B',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'26',
            'houseID'=>'11',
            'houseNumber'=>'3B',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'27',
            'houseID'=>'13',
            'houseNumber'=>'3B',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Janice
        ResidentList::create([
            'residentID'=>'28',
            'houseID'=>'13',
            'houseNumber'=>'3B',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        //Zen
        ResidentList::create([
            'residentID'=>'29',
            'houseID'=>'14',
            'houseNumber'=>'4',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Milo
        ResidentList::create([
            'residentID'=>'30',
            'houseID'=>'14',
            'houseNumber'=>'4',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Zen
        ResidentList::create([
            'residentID'=>'31',
            'houseID'=>'15',
            'houseNumber'=>'4',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Milo
        ResidentList::create([
            'residentID'=>'32',
            'houseID'=>'15',
            'houseNumber'=>'4',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Emily
        ResidentList::create([
            'residentID'=>'33',
            'houseID'=>'16',
            'houseNumber'=>'5',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'34',
            'houseID'=>'17',
            'houseNumber'=>'5',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'35',
            'houseID'=>'18',
            'houseNumber'=>'5',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        //Peter
        ResidentList::create([
            'residentID' => '36',
            'houseID' => '19',
            'houseNumber'=>'1',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //MJ
        ResidentList::create([
            'residentID' => '37',
            'houseID' => '19',
            'houseNumber'=>'1',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //PedroPascal
        ResidentList::create([
            'residentID'=>'38',
            'houseID'=>'19',
            'houseNumber'=>'1',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Peter
        ResidentList::create([
            'residentID' => '39',
            'houseID' => '20',
            'houseNumber'=>'1',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //MJ
        ResidentList::create([
            'residentID' => '40',
            'houseID' => '20',
            'houseNumber'=>'1',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //PedroPascal
        ResidentList::create([
            'residentID'=>'41',
            'houseID'=>'20',
            'houseNumber'=>'1',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //Peter
        ResidentList::create([
            'residentID' => '42',
            'houseID' => '21',
            'houseNumber'=>'1',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //MJ
        ResidentList::create([
            'residentID' => '43',
            'houseID' => '21',
            'houseNumber'=>'1',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //PedroPascal
        ResidentList::create([
            'residentID'=>'44',
            'houseID'=>'21',
            'houseNumber'=>'1',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);


        ResidentList::create([
            'residentID'=>'45',
            'houseID'=>'22',
            'houseNumber'=>3,
            // 'householdHead'=>1,
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        ResidentList::create([
            'residentID'=>'46',
            'houseID'=>'23',
            'houseNumber'=>3,
            // 'householdHead'=>0,
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        ResidentList::create([
            'residentID'=>'47',
            'houseID'=>'24',
            'houseNumber'=>3,
            // 'householdHead'=>0,
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        ResidentList::create([
            'residentID'=>'48',
            'houseID'=>'26',
            'houseNumber'=>3,
            // 'householdHead'=>0,
            'memberNumber'=>4,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        ResidentList::create([
            'residentID'=>'49',
            'houseID'=>'28',
            'houseNumber'=>3,
            // 'householdHead'=>0,
            'memberNumber'=>5,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        
        ResidentList::create([
            'residentID' => '50',
            'houseID' => '39',
            'houseNumber'=>2,
            //'householdHead'=>1,
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);   
        
/*        ResidentList::create([
            'residentID' => '51',
            'houseID' => '40',
            'houseNumber'=>2,
            //'householdHead'=>1,
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);   
        ResidentList::create([
            'residentID' => '52',
            'houseID' => '40',
            'houseNumber'=>2,
            //'householdHead'=>1,
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]); */  
    }
}
