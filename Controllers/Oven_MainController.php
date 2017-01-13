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
        
        $this->data['ovenState'] = '?';
        $this->data['actTemp'] = '?';
        $this->data['reqTemp'] = '?';
        $this->data['stepTemp'] = '?';
        $this->data['actPower'] = '?';
        $this->data['actDurH'] = '?';
        $this->data['actDurM'] = '?';
        $this->data['actPowerTime'] = '?';     
        
        $this->activeRef = 0;
        $this->references = array('Oven_Main', 'Oven_ProgInfo',
                'Oven_Control', 'Main');
        $this->refNames = array('Pec - hlavní', 'Program',
                'Ovládání', 'Hlavní obrazovka');
    }
}

?>