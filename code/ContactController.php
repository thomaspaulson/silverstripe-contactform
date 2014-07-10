<?php

/**
 * @package contact
 */

class ContactController extends Controller {
	
	private static $allowed_actions = array(
		'ContactForm'		
	);
	

	/**
	 * Post a contact form
	 *
	 * @return Form
	 */
	 /*
	public function ContactForm() {
		

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

		// create the comment form
		$form = new Form($this, 'ContactForm', $fields, $actions, $required);
		$form->setAttribute('novalidate','novalidate');

		
		// we do not want to read a new URL when the form has already been submitted
		// which in here, it hasn't been.
		$url = (isset($_SERVER['REQUEST_URI'])) ? Director::protocolAndHost() . '' . $_SERVER['REQUEST_URI'] : false;
		
		$form->loadDataFrom(array(
			'ReturnURL'		=> $url			
		));

				
		// Set it so the user gets redirected back down to the form upon form fail
		$form->setRedirectToFormOnValidationError(true);


		$member = Member::currentUser();
		if($member) {
		  $form->loadDataFrom($member);
		}
		
		// hook to allow further extensions to alter the comments form
		$this->extend('alterCommentForm', $form);

		return $form;
	}
	
	
    	/**
	 * Process which creates a {@link Comment} once a user submits a comment from this form.
	 *
	 * @param array $data 
	 * @param Form $form
	 */
	/*
	public function doPostContact($data, $form) {		
		
		// extend hook to allow extensions. Also see onAfterPostComment
		$this->extend('onBeforePostComment', $form);			
		
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
		Session::set('MailSent', $var);		

		// extend hook to allow extensions. Also see onBeforePostComment
		$this->extend('onAfterPostComment', $contact);					
		
		

		$url = (isset($data['ReturnURL'])) ? $data['ReturnURL'] : false;
			
		//return ($url) ? $this->redirect($url) : $this->redirectBack();		
		
	}
	*/
	
	public function ContactForm(){
	
	      $form = new ContactForm($this, 'ContactForm');
		// we do not want to read a new URL when the form has already been submitted
		// which in here, it hasn't been.
		$url = (isset($_SERVER['REQUEST_URI'])) ? Director::protocolAndHost() . '' . $_SERVER['REQUEST_URI'] : false;
		
		$form->loadDataFrom(array(
			'ReturnURL'		=> $url			
		));			


		$member = Member::currentUser();
		if($member) {
		  $form->loadDataFrom($member);
		}
		
		// hook to allow further extensions to alter the comments form
		//$this->extend('alterContactForm', $form);

	      return $form;
	      
	}
}
