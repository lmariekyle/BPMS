<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$doc->docType}}</title>
  <style>
    /* page[size="A4"]{
      width: 790px;
      height: 1000px;
    } */
    page{
      background: white;
      display: block;
      margin: 0 auto;
      width: 790px;
      height: 1000px;
    }
    .document {
  display: flex;
  flex-direction: column;
  background-color: white;
  width: 100%;
  height: max-content;
  justify-content: center;
  align-items: center;
}
</style>
</head>
<body>

<div class="document">
  <page size="A4">
    <div style="margin-top:12px;">
      <img src="images/BarangayPobHeader.png" width="1040" border="0" alt="" style="display: block; width: 100%; max-width: 640px; margin-left:42px;">
    </div>
    <hr style="border: 1px solid black; margin-top: 2px;">
    <div style="margin-top:32px; align-self:center;">
      <h2 style="font-family: 'Playfair Display', serif;font-size: 24px; font-weight:600; text-align: center; letter-spacing: 0.1em;">Office of the Barangay Poblacion</h2>
    </div>  
    @if($doc->docType == 'Barangay Certificate')
      <div style="margin-top:32px;">
      @if($doc->docName == 'Good Moral Character')
         @include('documents.goodmoral')
      @elseif($doc->docName == 'Indigency')
        @include('documents.indigency')
      @elseif($doc->docName == 'Disco')
        @include('documents.disco')
      @endif
    @elseif($doc->docType == 'Barangay Clearance')
      @if($doc->docName == 'Business Permit')
         @include('documents.businesspermit')
      @endif
    @endif
    <div style="display: flex;flex-direction: column;margin-top: 54px; margin-right:2rem">
  <hr style="align-self: end;border: 2px solid black;border-top-width: 2px;width: 250px;margin-right: 80px;margin-top: 10px;">
      <p style="text-align: start;margin-left: 30rem;font-family: 'Lora', serif;font-size: 18px;font-weight: 600;">Punong Barangay</p>
    </div>
    <div style="display: flex;flex-direction: column;margin-top: 48px; margin-left: 2rem;">
      <p style=" text-align: start;margin-left: 5px;font-family: 'Lora', serif;font-size: 14px;">Amount Paid : PHP {{$doc->fee}}</p>
      <p style=" text-align: start;margin-left: 5px;font-family: 'Lora', serif;font-size: 14px;">Document Number : {{$transaction->docNumber}}</p>
      <p style="margin-top: 1px;text-align: start;margin-left: 5px;font-family: 'Lora', serif;font-size: 14px;">O.R. No. 000000</p>
      <p style="margin-top: 1px;text-align: start;margin-left: 5px;font-family: 'Lora', serif;font-size: 14px;">CTC No. 000000</p>
      <p style="margin-top: 1px;text-align: start;margin-left: 5px; font-family: 'Lora', serif;font-size: 14px;">Issued at <span style="text-decoration: underline;text-underline-offset: 4px;"> Barangay Poblacion, Dalaguete, Cebu</span></p>
  <p style="margin-top: 1px;text-align: start;margin-left: 5px;font-family: 'Lora', serif;font-size: 14px;">On <span style="text-decoration: underline;text-underline-offset: 4px;">{{$monthWord}} {{$date->day}}, {{$date->year}}</span></p>
      <p style="margin-left: 5px; margin-top: 5px; font-family: 'Lora', serif; font-size: 16px; text-align: start; font-weight: 600;">NOT VALID WITHOUT</p>
    <p style="margin-left: 25px; font-family: 'Lora', serif; font-size: 16px; text-align: start; font-weight: 600;">OFFICIAL SEAL</p>
    </div>
  </page>

</div>
 

</body>
</html>