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
        <p class="text-left">Pinatutunayan na sina, G. <u> {{ $data['notmarried']->husband }} </u>, <u> {{ $data['notmarried']->husband_age }} </u> taong gulang at
            Bb. <u> {{ $data['notmarried']->wife }} </u>, <u> {{ $data['notmarried']->wife_age }} </u> taong gulang ay naninirahan sa, {{ $house['house']->house_number.' '.$house['house']->street.' '.$house['house']->sitio.' Matungao Bulakan, Bulacan' }},
             ay nagsasama bilang mag-asawa sa loob ng <u> {{ $data['notmarried']->years }} </u> taon.
        </p>
            <br>
        <p class="text-left">Ang pagpapatunay na ito ay ipinagkaloob sa mga tinutukoy sa itaas <b>bilang
            katunayan na sila ay nagsasama bilang mag-asawa,</b> ngunit hindi na basbasan ng kasal sa ilalim
        ng batas o maging ng simbahan.</p>
                <br>

        <p class="text-left">Ang katibayan ito ay ipinagkaloob ayon sa kahilingan ni Bb. <u> {{ $data['resident']->first_name.' '.$data['resident']->last_name}} </u>
            at maaaring magamit sa anumang layunin na naaayon sa batas.
        </p>
                        <br>
        <p>Ipinagkaloob ngayong ika<u> {{ Carbon\Carbon::now()->format('F') }} </u> ng <u> {{ Carbon\Carbon::now()->format('d') }} </u> {{ Carbon\Carbon::now()->format('Y') }}.</p><br><br><br>
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
          </div><br><br>
                      <table class = "table-sm table-bordered">
                          <tbody>
                              <tr>
                                <td>SEDULA BLG.</td>
                                <td></td>
                              </tr>
                          <tbody>
                              <tr>
                                  <td>KINUHA SA</td>
                                  <td>BULAKAN, BULACAN</td>
                              </tr>
                            <tbody>
                                <tr>
                                    <td>PETSA</td>
                                    <td></td>
                                </tr>
                                <tbody>
                                    <tr>
                                        <td>RESIBO BLG.</td>
                                        <td></td>
                                    </tr>
                                    <tbody>
                                        <tr>
                                            <td>HALAGA</td>
                                            <td>PHP 50.00</td>
                                        </tr>
                      </table>
                      <br>
            </div>


                  
        
        </div>
    </div>

    
                      




</body>
</html>