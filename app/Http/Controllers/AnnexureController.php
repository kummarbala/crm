<?php

namespace App\Http\Controllers;

use Request;
use App\Model\customers;
use App\Model\quotations;
use App\Model\annexures;

use DB;
use PDF;


class AnnexureController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        
    }

    public function export_pdf()
  {
    // Fetch all customers from database
    $data = $annexuresData = DB::table('annexure')
    ->join('quotations', 'quotations.quotationId', '=', 'annexure.quotationId')
    ->join('customers', 'customers.customerId', '=', 'quotations.customerId')
    ->select('annexure.*', 'customers.name','quotations.ctsRef','quotations.orderNo')
    ->orderBy('quotations.orderNo','desc')
    ->get();
    // Send data to the view using loadView function of PDF facade
    view()->share('annexure',$data);
    $pdf = PDF::loadView('annexure.annexurespdf', compact('data'));
    // If you want to store the generated pdf to the server then you can use the store function
    $pdf->save(storage_path().'_filename.pdf');
    // Finally, you can download the file using download function
    return $pdf->download('customers.pdf');
  }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footerScript = 'annexure.js' ;
        $page = 'annexure';
        
        $annexuresData = DB::table('annexure')
            ->join('quotations', 'quotations.quotationId', '=', 'annexure.quotationId')
            ->join('customers', 'customers.customerId', '=', 'quotations.customerId')
            ->select('annexure.*', 'customers.name','quotations.ctsRef','quotations.orderNo')
            ->orderBy('quotations.orderNo','desc')
            ->get();
            

        return view('annexure.annexures')
        ->with('annexuresData',$annexuresData)
        ->with('page',$page)
        ->with('footerScript',$footerScript);
    }

    // Add Annexure
    public function addAnnexure()
    {
        $footerScript = 'annexure.js' ;
        $page = 'annexure';

        $quotationsData = DB::table('quotations')
        ->select(
            'quotations.quotationId','quotations.ctsRef'
        )
        ->whereNotExists( function ($query)  {
            $query->select(DB::raw(1))
            ->from('annexure')
            ->whereRaw('annexure.quotationId = quotations.quotationId');            
        })
        ->get();
        // = DB::table('quotations')
        
        // ->select('quotations.quotationId','quotations.ctsRef')
        // ->orderBy('quotations.orderNo','desc')
        // ->get();
        
        return view('annexure.addannexure')
        ->with('page',$page)
        ->with('quotationsData',$quotationsData)
        ->with('footerScript',$footerScript);
    }
    
    // Add Annexure submit
    public function addAnnexureSubmit()
    {
        
        $addAnnexure = array();
        $addAnnexure['quotationId']     = Request::get('quotationId');
        $addAnnexure['ctsYear']         = Request::get('ctsYear');
        $addAnnexure['ctsRef']          = Request::get('ctsRef');
        $addAnnexure['ctsDate']         = Request::get('ctsDate');
        $addAnnexure['priceBasis']      = Request::get('priceBasis');
        $addAnnexure['salesTax']        = Request::get('salesTax');
        $addAnnexure['payment']         = Request::get('payment');
        $addAnnexure['pfCharges']       = Request::get('pfCharges');
        $addAnnexure['delivery']        = Request::get('delivery');
        $addAnnexure['validity']        = Request::get('validity');
        $addAnnexure['createdAt']       = date('Y-m-d H:i:s');
        $addAnnexure['updatedAt']       = date('Y-m-d H:i:s');
        
        $lastInsertedAddannexure = annexures::create($addAnnexure);
        if($lastInsertedAddannexure){
            return redirect('/annexures.html')
            ->with('success',"Annexure added successfully");

        }
    }

    // Edit Annexure
    public function editAnnexure($annexureId)
    {
        $footerScript = 'annexure.js' ;
        $page = 'annexure';
        $editannexureData = annexures::find($annexureId);
        // echo '<pre>';
        // print_r($editannexureData);
        // exit;
        
        return view('annexure.editannexure')
        ->with('page',$page)
        ->with('editannexureData',$editannexureData)
        ->with('footerScript',$footerScript);
    }

    // edit Annexure submit
    public function editAnnexureSubmit($annexureId)
    {
        $editAnnexure = annexures::find($annexureId);
        $editAnnexure->priceBasis   = Request::get('priceBasis');
        $editAnnexure->salesTax     = Request::get('salesTax');
        $editAnnexure->payment      = Request::get('payment');
        $editAnnexure->pfCharges    = Request::get('pfCharges');
        $editAnnexure->delivery     = Request::get('delivery');
        $editAnnexure->validity     = Request::get('validity');       
        $editAnnexure->updatedAt    = date('Y-m-d H:i:s');
        
        
        if($editAnnexure->save()){
            return redirect('/annexures.html')
            ->with('success',"Annexure updated successfully");

        }
    }

    // Delete Annexure
    public function deleteAnnexure($customerId)
    {
        $deleteCustomerData = annexures::find($customerId);
        if($deleteCustomerData->delete()){
            return redirect('/annexures.html')
            ->with('success',"Annexure deleted successfully");

        }
    }

    
    // Quotation details    
    public function getQuotationDetails()
    {
        $quotationId =  Request::get('quotationId');        
        $quotationsData = quotations::where('quotationId',$quotationId)->get();    
        
        echo json_encode( $quotationsData);   
        exit;       
    }

}