
<?php

PDO::getAvailableDrivers();//
//
try
{
    $Handler= new PDO('mysql:host=127.0.0.1;dbname=db_web_4_test','root','');
    $Handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}catch(PDOException $e)
{
    echo $e->getMessage();
    die();
}
/**/

class PageEntry
{
    public $id,$title,$entry;
    
    public function __construct()
    {
        $this->entry="page_id:{$this->title}";
    }
    
}

/**/
$query=$Handler->query('SELECT * FROM page ');


//$r=$query->fetch(PDO::FETCH_OBJ);
//while($r = $query->fetch(PDO::FETCH_OBJ))
$query->setFetchMode(PDO::FETCH_CLASS,'PageEntry');
while($r = $query->fetch())
{
   
echo $r->title,'<br>';
}
//

?>