## Site Repo
Repository for a web site based on plain html files

### Basic usage

Create directory structure, where directories represents URLs of the site (aka "routes" or "categories") 
and plain text files with html markup (or not), which represents content "nodes" (aka "DB records").

Data files

Example site data structure is placed in a ``site-repo/database`` and ``site-repo/database/html`` directories.

In a client (framework) side, create a repository factory object:
```php
<?php
// PHP-DI
$siteRepo = function(
	tvitas\SiteRepo\Environment::getInstance()->load(_'path/to/site-repo-config.php');
	return new tvitas\SiteRepo\SiteRepo()
 );
```
Factory methods:

```php
<?php
$siteRepo->site(); // returns SiteRepository object/null
$siteRepo->meta(); // returns MetaRepository object/null
$siteRepo->content(); // returns DirectoryRepository or FileRepository objects/null
$siteRepo->user(); // returns UserRepository object/null
$siteRepo->menu(); // returns MenuRepository object/null
```
Each repository has method ``get()``, which returns a ``NaiveArrayList`` collection of Site, Meta, File or User objects.

