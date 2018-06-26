<?php namespace Expressuals\Pbform\Models;

use Model;

/**
 * Model
 */
class Register extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /**
     * @var array Validation rules
     */
    // public $rules = [
    // ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'expressuals_pbform_register';
    protected $fillable = ['*'];

    public $rules = [
        // 'surname' => 'required',
        // 'other_name' => 'required',
        // 'gender' => 'required',
        // 'gender' => 'telephone',
        // 'email' => 'required|email',
        // 'address' => 'required',
        // 'telephone' => 'required',
        // 'lga_id' => 'required',
        // 'area_business_id' => 'required',
        // 'industry_id' => 'required',
        // 'registered' => 'required',
        // 'existed' => 'required',
    ];

    public $belongsTo = [
        'businessArea' => 'Expressuals\Pbform\Models\BusinessArea',
        'industry' => 'Expressuals\Pbform\Models\Industry',
        'lga' => 'Expressuals\Pbform\Models\LGA'
    ];

    public $belongsToMany = [
        'purposes' => [
            'Expressuals\Pbform\Models\LoanPurpose',
            'table' => 'expressuals_pbform_pr',
            'key'   => 'loan_purpose_id',
            'other_key' => 'register_id',
            'order' => 'purpose_of_loan'
            ]
    ];
}
