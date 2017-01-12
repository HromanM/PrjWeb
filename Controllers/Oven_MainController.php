<?php

class Oven_MainController extends Controller
{
    public function ctrlProcess($params)
    {          
        $this->header = array (
            'title' => 'Pec ' . $this->data['ovenIndex'] . ' - hlavní obrazovka',
            'key_words' => 'MES systém, odlévací pec, regulace',
            'description' => 'Pec1 hlavní obrazovka'
        );  

        $this->view = 'Oven_Main';
        
        $this->activeRef = 0;
        $this->references = array('Oven_Main', 'Main');
        $this->refNames = array('Pec - hlavní', 'Hlavní obrazovka');
    }
}

?>