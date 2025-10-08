
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Badge</title>
    <style>
        @media print {
            @page {
                size: 9cm 12.5cm;
            }
        }
        @font-face {
            font-family: 'Arial';
            src: url({{asset('assets/badge/Arial.ttf')}});
            font-weight: normal;
            font-style: normal;
        }
        html{
            zoom: 100%;
        }
    </style>
</head>

<body style="padding:0; margin:0; direction:ltr">

<div  style="height:12.5cm;width:9.0cm;">
   
    @if($withImage == 1)
        <div style="position:absolute; width:9cm;text-align:center; top:0cm;height: 12.5cm">
             <img src="{{ asset('public/badge.png') }}"  style="height:12.5cm;width:9cm;"/>
        </div>
    @endif
    <div  style="line-height:25px; position:absolute; width:9cm;text-align:center; top:8.8cm; color:#0a6aa1; font-family:Arial; font-size:14pt;font-weight: bold">
        {{$visitor->name}}
    </div>
    @if($visitor->company)
    <div  style="line-height:25px; position:absolute; width:9cm;text-align:center; top:9.5cm; color:black; font-family:Arial; font-size:9pt;font-weight: bold">
        {{$visitor->company}}
        {{--asd--}}
    </div>
    @endif
    <!--<div  style="line-height:25px; position:absolute; width:9cm;text-align:center; top:4.90cm; color:black; font-family:Arial; font-size:8pt;font-weight: bold">-->
    <!--    {{$visitor->qrcode}}-->
    <!--</div>-->

    <div  style="position:absolute; width:9cm;text-align:center; top:5.5cm;">
        <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($visitor->qrcode , 'QRCODE')}}" alt="barcode" width="90px;"/>
    </div>
    <div  style="line-height:18px; position:absolute; width:9cm;text-align:center; top:8.2cm; color:black; font-family:Arial; font-size:11pt;font-weight: bold">
        {{$visitor->qrcode}}
    </div>

</div>
</body>
</html>

<script>
    window.print();
</script>
