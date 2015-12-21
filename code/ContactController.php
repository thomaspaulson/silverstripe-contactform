<?php

/**
 * @package contact
 */

class ContactController extends Controller
{
    
    private static $allowed_actions = array(
        'ContactForm'
    );
    

    /**
     * Post a contact form
     *
     * @return Form
     */
     
    
    public function ContactForm()
    {
        $form = new ContactForm($this, 'ContactForm');
        // we do not want to read a new URL when the form has already been submitted
        // which in here, it hasn't been.
        $url = (isset($_SERVER['REQUEST_URI'])) ? Director::protocolAndHost() . '' . $_SERVER['REQUEST_URI'] : false;
        
        $form->loadDataFrom(array(
            'ReturnURL'        => $url
        ));


        $member = Member::currentUser();
        if ($member) {
            $form->loadDataFrom($member);
        }
        
        if ($form->hasExtension('FormSpamProtectionExtension')) {
            $form->enableSpamProtection();
        }
        
        // hook to allow further extensions to alter the comments form
        //$this->extend('alterContactForm', $form);

        return $form;
    }

    public function SuccessMessage()
    {
        if (Session::get('MailSent')) {
            $config = SiteConfig::current_site_config();
            $message = $config->SubmitText;
            Session::clear('MailSent');
            return $message;
        }
        return null;
    }
}
