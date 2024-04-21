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


        //22 - 46 47 48
        ResidentList::create([
            'residentID'=>'46',
            'houseID'=>'22',
            'houseNumber'=>'2A',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'47',
            'houseID'=>'22',
            'houseNumber'=>'2A',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        ResidentList::create([
            'residentID'=>'48',
            'houseID'=>'22',
            'houseNumber'=>'2A',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        //23 - 49 50 51
        ResidentList::create([
            'residentID'=>'49',
            'houseID'=>'23',
            'houseNumber'=>'2A',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'50',
            'houseID'=>'23',
            'houseNumber'=>'2A',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'51',
            'houseID'=>'23',
            'houseNumber'=>'2A',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        //24 - 52 53 54
        ResidentList::create([
            'residentID'=>'52',
            'houseID'=>'24',
            'houseNumber'=>'2A',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'53',
            'houseID'=>'24',
            'houseNumber'=>'2A',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'54',
            'houseID'=>'24',
            'houseNumber'=>'2A',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);


        //25 - 55 56 57 58
        ResidentList::create([
            'residentID'=>'55',
            'houseID'=>'25',
            'houseNumber'=>'2B',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'56',
            'houseID'=>'25',
            'houseNumber'=>'2B',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'57',
            'houseID'=>'25',
            'houseNumber'=>'2B',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'58',
            'houseID'=>'25',
            'houseNumber'=>'2B',
            'memberNumber'=>4,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        //26 - 59 60 61 62
        ResidentList::create([
            'residentID'=>'59',
            'houseID'=>'26',
            'houseNumber'=>'2B',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'60',
            'houseID'=>'26',
            'houseNumber'=>'2B',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'61',
            'houseID'=>'26',
            'houseNumber'=>'2B',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'62',
            'houseID'=>'26',
            'houseNumber'=>'2B',
            'memberNumber'=>4,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        //27 - 63 64 65 66
        ResidentList::create([
            'residentID'=>'63',
            'houseID'=>'27',
            'houseNumber'=>'2B',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'64',
            'houseID'=>'27',
            'houseNumber'=>'2B',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'65',
            'houseID'=>'27',
            'houseNumber'=>'2B',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'66',
            'houseID'=>'27',
            'houseNumber'=>'2B',
            'memberNumber'=>4,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);


        //28 - 67 68 69
        ResidentList::create([
            'residentID'=>'67',
            'houseID'=>'28',
            'houseNumber'=>'2C',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'68',
            'houseID'=>'28',
            'houseNumber'=>'2C',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'69',
            'houseID'=>'28',
            'houseNumber'=>'2C',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        //29 70 71 72
        ResidentList::create([
            'residentID'=>'70',
            'houseID'=>'29',
            'houseNumber'=>'2C',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'71',
            'houseID'=>'29',
            'houseNumber'=>'2C',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'72',
            'houseID'=>'29',
            'houseNumber'=>'2C',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        //30 - 73 74 75
        ResidentList::create([
            'residentID'=>'73',
            'houseID'=>'30',
            'houseNumber'=>'2C',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'74',
            'houseID'=>'30',
            'houseNumber'=>'2C',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'75',
            'houseID'=>'30',
            'houseNumber'=>'2C',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        //31 - 76 77 78 79 80
        ResidentList::create([
            'residentID'=>'76',
            'houseID'=>'31',
            'houseNumber'=>'3',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'77',
            'houseID'=>'31',
            'houseNumber'=>'3',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'78',
            'houseID'=>'31',
            'houseNumber'=>'3',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'79',
            'houseID'=>'31',
            'houseNumber'=>'3',
            'memberNumber'=>4,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'80',
            'houseID'=>'31',
            'houseNumber'=>'3',
            'memberNumber'=>5,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        //32 81 82 83 84 85
        ResidentList::create([
            'residentID'=>'81',
            'houseID'=>'32',
            'houseNumber'=>'3',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'82',
            'houseID'=>'32',
            'houseNumber'=>'3',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'83',
            'houseID'=>'32',
            'houseNumber'=>'3',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'84',
            'houseID'=>'32',
            'houseNumber'=>'3',
            'memberNumber'=>4,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'85',
            'houseID'=>'32',
            'houseNumber'=>'3',
            'memberNumber'=>5,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        //33 86 87 88 89 90
        ResidentList::create([
            'residentID'=>'86',
            'houseID'=>'33',
            'houseNumber'=>'3',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'87',
            'houseID'=>'33',
            'houseNumber'=>'3',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'88',
            'houseID'=>'33',
            'houseNumber'=>'3',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'89',
            'houseID'=>'33',
            'houseNumber'=>'3',
            'memberNumber'=>4,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'90',
            'houseID'=>'33',
            'houseNumber'=>'3',
            'memberNumber'=>5,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        //34 91 92 93 94 95
        ResidentList::create([
            'residentID'=>'91',
            'houseID'=>'34',
            'houseNumber'=>'4',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'92',
            'houseID'=>'34',
            'houseNumber'=>'4',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'93',
            'houseID'=>'34',
            'houseNumber'=>'4',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'94',
            'houseID'=>'34',
            'houseNumber'=>'4',
            'memberNumber'=>4,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'95',
            'houseID'=>'34',
            'houseNumber'=>'4',
            'memberNumber'=>5,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        //35 96 97 98 99 100
        ResidentList::create([
            'residentID'=>'96',
            'houseID'=>'35',
            'houseNumber'=>'4',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'97',
            'houseID'=>'35',
            'houseNumber'=>'4',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'98',
            'houseID'=>'35',
            'houseNumber'=>'4',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'99',
            'houseID'=>'35',
            'houseNumber'=>'4',
            'memberNumber'=>4,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);
        ResidentList::create([
            'residentID'=>'100',
            'houseID'=>'35',
            'houseNumber'=>'4',
            'memberNumber'=>5,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);

        //36 101 102 103
        ResidentList::create([
            'residentID' => '101',
            'houseID' => '36',
            'houseNumber'=>'5',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);   
        ResidentList::create([
            'residentID' => '102',
            'houseID' => '36',
            'houseNumber'=>'5',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);   
        ResidentList::create([
            'residentID' => '103',
            'houseID' => '36',
            'houseNumber'=>'5',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);   
        //37 104 105 106
        ResidentList::create([
            'residentID' => '104',
            'houseID' => '37',
            'houseNumber'=>'5',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);   
        ResidentList::create([
            'residentID' => '105',
            'houseID' => '37',
            'houseNumber'=>'5',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);   
        ResidentList::create([
            'residentID' => '106',
            'houseID' => '37',
            'houseNumber'=>'5',
            'memberNumber'=>3,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);   
        //38 107 108 109
        ResidentList::create([
            'residentID' => '107',
            'houseID' => '38',
            'houseNumber'=>'5',
            'memberNumber'=>1,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);   
        ResidentList::create([
            'residentID' => '108',
            'houseID' => '38',
            'houseNumber'=>'5',
            'memberNumber'=>2,
            'createdBy'=>2,
            'revisedBy'=>2,
        ]);   
        ResidentList::create([
            'residentID' => '109',
            'houseID' => '38',
            'houseNumber'=>'5',
            'memberNumber'=>3,
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
