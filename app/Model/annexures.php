<?php
namespace App\Model;
//use Illuminate\Database\Eloquent\Model;
 use Eloquent;
class annexures extends Eloquent
{

	#define table name
	protected $table="annexure";
    protected $primaryKey = 'annexureId';
	protected $fillable = [ 'quotationId',
							'ctsYear',
                            'ctsRef',
							'ctsDate',
                            'priceBasis',
                            'salesTax',
                            'exciseDuty',
                            'centralSalesTax',
                            'payment',
                            'pfCharges',
                            'delivery',
                            'validity',
                            'pdf',
                            'mailpdf',
                            'createdAt',
                            'updatedAt'
                        ];
	public $timestamps = false;


}