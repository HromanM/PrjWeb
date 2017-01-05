<?php

class ErrorController extends Controller
{
    public function ctrlProcess($params)
    {
        // Hlavička požadavku
        header("HTTP/1.0 404 Not Found");
        // Hlavička stránky
        $this->header['titulek'] = 'Chyba 404';
        // Nastavení šablony
        $this->view = 'Error';
        
        $this->activeRef = 3;
        $this->references = array('Main', 'Settings', 'Contact');
        $this->refNames = array('Hlavní obrazovka', 'Nastavení', 'Kontakt');
    }
}

?>