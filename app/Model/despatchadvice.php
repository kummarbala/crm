<?php
namespace App\Model;
//use Illuminate\Database\Eloquent\Model;
 use Eloquent;
class despatchadvice extends Eloquent
{

	#define table name
	protected $table="despatchadvice";
    protected $primaryKey = 'despatchdviceId';
	protected $fillable = [ 'orderAckNo',
							'customerId',
                            'despatchdviceDate',
							'supplyOf',
                            'yourOrderOf',
                            'orderDate',
                            'contactPerson',
                            'billsOfMs',
                            'billsOfMs2',
                            'bearingNo',
                            'bearingDate',
                            'destination',
                            'invoiceNo',
                            'price',
                            'pdf',
                            'createdAt',
                            'updatedAt'
                        ];
	public $timestamps = false;


}