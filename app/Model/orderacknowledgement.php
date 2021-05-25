<?php
namespace App\Model;
//use Illuminate\Database\Eloquent\Model;
 use Eloquent;
class orderacknowledgement extends Eloquent
{

	#define table name
	protected $table="orderacknowledgement";
    protected $primaryKey = 'orderAckId';
	protected $fillable = [ 'customerId',
							'ctsYear',
                            'orderAckNo',
							'orderDate',
                            'poNo',
                            'enquireyNo',
                            'quotationId',
                            'priceBasis',
                            'modeDespatch',
                            'destination',
                            'freightDetails',
                            'consignee',
                            'packingForward',
							'terms',
                            'hsnCode',
                            'tax',
                            'taxNoOnly',
                            'contactPerson',
							'note',
                            'pdf',
                            'createdAt',
                            'updatedAt'
                        ];
	public $timestamps = false;


}