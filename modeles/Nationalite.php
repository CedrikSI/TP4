<?php 

class Nationalite {

        /**
         * Numero du Nationalite
        *
        * @var int
        */ 
        private $num;
        /**
         * Libelle du nationalite
         *
         * @var string
         */
        private $libelle;
        /**
         * num continent (clé étrangère) relié a num de continent
         *
         * @return void
         */
        private $numContinent

        /**
         * Get the value of num
         */ 
        public function getNum()
        {
                return $this->num;
        }

        /**
         * lit le libelle
         */ 
        public function getLibelle() : string
        {
        return $this->libelle;
        }

        /**
         * ecrit dans le libelle
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
         * Retourne l'objet continent associé
         */ 
        public function getNumContinent() : Continent
        {
                return Continent::findById($this->NumContinent);
        }

        /**
         * Undocumented function
         *
         * @param Continent $continent
         * @return self
         */
        public function setNumContinent(Continent $continent) : self 
        {
                $this->numContinent = $continent->getNum();

                return $this;
        }
         


        /**
         * Retourne l'ensemble des nationalite
         *
         * @return Nationalite[] tableau d'objet nationalité 
         */
        public static function findAll() :array {
                $req=MonPdo::getInstance()-prepare("select n.num as numero, n.libelle as 'libNation',c.libelle as 'libContinent' from nationalite n, continent c where n.numContinent=c.num");
                $req->setFetchMode(PDO::FETCH_OBJ);
                $req->execute();
                $lesResultat=$req->fetchAll();
                return $lesResultat;


        }  
/**
 * Trouve un nationalité grace â son num
 *
 * @param integer $id Numero du nationalite
 * @return Nationalite Objet nationalite trouvé
 */
        public static function findById(int $id) : Nationalite {
                $req=MonPdo::getInstance()-prepare("Select * from nationalite where num= :id");
                $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_DROPS_LATE,'Nationalite');
                $req->bindParam(':id', $id);
                $req->execute();
                $leResultat=$req->fetch();
                return $leResultat;
 
        }
/**
 * Permet d'ajouter des continents
 *
 * @param Nationalite $nationalite nationalite à ajouter
 * @return integer resultat ( 1 si l'opération a réussi, 0 sinon)
 */
        public static function add(Nationalite $nationalite) :int
        {
                $req=MonPdo::getInstance()-prepare("insert into nationalite(libelle,numContinent) values(:libelle, :numContinent)");
                $req->bindParam(':libelle', $nationalite->getLibelle());
                $req->bindParam(':numContinent', $nationalite->getNumContinent());
                $nb=$req->execute();
                return $nb;
        }
        /**
         * Permet de modifier un nationalite
         *
         * @param Nationalite $continent continent à modifier 
         * @return integer resultat ( 1 si l'opération a réussi, 0 sinon)
         */
      public static function update(Nationalite $nationalite) :int{
        $req=MonPdo::getInstance()-prepare("update nationalite set libelle= :libelle ,numContinent= :numContinent where num= :id");
        $req->bindParam(':id', $nationalite->getNum());
        $req->bindParam(':libelle', $nationalite->getLibelle());
        $req->bindParam(':numContinent', $nationalite->getNumContinent());
        $nb=$req->execute();
        return $nb;

      }
      /**
       * Permet de supprimer un continent
       *
       * @param Nationalite $nationalite
       * @return integer
       */
      public static function delete(Nationalite $nationalite) :int{
        $req=MonPdo::getInstance()-prepare("delete from nationalite where num= :id");
        $req->bindParam(':id', $nationalite->getNum());
        $nb=$req->execute();
        return $nb;

       
}
?>
