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
        /*.notes {
            background-image: -webkit-linear-gradient(left, white 10px, transparent 10px), -webkit-linear-gradient(right, white 10px, transparent 10px), -webkit-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
            background-image: -moz-linear-gradient(left, white 10px, transparent 10px), -moz-linear-gradient(right, white 10px, transparent 10px), -moz-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
            background-image: -ms-linear-gradient(left, white 10px, transparent 10px), -ms-linear-gradient(right, white 10px, transparent 10px), -ms-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
            background-image: -o-linear-gradient(left, white 10px, transparent 10px), -o-linear-gradient(right, white 10px, transparent 10px), -o-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
            background-image: linear-gradient(left, white 10px, transparent 10px), linear-gradient(right, white 10px, transparent 10px), linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
            background-size: 100% 100%, 100% 100%, 100% 31px;
            border: none;
            line-height: 31px;
            padding: 8px;
        }*/
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
        
        <br>
        <div class="w-100 text-center h5">Republika ng Pilipinas</div>
        <div class="w-100 text-center h5">Lalawigan ng Bulakan</div>
        <div class="w-100 text-center h5 mb-3">Bayan ng Bulakan</div>
        <div class="w-100 text-center h4"><b>BARANGAY NG MATUNGAO</b></div>
        <div class="w-100 text-center h4"><b>TANGGAPAN NG PUNONG BARANGAY</b></div>
        <hr size="30" noshade> <hr size="30" noshade>
        <br><br>
        <div class="w-100 text-center h4"><b>BUSINESS CLEARANCE</b></div>
        <div class="row" style="margin-left: 0px">
            <p class="text-nowrap"> Ito ay isang pagpapatunay na si _____ naninirahan sa _____
            ay kasalukuyang nangangasiwa o nagmamay-ari ng negosyong:

             <div class="w-100 text-center h4"><b>______</b></div>
             <div class="w-100 text-center h6"> (pangalan/uri ng negosyo)</div>

            <div class="col-3 d-flex offset-3">
                <div class="w-100 text-center">
                        BAGO (for new business)
                </div>
            </div>

            <div class="col-3 d-flex">
                <div class="w-100 text-center">
                        DATI (for re-newal)
                </div>
            </div>
            
            <p> na mamatagpuan sa panungkulang ____ sakop ng barangay na ito. </br>

            At alinsunod sa initadhana ng Artikulo Blg. 4 at Seksyon 152 ng Bagong Batas ng
            Pamahalaang Lokal ng Taong 1991 (R.A. 7160) pinagpasyahan ng Sangguniang Barangay ng Matungao 
            ang pagkakaloob ng pahintulot ng nasabing <i> <u> negosyo, </u> </i> na may bisa hanggang sa ________. </br></br> 

            Ibinigay ayon sa kahilingan ni _____ at maaring gamitin sa ano mang layunin na 
            naayon sa batas. </br></br> 

            Ipinagkaloob ngayong ika ____ ng _______,.

            Inihanda ni: ______ </br>
            Pangalan at Lagda</br>
            Katungkulan: <u> Brgy. Clerk </u> </p>

            <div class="col-6 d-flex offset-6">
                <p> Nagpapatunay </p>
            </div>

            <div class="col-6 d-flex offset-6">
                <h4> IGG. MARIA ANA METHELYN O. NAHIL </h4> </br>
            </div>
            <div class="col-6 d-flex offset-6">
                <p> Punong Barangay </p>
            </div>

            <p> SEDULA BLG __________ </br>
            KINUHA SA __________ </br>
            PETSA __________ </br>
            RESIBO BLG __________ </br>
            HALAGA PHP__________ </br> </br>

            <i> Note: Ang "<u>renewal</u>" nito ay mula Unang araw ng Enero na may pasok 
            hanggang huling araw Marso na may pasok, ng susunod na taon. At kung lumagpas ay 
            may kaukulang "<u>penalty</u>". <i>
            </p>
        </div>
    </div>
</body>
</html>