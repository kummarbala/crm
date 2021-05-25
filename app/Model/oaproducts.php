<?php
namespace App\Model;
//use Illuminate\Database\Eloquent\Model;
 use Eloquent;
class oaproducts extends Eloquent
{

	#define table name
	protected $table="oaproducts";
    protected $primaryKey = 'oaProductId';
	protected $fillable = [ 'orderAckId',
							'description',
                            'drawingNo',
							'material',
                            'dueDate',
                            'quantity',
                            'rate',
                            'per',
                            'unit',
                            'total',
                            'createdAt',
                            'updatedAt'
                        ];
	public $timestamps = false;


}