<?php
namespace App\Model;
//use Illuminate\Database\Eloquent\Model;
 use Eloquent;
class quotations extends Eloquent
{

	#define table name
	protected $table="quotations";
    protected $primaryKey = 'quotationId';
	protected $fillable = [ 'customerId',
							'ctsYear',
                            'ctsRef',
							'referenceNo',
                            'ctsDate',
                            'enquiryRef',
                            'contactPerson',
                            'enquiryDate',
                            'dueDate',
                            'qaNumber',
                            'notes',
                            'subRequirement',
                            'pdf'.
                            'mailPdf',
                            'mailSent',
                            'orderNo',
                            'createdAt',
                            'updatedAt'
                        ];
	public $timestamps = false;


}