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
            'paymentMethod' => 'GCash',
            'orNumber' => '--',
            'amountPaid' => '100.00',
            'paymentStatus' => 'Paid',
            'receivedBy' => '--',
            'paymentDate' => '2023-08-04',
            'referenceNumber' => '1234567890',
            'screenshot' => '--',
            'remarks' => '--',
        ]);

        DocumentDetails::create([
            'requesteeFName' => 'John Carlo',
            'requesteeMName' => 'Caballo',
            'requesteeLName' => 'Candella',
            'requesteeEmail' => 'genericEmail@gmail.com',
            'requesteeContactNumber' => '09876541230',
            'requestPurpose' => 'Employment',
            'file' => 'file.pdf',
        ]);

        Transaction::create([
            'documentID' => '1',
            'userID' => '8',
            'paymentID' => '1',
            'detailID' => '1',
            'docNumber' => '--',
            'serviceStatus' => 'Paid',
            'endorsedBy' => '--',
            'endorsedOn' => '2023-08-02',
            'approvedBy' => '--',
            'approvedOn' => '2023-08-03',
            'releasedBy' => '--',
            'releasedOn' => '2023-08-06',
            'remarks' => '--',
        ]);

        //Payment #2
        Payment::create([
            'paymentMethod' => 'GCash',
            'orNumber' => '--',
            'amountPaid' => '100.00',
            'paymentStatus' => 'Paid',
            'receivedBy' => '--',
            'paymentDate' => '2023-11-20',
            'referenceNumber' => '1234567890',
            'screenshot' => '--',
            'remarks' => '--',
        ]);

        DocumentDetails::create([
            'requesteeFName' => 'John Carlo',
            'requesteeMName' => 'Caballo',
            'requesteeLName' => 'Candella',
            'requesteeEmail' => 'genericEmail@gmail.com',
            'requesteeContactNumber' => '09876541230',
            'requestPurpose' => 'Employment',
            'file' => 'file.pdf',
        ]);

        Transaction::create([
            'documentID' => '4',
            'userID' => '8',
            'paymentID' => '2',
            'detailID' => '2',
            'docNumber' => '--',
            'serviceStatus' => 'Paid',
            'endorsedBy' => '--',
            'endorsedOn' => '2023-11-19',
            'approvedBy' => '--',
            'approvedOn' => '2023-11-24',
            'releasedBy' => '--',
            'releasedOn' => '2023-11-29',
            'remarks' => '--',
        ]);

        //Payment #3
        Payment::create([
            'paymentMethod' => 'GCash',
            'orNumber' => '--',
            'amountPaid' => '530.00',
            'paymentStatus' => 'Paid',
            'receivedBy' => '--',
            'paymentDate' => '2024-01-20',
            'referenceNumber' => '1234567890',
            'screenshot' => '--',
            'remarks' => '--',
        ]);

        DocumentDetails::create([
            'requesteeFName' => 'John Carlo',
            'requesteeMName' => 'Caballo',
            'requesteeLName' => 'Candella',
            'requesteeEmail' => 'genericEmail@gmail.com',
            'requesteeContactNumber' => '09876541230',
            'requestPurpose' => 'Employment',
            'file' => 'file.pdf',
        ]);

        Transaction::create([
            'documentID' => '2',
            'userID' => '8',
            'paymentID' => '3',
            'detailID' => '3',
            'docNumber' => '--',
            'serviceStatus' => 'Paid',
            'endorsedBy' => '--',
            'endorsedOn' => '2024-01-20',
            'approvedBy' => '--',
            'approvedOn' => '2024-01-22',
            'releasedBy' => '--',
            'releasedOn' => '2024-01-25',
            'remarks' => '--',
        ]);
    }
}