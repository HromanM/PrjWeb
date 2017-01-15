<?php

class Oven_ControlController extends Controller
{
    public function ctrlProcess($params)
    {          
        $this->header = array (
            'title' => 'Pec ' . $this->data['ovenIndex'] . ' - ovládání',
            'key_words' => 'MES systém, odlévací pec, regulace',
            'description' => 'Pec - ovládání'
        );  

        $this->view = 'Oven_Control';
        
        $this->data['ovenState'] = '?';
        $this->data['actDateTime'] = '?';
        
        $this->activeRef = 2;
        $this->references = array('Oven_Main', 'Oven_ProgInfo',
                'Oven_Control', 'Main');
        $this->refNames = array('Pec - hlavní', 'Program',
                'Ovládání', 'Hlavní obrazovka');
    }
    
    public function writeProgramNames()
    {
      $names = array('one','two','three');
      foreach ($names as $name)
      {
        echo('<option value="');
        echo($name);
        echo('">');
        echo($name);
        echo('</option>');
      }
    }
}

?>