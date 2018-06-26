<?php namespace Expressuals\Pbform\Models;

use Model;

/**
 * Model
 */
class LoanPurpose extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'expressuals_pbform_loan_purposes';
    // public $belongsTo = [
    //     'registration' => 'Expressuals\Pbform\Models\Register',
    // ];
}
