<?php
/**
 * forum member subscription
 *
 * @package forum_subscribe
 */
class ContactSiteConfig extends DataExtension {    
	
	private static $db = array(
        'MailTo' => 'Varchar(100)',
        'SubmitText' => 'HTMLText'
    );
 
    public function updateCMSFields(FieldList $fields) {
        $fields->addFieldToTab(
	  "Root.Email",
	  new TextField("MailTo", _t('ContactSiteConfig.MAIL_TO', "Recipient email")));
        $fields->addFieldToTab(
	  "Root.Email", 
	  new HTMLEditorField('SubmitText',_t('ContactSiteConfig.SUBMIT_TEXT','Message to be displayed after a user submits the form')));

    }
	
	
}
