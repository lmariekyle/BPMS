<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\DocumentDetails;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Payment #1
        Payment::create([
            'paymentMethod' => 'GCASH',
            'orNumber' => '000001',
            'amountPaid' => '100',
            'paymentStatus' => 'Paid',
            'receivedBy' => '2',
            'paymentDate' => '2023-08-04',
            'referenceNumber' => '8347138123948',
            'screenshot' => 'gcash\screenshot.jpg',
            'remarks' => 'Paid',
        ]);

        DocumentDetails::create([
            'requesteeFName' => 'John Carlo',
            'requesteeMName' => 'Caballo',
            'requesteeLName' => 'Candela',
            'requesteeEmail' => 'ksumho69@gmail.com',
            'requesteeContactNumber' => '09876541230',
            'requestPurpose' => 'Employment',
            'file' => '["candela_663270404ef4a.pdf"]',
        ]);

        Transaction::create([
            'documentID' => '1',
            'userID' => '8',
            'paymentID' => '1',
            'detailID' => '1',
            'docNumber' => '--',
            'serviceStatus' => 'Paid',
            'endorsedBy' => '2',
            'endorsedOn' => '2023-08-02',
            'approvedBy' => '3',
            'approvedOn' => '2023-08-03',
            'releasedBy' => '2',
            'releasedOn' => '2023-08-06',
            'remarks' => 'Complete Requirements',
            'created_at' => '2023-08-02'
        ]);

        //Payment #2
        Payment::create([
            'paymentMethod' => 'GCASH',
            'orNumber' => '000002',
            'amountPaid' => '100',
            'paymentStatus' => 'Refunded',
            'receivedBy' => '2',
            'paymentDate' => '2023-11-20',
            'referenceNumber' => '8347138123948',
            'screenshot' => 'gcash\screenshot.jpg',
            'remarks' => 'Denied',
        ]);

        DocumentDetails::create([
            'requesteeFName' => 'Marjorie',
            'requesteeMName' => 'Lela',
            'requesteeLName' => 'Zammy',
            'requesteeEmail' => 'genericEmail@gmail.com',
            'requesteeContactNumber' => '09876541230',
            'requestPurpose' => 'Employment',
            'file' => '["zammy_663270404ef4a.pdf"]',
        ]);

        Transaction::create([
            'documentID' => '4',
            'userID' => '12',
            'paymentID' => '2',
            'detailID' => '2',
            'docNumber' => '--',
            'serviceStatus' => 'Not Eligible',
            'endorsedBy' => 'Not Applicable',
            'endorsedOn' => '2023-11-19',
            'approvedBy' => 'Not Applicable',
            'approvedOn' => '2023-11-24',
            'releasedBy' => 'Not Applicable',
            'releasedOn' => '2023-11-29',
            'remarks' => 'Lacking Requirements',
            'created_at' => '2023-11-20'
        ]);

        //Payment #3
        Payment::create([
            'paymentMethod' => 'Cash-on-PickUp',
            'orNumber' => '000003',
            'amountPaid' => '530',
            'paymentStatus' => 'Paid',
            'receivedBy' => '2',
            'paymentDate' => '2024-01-20',
            'referenceNumber' => 'Not Applicable',
            'screenshot' => NULL,
            'remarks' => '--',
        ]);

        DocumentDetails::create([
            'requesteeFName' => 'John Carlo',
            'requesteeMName' => 'Caballo',
            'requesteeLName' => 'Candela',
            'requesteeEmail' => 'genericEmail@gmail.com',
            'requesteeContactNumber' => '09876541230',
            'requestPurpose' => 'Employment',
            'file' => '["candela_663270404ef4a.pdf"]',
        ]);

        Transaction::create([
            'documentID' => '2',
            'userID' => '8',
            'paymentID' => '3',
            'detailID' => '3',
            'docNumber' => '--',
            'serviceStatus' => 'Paid',
            'endorsedBy' => '2',
            'endorsedOn' => '2024-01-20',
            'approvedBy' => '3',
            'approvedOn' => '2024-01-22',
            'releasedBy' => '2',
            'releasedOn' => '2024-01-25',
            'remarks' => '--',
            'created_at' => '2024-01-30'
        ]);

        // Payment #4
        Payment::create([
            'paymentMethod' => 'GCASH',
            'orNumber' => '000004', 
            'amountPaid' => '100.00',
            'paymentStatus' => 'Paid',
            'receivedBy' => '2',
            'paymentDate' => '2024-02-10',
            'referenceNumber' => '8347138123948',
            'screenshot' => 'gcash\screenshot.jpg',
            'remarks' => '--',
        ]);

        DocumentDetails::create([
            'requesteeFName' => 'Marjorie',
            'requesteeMName' => 'Lela',
            'requesteeLName' => 'Zammy',
            'requesteeEmail' => 'genericEmail@gmail.com',
            'requesteeContactNumber' => '09876541230',
            'requestPurpose' => 'Employment',
            'file' => '["zammy_663270404ef4a.pdf"]',
        ]);



        Transaction::create([
            'documentID' => '1',
            'userID' => '12',
            'paymentID' => '4',
            'detailID' => '4',
            'docNumber' => '--',
            'serviceStatus' => 'Paid',
            'endorsedBy' => '2',
            'endorsedOn' => '2024-02-10',
            'approvedBy' => '3',
            'approvedOn' => '2024-02-12',
            'releasedBy' => '2',
            'releasedOn' => '2024-02-15',
            'remarks' => '--',
            'created_at' => '2024-02-10'
        ]);

        // Payment #5
        Payment::create([
            'paymentMethod' => 'Cash-on-PickUp',
            'orNumber' => '000005',
            'amountPaid' => '100.00',
            'paymentStatus' => 'Paid',
            'receivedBy' => '2',
            'paymentDate' => '2024-03-05',
            'referenceNumber' => 'Not Applicable',
            'screenshot' => NULL,
            'remarks' => '--',
        ]);

        DocumentDetails::create([
            'requesteeFName' => 'John Carlo',
            'requesteeMName' => 'Caballo',
            'requesteeLName' => 'Candela',
            'requesteeEmail' => 'genericEmail@gmail.com',
            'requesteeContactNumber' => '09876541230',
            'requestPurpose' => 'Employment',
            'file' => '["candela_663270404ef4a.pdf"]',
        ]);


        Transaction::create([
            'documentID' => '5',
            'userID' => '8',
            'paymentID' => '5',
            'detailID' => '5',
            'docNumber' => '--',
            'serviceStatus' => 'Paid',
            'endorsedBy' => '2',
            'endorsedOn' => '2024-03-05',
            'approvedBy' => '3',
            'approvedOn' => '2024-03-07',
            'releasedBy' => '2',
            'releasedOn' => '2024-03-10',
            'remarks' => '--',
            'created_at' => '2024-03-05',
        ]);

        // Payment #6
        Payment::create([
            'paymentMethod' => 'GCASH',
            'orNumber' => '000006',
            'amountPaid' => '330.00',
            'paymentStatus' => 'Refunded',
            'receivedBy' => '2',
            'paymentDate' => '2024-01-30',
            'referenceNumber' => '8347138123948',
            'screenshot' => 'gcash\screenshot.jpg',
            'remarks' => '--',
        ]);

        DocumentDetails::create([
            'requesteeFName' => 'Marjorie',
            'requesteeMName' => 'Lela',
            'requesteeLName' => 'Zammy',
            'requesteeEmail' => 'genericEmail@gmail.com',
            'requesteeContactNumber' => '09876541230',
            'requestPurpose' => 'Employment',
            'file' => '["zammy_663270404ef4a.pdf"]',
        ]);



        Transaction::create([
            'documentID' => '6',
            'userID' => '12',
            'paymentID' => '6',
            'detailID' => '6',
            'docNumber' => '--',
            'serviceStatus' => 'Denied',
            'endorsedBy' => '2',
            'endorsedOn' => '2024-01-30',
            'approvedBy' => '3',
            'approvedOn' => '2024-02-01',
            'releasedBy' => '2',
            'releasedOn' => '2024-02-05',
            'remarks' => '--',
            'created_at' => '2024-01-30'
        ]);

        // Payment #7
        Payment::create([
            'paymentMethod' => 'Cash-on-PickUp',
            'orNumber' => '000007',
            'amountPaid' => '100.00',
            'paymentStatus' => 'Not Applicable',
            'receivedBy' => '2',
            'paymentDate' => '2024-03-15',
            'referenceNumber' => 'Not Applicable',
            'screenshot' => NULL,
            'remarks' => '--',
        ]);

        DocumentDetails::create([
            'requesteeFName' => 'Marjorie',
            'requesteeMName' => 'Lela',
            'requesteeLName' => 'Zammy',
            'requesteeEmail' => 'genericEmail@gmail.com',
            'requesteeContactNumber' => '09876541230',
            'requestPurpose' => 'Employment',
            'file' => '["zammy_663270404ef4a.pdf"]',
        ]);



        Transaction::create([
            'documentID' => '4',
            'userID' => '12',
            'paymentID' => '7',
            'detailID' => '7',
            'docNumber' => '--',
            'serviceStatus' => 'Denied',
            'endorsedBy' => '2',
            'endorsedOn' => '2024-03-15',
            'approvedBy' => '3',
            'approvedOn' => '2024-03-17',
            'releasedBy' => '2',
            'releasedOn' => '2024-03-20',
            'remarks' => '--',
            'created_at' => '2024-03-15'
        ]);
    }
}