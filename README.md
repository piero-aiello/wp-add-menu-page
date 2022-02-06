# add-menu-page
An easy way to create admin pages in WordPress



Usage:
In Theme Folder
 require get_template_directory() . '/vendor/autoload.php';

use \WpAdminPage\BuildPage;

// create a example page like this:
$pathPage = get_template_directory().'/example-page.php';

$adminPage = new Admin_page();
BuildPage::start()
->setPageTitle('titolo pagina')
->setMenuTitle('Menu title')
->setCapability('manage_options')
->setPageName('Page-name')
->setDashIcon('dashicons-admin-site')
->setPosition('80')
->setPathPage($pathPage)
->createPage();
