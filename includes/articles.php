<?php
/**
 * Blogginlägg = Artiklar på webbplatsen Läxhjälpen
 *
 * @todo Ett sätt att byta författare (username)
 */
class Articles
{
    protected $articlesID, $slug, $title, $text, $username, $pubdate;

    // Dessa variabler kan läsas med __get() eller konverteras till array
    protected $accessibles = array('articlesID', 'slug', 'title', 'text', 'username', 'pubdate');
    
    

    /**
     * Håller reda på om all data är kontrollerad
     */
    protected $hasBeenValidated = false;

    /**
     * Håller reda på om all data är kontrollerad och godkänd
     */
    protected $isValid = false;

    /**
     * Felmeddelanden som kan uppstå vid validering av artikeldata
     * @var array
     */
    protected $errorMessages = array('title' => "", 'text' => "");

    /**
     * En ny slugg har skapats till befintligt inlägg
     * @var string
     */
    protected $newSlug = false;

    const TEXTHTML = <<<TAGSANDATTRIBUTES
        *[lang|dir]
        a[href|rel], abbr[title], em, i, b, strong, span[class], small, 
        div[id], p[id], h3, h4, h5, h6, 
        ul, ol[start], li, dl, dt, dd, 
        table, th[scope], tr, td[colspan|rowspan], col, tbody, thead, 
        tfoot, caption, 
        code, pre, br, kbd, sub, sup, 
        blockquote, ins, del, s, strike, q, 
        img[src|alt], object,[data|name|type], param[name|value],

TAGSANDATTRIBUTES;

    public function __construct($title, $text, $username) 
    {
        $this->title = $title;
        $this->text = $text;
        $this->username = $username;
        $this->$dbh = $dbh;
        $this->articlesID = $id;
    }

    public function __get($varname) 
    {
        if ( in_array($varname, $this->accessibles, true) )
        {
            return $this->$varname;
        }
        throw new Exception("Trying to acces undefined or protected property ($var) of " .__CLASS__);
    }

    /**
     * Validerar indata
     * 
     * Rubrik och brödtext kollas mot reguljära uttryck
     * articlesID och username kollas aldrig, vi litar på databasens referensintegritet
     * @uses HTMLPurifier
     */
    protected function validate() {}
        
    public function isValid() {}

    /**
     * Vilka fel rent specifikt fälten har
     * 
     * @return array Felmeddelanden per variabel
     */
    public function getErrorMessages() {}

    /**
     * Spara i databasen
     *
     * @return mixed Primärnyckeln i databasen
     */
    public function save()
    {
    	// FIXME
        throw new Exception(__METHOD__ . " not implemented yet in ". __CLASS__);
    }

    /**
     * Factory-metod som skapar ett artikelobjekt
     *
     * @param int $id  Primärnyckeln i databasen
     * @param PDO $dbh Databasanslutning
     * @param PDO $id_is_slug Sätts till true om vi letar efter en ertikel efter dess slugg
     * @return Instans av denna klass (articles)
     */
    public static function fetch($id, PDO $dbh, $id_is_slug = false) {}

    /**
     *
     */
    public static function fetchList( /* ? */) {}

    /**
     * Skicka artikeldata som en enkel array
     */
    public function generateSlug() {}

}