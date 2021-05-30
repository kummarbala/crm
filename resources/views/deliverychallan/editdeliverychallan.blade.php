@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-address-card"></i>&nbsp; Delivery Challans</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('deliverychallans') }}">Delivery Challan</a></li>
                        <li class="breadcrumb-item active">Edit Delivery Challan</li>

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
                                    <h3 class="card-title pTop10">Edit Delivery Challan</h3>
                                </div>
                                <div class="col-sm-6 float-right"> <a
                                        href="{{ route('deliverychallans') }}"><button type="button"
                                            class="btn btn-warning float-right"><i class="fas fa-hand-point-left"></i>
                                            Back to
                                            Delivery Challans</button></a></div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" id="adddeliverychallan" method="POST"
                            action=" {{ route('editdeliverychallansubmit',[$editDeliveryChallanIdData->deliveryChallanId]) }}">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="col-sm-12">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="orderAckNo" class="col-sm-2 col-form-label">Ack No
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="orderAckNoId"
                                                            name="orderAckNo" placeholder="Ack No" value="{{$editDeliveryChallanIdData->orderAckNo}}" readonly>
                                                        
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="challanNo" class="col-sm-2 col-form-label">Challan No
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="challanNo"
                                                            name="challanNo" placeholder="Customer Name" value="{{$editDeliveryChallanIdData->challanNo}}" readonly>
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="ctsYear" class="col-sm-2 col-form-label">CTS
                                                        Year</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="ctsYear"
                                                            name="ctsYear" placeholder="CTS Year" value="{{$editDeliveryChallanIdData->ctsYear}}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="customerId" class="col-sm-2 col-form-label">Customer Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="customerName"
                                                            name="customerName" placeholder="Customer Name" value="{{$editDeliveryChallanIdData->name}}" readonly>
                                                        <input type="hidden" class="form-control" id="customerId"
                                                            name="customerId" placeholder="customerId" value="{{$editDeliveryChallanIdData->customerId}}" readonly>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="poNo" class="col-sm-2 col-form-label">P.O. No / Date
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="poNo" name="poNo"
                                                            placeholder="P.O. No / Date" value="{{$editDeliveryChallanIdData->poNo}}" >
                                                    </div>
                                                </div>                                                
                                                <div class="form-group row">
                                                    <label for="gstNo" class="col-sm-2 col-form-label">GST No
                                                        </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="gstNo"
                                                            name="gstNo" placeholder="GST No" value="{{$editDeliveryChallanIdData->gstNo}}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="modeDespatch" class="col-sm-2 col-form-label">Mode of
                                                        Despatch</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="modeDespatch"
                                                            name="modeDespatch" placeholder="Mode of Despatch" value="{{$editDeliveryChallanIdData->modeDespatch}}">
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="col-sm-6">
                                            <div class="form-group row">
                                                    <label for="dcDate" class="col-sm-2 col-form-label">DC Date</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group date" id="dcDate"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input"
                                                                data-target="#dcDate" name="dcDate" placeholder="DC Date"
                                                                data-toggle="datetimepicker" value="{{$editDeliveryChallanIdData->dcDate}}" />
                                                            <div class="input-group-append" data-target="#dcDate"
                                                                data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i
                                                                        class="fa fa-calendar text-primary"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="noPackages"
                                                        class="col-sm-2 col-form-label">No of Packages</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="noPackages"
                                                            name="noPackages" placeholder="No of Packages" value="{{$editDeliveryChallanIdData->noPackages}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="rrLrNo" class="col-sm-2 col-form-label">RR / LR. No</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="rrLrNo"
                                                            name="rrLrNo" placeholder="RR / LR. No" value="{{$editDeliveryChallanIdData->rrLrNo}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="rrDate"
                                                        class="col-sm-2 col-form-label">RR / LR. Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="rrDate"
                                                            name="rrDate" placeholder="RR / LR. Date" value="{{$editDeliveryChallanIdData->rrDate}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="contactPerson" class="col-sm-2 col-form-label">Contact
                                                        Person</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="contactPerson"
                                                            name="contactPerson" placeholder="Conatct Person" value="{{$editDeliveryChallanIdData->contactPerson}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="vendorCode" class="col-sm-2 col-form-label">Vendor Code</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="vendorCode" name="vendorCode"
                                                            placeholder="Vendor Code" value="{{$editDeliveryChallanIdData->customerCode}}" readonly>
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
                                                        id="addProduct" disabled='disabled'><i class="fas fa-plus"></i>
                                                        Add</button>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label for="productcount" class="col-sm-2 col-form-label">
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <input type="hidden" class="form-control" id="productcount"
                                                                name="productcount" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br />
                                    <table id="oaproducts" class="table table-bordered table-striped">

                                        <thead class="thead-purple">
                                            <tr>
                                                <th style="width:30%">Description / Drawing No</th>
                                                <th style="width:10%">HSN No</th>
                                                <th style="width:10%">Material</th>
                                                <th style="width:5%">Qty</th>                                                
                                                <th style="width:10%">Rate</th>
                                                <th style="width:5%">Unit</th>
                                                <th style="width:10%">Total</th>
                                                <th style="width:10%">Remarks</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody id="productItem">
                                        @foreach($editDcProductData as $editDcProduct)
                                            <tr>
                                                <td>{{$editDcProduct['description']}}<input type="hidden" class="description" name="description[]" value="{{$editDcProduct['description']}}"></td>
                                                <td>{{$editDcProduct['drawingNo']}}<input type="hidden" class="drawingNo" name="drawingNo[]" value="{{$editDcProduct['drawingNo']}}"></td>
                                                <td>{{$editDcProduct['material']}}<input type="hidden" class="material" name="material[]" value="{{$editDcProduct['material']}}"></td>
                                                <td>{{$editDcProduct['quantity']}}<input type="hidden" class="quantity" name="quantity[]" value="{{$editDcProduct['quantity']}}"></td>
                                                <td>{{$editDcProduct['rate']}}<input type="hidden" class="rate" name="rate[]" value="{{$editDcProduct['rate']}}"></td>
                                                <td>{{$editDcProduct['unit']}}<input type="hidden" class="unit" name="unit[]" value="{{$editDcProduct['unit']}}"></td>
                                                <td>{{$editDcProduct['total']}}<input type="hidden" class="total" name="total[]" value="{{$editDcProduct['total']}}"></td>
                                                <td><input type="text" class="per" name="remarks[]" value="{{$editDcProduct['remarks']}}"></td>

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
                                                        name="description" placeholder="Description / Drawing No">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="drawingNo" class="col-sm-2 col-form-label">HSN
                                                    No</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="drawingNo"
                                                        name="drawingNo" placeholder="HSN No">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="material" class="col-sm-2 col-form-label">Material
                                                </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="material"
                                                        name="material" placeholder="Material">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="quantity"
                                                        name="quantity" placeholder="Qunatity">
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
                                                        placeholder="0.00">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="total" class="col-sm-2 col-form-label">Total
                                                </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="total" name="total"
                                                        placeholder="0.00">
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