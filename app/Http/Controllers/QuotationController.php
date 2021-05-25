<?php

namespace App\Http\Controllers;

use Request;
use App\Model\quotations;
use App\Model\customers;
use App\Model\quotationproducts;
use DB;
use PDF;

class QuotationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footerScript = 'quotation.js' ;
        $page = 'quotation';
        $quotationsData = DB::table('quotations')
            ->join('customers', 'customers.customerId', '=', 'quotations.customerId')
            ->select('quotations.*', 'customers.name')
            ->orderBy('quotations.orderNo','desc')
            ->get();
            
            

        
        return view('quotation.quotations')
        ->with('quotationsData',$quotationsData)
        ->with('page',$page)
        ->with('footerScript',$footerScript);
    }

    // Add Quotation
    public function addQuotation()
    {
        $footerScript = 'quotation.js' ;
        $page = 'quotation';
        $customersData = customers:: orderby('name')->get(); //all();
        return view('quotation.addquotation')
        ->with('customersData',$customersData)
        ->with('page',$page)
        ->with('footerScript',$footerScript);
    }
    
    // Add Quotation submit
    public function addQuotationSubmit()
    {
        try{       
            $ctsRef  = explode("/", Request::get('ctsRef'));
            $newCtsRef = $ctsRef[3];
            $year = substr(Request::get('referenceNo'), 0, -3 );
            $orderNo = $year.(int)($newCtsRef);
           
           
            $addQuotation = array();
            $addQuotation['customerId']      = Request::get('customerId');
            $addQuotation['ctsYear']         = Request::get('ctsYear');
            $addQuotation['ctsRef']          = Request::get('ctsRef');
            $addQuotation['referenceNo']     = Request::get('referenceNo');
            $addQuotation['ctsDate']         = Request::get('ctsDate');
            $addQuotation['enquiryRef']      = Request::get('enquiryRef');
            $addQuotation['contactPerson']   = Request::get('contactPerson');
            $addQuotation['enquiryDate']     = Request::get('enquiryDate');
            $addQuotation['dueDate']         = Request::get('dueDate');
            $addQuotation['notes']           = htmlentities(Request::get('notes'),ENT_QUOTES);
            $addQuotation['subRequirement']  = Request::get('subRequirement');
            $addQuotation['orderNo']         = $orderNo;
            $addQuotation['createdAt']       = date('Y-m-d H:i:s');
            $addQuotation['updatedAt']       = date('Y-m-d H:i:s');
        
            $lastInsertedAddquotation = quotations::create($addQuotation); 
            $quotationId = $lastInsertedAddquotation->quotationId;
        
        
            if($quotationId ){
                $description        = Request::get('description');
                $drawingNo          = Request::get('drawingNo');
                $material           = Request::get('material');
                $quantity           = Request::get('quantity');
                $unit               = Request::get('unit');
                $rate               = Request::get('rate');
                $total              = Request::get('total');         

                if(sizeof($description) >0 ){
                    for($i=0;$i<sizeof($description);$i++){
                        $addQuotationProducts = array();
                        $addQuotationProducts['quotationId']    = $quotationId;
                        $addQuotationProducts['description']    = $description[$i];
                        $addQuotationProducts['drawingNo']      = $drawingNo[$i];
                        $addQuotationProducts['material']       = $material[$i];
                        $addQuotationProducts['quantity']       = $quantity[$i];
                        $addQuotationProducts['unit']           = $unit[$i];
                        $addQuotationProducts['rate']           = $rate[$i];
                        $addQuotationProducts['total']          = $total[$i];
                        $addQuotationProducts['createdAt']      = date('Y-m-d H:i:s');
                        $addQuotationProducts['updatedAt']      = date('Y-m-d H:i:s');
                        $lastInsertedAddquotationProducts = quotationproducts::create($addQuotationProducts);                        
                    }
                    if($lastInsertedAddquotation ){
                        return redirect('/quotations.html')
                        ->with('success',"Quotation added successfully");
                    }
                }
            }
        }catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            echo $e->getMessage();
        }
    }

    // Edit Quotation
    public function editQuotation($quotationId)
    {
        $footerScript = 'quotation.js' ;
        $page = 'quotation';
        $editQuotationData = quotations::find($quotationId);
        $editQuotationProductData = quotationproducts::where('quotationId',$quotationId)->get();
        $customersData = customers:: orderby('name')->get();
        
        
        return view('quotation.editquotation')
        ->with('editQuotationData',$editQuotationData)
        ->with('page',$page)
        ->with('editQuotationProductData',$editQuotationProductData)
        ->with('customersData',$customersData)
        ->with('footerScript',$footerScript);
    }

    // edit Quotation submit
    public function editQuotationSubmit($quotationId)
    {           
        try{
            $editQuotation = quotations::find($quotationId);
            $editQuotation->customerId      = Request::get('customerId');
            $editQuotation->ctsYear         = Request::get('ctsYear');
            $editQuotation->ctsRef          = Request::get('ctsRef');
            $editQuotation->referenceNo     = Request::get('referenceNo');
            $editQuotation->ctsDate         = Request::get('ctsDate');
            $editQuotation->enquiryRef      = Request::get('enquiryRef');
            $editQuotation->contactPerson   = Request::get('contactPerson');
            $editQuotation->enquiryDate     = Request::get('enquiryDate');
            $editQuotation->dueDate         = Request::get('dueDate');
            $editQuotation->notes           = Request::get('notes');
            $editQuotation->subRequirement  = Request::get('subRequirement');
            $editQuotation->updatedAt       = date('Y-m-d H:i:s');
        
        
            if($editQuotation->save()){
                $productDelete      =  quotationproducts::where('quotationId','=',$quotationId)->delete();


                $description        = Request::get('description');
                $drawingNo          = Request::get('drawingNo');
                $material           = Request::get('material');
                $quantity           = Request::get('quantity');
                $unit               = Request::get('unit');
                $rate               = Request::get('rate');
                $total              = Request::get('total');  
                      

                if(sizeof($description) >0 ){
                    for($i=0;$i<sizeof($description);$i++){
                        $addQuotationProducts = array();
                        $addQuotationProducts['quotationId']    = $quotationId;
                        $addQuotationProducts['description']    = $description[$i];
                        $addQuotationProducts['drawingNo']      = $drawingNo[$i];
                        $addQuotationProducts['material']       = $material[$i];
                        $addQuotationProducts['quantity']       = $quantity[$i];
                        $addQuotationProducts['unit']           = $unit[$i];
                        $addQuotationProducts['rate']           = $rate[$i];
                        $addQuotationProducts['total']          = $total[$i];
                        $addQuotationProducts['createdAt']      = date('Y-m-d H:i:s');
                        $addQuotationProducts['updatedAt']      = date('Y-m-d H:i:s');
                        $lastInsertedAddquotationProducts = quotationproducts::create($addQuotationProducts);
                        
                    }
                    if($lastInsertedAddquotationProducts ){
                        return redirect('/quotations.html')
                        ->with('success',"Quotation updated successfully");
                    }
                }               
            }
        }catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            echo $e->getMessage();
        }
    }

    // Duplicate Quotation
    public function dulicateQuotation($quotationId)
    {
        $footerScript = 'quotation.js' ;
        $page = 'quotation';
        $editQuotationData = quotations::find($quotationId);
        $editQuotationProductData = quotationproducts::where('quotationId',$quotationId)->get();
        $customersData = customers:: orderby('name')->get();

        $quotationData = DB::table('quotations')->orderBy('quotationId','DESC')->first();
        
        $oldCtsref = explode("/", $editQuotationData['ctsRef']);
        $ctsref = explode("/", $quotationData->ctsRef);
        
        $quationId = sprintf('%03d', $ctsref[3]+1);
        $newCtsRef = $oldCtsref[0] . " / ".$oldCtsref[1] . " / ".$oldCtsref[2] . " / ". $quationId;

        
        
        return view('quotation.duplicatequotation')
        ->with('editQuotationData',$editQuotationData)
        ->with('page',$page)
        ->with('editQuotationProductData',$editQuotationProductData)
        ->with('customersData',$customersData)
        ->with('newCtsRef',$newCtsRef)
        ->with('footerScript',$footerScript);
    }

    // Delete Quotation
    public function deleteQuotation($quotationId)
    {
        $deleteQuotationData = quotations::find($quotationId);
        $deleteQuotationProductData = quotationproducts::where('quotationId','=',$quotationId)->delete();
        if($deleteQuotationData->delete() ){
            return redirect('/quotations.html')
            ->with('success',"Quotation deleted successfully");

        }
    }

    // row click
    

    public function getProductDescriptionData()
    {
        $customerId =  Request::get('customerId');
        $term =  Request::get('term');
        $quotationsData = DB::table('quotationproducts')
            ->join('quotations', 'quotations.quotationId', '=', 'quotationproducts.quotationId')
            ->join('customers', 'customers.customerId', '=', 'quotations.customerId')
            ->where('customers.customerId','=',$customerId)
            ->where('quotationproducts.description','like','%'.$term.'%')
            ->select('quotationproducts.description')
            ->distinct('quotationproducts.description')
            ->get();
            
           
        $getData  = [];
      
        if($quotationsData)
        {
            foreach($quotationsData as $d)
            {
                array_push($getData, ['label' => $d->description]);
            }
        }

        echo json_encode($getData);
   
        exit;
       
    }

    public function getCustomerDetails()
    {
        $customerId =  Request::get('customerId');
        $customerData = customers::find($customerId);
        
        $quotationData = DB::table('quotations')->orderBy('orderNo','DESC')->first();
        $year = date('Y') ;if(date('n')>=4) { $newyear =  $year." - ".($year+1) ;}else{$newyear = ($year-1)." - ". $year; }
        $year2 = date('y') ;if(date('n')>=4) { $newyear2 =  $year2.($year2+1) ;}else{$newyear2 = ($year2-1). $year2; }
        $ctsref = explode("/", $quotationData->ctsRef);
        $quationId = sprintf('%03d', $ctsref[3]+1);
        echo   $ctsData = "CTS / ". $customerData->shortName . " / ".$newyear. " /". $quationId."~".$newyear2.$quationId;    
        exit;              
    }

    public function generateQuotePdf($quotationId)
    {
        
        // $pdfQuotationData = quotations::find($quotationId);
        $quotationData = DB::table('quotations')
            ->join('customers', 'customers.customerId', '=', 'quotations.customerId')
            ->select('quotations.*', 'customers.name','customers.name','customers.address')
            ->where('quotations.quotationId',$quotationId)
            ->get();
        $pdfQuotationData = $quotationData[0];
            // echo '<pre>';
            // print_r($pdfQuotationData);
            // exit;
        $pdfQuotationProductData = quotationproducts::where('quotationId',$quotationId)->get();
        // return view('quotation.pdfquotation')
        // ->with('pdfQuotationData',$pdfQuotationData)
        // ->with('pdfQuotationProductData',$pdfQuotationProductData);
        $data = [
            'pdfQuotationData'     => $pdfQuotationData,
            'pdfQuotationProductData' => $pdfQuotationProductData,
            
        ];
        // view()->share('pdfquotation',$data);
        $pdf = PDF::loadView('quotation.pdfquotation', compact('pdfQuotationData', 'pdfQuotationProductData'))->setPaper('a4', '');
        $pdf->save(storage_path().'_filename.pdf');
        return $pdf->download('customers.pdf');

    }

}