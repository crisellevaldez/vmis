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
        <div class="row" style="margin-left: 0px">

        <div class = " text-left">Date: {{ Carbon\Carbon::now() }}</div>
            <br><br>

            <div class = "w-100 text-left h4">Gen. Gregorio H. Del Pilar</div>
            <div class = "text-left h4">District Hospital</div>
            <div class = "text-left h4">Bagumbayan, Bulakan, Bulacan</div>
            <br><br>
            <div class = "text-left h4">Dear Ma'am/Sir,</div>
            <br><br>
            <div class="row" style="margin-left: 0px">
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Barangay is requesting in your good office to issue a Medical Certificate to
            <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{ $data['resident']->first_name.' '.$data['resident']->last_name}}
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> who were treated in your Hospital
                    <u>&nbsp;&nbsp;&nbsp;&nbsp; {{ $data['med']->treated_date }}&nbsp;&nbsp;&nbsp;&nbsp;</u> for injuries caused by allege mauling incident.</p>
            <br>
            <p class = "text-left">Said Medical Certificate is needed by the afore mentioned persons, for whatever legal purpose it may serve them. </p><br>
            <p class="text-left">Hoping for your kind consideration.</p><br>
                        
    </div>
                    <div class="row">
                        <div class="col-12 col-md-8"> </div>
                        <div class="col-6 col-md-4 text-center">Nagpapatunay:</div>
                    </div> <br><br><br><br><br><br>
                      <div class="row">
                        <div class="col-12"> </div>
                        <div class="col-12 text-center"><h4> IGG. MARIA ANA METHELYN O. NAHIL </h4></div>
                      </div>
                      
                      <div class="row">
                        <div class="col-12 "> </div>
                        <div class="col-12 text-center">Punong Barangay</div>
                      </div>


    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-sm-2 offset-10">
                {!! QrCode::size(100)->generate('ID: '.$data['resident']->id."\n".'Full Name: '.$data['resident']->first_name.' '.$data['resident']->last_name) !!} 
            </div>
        </div>
    </div>



</body>
</html>