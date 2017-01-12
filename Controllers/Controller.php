<?php

abstract class Controller
{

        protected $data = array();
        protected $view = "";
        protected $header = array('title' => '', 'key_words' => '', 'description' => '');
        protected $references = array();
        protected $refNames = array();
        protected $activeRef = 0;

        abstract function ctrlProcess($params);
        
        public function ctrlWriteView()
        {
          if ($this->view)
          {
                  extract($this->ctrlTreatOutput($this->data));
                  extract($this->data, EXTR_PREFIX_ALL, "");
                  require("Views/" . $this->view . ".phtml");
          }
        }
        
        public function ctrlRedirect($url)
        {
          header("Location: /$url");
          header("Connection: close");
          exit;
        }
        
        // write references to html page
        public function ctrlWriteRefs()
        {
            for ($idx=0; $idx<count($this->references); $idx++)
            {
                echo('<a href="' . $this->references[$idx] . '">');
                if ($idx==$this->activeRef)
                  echo('<li class="ActiveScreen">');
                else
                  echo('<li>')  ;      
                echo($this->refNames[$idx]);
                echo('</li> </a>');
            }  
        }
        
        // increment db visit counter and show output
        public function ctrlWriteVisits()
        {
            $visitMan = new VisitManager();
            $visitMan->vmCount();
            $visitMan->writeStatistics();
            echo(Date("j/m/Y"));
            echo(" RoMa");  
        }
        
        // prevent output
        private function ctrlTreatOutput($x = null)
        {
            if (!isset($x))
                return null;
            elseif (is_string($x))
                return htmlspecialchars($x, ENT_QUOTES);
            elseif (is_array($x))
            {
                foreach($x as $k => $v)
                {
                        $x[$k] = $this->ctrlTreatOutput($v);
                }
                return $x;
            }
            else
                return $x;
        }
}

?>
