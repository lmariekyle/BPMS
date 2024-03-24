<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::create([
            'docName' => 'Good Moral Character',
            'docType' => 'Barangay Certificate',
            'docTemplate' => 'CertificateTemplate',
            'fee' => '100.0',
            'requirements' => 'Residence Certificate',

            'createdBy' => 'A-001',
            'revisedBy' => 'A-001',
        ]);

        Document::create([
            'docName' => 'Disco',
            'docType' => 'Barangay Certificate',
            'docTemplate' => 'CertificateTemplate',
            'fee' => '100.0',
            'requirements' => 'Residence Certificate',

            'createdBy' => 'A-001',
            'revisedBy' => 'A-001',
        ]);

        Document::create([
            'docName' => 'Tigbakay',
            'docType' => 'Barangay Certificate',
            'docTemplate' => 'CertificateTemplate',
            'fee' => '100.0',
            'requirements' => 'Residence Certificate',

            'createdBy' => 'A-001',
            'revisedBy' => 'A-001',
        ]);

        Document::create([
            'docName' => 'Senior Citizen',
            'docType' => 'Barangay Certificate',
            'docTemplate' => 'CertificateTemplate',
            'fee' => '100.0',
            'requirements' => 'Residence Certificate',

            'createdBy' => 'A-001',
            'revisedBy' => 'A-001',
        ]);

        Document::create([
            'docName' => 'Financial Assistance',
            'docType' => 'Barangay Certificate',
            'docTemplate' => 'CertificateTemplate',
            'fee' => '100.0',
            'requirements' => 'Residence Certificate',

            'createdBy' => 'A-001',
            'revisedBy' => 'A-001',
        ]);

        Document::create([
            'docName' => 'Low Income',
            'docType' => 'Barangay Certificate',
            'docTemplate' => 'CertificateTemplate',
            'fee' => '100.0',
            'requirements' => 'Residence Certificate',

            'createdBy' => 'A-001',
            'revisedBy' => 'A-001',
        ]);

        Document::create([
            'docName' => 'Indigency',
            'docType' => 'Barangay Certificate',
            'docTemplate' => 'CertificateTemplate',
            'fee' => '100.0',
            'requirements' => 'Residence Certificate',

            'createdBy' => 'A-001',
            'revisedBy' => 'A-001',
        ]);

        Document::create([
            'docName' => 'Late Registration',
            'docType' => 'Barangay Certificate',
            'docTemplate' => 'CertificateTemplate',
            'fee' => '100.0',
            'requirements' => 'Residence Certificate',

            'createdBy' => 'A-001',
            'revisedBy' => 'A-001',
        ]);

        Document::create([
            'docName' => 'Cutting/Transport of Cut Trees',
            'docType' => 'Barangay Certificate',
            'docTemplate' => 'CertificateTemplate',
            'fee' => '100.0',
            'requirements' => 'Residence Certificate',

            'createdBy' => 'A-001',
            'revisedBy' => 'A-001',
        ]);

        Document::create([
            'docName' => 'Others',
            'docType' => 'Barangay Certificate',
            'docTemplate' => 'CertificateTemplate',
            'fee' => '100.0',
            'requirements' => 'Residence Certificate',

            'createdBy' => 'A-001',
            'revisedBy' => 'A-001',
        ]);

        Document::create([
            'docName' => "Business/Mayor's Permit",
            'docType' => 'Barangay Clearance',
            'docTemplate' => 'ClearanceTemplate',
            'fee' => '100.0',
            'requirements' => 'Cedula, Copy of Previous Permit, Tax Declaration, Affidavit of Consent',

            'createdBy' => 'A-001',
            'revisedBy' => 'A-001',
        ]);

        Document::create([
            'docName' => 'Building Permit',
            'docType' => 'Barangay Clearance',
            'docTemplate' => 'ClearanceTemplate',
            'fee' => '100.0',
            'requirements' => 'Cedula, Copy of Previous Permit, Tax Declaration, Affidavit of Consent',

            'createdBy' => 'A-001',
            'revisedBy' => 'A-001',
        ]);

        Document::create([
            'docName' => 'Fencing Permit',
            'docType' => 'Barangay Clearance',
            'docTemplate' => 'ClearanceTemplate',
            'fee' => '100.0',
            'requirements' => 'Cedula, Copy of Previous Permit, Tax Declaration, Affidavit of Consent',

            'createdBy' => 'A-001',
            'revisedBy' => 'A-001',
        ]);

        Document::create([
            'docName' => 'Electrical Permit',
            'docType' => 'Barangay Clearance',
            'docTemplate' => 'ClearanceTemplate',
            'fee' => '100.0',
            'requirements' => 'Cedula, Copy of Previous Permit, "Tax Declaration, Affidavit of Consent',

            'createdBy' => 'A-001',
            'revisedBy' => 'A-001',
        ]);

        Document::create([
            'docName' => 'Others',
            'docType' => 'Barangay Clearance',
            'docTemplate' => 'ClearanceTemplate',
            'fee' => '100.0',
            'requirements' => 'Cedula, Copy of Previous Permit, Tax Declaration, Affidavit of Consent',

            'createdBy' => 'A-001',
            'revisedBy' => 'A-001',
        ]);

        Document::create([
            'docName' => 'Filing of Lupon Cases',
            'docType' => 'File Complain',
            'docTemplate' => 'ComplaintTemplate',
            'fee' => '100.0',
            'requirements' => 'Personal Appearance of the Complainant',

            'createdBy' => 'A-001',
            'revisedBy' => 'A-001',
        ]);

        Document::create([
            'docName' => 'Account Information Change',
            'docType' => 'Account Information Change',
            'docTemplate' => 'NONE',
            'fee' => '000.0',
            'requirements' => 'Amended Birth Certificate, Certificate of Finality',

            'createdBy' => 'A-001',
            'revisedBy' => 'A-001',
        ]);
    }
}
