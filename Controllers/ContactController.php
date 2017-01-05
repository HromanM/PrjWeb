<?php

class ContactController extends Controller
{
    public function ctrlProcess($params)
    {
        $this->header = array(
          'title' => 'Kontaktní formulář',
          'key_words' => 'kontakt, email, formulář',
          'description' => 'Kontaktní formulář našeho webu.'
        );
        
        if (isset($_POST["email"]))
        {
            if ($_POST['year'] == date("Y")) 
            {
                $mailSender = new MailSender();
                $mailSender->sendMail(
                  "marecek.hroman@gmail.com", "MSR_MES_Web", 
                  $_POST['message'], $_POST['email']);	
            }
        }
        
        $this->view = 'Contact';
        
        $this->activeRef = 2;
        $this->references = array('Main', 'Settings', 'Contact');
        $this->refNames = array('Hlavní obrazovka', 'Nastavení', 'Kontakt');
    }
}

?>