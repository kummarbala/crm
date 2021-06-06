<?php

namespace App\Http\Controllers;

use Request;
use App\Model\deliverychallan;
use App\Model\customers;
use App\Model\oaproducts;
use App\Model\dcProducts;

use DB;
use PDF;

class DespatchAdviceController extends Controller
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
        $footerScript = 'despatchadvice.js' ;
        $page = 'despatchadvice';
        $despatchadvicesData = DB::table('despatchadvice')
            ->join('customers', 'customers.customerId', '=', 'despatchadvice.customerId')
            ->select('despatchadvice.*', 'customers.name')
            ->orderBy('despatchadvice.despatchdviceId','desc')
            ->get();     
        
        return view('despatchadvice.despatchadvices')
        ->with('despatchadvicesData',$despatchadvicesData)
        ->with('page',$page)
        ->with('footerScript',$footerScript);
    }

    // Add Orderacknowledgement
    public function addDeliveryChallan()
    {
        $footerScript = 'deliverychallan.js' ;
        $page = 'deliverychallan';

        $oAData = DB::table('orderacknowledgement')
        ->select(
            'orderacknowledgement.orderAckNo'
        )
        ->whereNotExists( function ($query)  {
            $query->select(DB::raw(1))
            ->from('deliverychallan')
            ->whereRaw('orderacknowledgement.orderAckNo = deliverychallan.orderAckNo');            
        })
        ->orderBy('orderacknowledgement.orderAckNo','desc')
        ->get();

        $deliveryChallanData = DB::table('deliverychallan')->orderBy('deliveryChallanId','DESC')->first();
        $getChallanNo = $deliveryChallanData->challanNo+1;
        $challanNo = sprintf('%04d', $getChallanNo);
        

        return view('deliverychallan.adddeliverychallan')
        ->with('oAData',$oAData)
        ->with('page',$page)
        ->with('challanNo',$challanNo)
        ->with('footerScript',$footerScript);
    }

    public function addDeliveryChallanSubmit(){
        // echo '<pre>';
        // print_r(Request::all());
        // exit;
       
       try{ 
            $addDeliveryChallan = array();
            $addDeliveryChallan['challanNo']    = Request::get('challanNo');
            $addDeliveryChallan['orderAckNo']   = Request::get('orderAckNo');
            $addDeliveryChallan['ctsYear']      = Request::get('ctsYear');
            $addDeliveryChallan['customerId']   = Request::get('customerId');
            $addDeliveryChallan['poNo']         = Request::get('poNo');
            $addDeliveryChallan['modeDespatch'] = Request::get('modeDespatch');
            $addDeliveryChallan['dcDate']       = Request::get('dcDate');
            $addDeliveryChallan['noPackages']   = Request::get('noPackages');
            $addDeliveryChallan['rrLrNo']       = Request::get('rrLrNo');
            $addDeliveryChallan['rrDate']       = Request::get('rrDate');
            $addDeliveryChallan['contactPerson']= Request::get('contactPerson');            
            $addDeliveryChallan['createdAt']    = date('Y-m-d H:i:s');
            $addDeliveryChallan['updatedAt']    = date('Y-m-d H:i:s');

            $lastInserteAddDeliveryChallan = deliverychallan::create($addDeliveryChallan); 
            $deliveryChallanId = $lastInserteAddDeliveryChallan->deliveryChallanId;   
            if($deliveryChallanId ){
                $description        = Request::get('description');
                $drawingNo          = Request::get('drawingNo');
                $material           = Request::get('material');
                $quantity           = Request::get('quantity');
                $rate               = Request::get('rate');
                $unit               = Request::get('unit');                
                $total              = Request::get('total');  
                $remarks              = Request::get('remarks');  

                if(sizeof($description) >0 ){
                    for($i=0;$i<sizeof($description);$i++){
                        $dcProducts = array();
                        $dcProducts['deliveryChallanId']    = $deliveryChallanId;
                        $dcProducts['description']          = $description[$i];
                        $dcProducts['drawingNo']            = $drawingNo[$i];
                        $dcProducts['material']             = $material[$i];
                        $dcProducts['quantity']             = $quantity[$i];                        
                        $dcProducts['rate']                 = $rate[$i];
                        $dcProducts['unit']                 = $unit[$i];
                        $dcProducts['total']                = $total[$i];
                        $dcProducts['remarks']              = $remarks[$i];
                        $dcProducts['createdAt']            = date('Y-m-d H:i:s');
                        $dcProducts['updatedAt']            = date('Y-m-d H:i:s');

                        $lastInsertedAaProducts     = dcProducts::create($dcProducts);                        
                    }
                    if($deliveryChallanId){
                        return redirect('/deliverychallans.html')
                        ->with('success',"Delivery Challan added successfully");
                    }
                } 
            }

       }catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            echo $e->getMessage();  
        }

        
    }

    public function editDeliveryChallan($deliveryChallanId)
    {
        $footerScript = 'deliverychallan.js' ;
        $page = 'deliverychallan0';

        // $quotationsData = DB::table('orderacknowledgement')
        // ->select(
        //    'orderacknowledgement.* 

        $editDeliveryChallanIdData = DB::table('deliverychallan')
            ->join('customers', 'customers.customerId', '=', 'deliverychallan.customerId')
            ->where('deliverychallan.deliveryChallanId','=',$deliveryChallanId)
            ->select('deliveryChallan.*','customers.*')
            ->get();

        $editDcProductData = dcproducts::where('deliveryChallanId',$deliveryChallanId)->get();
        
        

        return view('deliverychallan.editdeliverychallan')
        ->with('editDeliveryChallanIdData',$editDeliveryChallanIdData[0])
        ->with('editDcProductData',$editDcProductData)
        ->with('page',$page)
        ->with('footerScript',$footerScript);
    }

    public function editDeliveryChallanSubmit($deliveryChallanId)
    {
                
        try{
            $editDeliveryChallan = deliverychallan::find($deliveryChallanId);
            $editDeliveryChallan->challanNo         = Request::get('challanNo');
            $editDeliveryChallan->orderAckNo          = Request::get('orderAckNo');
            $editDeliveryChallan->ctsYear     = Request::get('ctsYear');
            $editDeliveryChallan->customerId         = Request::get('customerId');
            $editDeliveryChallan->poNo      = Request::get('poNo');
            $editDeliveryChallan->modeDespatch     = Request::get('modeDespatch');
            $editDeliveryChallan->dcDate         = Request::get('dcDate');
            $editDeliveryChallan->noPackages           = Request::get('noPackages');
            $editDeliveryChallan->rrLrNo  = Request::get('rrLrNo');
            $editDeliveryChallan->rrDate  = Request::get('rrDate');
            $editDeliveryChallan->contactPerson  = Request::get('contactPerson');
            $editDeliveryChallan->updatedAt       = date('Y-m-d H:i:s');

            if($editDeliveryChallan->save()){
                $productDelete      =  dcProducts::where('deliveryChallanId','=',$deliveryChallanId)->delete();
                $description        = Request::get('description');
                $drawingNo          = Request::get('drawingNo');
                $material           = Request::get('material');
                $quantity           = Request::get('quantity');
                $rate               = Request::get('rate');
                $unit               = Request::get('unit');                
                $total              = Request::get('total');  
                $remarks            = Request::get('remarks');  

                if(sizeof($description) >0 ){
                    for($i=0;$i<sizeof($description);$i++){
                        $dcProducts = array();
                        $dcProducts['deliveryChallanId']    = $deliveryChallanId;
                        $dcProducts['description']          = $description[$i];
                        $dcProducts['drawingNo']            = $drawingNo[$i];
                        $dcProducts['material']             = $material[$i];
                        $dcProducts['quantity']             = $quantity[$i];                        
                        $dcProducts['rate']                 = $rate[$i];
                        $dcProducts['unit']                 = $unit[$i];
                        $dcProducts['total']                = $total[$i];
                        $dcProducts['remarks']              = $remarks[$i];
                        $dcProducts['createdAt']            = date('Y-m-d H:i:s');
                        $dcProducts['updatedAt']            = date('Y-m-d H:i:s');  
                        
                        $lastInsertedAaProducts     = dcProducts::create($dcProducts);     
                    }
                    if($deliveryChallanId){
                        return redirect('/deliverychallans.html')
                        ->with('success',"Delivery Challan updated successfully");
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
    public function deleteDeliveryChallan($deliveryChallanId)
    {
        $deleteDcData = deliverychallan::find($deliveryChallanId);
        $deleteDcProductData = dcProducts::where('deliveryChallanId','=',$deliveryChallanId)->delete();
        if($deleteDcData->delete() ){
            return redirect('/deliverychallans.html')
            ->with('success',"Delivery Challan deleted successfully");

        }
    }

    public function getOrderDetailsByAckNo()
    {
        $orderAckNo =  Request::get('orderAckNo');
        $oAData = DB::table('orderacknowledgement')
            //->join('quotations', 'quotations.quotationId', '=', 'annexure.quotationId')
            ->join('customers', 'customers.customerId', '=', 'orderacknowledgement.customerId')
            ->select('orderacknowledgement.*', 'customers.*')
            ->Where('orderacknowledgement.orderAckNo',$orderAckNo)
            ->get();
            
         $orderAckId  = $oAData[0]->orderAckId;
        
        $oAProductData = oaproducts::where('orderAckId',$orderAckId)->get();
        
        $oAData->put('products', $oAProductData);
        

        echo json_encode( $oAData);   
        exit;       

    }
    
    

}