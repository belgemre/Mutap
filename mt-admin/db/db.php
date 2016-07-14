<?php
class baglan{
    //veritabaný bilgileri
    const host = 'localhost';
    const user = 'root';
    const pass = '';
    const db = 'mutap';
    public $conn;
 
    public function __construct(){ //açýlýþta çalýþtýr
        $this->dbBaglantiKur();
    }
 
    public function dbBaglantiKur(){ //veritabaný baðlantýsý kurma
        try{
            $this->conn = new PDO("mysql:dbname=".self::db.";host=".self::host, self::user, self::pass);
            $this->conn->query("SET NAMES 'utf8'");
            $this->conn->query('set character set utf8');
        }catch(PDOException $e){
             die($e->getMessage());
        }
    }
    
    public function dbVeriyiGuncelle($id, $sira){ //kayýtý güncelleme
        $guncelle = $this->conn->prepare('UPDATE musteriler SET sira = :sira WHERE m_id = :id');
        return $guncelle->execute(array('id' => $id, 'sira' => $sira));
    }

    public function listeKontrol($liste){ //post ile gelen veri kontrolü
        $sayac = 1;
        foreach($liste As $id){
            $id = strip_tags(trim($id));
            $this->dbVeriyiGuncelle($id, $sayac);   
            $sayac++;
        }
    }
}

//güncelle isteðinde bulunulmuþsa
if(isset($_POST['listeId']) && $_POST['listeId']['0'] == 'guncelle'){
    array_shift($_POST['listeId']);
    $baglan = new baglan;
    $baglan->listeKontrol($_POST['listeId']);
}
?>