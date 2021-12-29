<?php
class Post
{
    private $_id;
    private $_titre;
    private $_chapo;
    private $_contenu;
    private $_auteur;
    private $_date;

    /**
     * @param array $data
     * Constructeur
     */
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    /**
     * @param array $data
     * @return void
     * Hydratation
     */
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set' .ucfirst($key);
            if (method_exists($this, $method))
                $this->$method($value);
        }
    }

    /**
     * @param mixed $id
     * Setters
     */
    public function setId($id)
    {
        $id = (int) $id;

        if ($id > 0)
            $this->_id = $id;
    }
    public function setTitre($titre)
    {
        if (is_string($titre))
            $this->_titre = $titre;
    }
    public function setChapo($chapo)
    {
        if (is_string($chapo))
            $this->_chapo = $chapo;
    }
    public function setContenu($contenu)
    {
    if (is_string($contenu))
        $this->_contenu = $contenu;
    }
    public function setAuteur($auteur)
    {
        if (is_string($auteur))
            $this->_auteur = $auteur;
    }
    public function setDate($date)
    {
        $this->_date = $date;
    }

    /**
     * @return mixed
     * Getters
     */
    public function id()
    {
        return $this->_id;
    }
    public function titre()
    {
        return $this->_titre;
    }
    public function chapo()
    {
        return $this->_chapo;
    }
    public function contenu()
    {
        return $this->_contenu;
    }
    public function auteur()
    {
        return $this->_auteur;
    }
    public function date()
    {
        return $this->_date;
    }

}