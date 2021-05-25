<?php
namespace App\Model;
//use Illuminate\Database\Eloquent\Model;
 use Eloquent;
class quotationproducts extends Eloquent
{

	#define table name
	protected $table="quotationproducts";
    protected $primaryKey = 'quoteProductId';
	protected $fillable = [ 'quotationId',
							'description',
                            'drawingNo',
							'material',
                            'quantity',
                            'unit',
                            'rate',
                            'total',
                            'createdAt',
                            'updatedAt'
                        ];
	public $timestamps = false;


}