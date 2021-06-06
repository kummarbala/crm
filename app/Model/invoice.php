<?php
namespace App\Model;
//use Illuminate\Database\Eloquent\Model;
 use Eloquent;
class despatchadvice extends Eloquent
{

	#define table name
	protected $table="invoice";
    protected $primaryKey = 'invoiceId';
	protected $fillable = [ 'invoiceNo',
							'invoiceDate',
                            'challanNo',
							'dcDate',
                            'orderAckNo',
                            'ctsYear',
                            'customerId',
                            'poref',
                            'despatchDetails',
                            'pfCharges',
                            'tpiCharges',
                            'othertpi',
                            'tpiChargesamt',
                            'otherpf',
                            'pfChargesamt' ,
                            'fromxxx' ,
                            'docNeg' ,
                            'friDetails' ,
                            'stax' ,
                            'salestax' ,
                            'cgsttax' ,
                            'ctaxamt' ,
                            'sgsttax' ,
                            'staxamt' ,
                            'igsttax' ,
                            'itaxamt' ,
                            'taxNoOnly' ,
                            'contactPerson' ,
                            'totalAmt' ,
                            'vat' ,
                            'taxAmt' ,
                            'friDetailsAmt' ,
                            'otherFd' ,
                            'totalAmtWithTax' ,
                            'amtInWords' ,
                            'pdf',
                            'createdAt',
                            'updatedAt'
                        ];
	public $timestamps = false;


}