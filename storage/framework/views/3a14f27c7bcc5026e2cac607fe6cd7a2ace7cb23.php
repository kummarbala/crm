<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-address-card"></i>&nbsp; Orderacknowledgements</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('orderacknowledgements')); ?>">Orderacknowledgement</a></li>
                        <li class="breadcrumb-item active">Edit Orderacknowledgement</li>

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
                                    <h3 class="card-title pTop10">Edit Orderacknowledgement</h3>
                                </div>
                                <div class="col-sm-6 float-right"> <a
                                        href="<?php echo e(route('orderacknowledgements')); ?>"><button type="button"
                                            class="btn btn-warning float-right"><i class="fas fa-hand-point-left"></i>
                                            Back to
                                            Orderacknowledgement</button></a></div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" id="addorderacknowledgement" method="POST"
                            action=" <?php echo e(route('addorderacknowledgementsubmit')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="card-body">
                                <div class="col-sm-12">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="quotationId" class="col-sm-2 col-form-label">Quotation
                                                        No
                                                    </label>
                                                    <div class="col-sm-9">                                                        
                                                    <input type="text" class="form-control" id="ctsRef"
                                                            name="quotationId" placeholder="Customer Name" value="<?php echo e($editOrderacknowledgementData->ctsRef); ?>" readonly>
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
                                                    <label for="customerName" class="col-sm-2 col-form-label">Customer
                                                        Name
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="customerName"
                                                            name="customerName" placeholder="Customer Name" value="<?php echo e($editOrderacknowledgementData->name); ?>" readonly>
                                                        <input type="hidden" class="form-control" id="customerId"
                                                            name="customerId" placeholder="customerId" value="<?php echo e($editOrderacknowledgementData->customerId); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="ctsYear" class="col-sm-2 col-form-label">CTS
                                                        Year</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="ctsYear"
                                                            name="ctsYear" placeholder="CTS Year" value="<?php echo e($editOrderacknowledgementData->ctsYear); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="orderAckNo" class="col-sm-2 col-form-label">order Ack
                                                        No</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="orderAckNo"
                                                            name="orderAckNo" placeholder="order Ack No" value="<?php echo e($editOrderacknowledgementData->orderAckNo); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="ctsdate" class="col-sm-2 col-form-label">Order Ack
                                                        Date</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group date" id="orderDate"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input"
                                                                data-target="#orderDate" name="orderDate"
                                                                data-toggle="datetimepicker" value="<?php echo e($editOrderacknowledgementData->orderDate); ?>" />
                                                            <div class="input-group-append" data-target="#orderDate"
                                                                data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i
                                                                        class="fa fa-calendar text-primary"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="vendorCode" class="col-sm-2 col-form-label">Vendor
                                                        Code</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="vendorCode"
                                                            name="vendorCode" placeholder="Enquiry Ref" value="<?php echo e($editOrderacknowledgementData->customerCode); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="poNo" class="col-sm-2 col-form-label">P.O. No / Date
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="poNo" name="poNo"
                                                            placeholder="P.O. No / Date" value="<?php echo e($editOrderacknowledgementData->poNo); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="enquireyNo" class="col-sm-2 col-form-label">Enq No / Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="enquireyNo"
                                                            name="enquireyNo" placeholder="Enq No / Date" value="<?php echo e($editOrderacknowledgementData->enquireyNo); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="priceBasis" class="col-sm-2 col-form-label">Price
                                                        Basis</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="priceBasis"
                                                            name="priceBasis" placeholder="Price Basis" value="<?php echo e($editOrderacknowledgementData->priceBasis); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="modeDespatch" class="col-sm-2 col-form-label">Mode of
                                                        Despatch</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="modeDespatch"
                                                            name="modeDespatch" placeholder="Mode of Despatch" value="<?php echo e($editOrderacknowledgementData->modeDespatch); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="destination"
                                                        class="col-sm-2 col-form-label">Destination</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="destination"
                                                            name="destination" placeholder="Destination" value="<?php echo e($editOrderacknowledgementData->destination); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="freightDetails" class="col-sm-2 col-form-label">Freight
                                                        Details</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="freightDetails"
                                                            name="freightDetails" placeholder="Freight Details" value="<?php echo e($editOrderacknowledgementData->freightDetails); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="consignee"
                                                        class="col-sm-2 col-form-label">Consignee</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="consignee"
                                                            name="consignee" placeholder="Consignee" value="<?php echo e($editOrderacknowledgementData->consignee); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="packingForward" class="col-sm-2 col-form-label">PF
                                                        Charges</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="packingForward"
                                                            name="packingForward" placeholder="PF Charges" value="<?php echo e($editOrderacknowledgementData->packingForward); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="terms" class="col-sm-2 col-form-label">Terms of
                                                        payemnt</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="terms" name="terms"
                                                            placeholder="Terms of payemnt" value="<?php echo e($editOrderacknowledgementData->terms); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="gstNo" class="col-sm-2 col-form-label">GST No</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="gstNo" name="gstNo"
                                                            placeholder="GST No" value="<?php echo e($editOrderacknowledgementData->gstNo); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="priceBasis" class="col-sm-2 col-form-label">GST
                                                        Tax</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control tax" style="width: 100%;" id="tax"
                                                            name="tax">
                                                            <option value="" >Select a GST Tax
                                                            </option>

                                                            <option value="18%" selected="selected">
                                                                18%</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="contactPerson" class="col-sm-2 col-form-label">Contact
                                                        Person</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="contactPerson"
                                                            name="contactPerson" placeholder="Conatct Person" value="<?php echo e($editOrderacknowledgementData->contactPerson); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="note" class="col-sm-2 col-form-label">Notes</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="note" name="note"
                                                            placeholder="Notes" value="<?php echo e($editOrderacknowledgementData->note); ?>">
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
                                    <table id="quotationprds" class="table table-bordered table-striped">

                                        <thead class="thead-purple">
                                            <tr>
                                                <th style="width:30%">Description / Drawing No</th>
                                                <th style="width:10%">HSN No</th>
                                                <th style="width:10%">Material</th>
                                                <th style="width:10%">Due Date</th>
                                                <th style="width:5%">Qty</th>                                                
                                                <th style="width:10%">Rate</th>
                                                <th style="width:5%">Per</th>
                                                <th style="width:5%">Unit</th>
                                                <th style="width:10%">Total</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody id="productItem">
                                        <?php $__currentLoopData = $editOaProductData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $editOaProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($editOaProduct['description']); ?><input type="hidden" class="description" name="description[]" value="<?php echo e($editOaProduct['description']); ?>"></td>
                                                <td><?php echo e($editOaProduct['drawingNo']); ?><input type="hidden" class="drawingNo" name="drawingNo[]" value="<?php echo e($editOaProduct['drawingNo']); ?>"></td>
                                                <td><?php echo e($editOaProduct['material']); ?><input type="hidden" class="material" name="material[]" value="<?php echo e($editOaProduct['material']); ?>"></td>
                                                <td><input type="date" class="dueDate form-control" name="dueDate[]" value="<?php echo date('m/d/Y', strtotime($editOaProduct['dueDate'])) ?>"></td>
                                                <td><?php echo e($editOaProduct['quantity']); ?><input type="hidden" class="quantity" name="quantity[]" value="<?php echo e($editOaProduct['quantity']); ?>"></td>
                                                <td><?php echo e($editOaProduct['rate']); ?><input type="hidden" class="rate" name="rate[]" value="<?php echo e($editOaProduct['rate']); ?>"></td>
                                                <td><?php echo e($editOaProduct['per']); ?><input type="hidden" class="per" name="per[]" value="<?php echo e($editOaProduct['per']); ?>"></td>
                                                <td><?php echo e($editOaProduct['unit']); ?><input type="hidden" class="unit" name="unit[]" value="<?php echo e($editOaProduct['unit']); ?>"></td>
                                                <td><?php echo e($editOaProduct['total']); ?><input type="hidden" class="total" name="total[]" value="<?php echo e($editOaProduct['total']); ?>"></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>