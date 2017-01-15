<?php

class RouterController extends Controller
{

        protected $controller;

        public function ctrlProcess($params)
        {
          $parsedURL = $this->parseURL($params[0]);
          if (empty($parsedURL[0]))
            $this->ctrlRedirect('Main');           
            
          $classCtrl = $this->convertToCamel(array_shift($parsedURL)) . 'Controller';
          if (file_exists('Controllers/' . $classCtrl . '.php'))
            $this->controller = new $classCtrl;
          else
            $this->ctrlRedirect('Error');
          
          $this->controller->data['ovenIndex'] = 
                  $this->selectOvenIndex($params[0]);
          $this->controller->ctrlProcess($parsedURL);
          $this->data['title'] = $this->controller->header['title'];
          $this->data['description'] = $this->controller->header['description'];
          $this->data['key_words'] = $this->controller->header['key_words'];
          $this->view = 'Composition';
        }
        
        private function parseURL($url)
        {
          $parsedURL = parse_url($url);
          $parsedURL["path"] = ltrim($parsedURL["path"], "/");
          $parsedURL["path"] = trim($parsedURL["path"]);
          $separPath = explode("/", $parsedURL["path"]);
          return $separPath;
        }
        
        private function selectOvenIndex($url)
        {
          if (array_key_exists("ovenIndex", $_GET))
            return $_GET['ovenIndex'];
          elseif (array_key_exists("ovenIndex",  $this->controller->data))
            return  $this->controller.data['ovenIndex'];
          else
            return 0;  
        }

        private function convertToCamel($text)
        {
          $sentence = str_replace('-', ' ', $text);
          $sentence = ucwords($sentence);
          $sentence = str_replace(' ', '', $sentence);
          return $sentence;
        }
}

?>