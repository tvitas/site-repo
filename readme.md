## Site Repo
Repository for a web site based on plain html files. A part of [cccf site project](https://github.com/tvitas/cccf "CCCF site On Github").

### Basic usage
Create directory structure, where directories represents URLs of the site (aka "routes" or "categories") 
and plain text files with html markup (or not), which represents content "nodes" (aka "DB records").

Example site content and meta xml files placed in the ``site-repo/database`` and ``site-repo/database/html`` directories.

Example configuration file placed in the site-repo/config directory.

In a client (framework) side, create a repository factory object:
```php
<?php
// Using PHP-DI container
$siteRepo = function(
	tvitas\SiteRepo\Environment::getInstance()->load('path/to/site-repo-config.php');
	return new tvitas\SiteRepo\SiteRepo();
 );
```
Factory methods:
```php
$siteRepo->site(); // returns SiteRepository object/null
$siteRepo->meta(); // returns MetaRepository object/null
$siteRepo->content(); // returns DirectoryRepository or FileRepository objects/null
$siteRepo->user(); // returns UserRepository object/null
$siteRepo->menu(); // returns MenuRepository object/null
```
Each repository has method ``get()``, which returns a ``NaiveArrayList`` collection of Site, Menu, Meta, File and User objects.

Site repository usage in controller example:
```php
<?php
namespace Your\Namespace\Controller;

use Path\To\Library\Request;
use Path\To\Library\View;

use tvitas\SiteRepo\SiteRepo;

class SiteController
{
	// public, protected, private members
	// ....
	// Injected SiteRepo object
	private $repo;

	// Injected View object
	private $view;

	// Current page uri from request
	private $pageUri;

	// Assume we are using dependency injection container
	public function __construct(SiteRepo $repo, Request $request, View $view)
	{
		$this->repo = $repo;
		$this->view = $view;
        $this->pageUri = $request->getPathInfo();
	}	

	public function show() : string
	{
		// Important: setPath() before using SiteRepo factory methods
		$this->repo->setPath($this->pageUri);

		// Get meta information of directory, aka "Category"
        $meta = $this->repo->meta()->get();
        // Get site meta information
        $site = $this->repo->site()->get()->sort('order', 'asc');
        // Get menu
        $menu = $this->repo->menu()->get();
        // Get directory content
        $content = $this->repo->content()->get();

		return $this->view->render('page_template',
            [
                'meta' => $meta,
                'site' => $site,
                'menu' => $menu,
                'content' => $content,
            ]
        );
	}
}
```
NaiveArrayList collection has methods:
```php
all(); // returns all list items
add($item); // push item to the list
count(); // returns count of items
first(); // returns first item in the list or null
last(); // returns last item in the list or null
get($index); // returns list item by index or -1
indexOf($value, $member); // returns list item's index of list item, where $member has value $value or -1
find($value, $member); // returns list item, where $member has value $value or null
sort($member, $order); // returns list, sorted by $member, direction $order or unsorted list.
```
