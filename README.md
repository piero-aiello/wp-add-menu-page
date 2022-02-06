# Admin Menu Page Builder
An easy way to create `admin pages` in WordPress



```php
include('vendor/autoload.php');

// create a example page like this:
$pathPage = get_template_directory().'/example-page.php';


use \WpAdminPage\BuildPage;

BuildPage::start()
->setPageTitle('page title') // required
->setMenuTitle('Menu title')    // required
->setCapability('manage_options') // optional default manage_options
->setPageName('Page-name')       // required
->setDashIcon('dashicons-admin-site')  // optional
->setPosition('80')   // optional
->setPathPage($pathPage)
->createPage();
```

## Create Sub menu page from parent slug
BuildPage() can also return the slug of page as variable for sub menu usage:

```php
include('vendor/autoload.php');

use \WpAdminPage\BuildPage;
use \WpAdminPage\BuildSubPage;

// create a example main page like this:
$pathPage = get_template_directory().'/temp-admin.php';

// create a example sub page like this:
$pathSubPage = get_template_directory().'/temp-admin-subpage.php';

//$adminPage = new Admin_page();
$page_parent_slug = BuildPage::start()
->setPageTitle('Page title')
->setMenuTitle('Menu title')
->setCapability('manage_options')
->setPageName('Page-name')
->setDashIcon('dashicons-admin-site')
->setPosition('80')
->setPathPage($pathPage)
->createPage();


BuildSubPage::start()
->setPageTitle('titolo sub pagina')
->setMenuTitle('Menu sub title')
->setCapability('manage_options')
->setPageName('Page-sub-name')
->setParentSlug($page_parent_slug)
->setPosition('80')
->setPathPage($pathSubPage)
->createPage();
```
