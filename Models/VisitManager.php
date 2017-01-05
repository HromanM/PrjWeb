<?php

class VisitManager
{

    public function vmCount()
    {
        SimpleDBWrapper::dbQuery('
            INSERT INTO `display_visit_count`
            (`ip`, `date`)
            VALUES (?, ?)
        ', array($_SERVER['REMOTE_ADDR'], time()));
    }

    public function visitTotal()
    {
        $res = SimpleDBWrapper::dbQuery('
            SELECT COUNT(*) AS `sumary`
            FROM `display_visit_count`
        ');
        $data = $res->fetch();
        return $data['sumary'];
    }

    public function visitPartial($days)
    {
        $result = SimpleDBWrapper::dbQuery('
            SELECT COUNT(*) AS `sumary`
            FROM `display_visit_count`
            WHERE `date` > ?
        ', array(time() - $days * 86400));
        $data = $result->fetch();
        return $data['sumary'];
    }

    public function uipTotal()
    {
        $result = SimpleDBWrapper::dbQuery('
            SELECT COUNT(DISTINCT `ip`) AS `sumary`
            FROM `display_visit_count`
        ');
        $data = $result->fetch();
        return $data['sumary'];
    }

    public function uipPartial($days)
    {
        $result = SimpleDBWrapper::dbQuery('
            SELECT COUNT(DISTINCT `ip`) AS `sumary`
            FROM `display_visit_count`
            WHERE `date` > ?
        ', array(time() - $days * 86400));
        $data = $result->fetch();
        return $data['sumary'];
    }

    public function writeStatistics()
    {
        echo('Zobrazení celkem: ' . $this->visitTotal() . ', ');
        echo('Zobrazení týden: ' . $this->visitPartial(7) . '. ');    
    }
    
    public function statistics()
    {
        $res = 'Zobrazení celkem: ' . $this->visitTotal() . ', ';
        $res .= 'Zobrazení týden: ' . $this->visitPartial(7) . '. ';  
        return $res; 
    }

}

?>
