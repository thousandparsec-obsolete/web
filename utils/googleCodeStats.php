<?php

include('FeedParser.php');


# The web-server process will need write-access to the cache directory
define("DEFAULT_LOCATION", dirname(__FILE__) . '/tmp/');

# Cache expiry time (in seconds)
define("DEFAULT_EXPIRY", 3600);

# Google Code Project Name
define("COOGLE_CODE_PROJECT", "thousandparsec");

/**
 * Simple caching class for PHP data-structures
 */
class CacheManager {
	
	private $location = DEFAULT_LOCATION;
	

	function __construct() {}
	
	/**
	 * Serializes a data-structure, then store them in a cache file.
	 *
	 * @param string $id
	 * @param mixed $data
	 */
	public function store($id, $data) {
		# Basic filename sanitation
		$cacheFile = $this->_get_cachefile($id);
		
		if (!file_put_contents($cacheFile, serialize($data))) {
			throw new Exception("Unable to store cache data into " . $this->location);
		}
	}
	
	private function _get_cachefile($id) {
		return $this->location . preg_replace("[^a-zA-Z0-9]", '', $id) . ".cache";
	}
	
	/**
	 * Returns TRUE if a cache ID is (still) cached, FALSE otherwise
	 *
	 * @param string $id
	 * @param int $expiry
	 * @return bool
	 */
	private function _is_cached($id, $expiry = DEFAULT_EXPIRY) {
		$cacheFile = $this->_get_cachefile($id);
		if (!file_exists($cacheFile)) {
			return FALSE;
		}
		
		$fstat = stat($cacheFile);
		return (mktime() - $expiry) < intval($fstat['mtime']);
	}
	
	/**
	 * Retrieves a piece of data from a cache file, and returns its
	 * unserialized data-structure.
	 *
	 * @param string $id
	 * @param int $timeout
	 * @return mixed
	 */
	public function fetch($id, $timeout = DEFAULT_EXPIRY) {
		# Basic filename sanitation
		$cacheFile = $this->_get_cachefile($id);

		if (!$this->_is_cached($id, $timeout)) {
			throw new Exception('File ' . $cacheFile . ' is not cached');
		}
		
		if (!$data = unserialize(file_get_contents($cacheFile))) {
			throw new Exception('Unable to retrieve and unserialize cache data at ' . $this->location);
			unlink($cacheFile);
		}
		
		return $data;
	}
}

/**
 * Simple class to retrieve data through Google Code's ATOM feeds for a specific project.
 * Currently, Google Code exports the following ATOM feeds:
 * - Project Updates [updates]
 * - Downloads [downloads]
 * - Wiki [svnchanges | use ?path=/wiki/ as $params value]
 * - Issue Updates [issueupdates]
 * - SVN Source Changes [svnchanges]
 * - Hg Source Changes [hgchanges]
 */
class GoogleCodeStats {
	
	private $cache    = NULL;
	private $project  = NULL;
	private $parser   = NULL;
	
	function __construct($project = COOGLE_CODE_PROJECT) {
		$this->project = $project;
		$this->cache  = new CacheManager();
		$this->parser = new FeedParser();
	}
	
	/**
	 * Fetches the specified ATOM feed data from cache or HTTP and returns it as a
	 * PHP data-structure. 
	 *
	 * @param string $feed
	 * @param int $num
	 * @param string $params
	 * @param int $cacheTimeout
	 * @return array
	 */
	public function getFeed($feed, $num = -1, $params = '', $cacheTimeout = DEFAULT_EXPIRY) {
		$url = "http://code.google.com/feeds/p/".$this->project."/$feed/basic$params";
		$id = $this->project . "-$project-$num-" . preg_replace("[^a-zA-Z0-9]", '', $params);
		
		try {
			$data = $this->cache->fetch($id. $cacheTimeout);
			return $data;
		} catch (Exception $e) {
			$this->parser->parse($url);
			$items = $this->parser->getItems();
			
			if ($num >= 1) {
				$data = array_slice($items, 0, $num, TRUE);
			} else {
				$data = $items;
			}		
			
			$this->cache->store($id, $data);
		}
		
		return $data;
	}
	
	
	
	
}



/* Stats Testing

$stats = new GoogleCodeStats();
var_export($stats->getFeed('updates'));

*/


/* Cache testing

$cache = new CacheManager();

try {
	$data = $cache->fetch("myData", 10);
	echo "Cached data-structure: <br />" . var_export($data, TRUE);
} catch(Exception $e) {
	echo $e->getMessage() . "<br />";
	$data = array("lala" => "elem 1", "lele" => "elem 2");
	try {
		$cache->store("myData", $data);
	} catch (Exception $e) {
		die("Unable to cache data-structure");
	}
	echo "Data-structure cached properly";
}

*/

?>