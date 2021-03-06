<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Dashboard Controller
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Customers Controller
Route::get('/customers.html', ['middleware' => 'auth', 'uses' => 'CustomerController@index'])->name('customers');
Route::match(array('GET', 'POST'), 'addcustomer.html', ['middleware' => 'auth', 'uses' => 'CustomerController@addCustomer'])->name('addcustomer');
Route::match(array('GET', 'POST'), 'addcustomersubmit.html', ['middleware' => 'auth', 'uses' => 'CustomerController@addCustomerSubmit'])->name('addcustomersubmit');
Route::match(array('GET', 'POST'), 'editcustomer.html/{customerid}', ['middleware' => 'auth', 'uses' => 'CustomerController@editCustomer'])->name('editcustomer');
Route::match(array('GET', 'POST'), 'editcustomersubmit.html/{customerid}', ['middleware' => 'auth', 'uses' => 'CustomerController@editCustomerSubmit'])->name('editcustomersubmit');
Route::match(array('GET', 'POST'), 'deletecustomer.html/{customerid}', ['middleware' => 'auth', 'uses' => 'CustomerController@deleteCustomer'])->name('deletecustomer');

// Quotations Controller
Route::get('/quotations.html', 'QuotationController@index')->name('quotations');
Route::match(array('GET', 'POST'), 'addquotation.html', ['middleware' => 'auth', 'uses' => 'QuotationController@addQuotation'])->name('addquotation');
Route::match(array('GET', 'POST'), 'addquotationsubmit.html', ['middleware' => 'auth', 'uses' => 'QuotationController@addQuotationSubmit'])->name('addquotationsubmit');
Route::match(array('GET', 'POST'), 'editquotation.html/{quotationId}', ['middleware' => 'auth', 'uses' => 'QuotationController@editQuotation'])->name('editquotation');
Route::match(array('GET', 'POST'), 'editquotationsubmit.html/{quotationId}', ['middleware' => 'auth', 'uses' => 'QuotationController@editQuotationSubmit'])->name('editquotationsubmit');
Route::match(array('GET', 'POST'), 'dulicatequotation.html/{quotationId}', ['middleware' => 'auth', 'uses' => 'QuotationController@dulicateQuotation'])->name('dulicatequotation');

Route::match(array('GET', 'POST'), 'deletequotation.html/{quotationId}', ['middleware' => 'auth', 'uses' => 'QuotationController@deleteQuotation'])->name('deletequotation');

// other Ajaxx call in quotation page
Route::match(array('GET', 'POST'), 'getproductdescriptiondata.html', 'QuotationController@getProductDescriptionData')->name('getproductdescriptiondata');
Route::match(array('GET', 'POST'), 'getcustomerdetails.html', 'QuotationController@getCustomerDetails')->name('getCustomerDetails');
Route::match(array('GET', 'POST'), 'generatequotepdf.html/{quotationId}', 'QuotationController@generateQuotePdf')->name('generatequotepdf');


// Annexure Controller
Route::get('/annexures.html', 'AnnexureController@index')->name('annexures');
Route::match(array('GET', 'POST'), 'addannexure.html', ['middleware' => 'auth', 'uses' => 'AnnexureController@addAnnexure'])->name('addannexure');
Route::match(array('GET', 'POST'), 'addannexuresubmit.html', ['middleware' => 'auth', 'uses' => 'AnnexureController@addAnnexureSubmit'])->name('addannexuresubmit');
Route::match(array('GET', 'POST'), 'editannexure.html/{annexureId}', ['middleware' => 'auth', 'uses' => 'AnnexureController@editAnnexure'])->name('editannexure');
Route::match(array('GET', 'POST'), 'editannexuresubmit.html/{annexureId}', ['middleware' => 'auth', 'uses' => 'AnnexureController@editAnnexureSubmit'])->name('editannexuresubmit');
Route::match(array('GET', 'POST'), 'deleteannexure.html/{annexureId}', ['middleware' => 'auth', 'uses' => 'AnnexureController@deleteAnnexure'])->name('deleteannexure');


// other Ajaxx call in annexure page
Route::match(array('GET', 'POST'), 'getquotationdetails.html', 'AnnexureController@getQuotationDetails')->name('getquotationdetails');
Route::match(array('GET', 'POST'), 'export.html', 'AnnexureController@export_pdf')->name('export');

// Order Ack Controller
Route::get('/orderacknowledgements.html', ['middleware' => 'auth', 'uses' => 'OrderAcknowledgementController@index'])->name('orderacknowledgements');
Route::match(array('GET', 'POST'), 'addorderacknowledgement.html', ['middleware' => 'auth', 'uses' => 'OrderAcknowledgementController@addOrderacknowledgement'])->name('addorderacknowledgement');
Route::match(array('GET', 'POST'), 'addorderacknowledgementsubmit.html', ['middleware' => 'auth', 'uses' => 'OrderAcknowledgementController@addOrderacknowledgementSubmit'])->name('addorderacknowledgementsubmit');
Route::match(array('GET', 'POST'), 'editorderacknowledgement.html/{orderAckId}', ['middleware' => 'auth', 'uses' => 'OrderAcknowledgementController@editOrderacknowledgement'])->name('editorderacknowledgement');
Route::match(array('GET', 'POST'), 'editorderacknowledgementsubmit.html/{orderAckId}', ['middleware' => 'auth', 'uses' => 'OrderAcknowledgementController@editOrderacknowledgementSubmit'])->name('editorderacknowledgementsubmit');
Route::match(array('GET', 'POST'), 'deleteorderacknowledgement.html/{orderAckId}', ['middleware' => 'auth', 'uses' => 'OrderAcknowledgementController@deleteOrderacknowledgement'])->name('deleteorderacknowledgement');


// other Ajaxx call in Order Ack page
Route::match(array('GET', 'POST'), 'getorderdetailsbyquotationid.html',  ['middleware' => 'auth', 'uses' => 'OrderAcknowledgementController@getOrdeDdetailsByQuotationId'])->name('getorderdetailsbyquotationid');


// Delivery Challan Controller
Route::get('/deliverychallans.html', ['middleware' => 'auth', 'uses' => 'DeliveryChallanController@index'])->name('deliverychallans');
Route::match(array('GET', 'POST'), 'adddeliverychallan.html', ['middleware' => 'auth', 'uses' => 'DeliveryChallanController@addDeliveryChallan'])->name('adddeliverychallan');
Route::match(array('GET', 'POST'), 'adddeliverychallansubmit.html', ['middleware' => 'auth', 'uses' => 'DeliveryChallanController@addDeliveryChallanSubmit'])->name('adddeliverychallansubmit');
Route::match(array('GET', 'POST'), 'editdeliverychallan.html/{deliveryChallanId}', ['middleware' => 'auth', 'uses' => 'DeliveryChallanController@editDeliveryChallan'])->name('editdeliverychallan');
Route::match(array('GET', 'POST'), 'editdeliverychallansubmit.html/{deliveryChallanId}', ['middleware' => 'auth', 'uses' => 'DeliveryChallanController@editDeliveryChallanSubmit'])->name('editdeliverychallansubmit');
Route::match(array('GET', 'POST'), 'deletedeliverychallan.html/{deliveryChallanId}', ['middleware' => 'auth', 'uses' => 'DeliveryChallanController@deleteDeliveryChallan'])->name('deletedeliverychallan');



// other Ajaxx call in Delivery Challan page
Route::match(array('GET', 'POST'), 'getorderdetailsbyackno.html',  ['middleware' => 'auth', 'uses' => 'DeliveryChallanController@getOrderDetailsByAckNo'])->name('getorderdetailsbyackno');


// Despatch Advice Controller
Route::get('/despatchadvices.html', ['middleware' => 'auth', 'uses' => 'DespatchAdviceController@index'])->name('despatchadvices');


// Invoice Controller
Route::get('/invoices.html', ['middleware' => 'auth', 'uses' => 'InvoiceController@index'])->name('invoices');
Route::match(array('GET', 'POST'), 'addinvoice.html', ['middleware' => 'auth', 'uses' => 'InvoiceController@addInvoice'])->name('addinvoice');



// other Ajaxx call in Invoice page
Route::match(array('GET', 'POST'), 'getdcdetailsbychallan.html',  ['middleware' => 'auth', 'uses' => 'InvoiceController@getDcDetailsByChallan'])->name('getdcdetailsbychallan');
Route::match(array('GET', 'POST'), 'currencystring.html',  ['middleware' => 'auth', 'uses' => 'InvoiceController@currencyString'])->name('currencystring');










