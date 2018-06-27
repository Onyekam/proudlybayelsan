<?php namespace Expressuals\Pbform\Components;

use Cms\Classes\ComponentBase;
use Expressuals\Pbform\Models\Lga as LGA;
use Expressuals\Pbform\Models\BusinessArea;
use Expressuals\Pbform\Models\Industry;
use Expressuals\Pbform\Models\LoanPurpose;
use Expressuals\Pbform\Models\Register;
use Illuminate\Support\Facades\Input;
use Rainlab\User\Models\User;
use ValidationException;
use ApplicationException;
use Validator;
use Auth;
use DB;
use Redirect;
use Flash;
use Mail;

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
    $data = post();
    $register = new Register;
    $rules = $register->rules;
    $validation = Validator::make($data, $rules);
    if ($validation->fails()) {
        throw new ValidationException($validation);
    } else {
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
      $this->dispatchMails($register->surname, $register->other_names, $register->email);
      return Redirect::refresh();
    }
}

  public function setDefaults(){
    $this->LGAs = LGA::all();
    $this->businessAreas = BusinessArea::all();
    $this->industries = Industry::all();
    $this->loanPurposes = LoanPurpose::all();
  }

  public function dispatchMails($surname, $name, $email){
    $vars = ['surname' => $surname, 'othername' => $name, 'email' =>$email];
    $this->name = $name;
    $this->email = $email;
    Mail::later(5,'expressuals.pbform::mail.registrationconfirmation', $vars, function($message) {
        $message->to($this->email, $this->name);
        $message->subject('Bayelsa Entrepreneur\'s Youth Network Registration');
    }); 
    //$vars2 = ['surname' => $surname, 'name' => $name, 'email' =>$email, ]
    Mail::later(5,'expressuals.pbform::mail.newregistration', $vars, function($message) {
        $message->to('proudlybayelsan@gmail.com', 'Registration Form');
        $message->subject('A new user registered to the Network');
    }); 
		
	//	\Flash::success('Your invitation(s) have been sent to your friend(s)');
  //    return Redirect::refresh();
  }

  public $LGAs;
  public $businessAreas;
  public $industries;
  public $loanPurposes;
  public $name;
  public $email;
}