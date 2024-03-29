<?php
class Nationalite {

    /**
    * numero de la nationalite
    * 
    * @var int
    */
    private $num;

    /**
    * libelle de la nationalite
    * 
    * @var string
    */
    private $libelle;

    /**
     * num nationalite (clé étrangère) relié à num de continent
     *
     * @var int
     */
    private $numnationalite;

    /**
    * Get the value of num
    */ 
    public function getNum() : int
    {
    return $this->num;
    }

    /**
     * lit le libelle
     *
     * @return string
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
    public function setLibelle( string $libelle) : self
    {
    $this->libelle = $libelle;

    return $this;
    }

    /**
     * Renvoie l'objet nationalite associé
     *
     * @return nationalite
     */
    public function getNumNationalite() : nationalite
    {
        return nationalite::findById($this->numNationalite);
    }

    /**
     * Ecrit le num nationalite
     *
     * @param nationalite $nationalite
     * @return self
     */
    public function setNumNationalite(Nationalite $nationalite) : self
    {
        $this->numNationalite = $nationalite->getNum();

        return $this;
    }
    /**
     * Retourne l'ensemble des nationalite
     * 
     * @return Nationalite[] tableau d'objet nationalite
     */
    public static function findAll() :array
    {
        //$req=MonPdo::getInstance()->prepare("select n.num, n.libelle as 'libNation', c.libelle as 'libContinent' from nationalite n, continent c where n.numContinent=c.num");
        $req=MonPdo::getInstance()->prepare("select * from nationalite");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Nationalite');
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;
    }

    /**
     * Trouve une nationalite par son num
     * 
     * @param integer $id numéro dd nationalite
     * @return Nationalite objet nationalite trouvé
     */
    public static function findById(int $id) :Nationalite 
    {
        $req=MonPdo::getInstance()->prepare("Select * from nationalite where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Nationalite');
        $req->bindParam(':id' , $id);
        $req->execute();
        $leResultat=$req->fetch();
        return $leResultat; 
    }

    /**
     * Permet d'ajouter une nationalite
     *
     * @param Nationalite $nationalite nationalite à ajouter
     * @return integer resultat (1 si l'opération a réussi, 0 sinon)
     */
    public static function add(Nationalite $nationalite) :int
    {
        $req=MonPdo::getInstance()->prepare("insert into nationalite(libelle,numContinent) values(:libelle, :numContinent)");
        $req->bindParam(':libelle' , $nationalite->getLibelle());
        $req->bindParam(':numContinent' , $nationalite->getNumContinent());
        $nb=$req->execute();
        return $nb; 
    }

    /**
     * Permet de modifier une nationalite
     *
     * @param Nationalite $nationalite nationalite a modifier
     * @return integer resultat (1 si l'opération a réussi, 0 sinon)
     */
    public static function update(Nationalite $nationalite) :int 
    {
        $req=MonPdo::getInstance()->prepare("update nationalite set libelle= :libelle, numContinent= :numContinent where num= :id");
        $req->bindParam(':id', $nationalite->getNum());
        $req->bindParam(':libelle' , $nationalite->getLibelle());
        $req->bindParam(':numContinent' , $nationalite->getNumContinent());
        $nb=$req->execute();
        return $nb; 

    }

    /**
     * Permet de supprimer une nationalite
     *
     * @param Nationalite $nationalite
     * @return integer
     */
    public static function delete(Nationalite $nationalite) :int
    {
        $req=MonPdo::getInstance()->prepare("delete from nationalite where num= :id");
        $req->bindParam(':id' , $nationalite->getNum());
        $nb=$req->execute();
        return $nb; 
    }
}

?>