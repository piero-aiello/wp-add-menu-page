<?php
/**
*  5 - below Posts
  *  10 - below Media
  *  15 - below Links
  *  20 - below Pages
  *  25 - below comments
  *  60 - below first separator
  *  65 - below Plugins
  *  70 - below Users
  *  75 - below Tools
  *  80 - below Settings
  *  100 - below second separator
**/
/********************USAGE**************
 use \App\Admin\Admin_page;
$pathPage = get_template_directory().'/temp-admin.php';

//$adminPage = new Admin_page();
Admin_page::start()
->setPageTitle('titolo pagina')
->setMenuTitle('Menu title')
->setCapability('manage_options')
->setPageName('Page-name')
->setDashIcon('dashicons-admin-site')
->setPosition('80')
->setPathPage($pathPage)
->createPage();
 ***************************USAGE******************/
namespace WpAdminPage;

class BuildPage{

    private $page_title = "";
    private $menu_title = "";
    private $capability = "manage_options";
    private $page_name = "";
    private $dashicon = "";
    private $position = "";
    private $path = "";

  public function __construct()
  {
    
  }

  public static function start(){

    return new BuildPage();
  }


  

  public function setPageTitle(string $page_title):self{

    $this->page_title = $page_title;

    return $this;

  }

  public function setMenuTitle(string $menu_title):self{

    $this->menu_title = $menu_title;
    return $this;

  }
  public function setCapability(string $capability):self{

    $this->capability = $capability;
    return $this;

  }

  public function setPageName(string $page_name):self{

    $page_name = $this->checkWhiteSpace($page_name);

    $this->page_name = $page_name;
    return $this;

  }
  public function setDashIcon(string $dashicon):self{

    $this->dashicon = $dashicon;
    return $this;

  }
  public function setPosition(string $position):self{

    $this->position = $position;
    return $this;

  }

  public function setPathPage(string $path):self{

    $this->path = $path;
    return $this;

  }

  public function createPage(){

    add_action( 'admin_menu', array($this, 'fire'),10,1 );
  }

  private function checkWhiteSpace($string){
     $string = str_replace(' ','_',$string);
     return strtolower($string);
  }

  public function fire(){
   
    if ($this->page_title == "" || $this->menu_title == "" || $this->path == "") {

     throw new \Exception("Error have to compile all fileds", 1);
     
    }
      
      // main page
    \add_menu_page(
    $this->page_title,
    $this->menu_title,
    $this->capability,
    $this->page_name,
    array($this, 'admin_page_cb'),
    $this->dashicon ,
    $this->position
    );
  }

  public function admin_page_cb(){
      
    require_once $this->path;
  
}

}
