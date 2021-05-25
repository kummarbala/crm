<?php
namespace App\Model;
//use Illuminate\Database\Eloquent\Model;
 use Eloquent;
class customers extends Eloquent
{

	#define table name
	protected $table="customers";
    protected $primaryKey = 'customerId';
	protected $fillable = [ 'name',
							'address',
                            'phone',
							'email',
                            'customerCode',
                            'tinNo',
                            'cstNo',
                            'shortName',
                            'status',
                            'date',
                            'createdAt',
                            'updatedAt'
                        ];
	public $timestamps = false;


}