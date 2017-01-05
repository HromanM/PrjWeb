<?php

class MainController extends Controller
{
    public function ctrlProcess($params)
    {          
        $this->header = array (
            'title' => 'MSR MES Web - Hlavní obrazovka',
            'key_words' => 'MES systém, odlévací pec, regulace',
            'description' => 'Hlavní obrazovka vizualizace'
        );  

        $this->view = 'Main';
        
        $this->activeRef = 0;
        $this->references = array('Main', 'Settings', 'Contact');
        $this->refNames = array('Hlavní obrazovka', 'Nastavení', 'Kontakt');
    }
}

?>