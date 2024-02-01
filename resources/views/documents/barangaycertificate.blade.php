<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barangay Certificate</title>
  <style>
    page[size="A4"]{
      width: 790px;
      height: 1000px;
    }
    page{
      background: white;
      dispay: block;
      margin: 0 auto;
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
    <img src="https://cdn.useblocks.io/14765/231012_1039_eFv6E9T.png" width="1040" border="0" alt="" style="display: block; width: 100%; max-width: 640px; margin-left:42px;">
    </div>
    <hr style="border: 1px solid black; margin-top: 2px;">
    <div style="margin-top:32px; align-self:center;">
      <h2 style="font-family: 'Playfair Display', serif;font-size: 24px; font-weight:600; text-align: center; letter-spacing: 0.1em;">Office of the Barangay Poblacion</h2>
    </div>  
    <div style="margin-top:32px;">
      <h2 style="font-family: 'Playfair Display', serif; font-size: 28px; font-weight: 600; text-align: center; letter-spacing: 0.1em;">{{$doc->docType}}</h2>
    </div>
    <div style="margin-top:48px;">
      <h2 style="font-family: 'Lora', serif;
  font-size: 18px;
  text-align: start;
  margin-left: 44px;">TO WHOM IT MAY CONCERN,</h2>
    </div>
    <div style="margin-top:32px; width:750px;">
      <h2 style="font-family: 'Lora', serif;
  font-size: 14px;
  text-align: start;
  margin-left: 44px;
  margin-right: 44px;
  text-indent: 22px;">This is to certify that <span style="text-decoration: underline;">{{$requestee->requesteeFName}} {{$requestee->requesteeMName}} {{$requestee->requesteeLName}}</span>, <span style="text-decoration: underline;">age</span> years old, is a resident of Poblacion, Dalaguete, Cebu, of good moral character, law abiding citizen and with good social standing in the community</span></h2>
    </div>
    <div style="margin-top:32px; width:750px;">
      <h2 style="font-family: 'Lora', serif;
  font-size: 14px;
  text-align: start;
  margin-left: 44px;
  margin-right: 44px;
  text-indent: 22px;">It is further certify that the above-mentioned person has no derogatory record in the barangay as to this date.</h2>
    </div>
    <div style="margin-top:32px; width:750px;">
      <h2 style="font-family: 'Lora', serif;
  font-size: 14px;
  text-align: start;
  margin-left: 44px;
  margin-right: 44px;
  text-indent: 22px;">Issued this <span style="text-decoration: underline;">{{$date->day}} </span>of &nbsp;<span style="text-decoration: underline;">{{$date->month}}</span>, <span style="text-decoration: underline;">{{$date->year}}</span> at Poblacion, Dalaguete, Cebu, Philippines upon the request of <span style="text-decoration: underline;">{{$requestee->requesteeFName}} {{$requestee->requesteeMName}} {{$requestee->requesteeLName}}</span> for <span style="text-decoration: underline;">{{$requestee->requestPurpose}}</span> purposes.</h2>
    </div>
    <div style="display: flex;
  flex-direction: column;
  margin-top: 54px; margin-right:2rem">
      <hr style="align-self: end;
  border: 2px solid black;
  border-top-width: 2px;
  width: 200px;
  margin-right: 14px;">
      <p style="text-align: start;
  margin-left: 30rem;
  font-family: 'Lora', serif;
  font-size: 18px;
  font-weight: 600;">Punong Barangay</p>
    </div>
    <div style="display: flex;
  flex-direction: column;
  margin-top: 48px; margin-left: 2rem;">
      <p style=" text-align: start;
  margin-left: 5px;
  font-family: 'Lora', serif;
  font-size: 14px;">Amount Paid : PHP {{$doc->fee}}</p>
      <p style="margin-top: 1px;
  text-align: start;
  margin-left: 5px;
  font-family: 'Lora', serif;
  font-size: 14px;">O.R. No. 000000</p>
      <p style="margin-top: 1px;
  text-align: start;
  margin-left: 5px;
  font-family: 'Lora', serif;
  font-size: 14px;">CTC No. 000000</p>
      <p style="margin-top: 1px;
  text-align: start;
  margin-left: 5px;
  font-family: 'Lora', serif;
  font-size: 14px;">Issued at <span style="text-decoration: underline;
  text-underline-offset: 4px;"> Barangay Poblacion, Dalaguete, Cebu</span></p>
  <p style="margin-top: 1px;
  text-align: start;
  margin-left: 5px;
  font-family: 'Lora', serif;
  font-size: 14px;">On <span style="text-decoration: underline;
  text-underline-offset: 4px;">{{$date->month}}, {{$date->day}}, {{$date->year}}</span></p>
      <p style="margin-left: 5px; margin-top: 5px; font-family: 'Lora', serif; font-size: 16px; text-align: start; font-weight: 600;">NOT VALID WITHOUT</p>
    <p style="margin-left: 25px; font-family: 'Lora', serif; font-size: 16px; text-align: start; font-weight: 600;">OFFICIAL SEAL</p>
    </div>
  </page>

</div>
 

</body>
</html>