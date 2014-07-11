<?php
//
class ContactForm extends Form{

    public function __construct($controller, $name) {
    
	$fields = new FieldList(
		$dataFields = new CompositeField(
		TextField::create("Name", _t('ContactForm.YOURNAME', 'Your name'))
			->setCustomValidationMessage(_t('ContactForm.YOURNAME_MESSAGE_REQUIRED', 'Please enter your name'))
			->setAttribute('data-message-required', _t('ContactForm.YOURNAME_MESSAGE_REQUIRED', 'Please enter your name')),

		EmailField::create("Email", _t('ContactController.EMAILADDRESS', "Your email address"))
			->setCustomValidationMessage(_t('ContactForm.EMAILADDRESS_MESSAGE_REQUIRED', 'Please enter your email address'))
			->setAttribute('data-message-required', _t('ContactForm.EMAILADDRESS_MESSAGE_REQUIRED', 'Please enter your email address'))
			->setAttribute('data-message-email', _t('ContactForm.EMAILADDRESS_MESSAGE_EMAIL', 'Please enter a valid email address')),


		TextareaField::create("Comment", _t('ContactController.COMMENTS', "Comments"))
			->setCustomValidationMessage(_t('ContactForm.COMMENT_MESSAGE_REQUIRED', 'Please enter your comment'))
				->setAttribute('data-message-required', _t('ContactForm.COMMENT_MESSAGE_REQUIRED', 'Please enter your comment'))
		),			
		
		HiddenField::create("ReturnURL")			
	);

	$dataFields->addExtraClass('data-fields');

	// save actions
	$actions = new FieldList(
		new FormAction("doPostContact", _t('ContactForm.POST', 'Post'))
	);
	
	// required fields for server side
	$required = new RequiredFields(array(
		'Name',
		'Email',
		'Comment'
	));
	
	$this->setAttribute('novalidate','novalidate');

	// Set it so the user gets redirected back down to the form upon form fail
	//$this->setRedirectToFormOnValidationError(true);		
	
    
         
        parent::__construct($controller, $name, $fields, $actions, $required);
    }
    
    	/**
	 * Process which creates a {@link Comment} once a user submits a comment from this form.
	 *
	 * @param array $data 
	 * @param Form $form
	 */
	public function doPostContact($data, $form) {		
		
		// extend hook to allow extensions. Also see onAfterPostComment
		//$this->extend('onBeforePostComment', $form);			
		
		
		$config = SiteConfig::current_site_config();
		
		// send  mail
		$email = $config->MailTo;
		$from = $data['Email'];
		$to = $email;
		

		$config->Title;
		$subject = "Contact Form - ".$config->Title;
		$email = new Email($from, $to, $subject);
		$email->setTemplate('ContactEmail');
		$email->populateTemplate($data);
		$email->send();    
		
		// set session
		Session::set('MailSent', true);		

		// extend hook to allow extensions. Also see onBeforePostComment
		//$this->extend('onAfterPostComment', $contact);					
		

		$url = (isset($data['ReturnURL'])) ? $data['ReturnURL'] : false;
		
		return Controller::curr()->redirectBack($url);
			
		
		//return ($url) ? $this->redirect($url) : $this->redirectBack();	
		
		
	}
	
	public function forTemplate() {
	    return $this->renderWith(array($this->class, 'Form'));
	}	
	
	public function SuccessMessage(){
	  
	  if(Session::get('MailSent')){
  		$config = SiteConfig::current_site_config();
		$message = $config->SubmitText;
		Session::clear('MailSent');   		
		return $message;
	  }	  
	  return null;
	  
	}
}