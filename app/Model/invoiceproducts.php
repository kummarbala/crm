<?php
namespace App\Model;
//use Illuminate\Database\Eloquent\Model;
 use Eloquent;
class invoiceproducts extends Eloquent
{

	#define table name
	protected $table="invoiceproducts";
    protected $primaryKey = 'invoiceProductId';
	protected $fillable = [ 'invoiceId',
							'description',
                            'drawingNo',
							'material',                            
                            'quantity',
                            'rate',                            
                            'unit',
                            'total',
                            'createdAt',
                            'updatedAt'
                        ];
	public $timestamps = false;


}