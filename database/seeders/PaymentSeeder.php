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
        Payment::create([
            'paymentMethod' => 'GCash',
            'accountNumber' => '--',
            'amountPaid' => '100',
            'paymentStatus' => 'Paid',
            'receivedBy' => '--',
            'paymentDate' => '2023-03-06',
            'referenceNumber' => '1234567890',
            'screenshot' => '--',
            'remarks' => '--',
        ]);

        DocumentDetails::create([
            'requesteeFName' => 'Peter',
            'requesteeMName' => 'Benjamin',
            'requesteeLName' => 'Parker',
            'requesteeEmail' => 'parker@bpms.com',
            'requesteeContactNumber' => '1234567890',
            'requestPurpose' => 'Employment',
            'file' => 'file.pdf',
        ]);

        Transaction::create([
            'documentID' => '1',
            'userID' => '4',
            'paymentID' => '1',
            'detailID' => '1',
            'docNumber' => '--',
            'serviceStatus' => 'Paid',
            'endorsedBy' => '--',
            'endorsedOn' => '2023-03-04',
            'approvedBy' => '--',
            'approvedOn' => '2023-03-05',
            'releasedBy' => '--',
            'releasedOn' => '2023-03-06',
            'remarks' => '--',
        ]);

        Payment::create([
            'paymentMethod' => 'GCash',
            'accountNumber' => '--',
            'amountPaid' => '100',
            'paymentStatus' => 'Paid',
            'receivedBy' => '--',
            'paymentDate' => '2023-06-27',
            'referenceNumber' => '1234567890',
            'screenshot' => '--',
            'remarks' => '--',
        ]);

        DocumentDetails::create([
            'requesteeFName' => 'Peter',
            'requesteeMName' => 'Benjamin',
            'requesteeLName' => 'Parker',
            'requesteeEmail' => 'parker@bpms.com',
            'requesteeContactNumber' => '1234567890',
            'requestPurpose' => 'Scholarship',
            'file' => 'file.pdf',
        ]);

        Transaction::create([
            'documentID' => '3',
            'userID' => '4',
            'paymentID' => '2',
            'detailID' => '2',
            'docNumber' => '--',
            'serviceStatus' => 'Paid',
            'endorsedBy' => '--',
            'endorsedOn' => '2023-06-25',
            'approvedBy' => '--',
            'approvedOn' => '2023-06-26',
            'releasedBy' => '--',
            'releasedOn' => '2023-06-27',
            'remarks' => '--',
        ]);

        Payment::create([
            'paymentMethod' => 'GCash',
            'accountNumber' => '--',
            'amountPaid' => '100',
            'paymentStatus' => 'Paid',
            'receivedBy' => '--',
            'paymentDate' => '2023-08-02',
            'referenceNumber' => '1234567890',
            'screenshot' => '--',
            'remarks' => '--',
        ]);

        DocumentDetails::create([
            'requesteeFName' => 'Peter',
            'requesteeMName' => 'Benjamin',
            'requesteeLName' => 'Parker',
            'requesteeEmail' => 'parker@bpms.com',
            'requesteeContactNumber' => '1234567890',
            'requestPurpose' => 'Eligibility',
            'file' => 'file.pdf',
        ]);

        Transaction::create([
            'documentID' => '2',
            'userID' => '4',
            'paymentID' => '3',
            'detailID' => '3',
            'docNumber' => '--',
            'serviceStatus' => 'Paid',
            'endorsedBy' => '--',
            'endorsedOn' => '2023-07-31',
            'approvedBy' => '--',
            'approvedOn' => '2023-08-01',
            'releasedBy' => '--',
            'releasedOn' => '2023-08-02',
            'remarks' => '--',
        ]);

        Payment::create([
            'paymentMethod' => 'GCash',
            'accountNumber' => '--',
            'amountPaid' => '100',
            'paymentStatus' => 'Paid',
            'receivedBy' => '--',
            'paymentDate' => '2023-11-03',
            'referenceNumber' => '1234567890',
            'screenshot' => '--',
            'remarks' => '--',
        ]);

        DocumentDetails::create([
            'requesteeFName' => 'Peter',
            'requesteeMName' => 'Benjamin',
            'requesteeLName' => 'Parker',
            'requesteeEmail' => 'parker@bpms.com',
            'requesteeContactNumber' => '1234567890',
            'requestPurpose' => 'Reason',
            'file' => 'file.pdf',
        ]);

        Transaction::create([
            'documentID' => '5',
            'userID' => '4',
            'paymentID' => '4',
            'detailID' => '4',
            'docNumber' => '--',
            'serviceStatus' => 'Paid',
            'endorsedBy' => '--',
            'endorsedOn' => '2023-11-01',
            'approvedBy' => '--',
            'approvedOn' => '2023-11-02',
            'releasedBy' => '--',
            'releasedOn' => '2023-11-03',
            'remarks' => '--',
        ]);

        Payment::create([
            'paymentMethod' => 'OnSite',
            'accountNumber' => '--',
            'amountPaid' => '100',
            'paymentStatus' => 'Paid',
            'receivedBy' => '--',
            'paymentDate' => '2023-01-05',
            'referenceNumber' => '1234567890',
            'screenshot' => '--',
            'remarks' => '--',
        ]);

        DocumentDetails::create([
            'requesteeFName' => 'Peter',
            'requesteeMName' => 'Benjamin',
            'requesteeLName' => 'Parker',
            'requesteeEmail' => 'parker@bpms.com',
            'requesteeContactNumber' => '1234567890',
            'requestPurpose' => 'Reason',
            'file' => 'file.pdf',
        ]);

        Transaction::create([
            'documentID' => '1',
            'userID' => '4',
            'paymentID' => '5',
            'detailID' => '5',
            'docNumber' => '--',
            'serviceStatus' => 'Paid',
            'endorsedBy' => '--',
            'endorsedOn' => '2023-01-02',
            'approvedBy' => '--',
            'approvedOn' => '2023-01-03',
            'releasedBy' => '--',
            'releasedOn' => '2023-01-05',
            'remarks' => '--',
        ]);

        Payment::create([
            'paymentMethod' => 'GCash',
            'accountNumber' => '--',
            'amountPaid' => '100',
            'paymentStatus' => 'Paid',
            'receivedBy' => '--',
            'paymentDate' => '2024-01-05',
            'referenceNumber' => '1234567890',
            'screenshot' => '--',
            'remarks' => '--',
        ]);

        DocumentDetails::create([
            'requesteeFName' => 'Peter',
            'requesteeMName' => 'Benjamin',
            'requesteeLName' => 'Parker',
            'requesteeEmail' => 'parker@bpms.com',
            'requesteeContactNumber' => '1234567890',
            'requestPurpose' => 'Reason',
            'file' => 'file.pdf',
        ]);

        Transaction::create([
            'documentID' => '1',
            'userID' => '4',
            'paymentID' => '6',
            'detailID' => '6',
            'docNumber' => '--',
            'serviceStatus' => 'Paid',
            'endorsedBy' => '--',
            'endorsedOn' => '2024-01-02',
            'approvedBy' => '--',
            'approvedOn' => '2024-01-03',
            'releasedBy' => '--',
            'releasedOn' => '2024-01-05',
            'remarks' => '--',
        ]);

        Payment::create([
            'paymentMethod' => 'GCash',
            'accountNumber' => '--',
            'amountPaid' => '100',
            'paymentStatus' => 'Refunded',
            'receivedBy' => '--',
            'paymentDate' => '2023-12-05',
            'referenceNumber' => '1234567890',
            'screenshot' => '--',
            'remarks' => '--',
        ]);

        DocumentDetails::create([
            'requesteeFName' => 'Peter',
            'requesteeMName' => 'Benjamin',
            'requesteeLName' => 'Parker',
            'requesteeEmail' => 'parker@bpms.com',
            'requesteeContactNumber' => '1234567890',
            'requestPurpose' => 'Reason',
            'file' => 'file.pdf',
        ]);

        Transaction::create([
            'documentID' => '1',
            'userID' => '4',
            'paymentID' => '7',
            'detailID' => '7',
            'docNumber' => '--',
            'serviceStatus' => 'Refunded',
            'endorsedBy' => '--',
            'endorsedOn' => '2023-12-02',
            'approvedBy' => '--',
            'approvedOn' => '2023-12-03',
            'releasedBy' => '--',
            'releasedOn' => '2023-12-05',
            'remarks' => '--',
        ]);
    }
}