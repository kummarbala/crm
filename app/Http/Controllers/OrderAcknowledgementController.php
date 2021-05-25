<?php

namespace App\Http\Controllers;

use Request;
use App\Model\orderacknowledgement;
use App\Model\customers;
use App\Model\oaproducts;
use App\Model\quotationproducts;

use DB;
use PDF;

class OrderAcknowledgementController extends Controller
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
        $footerScript = 'orderacknowledgement.js' ;
        $page = 'orderacknowledgement';
        $orderacknowledgementsData = DB::table('orderacknowledgement')
            ->join('customers', 'customers.customerId', '=', 'orderacknowledgement.customerId')
            ->select('orderacknowledgement.*', 'customers.name')
            ->orderBy('orderacknowledgement.orderAckNo','desc')
            ->get();
            
            

        
        return view('orderacknowledgement.orderacknowledgements')
        ->with('orderacknowledgementsData',$orderacknowledgementsData)
        ->with('page',$page)
        ->with('footerScript',$footerScript);
    }

    // Add Orderacknowledgement
    public function addOrderacknowledgement()
    {
        $footerScript = 'orderacknowledgement.js' ;
        $page = 'orderacknowledgement';

        $quotationsData = DB::table('quotations')
        ->select(
            'quotations.quotationId','quotations.ctsRef'
        )
        ->whereNotExists( function ($query)  {
            $query->select(DB::raw(1))
            ->from('orderacknowledgement')
            ->whereRaw('orderacknowledgement.quotationId = quotations.quotationId');            
        })
        ->orderBy('quotations.orderNo','desc')
        ->get();

        $orderacknowledgementData = DB::table('orderacknowledgement')->orderBy('orderAckId','DESC')->first();
        $getackNo = substr($orderacknowledgementData->orderAckNo,4)+1;;
        $ackNo = date('y') .date('m').sprintf('%03d', $getackNo);
        

        return view('orderacknowledgement.addorderacknowledgement')
        ->with('quotationsData',$quotationsData)
        ->with('page',$page)
        ->with('ackNo',$ackNo)
        ->with('footerScript',$footerScript);
    }

    public function addOrderacknowledgementSubmit(){
       
       try{ 
            $addOrderacknowledgement = array();
            $addOrderacknowledgement['customerId'] = Request::get('customerId');
            $addOrderacknowledgement['ctsYear'] = Request::get('ctsYear');
            $addOrderacknowledgement['orderAckNo'] = Request::get('orderAckNo');
            $addOrderacknowledgement['orderDate'] = Request::get('orderDate');
            $addOrderacknowledgement['poNo'] = Request::get('poNo');
            $addOrderacknowledgement['enquireyNo'] = Request::get('enquireyNo');
            $addOrderacknowledgement['quotationId'] = Request::get('quotationId');
            $addOrderacknowledgement['priceBasis'] = Request::get('priceBasis');
            $addOrderacknowledgement['modeDespatch'] = Request::get('modeDespatch');
            $addOrderacknowledgement['destination'] = Request::get('destination');

            $addOrderacknowledgement['freightDetails'] = Request::get('freightDetails');
            $addOrderacknowledgement['consignee'] = Request::get('consignee');
            $addOrderacknowledgement['packingForward'] = Request::get('packingForward');
            $addOrderacknowledgement['terms'] = Request::get('terms');
            // $addOrderacknowledgement['hsnCode'] = Request::get('hsnCode');
            $addOrderacknowledgement['tax'] = Request::get('tax');
            $addOrderacknowledgement['taxNoOnly'] = substr(Request::get('tax'),0, -1);
            $addOrderacknowledgement['contactPerson'] = Request::get('contactPerson');
            $addOrderacknowledgement['note'] = Request::get('note');
            $addOrderacknowledgement['orderNo'] = "";
            $addOrderacknowledgement['createdAt'] = date('Y-m-d H:i:s');
            $addOrderacknowledgement['updatedAt'] = date('Y-m-d H:i:s');

            $lastInserteAaddOrderacknowledgement = orderacknowledgement::create($addOrderacknowledgement); 
            $orderAckId = $lastInserteAaddOrderacknowledgement->orderAckId;   
            if($orderAckId ){
                $description        = Request::get('description');
                $drawingNo          = Request::get('drawingNo');
                $material           = Request::get('material');
                $dueDate            = Request::get('dueDate');
                $quantity           = Request::get('quantity');
                $rate               = Request::get('rate');
                $per                = Request::get('per');
                $unit               = Request::get('unit');                
                $total              = Request::get('total');  
                if(sizeof($description) >0 ){
                    for($i=0;$i<sizeof($description);$i++){
                        $oaProducts = array();
                        $oaProducts['orderAckId']     = $orderAckId;
                        $oaProducts['description']    = $description[$i];
                        $oaProducts['drawingNo']      = $drawingNo[$i];
                        $oaProducts['material']       = $material[$i];
                        $oaProducts['dueDate']        = $dueDate[$i];
                        $oaProducts['quantity']       = $quantity[$i];                        
                        $oaProducts['rate']           = $rate[$i];
                        $oaProducts['per']            = $per[$i];
                        $oaProducts['unit']           = $unit[$i];
                        $oaProducts['total']          = $total[$i];
                        $oaProducts['createdAt']      = date('Y-m-d H:i:s');
                        $oaProducts['updatedAt']      = date('Y-m-d H:i:s');
                        $lastInsertedAaProducts = oaproducts::create($oaProducts);                        
                    }
                    if($orderAckId){
                        return redirect('/orderacknowledgements.html')
                        ->with('success',"Order Acknowledgement added successfully");
                    }
                } 
            }

       }catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            echo $e->getMessage();  
        }

        
    }

    public function editOrderacknowledgement($orderAckId)
    {
        $footerScript = 'orderacknowledgement.js' ;
        $page = 'orderacknowledgement';

        // $quotationsData = DB::table('orderacknowledgement')
        // ->select(
        //    'orderacknowledgement.* 

        $editOrderacknowledgementData = DB::table('orderacknowledgement')
            ->join('quotations', 'quotations.quotationId', '=', 'orderacknowledgement.quotationId')
            ->join('customers', 'customers.customerId', '=', 'orderacknowledgement.customerId')
            ->where('orderacknowledgement.orderAckId','=',$orderAckId)
            ->select('orderacknowledgement.*','quotations.*','customers.*')
            ->get();

        $editOaProductData = oaproducts::where('orderAckId',$orderAckId)->get();
        
        

        return view('orderacknowledgement.editorderacknowledgement')
        ->with('editOrderacknowledgementData',$editOrderacknowledgementData[0])
        ->with('editOaProductData',$editOaProductData)
        ->with('page',$page)
        ->with('footerScript',$footerScript);
    }

    public function editOrderacknowledgementSubmit($orderAckId)
    {
        try{
            $editOrderacknowledgement = orderacknowledgement::find($orderAckId);
            $editOrderacknowledgement->ctsYear         = Request::get('ctsYear');
            $editOrderacknowledgement->orderAckNo          = Request::get('orderAckNo');
            $editOrderacknowledgement->orderDate     = Request::get('orderDate');
            $editOrderacknowledgement->poNo         = Request::get('poNo');
            $editOrderacknowledgement->enquireyNo      = Request::get('enquireyNo');
            $editOrderacknowledgement->priceBasis   = Request::get('priceBasis');
            $editOrderacknowledgement->modeDespatch     = Request::get('modeDespatch');
            $editOrderacknowledgement->destination         = Request::get('destination');
            $editOrderacknowledgement->freightDetails           = Request::get('freightDetails');
            $editOrderacknowledgement->consignee  = Request::get('consignee');
            $editOrderacknowledgement->packingForward  = Request::get('packingForward');
            $editOrderacknowledgement->terms  = Request::get('terms');
            $editOrderacknowledgement->contactPerson  = Request::get('contactPerson');
            $editOrderacknowledgement->note  = Request::get('note');
            $editOrderacknowledgement->updatedAt       = date('Y-m-d H:i:s');

            if($editOrderacknowledgement->save()){
                $productDelete      =  oaproducts::where('orderAckId','=',$orderAckId)->delete();
                $description        = Request::get('description');
                $drawingNo          = Request::get('drawingNo');
                $material           = Request::get('material');
                $dueDate            = Request::get('dueDate');
                $quantity           = Request::get('quantity');
                $rate               = Request::get('rate');
                $per                = Request::get('per');
                $unit               = Request::get('unit');                
                $total              = Request::get('total');  
                if(sizeof($description) >0 ){
                    for($i=0;$i<sizeof($description);$i++){
                        $oaProducts = array();
                        $oaProducts['orderAckId']     = $orderAckId;
                        $oaProducts['description']    = $description[$i];
                        $oaProducts['drawingNo']      = $drawingNo[$i];
                        $oaProducts['material']       = $material[$i];
                        $oaProducts['dueDate']        = $dueDate[$i];
                        $oaProducts['quantity']       = $quantity[$i];                        
                        $oaProducts['rate']           = $rate[$i];
                        $oaProducts['per']            = $per[$i];
                        $oaProducts['unit']           = $unit[$i];
                        $oaProducts['total']          = $total[$i];
                        $oaProducts['createdAt']      = date('Y-m-d H:i:s');
                        $oaProducts['updatedAt']      = date('Y-m-d H:i:s');
                        $lastInsertedAaProducts = oaproducts::create($oaProducts);                        
                    }
                    if($orderAckId){
                        return redirect('/orderacknowledgements.html')
                        ->with('success',"Order Acknowledgement updated successfully");
                    }
                } 
            }
       
            
        }catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            echo $e->getMessage();  
        }

    }

    // Delete Quotation
    public function deleteOrderacknowledgement($orderAckId)
    {
        $deleteOAData = orderacknowledgement::find($orderAckId);
        $deleteQuotationProductData = oaproducts::where('orderAckId','=',$orderAckId)->delete();
        if($deleteOAData->delete() ){
            return redirect('/orderacknowledgements.html')
            ->with('success',"Order Acknowledgement deleted successfully");

        }
    }

    public function getOrdeDdetailsByQuotationId()
    {
        $quotationId =  Request::get('quotationId');
        $quotationData = DB::table('quotations')
            //->join('quotations', 'quotations.quotationId', '=', 'annexure.quotationId')
            ->join('customers', 'customers.customerId', '=', 'quotations.customerId')
            ->select('quotations.*', 'customers.*')
            ->Where('quotations.quotationId',$quotationId)
            ->get();
        $quotationProductData = quotationproducts::where('quotationId',$quotationId)->get();
        $quotationData->put('products', $quotationProductData);
        

        echo json_encode( $quotationData);   
        exit;       

    }
    
    

}