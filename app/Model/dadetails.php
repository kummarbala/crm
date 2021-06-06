<?php
namespace App\Model;
//use Illuminate\Database\Eloquent\Model;
 use Eloquent;
class dadetails extends Eloquent
{

	#define table name
	protected $table="dadetails";
    protected $primaryKey = 'despatchadviceIProductd';
	protected $fillable = [ 'despatchadviceId',
							'deatil',                            
                            'createdAt',
                            'updatedAt'
                        ];
	public $timestamps = false;


}