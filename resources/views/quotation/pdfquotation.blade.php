<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->

    <title>Cartal Technical Services</title>

    <link rel="stylesheet" href="{{ asset('css/dist/css/pdf.css') }}">
    <!-- CSS only -->
    <!-- <link href="{{ asset('css/dist/css/bootstrap.min.css') }}" rel="stylesheet" > -->


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 ">
                        <h5 class="pdfheadertxt">QUATATION</h5>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content-header">
            <div class="containerwraper">
                <div class="leftColumn">
                    <div>{{$pdfQuotationData->contactPerson}}</div>
                    <div>{{$pdfQuotationData->name}}</div>
                    <div>{!! nl2br(e($pdfQuotationData->address)) !!}</div>
                </div>
                
                <div class="rightColumn">
                    <div>Our Ref: <b>{{$pdfQuotationData->ctsRef}}</b></div>
                    <div>Date : <b>17-05-2021</b></div>
                    <div>REF : <b>Your RFQ No RFQ NO-212223000287</b></div>
                    <div>Enq Date : <b>06-05-2021</b> Due On: <b>20-05-2021</b></div>
                    <div>SUB : <b>Requirement of :ECO-R SCRAPPER BLADE</b></div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <br />
        <section>
            <div class="container">
                <div class="col-sm-6 addresstxt ptop20">
                    <div>Dear Sir,</div>
                    <div>We are in receipt of your above reference enquiry and thank you very much for the same.
                    </div>
                    <div>We submit our quotation as follows :-</div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>