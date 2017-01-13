<?php

class Oven_ProgInfoController extends Controller
{
    public function ctrlProcess($params)
    {          
        $this->header = array (
            'title' => 'Pec ' . $this->data['ovenIndex'] . ' - program info',
            'key_words' => 'MES systém, odlévací pec, regulace',
            'description' => 'Pec - informace o programu'
        );  

        $this->view = 'Oven_ProgInfo';
        
        $this->data['prgIndex'] = '?';
        $this->data['prgName'] = '?';
        $this->data['prgStep'] = '?';
        $this->data['prgTemp'] = '?';
        $this->data['prgTimeH'] = '?';
        $this->data['prgTimeM'] = '?';
        
        $this->activeRef = 1;
        $this->references = array('Oven_Main', 'Oven_ProgInfo',
                'Oven_Control', 'Main');
        $this->refNames = array('Pec - hlavní', 'Program',
                'Ovládání', 'Hlavní obrazovka');
    }
}

?>