<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/custom.css') }}">
    <style>
        body {
            background-color: white;
            font-family: 'Calibri';
        }

        hr{
            margin:0;
            height: 1px;
        }
        .notes {
            background-image: -webkit-linear-gradient(left, white 10px, transparent 10px), -webkit-linear-gradient(right, white 10px, transparent 10px), -webkit-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
            background-image: -moz-linear-gradient(left, white 10px, transparent 10px), -moz-linear-gradient(right, white 10px, transparent 10px), -moz-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
            background-image: -ms-linear-gradient(left, white 10px, transparent 10px), -ms-linear-gradient(right, white 10px, transparent 10px), -ms-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
            background-image: -o-linear-gradient(left, white 10px, transparent 10px), -o-linear-gradient(right, white 10px, transparent 10px), -o-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
            background-image: linear-gradient(left, white 10px, transparent 10px), linear-gradient(right, white 10px, transparent 10px), linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
            background-size: 100% 100%, 100% 100%, 100% 31px;
            border: none;
            line-height: 31px;
            padding: 8px;
        }
        @media print{
            .no-print{
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <div class="container bg-white">
    <div class="no-print">
            <br>
            <button class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
        </div>

        <div class="row" style="margin-left: 0px">
            <div class="col-3"> <img alt="image name" src="{{ url('imgs/logo.jpeg') }}" / width="200px"> </div>

            <div class="col-6 ">
                <div class="w-100 text-center h5">Republika ng Pilipinas</div>
                <div class="w-100 text-center h5">Lalawigan ng Bulakan</div>
                <div class="w-100 text-center h5 mb-3">Bayan ng Bulakan</div>
                <div class="w-100 text-center h4"><b>BARANGAY NG MATUNGAO</b></div>
                <div class="w-100 text-center h4"><b>TANGGAPAN NG PUNONG BARANGAY</b></div>
            </div>
        </div>
        <hr size="30" noshade> <hr size="30" noshade>
        <br><br>
        <div class="w-100 text-center h3"><b>PAGPAPATUNAY</b></div>
        <div class="row" style="margin-left: 0px"><br>

        <div class ="text-left">SA MGA KINAUUKULAN:</div>
            <br><br>
        <p class="text-indent">Pinatutunayan nito na si <u> {{ $data['resident']->first_name.' '.$data['resident']->last_name}} </u>
        taong buwang gulang ay naninirahan sa<u> {{ $data['resident']->first_name.' '.$data['resident']->last_name}} </u> naninirahan sa <u> {{ $house['house']->house_number.' '.$house['house']->street.' '.$house['house']->sitio.' Matungao Bulakan, Bulacan' }} ay isa sa mahirap na pamilya
    ng barangay na ito.</p>
            <br>
        <p class="text-left">Ang pagpapatunay na ito ay ipinagkaloob kay G./Gng./Bb.
            <u> {{ $data['resident']->first_name.' '.$data['resident']->last_name}}
            </u>  ayon sa kanyang kahilingan na maaaring magamit sa
            anumang layuin na naaayon sa batas, lalo't higit sa pagdulong ng tulong <u>MEDICAL/FINANCIAL/EDUCATION</u> para sa
            <u>________________</u> ng kanyang <u>__________________________</u>
            na ang pangalan ay naka tala sa itaas.</p>
                <br>
        <p>Ipinagkaloob ngayong ika <u> {{ Carbon\Carbon::now()->format('F') }} </u> ng <u> {{ Carbon\Carbon::now()->format('d') }} </u> {{ Carbon\Carbon::now()->format('Y') }}.</p>
        <p>Ihinanda ni:</p>
        <br><br>
        <div class="row">
            <div class="col-12 col-md-8"> </div>
            <div class="col-6 col-md-4 text-left">Nagpapatunay:</div>
          </div> <br><br>
          <div class="row">
            <div class="col-12 col-md-8"> </div>
            <div class="col-6 col-md-4 text-left"><h4> IGG. MARIA ANA METHELYN O. NAHIL </h4></div>
          </div>
          <div class="row">
            <div class="col-12 col-md-8"> </div>
            <div class="col-6 col-md-4 text-left">Punong Barangay</div>
          </div>
          </div>
          <br><br>
          <table class = "table-sm table-bordered">
              <tbody>
                  <tr>
                    <td>CONTROL NUMBER</td>
                    <td></td>
                  </tr>
              <tbody>
                  <tr>
                      <td>VALIDITY</td>
                      <td>UNTIL DEC. 30, 2021 ONLY</td>
                  </tr>

        </div>
        
    </div>
    
      </table>
      <br>


<i>Huwag tatanggapin kung selyo ay wala.</i>
     
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-sm-2 offset-10">
            {!! QrCode::size(100)->generate('ID: '.$data['resident']->id."\n".'Full Name: '.$data['resident']->first_name.' '.$data['resident']->last_name) !!} 
        </div>
    </div>
</div>



</body>
</html>