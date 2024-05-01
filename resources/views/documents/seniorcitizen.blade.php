<h2 style="font-family: 'Roboto', sans-serif; font-size: 18px; font-weight: 800; text-align: center; letter-spacing: 0.1em;">Barangay Certification</h2>
</div>
      <div style="margin-top:48px;">
        <h2 style="font-family: 'Roboto', sans-serif; font-size: 14px;text-align: start; margin-left: 44px;">TO WHOM IT MAY CONCERN,</h2>
      </div>
    <div style="margin-top:32px; width:750px;">
      <p style="font-family: 'Lora', serif; font-size: 14px; text-align: start; margin-left: 44px; margin-right: 44px; text-indent: 22px; font-weight:400">This is to certify that <span style="text-decoration: underline;">{{$requestee->requesteeFName}} {{$requestee->requesteeMName}} {{$requestee->requesteeLName}}</span>, is a bonafide resident of Barangay Poblacion, Dalaguete, Cebu. He/She is <span style="text-decoration: underline;">{{$age}}</span> years old and was born on <span style="text-decoration: underline;">{{ $birthdateCarbon->formatLocalized('%B') }} {{ $birthdateCarbon->format('d,Y') }}</span></p>
    </div>

    <div style="margin-top:32px; width:750px;">
      <p style="font-family: 'Lora', serif;font-size: 14px;text-align: start;margin-left: 44px;margin-right: 44px; text-indent: 22px;">This certification is issued upon the request of <span style="text-decoration: underline;">{{$requestee->requesteeFName}} {{$requestee->requesteeMName}} {{$requestee->requesteeLName}}</span> for his/her
      <span style="text-decoration: underline;">{{$requestee->requestPurpose}} </span> purposes.</p>
    </div>
    <div style="margin-top:32px; width:750px;">
      <p style="font-family: 'Lora', serif;font-size: 14px;text-align: start;margin-left: 44px;margin-right: 44px;text-indent: 22px; font-weight:400">Done this {{$monthWord}} {{$date->day}}, {{$date->year}} at Poblacion, Dalaguete, Cebu.</p>
    </div>