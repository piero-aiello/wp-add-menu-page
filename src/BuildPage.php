<?php
/*

 /$$      /$$                           /$$
| $$  /$ | $$                          | $$
| $$ /$$$| $$  /$$$$$$   /$$$$$$   /$$$$$$$  /$$$$$$   /$$$$$$   /$$$$$$   /$$$$$$$ /$$$$$$$
| $$/$$ $$ $$ /$$__  $$ /$$__  $$ /$$__  $$ /$$__  $$ /$$__  $$ /$$__  $$ /$$_____//$$_____/
| $$$$_  $$$$| $$  \ $$| $$  \__/| $$  | $$| $$  \ $$| $$  \__/| $$$$$$$$|  $$$$$$|  $$$$$$
| $$$/ \  $$$| $$  | $$| $$      | $$  | $$| $$  | $$| $$      | $$_____/ \____  $$\____  $$
| $$/   \  $$|  $$$$$$/| $$      |  $$$$$$$| $$$$$$$/| $$      |  $$$$$$$ /$$$$$$$//$$$$$$$/
|__/     \__/ \______/ |__/       \_______/| $$____/ |__/       \_______/|_______/|_______/
                                           | $$
                                           | $$
                                           |__/
  /$$$$$$        /$$               /$$
 /$$__  $$      | $$              |__/
| $$  \ $$  /$$$$$$$ /$$$$$$/$$$$  /$$ /$$$$$$$
| $$$$$$$$ /$$__  $$| $$_  $$_  $$| $$| $$__  $$
| $$__  $$| $$  | $$| $$ \ $$ \ $$| $$| $$  \ $$
| $$  | $$| $$  | $$| $$ | $$ | $$| $$| $$  | $$
| $$  | $$|  $$$$$$$| $$ | $$ | $$| $$| $$  | $$
|__/  |__/ \_______/|__/ |__/ |__/|__/|__/  |__/



 /$$$$$$$
| $$__  $$
| $$  \ $$ /$$$$$$   /$$$$$$   /$$$$$$
| $$$$$$$/|____  $$ /$$__  $$ /$$__  $$
| $$____/  /$$$$$$$| $$  \ $$| $$$$$$$$
| $$      /$$__  $$| $$  | $$| $$_____/
| $$     |  $$$$$$$|  $$$$$$$|  $$$$$$$
|__/      \_______/ \____  $$ \_______/
                    /$$  \ $$
                   |  $$$$$$/
                    \______/
 /$$$$$$$                  /$$$$$$$  /$$                                      /$$$$$$  /$$           /$$ /$$
| $$__  $$                | $$__  $$|__/                                     /$$__  $$|__/          | $$| $$
| $$  \ $$ /$$   /$$      | $$  \ $$ /$$  /$$$$$$   /$$$$$$   /$$$$$$       | $$  \ $$ /$$  /$$$$$$ | $$| $$  /$$$$$$
| $$$$$$$ | $$  | $$      | $$$$$$$/| $$ /$$__  $$ /$$__  $$ /$$__  $$      | $$$$$$$$| $$ /$$__  $$| $$| $$ /$$__  $$
| $$__  $$| $$  | $$      | $$____/ | $$| $$$$$$$$| $$  \__/| $$  \ $$      | $$__  $$| $$| $$$$$$$$| $$| $$| $$  \ $$
| $$  \ $$| $$  | $$      | $$      | $$| $$_____/| $$      | $$  | $$      | $$  | $$| $$| $$_____/| $$| $$| $$  | $$
| $$$$$$$/|  $$$$$$$      | $$      | $$|  $$$$$$$| $$      |  $$$$$$/      | $$  | $$| $$|  $$$$$$$| $$| $$|  $$$$$$/
|_______/  \____  $$      |__/      |__/ \_______/|__/       \______/       |__/  |__/|__/ \_______/|__/|__/ \______/
           /$$  | $$
          |  $$$$$$/
           \______/

*/

namespace WpAdminPage;

class BuildPage
{

  private $page_title = "";
  private $menu_title = "";
  private $capability = "manage_options";
  private $page_name = "";
  private $dashicon = "";
  private $position = "";
  private $path = "";


  /**
   * packages piero-aiello/add-menu-page
   *
   * @return  class
   */

  public static function start()
  {

    return new BuildPage();
  }




  /**
   * packages piero-aiello/add-menu-page
   *
   * @return  class
   */

  public function setPageTitle(string $page_title): self
  {

    $this->page_title = $page_title;

    return $this;
  }




  /**
   * packages piero-aiello/add-menu-page
   *
   * @return  class
   */

  public function setMenuTitle(string $menu_title): self
  {

    $this->menu_title = $menu_title;
    return $this;
  }




  /**
   * packages piero-aiello/add-menu-page
   *
   * @return  class
   */

  public function setCapability(string $capability): self
  {

    $this->capability = $capability;
    return $this;
  }




  /**
   * packages piero-aiello/add-menu-page
   *
   * @return  class
   */

  public function setPageName(string $page_name): self
  {

    $page_name = $this->checkWhiteSpace($page_name);

    $this->page_name = $page_name;
    return $this;
  }




  /**
   * packages piero-aiello/add-menu-page
   *
   * @return  class
   */

  public function setDashIcon(string $dashicon): self
  {

    $this->dashicon = $dashicon;
    return $this;
  }




  /**
   * packages piero-aiello/add-menu-page
   *
   * @return  class
   */

  public function setPosition(string $position): self
  {

    $this->position = $position;
    return $this;
  }




  /**
   * packages piero-aiello/add-menu-page
   *
   * @return  class
   */

  public function setPathPage(string $path): self
  {

    $this->path = $path;
    return $this;
  }




  /**
   * packages piero-aiello/add-menu-page
   *
   * @return  string  slug of parent page
   */

  public function createPage()
  {

    add_action('admin_menu', array($this, 'fire'), 10, 1);

    return $this->page_name;
  }




  /**
   * packages piero-aiello/add-menu-page
   *
   * @return  string
   */

  private function checkWhiteSpace($string)
  {
    $string = str_replace(' ', '_', $string);
    return strtolower($string);
  }




  /**
   * packages piero-aiello/add-menu-page
   *
   * @return  null
   */

  public function fire()
  {

    if ($this->page_title == "" || $this->menu_title == "" || $this->path == "" || $this->page_name == "") {

      throw new \Exception("Error have to compile all fileds", 1);
    }

    // main page
    add_menu_page(
      $this->page_title,
      $this->menu_title,
      $this->capability,
      $this->page_name,
      array($this, 'admin_page_cb'),
      $this->dashicon,
      $this->position
    );

  }




  /**
   * packages piero-aiello/add-menu-page
   *
   * @return  null
   */

  public function admin_page_cb()
  {

    require_once $this->path;
  }
}
