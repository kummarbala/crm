<?php

namespace App\Http\Controllers;

use Request;
use App\Model\customers;


class CustomerController extends Controller
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
        $footerScript = 'customers.js' ;
        $customersData = customers:: all();
        $page = 'customer';

        return view('customer.customers')
        ->with('customersData',$customersData)
        ->with('page',$page)
        ->with('footerScript',$footerScript);
    }

    // Add customer
    public function addCustomer()
    {
        $footerScript = 'customers.js' ;
        $page = 'customer';
        
        return view('customer.addcustomer')
        ->with('page',$page)
        ->with('footerScript',$footerScript);
    }
    
    // Add customer submit
    public function addCustomerSubmit()
    {
        $addCustomer = array();
        $addCustomer['name']            = Request::get('name');
        $addCustomer['address']         = htmlentities(Request::get('address'),ENT_QUOTES);
        $addCustomer['phone']           = Request::get('phone');
        $addCustomer['email']           = Request::get('email');
        $addCustomer['customerCode']   = Request::get('customerCode');
        $addCustomer['tinNo']          = Request::get('tinNo');
        $addCustomer['cstNo']          = Request::get('cstNo');
        $addCustomer['shortName']      = Request::get('shortName');
        $addCustomer['status']          = 1;
        $addCustomer['date']            = date('Y-m-d H:i:s');
        $addCustomer['createdAt']       = date('Y-m-d H:i:s');
        $addCustomer['updatedAt']       = date('Y-m-d H:i:s');
        
        $lastInsertedAddCustomer = customers::create($addCustomer);
        if($lastInsertedAddCustomer){
            return redirect('/customers.html')
            ->with('success',"Customer added successfully");

        }
    }

    // Edit customer
    public function editCustomer($customerId)
    {
        $footerScript = 'customers.js' ;
        $page = 'customer';
        $editCustomerData = customers::find($customerId);
        
        return view('customer.editcustomer')
        ->with('page',$page)
        ->with('editCustomerData',$editCustomerData)
        ->with('footerScript',$footerScript);
    }

    // edit customer submit
    public function editCustomerSubmit($customerId)
    {
        $editCustomer = customers::find($customerId);
        $editCustomer->name            = Request::get('name');
        $editCustomer->address         = htmlentities(Request::get('address'),ENT_QUOTES);
        $editCustomer->phone           = Request::get('phone');
        $editCustomer->email           = Request::get('email');
        $editCustomer->customerCode   = Request::get('customerCode');
        $editCustomer->tinNo          = Request::get('tinNo');
        $editCustomer->cstNo          = Request::get('cstNo');
        $editCustomer->shortName      = Request::get('shortName');
        $editCustomer->status          = 1;
        $editCustomer->date            = date('Y-m-d H:i:s');
        $editCustomer->updatedAt       = date('Y-m-d H:i:s');
        
        
        if($editCustomer->save()){
            return redirect('/customers.html')
            ->with('success',"Customer updated successfully");

        }
    }

    // Delete customer
    public function deleteCustomer($customerId)
    {
        $deleteCustomerData = customers::find($customerId);
        if($deleteCustomerData->delete()){
            return redirect('/customers.html')
            ->with('success',"Customer deleted successfully");

        }
    }

}