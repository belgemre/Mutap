<?php
class baglan{
    //veritaban� bilgileri
    const host = 'localhost';
    const user = 'root';
    const pass = '';
    const db = 'mutap';
    public $conn;
 
    public function __construct(){ //a��l��ta �al��t�r
        $this->dbBaglantiKur();
    }
 
    public function dbBaglantiKur(){ //veritaban� ba�lant�s� kurma
        try{
            $this->conn = new PDO("mysql:dbname=".self::db.";host=".self::host, self::user, self::pass);
            $this->conn->query("SET NAMES 'utf8'");
            $this->conn->query('set character set utf8');
        }catch(PDOException $e){
             die($e->getMessage());
        }
    }
    
    public function dbVeriyiGuncelle($id, $sira){ //kay�t� g�ncelleme
        $guncelle = $this->conn->prepare('UPDATE musteriler SET sira = :sira WHERE m_id = :id');
        return $guncelle->execute(array('id' => $id, 'sira' => $sira));
    }

    public function listeKontrol($liste){ //post ile gelen veri kontrol�
        $sayac = 1;
        foreach($liste As $id){
            $id = strip_tags(trim($id));
            $this->dbVeriyiGuncelle($id, $sayac);   
            $sayac++;
        }
    }
}

//g�ncelle iste�inde bulunulmu�sa
if(isset($_POST['listeId']) && $_POST['listeId']['0'] == 'guncelle'){
    array_shift($_POST['listeId']);
    $baglan = new baglan;
    $baglan->listeKontrol($_POST['listeId']);
}
?>