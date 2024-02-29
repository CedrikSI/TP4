<?php 

class Continent {

        /**
         * Numero du continent
        *
        * @var int
        */ 
        private $num;
        /**
         * Libelle du continent
         *
         * @var string
         */
        private $libelle;



        /**
         * Get the value of num
         */ 
        public function getNum()
        {
                return $this->num;
        }

        /**
         * Get the value of libelle
         */ 
        public function getLibelle() : string
        {
        return $this->libelle;
        }

        /**
         * Undocumented function
         *
         * @param string $libelle
         * @return self
         */
        public function setLibelle(string $libelle) : self 
        {
        $this->libelle = $libelle;

        return $this;
        }
        /**
         * Retourne l'ensemble des continents
         *
         * @return Continent[] tableau d'objet continent 
         */
        public static function findAll() :array {
                $req=MonPdo::getInstance()-prepare("Select * from continent");
                $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_DROPS_LATE,'Continent');
                $req->execute();
                $lesResultat=$req->fetchAll();
                return $lesResultat;


        }  
/**
 * Trouve un continent grace â son num
 *
 * @param integer $id Numero du Continent
 * @return Continent Objet Continent trouvé
 */
        public static function findById(int $id) : Continent {
                $req=MonPdo::getInstance()-prepare("Select * from continent where num= :id");
                $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_DROPS_LATE,'Continent');
                $req->bindParam(':id', $id);
                $req->execute();
                $leResultat=$req->fetch();
                return $leResultat;
 
        }


}

?>
