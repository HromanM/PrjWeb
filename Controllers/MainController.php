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
        
        $this->data['oven1Main1'] = '?';
        $this->data['oven2Main1'] = '?';
        $this->data['oven3Main1'] = '?';
        $this->data['oven1Main2'] = '?';
        $this->data['oven2Main2'] = '?';
        $this->data['oven3Main2'] = '?';  
        
        $this->activeRef = 0;
        $this->references = array('Main', 'Settings', 'Contact');
        $this->refNames = array('Hlavní obrazovka', 'Nastavení', 'Kontakt');
    }
}

?>