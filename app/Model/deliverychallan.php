<?php
namespace App\Model;
//use Illuminate\Database\Eloquent\Model;
 use Eloquent;
class deliverychallan extends Eloquent
{

	#define table name
	protected $table="deliverychallan";
    protected $primaryKey = 'deliveryChallanId';
	protected $fillable = [ 'challanNo',
							'orderAckNo',
                            'ctsYear',
							'customerId',
                            'poNo',
                            'modeDespatch',
                            'dcDate',
                            'noPackages',
                            'rrLrNo',
                            'rrDate',
                            'contactPerson',                            
                            'pdf',
                            'createdAt',
                            'updatedAt'
                        ];
	public $timestamps = false;


}