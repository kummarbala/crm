<?php
namespace App\Model;
//use Illuminate\Database\Eloquent\Model;
 use Eloquent;
class dcproducts extends Eloquent
{

	#define table name
	protected $table="dcproducts";
    protected $primaryKey = 'dcProductId';
	protected $fillable = [ 'deliveryChallanId',
							'description',
                            'drawingNo',
							'material',                            
                            'quantity',
                            'rate',                            
                            'unit',
                            'total',
                            'remarks',
                            'createdAt',
                            'updatedAt'
                        ];
	public $timestamps = false;


}