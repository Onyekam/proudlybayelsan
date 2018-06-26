<?php namespace Expressuals\Pbform\Components;

use Cms\Classes\ComponentBase;
use Expressuals\Pbform\Models\LGA;
use Expressuals\Pbform\Models\BusinessArea;
use Expressuals\Pbform\Models\Industry;
use Expressuals\Pbform\Models\LoanPurpose;
use Expressuals\Pbform\Models\Register;
use DB;
use Redirect;
use Flash;

class RegisterForm extends ComponentBase
{
  public function componentDetails()
  {
    return [
      'name' => 'Registration Form Component',
      'description' => 'Backend form used in the front-end'
    ];
  }

  public function onRun()
  {
      $this->setDefaults();
      $formController = new \Expressuals\Pbform\Controllers\RegistrationForm();
      $this->addJs('/modules/system/assets/js/framework.extras.js', 'core');
        $this->addJs('/modules/backend/assets/js/october-min.js', 'core');

        $this->addCss('/modules/backend/assets/css/october.css', 'core');
        $this->addCss('/modules/backend/assets/css/controls.css', 'core');
        $this->addJs('/modules/backend/formwidgets/richeditor/assets/js/richeditor.js', 'core');
        foreach($formController->getAssetPaths() as $type => $assets)
            foreach($assets as $asset)
                $this->{'add'.ucfirst($type)}($asset);
    // Build a back-end form with the context of ‘frontend’
    
    $formController->create('frontend');

    // Append the formController to the page
    $this->page['form'] = $formController;
  }

  public function onSave()
{
  //return post('Register[surname]');
    //return ['error' => \Expressuals\Pbform\Models\Register::create(post('Register'))];
    $register = new Register;
    $register->fill(post());
    $register->surname = post('surname');
    $register->other_names =  post('other_names');
    $register->gender = post('gender');
    $register->email = post('email');
    $register->address = post('address');
    $register->telephone = post('telephone'); 
    $register->lga_id = post('lga_id');
    $register->area_business_id = post('area_business_id'); 
    $register->industry_id = post('industry_id');
    $register->registered = post('registered');
    $register->existed = post('existed');
    $register->business_description = post('business_description');
    $register->save();
    foreach (post('purposes') as $purpose) {
      DB::statement('insert into expressuals_pbform_pr  (expressuals_pbform_pr.register_id, expressuals_pbform_pr.loan_purpose_id  ) values('.$purpose.','.$register->id.')');
    }
    Flash::success('Registration successfully completed');
    return Redirect::refresh();

}

  public function setDefaults(){
    $this->LGAs = LGA::all();
    $this->businessAreas = BusinessArea::all();
    $this->industries = Industry::all();
    $this->loanPurposes = LoanPurpose::all();
  }
  public $LGAs;
  public $businessAreas;
  public $industries;
  public $loanPurposes;
}