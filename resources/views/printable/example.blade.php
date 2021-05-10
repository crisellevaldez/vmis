<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: white;
            font-family: 'Times New Roman', Times, serif;
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
                <div class="w-100 text-right"><i>Appendix</i> 62</div>
        <br>
        <div class="w-100 text-center h4"><b>INSPECTION AND ACCEPTANCE REPORT</b></div>
        <br><br>
        <div class="row">
                <div class="col-6 d-flex">
                    <label for="" class="text-nowrap">Entity Name :</label>
                    <div class="border-bottom border-dark w-100 text-center">
                            {{ $data }}
                    </div>
                </div>
                <div class="col-2"></div>
                <div class="col-4 d-flex">
                    <label for="" class="text-nowrap">Fund Cluster :</label>
                    <div class="border-bottom border-dark w-100 text-center">
                            {{ $data }}
                    </div>
                </div>
            </div>
            <br>
    </div>
</body>
</html>