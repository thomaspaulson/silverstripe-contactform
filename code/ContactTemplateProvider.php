<?php
class ContactTemplateProvider implements TemplateGlobalProvider
{

    /**
    * @return array|void
    */
    public static function get_template_global_variables()
    {
        return array(
            'ContactForm' => 'ContactFormFunction'
        );
    }

    public static function ContactFormFunction()
    {
        $template = new SSViewer('ContactTemplateProvider');
      
        $controller = new ContactController();
        
        
        $form = $controller->ContactForm();
        
        // a little bit all over the show but to ensure a slightly easier upgrade for users
        // return back the same variables as previously done in comments
        return $template->process(new ArrayData(array(
            'AddContactForm'    => $form,
            'SuccessMessage'    => $controller->SuccessMessage()
        )));
    }
}
