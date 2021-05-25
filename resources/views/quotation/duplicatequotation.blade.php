@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-address-card"></i>&nbsp; Quotations</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('customers') }}">Quotations</a></li>
                        <li class="breadcrumb-item active">Edit Quotation</li>

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
                                    <h3 class="card-title pTop10">Edit Quotation</h3>
                                </div>
                                <div class="col-sm-6 float-right"> <a href="{{ route('quotations') }}"><button
                                            type="button" class="btn btn-warning float-right"><i
                                                class="fas fa-hand-point-left"></i> Back to
                                            Quotations</button></a></div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" id="addQuotation" method="POST"
                            action=" {{ route('addquotationsubmit') }}">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="col-sm-12">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="customername" class="col-sm-2 col-form-label">Customer
                                                        Name</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control customername" style="width: 100%;"
                                                            id="customerId" name="customerId" >
                                                            <option value="" selected="selected">Select a customer
                                                            </option>
                                                            @foreach($customersData as $customers)
                                                            <option value="{{$customers->customerId}}"
                                                            @if($customers->customerId === $editQuotationData->customerId) selected @endif >
                                                                {{$customers->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <input type="hidden" name="hiddenCustomerId" id="hiddenCustomerId" value="{{$editQuotationData->customerId}}">
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group row">
                                                <label for="Address" class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" rows="3" placeholder="Address ..."
                                                        name="address" id="address"></textarea>
                                                </div>
                                            </div> -->
                                                <div class="form-group row">
                                                    <label for="ctsyear" class="col-sm-2 col-form-label">CTS Year
                                                        No</label>
                                                    <div class="col-sm-9">
                                                        @php $year = date('Y') ;if(date('n')>=4) { $newyear = $year." -
                                                        ".($year+1) ;}else{$newyear = ($year-1)." - ". $year; }@endphp
                                                        <input type="text" class="form-control" id="ctsYear"
                                                            name="ctsYear" placeholder="CTS Year"
                                                            value="{{$editQuotationData->ctsYear}}" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="ctsref" class="col-sm-2 col-form-label">CTS Ref</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="ctsRef"
                                                            name="ctsRef" placeholder="CTS Ref" value="{{$newCtsRef}}" >
                                                        <input type="hidden" class="form-control" name="referenceNo"
                                                            id="referenceNo"
                                                            value="{{$editQuotationData->referenceNo}}" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="ctsdate" class="col-sm-2 col-form-label">CTS
                                                        Date</label>
                                                    <div class="col-sm-9">
                                                        <!-- <input type="text" class="form-control" id="ctsDate" name="ctsDate"
                                                            placeholder="CTS Date"> -->
                                                        <div class="input-group date" id="ctsDate"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input"
                                                                data-target="#ctsDate" name="ctsDate"
                                                                data-toggle="datetimepicker"
                                                                value="{{$editQuotationData->ctsDate}}" />
                                                            <div class="input-group-append" data-target="#ctsDate"
                                                                data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i
                                                                        class="fa fa-calendar text-primary"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="enquiryref" class="col-sm-2 col-form-label">Enquiry
                                                        Ref</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="enquiryRef"
                                                            name="enquiryRef" placeholder="Enquiry Ref"
                                                            value="{{$editQuotationData->enquiryRef}}" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="conatctperson" class="col-sm-2 col-form-label">Conatct
                                                        Person
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="contactPerson"
                                                            name="contactPerson" placeholder="Conatct Person"
                                                            value="{{$editQuotationData->contactPerson}}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">

                                                <div class="form-group row">
                                                    <label for="enquirydate" class="col-sm-2 col-form-label">Enquiry
                                                        Date</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group date" id="enquiryDate"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input"
                                                                data-target="#enquiryDate" data-toggle="datetimepicker"
                                                                name="enquiryDate"
                                                                value="{{$editQuotationData->customerId}}" />
                                                            <div class="input-group-append" data-target="#enquiryDate"
                                                                data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i
                                                                        class="fa fa-calendar text-primary"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="duedate" class="col-sm-2 col-form-label">Due
                                                        Date</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group date" id="dueDate"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input"
                                                                data-target="#dueDate" data-toggle="datetimepicker"
                                                                name="dueDate"
                                                                value="{{$editQuotationData->dueDate}}" />
                                                            <div class="input-group-append" data-target="#dueDate"
                                                                data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i
                                                                        class="fa fa-calendar text-primary"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="notes" class="col-sm-2 col-form-label">Notes</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control" rows="3" placeholder="Notes ..."
                                                            name="notes"
                                                            id="notes">{{$editQuotationData->notes}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="subrequirement" class="col-sm-2 col-form-label">Sub
                                                        Requirement</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="subRequirement"
                                                            name="subRequirement" placeholder="Sub Requirement"
                                                            value="{{$editQuotationData->subRequirement}}" >
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <hr class="dividerHr" />
                                </div>


                                <div class="col-sm-12 clear-both">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                <div class="col-sm-6">
                                                    <h3 class="card-title pTop10 text-primary">Add products</h3>
                                                </div>
                                                <div class="col-sm-6 float-right"> <button type="button"
                                                        class="btn btn-primary float-right" id="addProductBut"
                                                        data-toggle="modal" data-target="#addProductModal"
                                                        id="addProduct" @if($editQuotationData->customerId !== "") echo "disabled='disabled'" @endif><i class="fas fa-plus"></i>
                                                        Add</button>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label for="productcount" class="col-sm-2 col-form-label">
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <input type="hidden" class="form-control" id="productcount"
                                                                name="productcount" value="yes">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br />
                                    <table id="quotationprds" class="table table-bordered table-striped">

                                        <thead class="thead-purple">
                                            <tr >
                                                <th style="width:30%">Description / Drawing No</th>
                                                <th style="width:10%">HSN No</th>
                                                <th style="width:10%">Material</th>
                                                <th style="width:5%">Qty</th>
                                                <th style="width:5%">Unit</th>
                                                <th style="width:10%">Rate</th>
                                                <th style="width:10%">Total</th>
                                                <th style="width:3%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="productItem">
                                            @foreach($editQuotationProductData as $editQuotationProduct)
                                            <tr class="editable" >
                                                <td>{{$editQuotationProduct['description']}}<input type="hidden" class="description" name="description[]" value="{{$editQuotationProduct['description']}}"></td>
                                                <td>{{$editQuotationProduct['drawingNo']}}<input type="hidden" class="drawingNo" name="drawingNo[]" value="{{$editQuotationProduct['drawingNo']}}"></td>
                                                <td>{{$editQuotationProduct['material']}}<input type="hidden" class="material" name="material[]" value="{{$editQuotationProduct['material']}}"></td>
                                                <td>{{$editQuotationProduct['quantity']}}<input type="hidden" class="quantity" name="quantity[]" value="{{$editQuotationProduct['quantity']}}"></td>
                                                <td>{{$editQuotationProduct['unit']}}<input type="hidden" class="unit" name="unit[]" value="{{$editQuotationProduct['unit']}}"></td>
                                                <td>{{$editQuotationProduct['rate']}}<input type="hidden" class="rate" name="rate[]" value="{{$editQuotationProduct['rate']}}"></td>
                                                <td>{{$editQuotationProduct['total']}}<input type="hidden" class="total" name="total[]" value="{{$editQuotationProduct['total']}}"></td>
                                                <td><span><a href="javascript:void(0)" class="remove"><i class="fa fa-times actionbuttonsize removeIcon"></i></a></span></td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <br />

                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </div>
                        </form>

                    </div>
                    <div class="modal fade" id="addProductModal" role="dialog">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Product</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="addProductForm" method="post" id="addProductForm">
                                        <div class="col-sm-12">
                                            <div class="form-group row">
                                                <label for="description" class="col-sm-2 col-form-label">Description
                                                    /
                                                    Drawing No</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="description"
                                                        name="description" placeholder="Description / Drawing No" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="drawingNo" class="col-sm-2 col-form-label">HSN
                                                    No</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="drawingNo"
                                                        name="drawingNo" placeholder="HSN No" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="material" class="col-sm-2 col-form-label">Material
                                                </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="material"
                                                        name="material" placeholder="Material" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="quantity"
                                                        name="quantity" placeholder="Qunatity" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="unit" class="col-sm-2 col-form-label">Unit</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select" style="width: 100%;" id="unit"
                                                        name="unit">
                                                        <option value="Number">Number</option>
                                                        <option value="KG">KG</option>
                                                        <option value="Set">Set</option>
                                                        <option value="Meter">Meter</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="rate" class="col-sm-2 col-form-label">Rate
                                                </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="rate" name="rate"
                                                        placeholder="0.00" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="total" class="col-sm-2 col-form-label">Total
                                                </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="total" name="total"
                                                        placeholder="0.00" >
                                                </div>
                                            </div>

                                        </div>
                                    </form>

                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary float-right"
                                        id="productAdd">Submit</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.row -->
</div>

<!-- /.content-wrapper -->
@endsection