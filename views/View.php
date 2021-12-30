<?php
class View
{
    private $_file;
    private $_t;

    /**
     * @param $action
     */
    public function __construct($action)
    {
        $this->_file = 'views/view' .$action. '.php';
    }

    /**
     * @param $data
     * @return void
     * @throws Exception
     * Génère et affiche la vue
     */
    public function generate($data)
    {
        //Partie spécifique de la vue sans header ni footer
        $content = $this->generateFile($this->_file, $data);
        //Template avec header et footer
        $view = $this->generateFile('views/template.php', array('t' => $this->_t, 'content' => $content));
        echo $view;
    }

    /**
     * @param $file
     * @param $data
     * @return false|string
     * @throws Exception
     * Génère un fichier vue et renvoie le résultat produit
     */
    private function generateFile($file, $data)
    {
        if (file_exists($file))
        {
            extract($data);

            //Temporisation
            ob_start();

            //Inclusion du fichier vue
            require $file;

            return ob_get_clean();
        }
        else
            throw new Exception('Fichier '.$file.' introuvable');
    }
}