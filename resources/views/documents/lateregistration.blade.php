<h2 style="font-family: 'Roboto', sans-serif; font-size: 18px; font-weight: 800; text-align: center; letter-spacing: 0.1em;">Barangay Certification</h2>
</div>
      <div style="margin-top:48px;">
        <h2 style="font-family: 'Roboto', sans-serif; font-size: 14px;text-align: start; margin-left: 44px;">TO WHOM IT MAY CONCERN,</h2>
      </div>
    <div style="margin-top:32px; width:750px;">
      <p style="font-family: 'Lora', serif; font-size: 14px; text-align: start; margin-left: 44px; margin-right: 44px; text-indent: 22px; font-weight:400">This is to certify that <span style="text-decoration: underline;">{{$requestee->requesteeFName}} {{$requestee->requesteeMName}} {{$requestee->requesteeLName}}</span> <span style="text-decoration: underline;">{{$gender}}</span> was born on {{$birthdateCarbon->format('F d, Y')}}. Child of <span style="text-decoration: underline;">{{$requestee->requestPurpose}}</span>, residing in
      <span style="text-decoration: underline;">{{$sitio->sitioName}}, Dalaguete, Cebu</span></p>
    </div>


    <div style="margin-top:32px; width:750px;">
      <p style="font-family: 'Lora', serif;font-size: 14px;text-align: start;margin-left: 44px;margin-right: 44px; text-indent: 22px;">This certification is issued upon request of the interested party for the delayed registration of Live Birth of the above-named person</p>
    </div>

    <div style="margin-top:32px; width:750px;">
      <p style="font-family: 'Lora', serif;font-size: 14px;text-align: start;margin-left: 44px;margin-right: 44px;text-indent: 22px; font-weight:400">Issued this {{$monthWord}} {{$date->day}}, {{$date->year}} at Poblacion, Dalaguete, Cebu.</p>
    </div>