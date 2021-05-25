@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-address-card"></i>&nbsp; Annexures</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('customers') }}">Annexures</a></li>
                        <li class="breadcrumb-item active">Add Annexure</li>

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <h3 class="card-title pTop10">Add Annexure</h3>
                                </div>
                                <div class="col-sm-6 float-right"> <a href="{{ route('annexures') }}"><button
                                            type="button" class="btn btn-warning float-right"><i
                                                class="fas fa-hand-point-left"></i> Back to
                                            Annexures</button></a></div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" id="addcustomer" method="POST"
                            action="{{ route('addannexuresubmit') }}">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="col-sm-12">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="quotationId" class="col-sm-2 col-form-label">Quotation No
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control quotationId" style="width: 100%;"
                                                        id="quotationId" name="quotationId">
                                                        <option value="" selected="selected">Select a Quotation</option>
                                                        @foreach($quotationsData as $quotations)
                                                        <option value="{{$quotations->quotationId}}">
                                                            {{$quotations->ctsRef}}</option>
                                                        @endforeach

                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="ctsYear" class="col-sm-2 col-form-label">CTS
                                                        Year</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="ctsYear" name="ctsYear"
                                                            placeholder="CTS Year" >
                                                        <input type="hidden" class="form-control" id="ctsRef" name="ctsRef"
                                                            placeholder="Cts Ref" >
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group row">
                                                    <label for="phoneno" class="col-sm-2 col-form-label">CTS Ref
                                                        No</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="phone" name="phone"
                                                            placeholder="Phone No" >
                                                    </div>
                                                </div> -->
                                                <div class="form-group row">
                                                    <label for="ctsDate" class="col-sm-2 col-form-label">CTS Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="ctsDate" name="ctsDate"
                                                            placeholder="CTS Date" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="priceBasis" class="col-sm-2 col-form-label">Price Basis
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="priceBasis"
                                                            name="priceBasis" placeholder="Price Basis" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="salesTax" class="col-sm-2 col-form-label">GST Tax</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="salesTax" name="salesTax"
                                                            placeholder="GST Tax" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">                                                
                                                <div class="form-group row">
                                                    <label for="payment" class="col-sm-2 col-form-label">Payment</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="payment" name="payment"
                                                            placeholder="Payment" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="pfCharges" class="col-sm-2 col-form-label">PF Charges</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="pfCharges"
                                                            name="pfCharges" placeholder="PF Charges" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="delivery" class="col-sm-2 col-form-label">Delivery</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="delivery"
                                                            name="delivery" placeholder="Delivery" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="validity" class="col-sm-2 col-form-label">Validaty</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="validity"
                                                            name="validity" placeholder="Validaty" >
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.row -->
</div>

<!-- /.content-wrapper -->
@endsection