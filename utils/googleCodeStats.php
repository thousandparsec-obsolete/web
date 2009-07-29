<?php

include('simplepie.inc');


# The web-server process will need write-access to the cache directory
define("DEFAULT_LOCATION", dirname(__FILE__) . '/../tmp/');

# Cache expiry time (in seconds)
define("DEFAULT_EXPIRY", 600);

# Google Code Project Name
define("COOGLE_CODE_PROJECT", "thousandparsec");

/**
 * Simple file-based caching class for PHP data-structures
 */
class CacheManager {
	
	private $location = DEFAULT_LOCATION;
	

	function __construct() {}
	
	/**
	 * Serializes a data-structure, then stores them in a cache file.
	 *
	 * @param string $id
	 * @param mixed $data
	 */
	public function store($id, $data) {
		# Basic filename sanitation
		$cacheFile = $this->_get_cachefile($id);
		
		if (!@file_put_contents($cacheFile, serialize($data))) {
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
 * Simple class to retrieve data through Google Code's ATOM or CSV feeds for a specific project.
 * Currently, Google Code exports the following ATOM feeds:
 * - Project Updates [updates]
 * - Downloads [downloads]
 * - Wiki [svnchanges | use ?path=/wiki/ as $params value]
 * - Issue Updates [issueupdates]
 * - SVN Source Changes [svnchanges]
 * - Hg Source Changes [hgchanges]
 * 
 * The ATOM feed return values are SimplePie_Item objects that support the following methods:
 * - get_author()
 * - get_content()
 * - get_date()
 * - get_description()
 * - get_food()
 * - get_id()
 * - get_permalink()
 * - get_title()
 * - And <a href="http://simplepie.org/wiki/reference/simplepie_item/start">more</a>
 * 
 * The following CSV fields are also currently supported:
 * - Issues List [issues]
 * 
 * For the "issues" CSV feed, it looks like the following extra params should be used:
 * - All issues [nothing]
 * - Open issues [?can=2]
 * - New issues [?can=6]
 * - Issues to verify [?can=7]
 * 
 * CSV feeds return associative arrays instead of SimplePie_Item objects.
 */
class GoogleCodeStats {
	
	private $cache    = NULL;
	private $project  = NULL;
	private $parser   = NULL;
	
	function __construct($project = COOGLE_CODE_PROJECT) {
		$this->project = $project;
		$this->cache  = new CacheManager();
		$this->parser = new SimplePie(NULL, "./tmp/", DEFAULT_EXPIRY);
	}
	
	/**
	 * Fetches the specified ATOM feed data from cache or HTTP and returns it as a
	 * PHP data-structure. 
	 *
	 * @param string $feed
	 * @param string $format
	 * @param int $num
	 * @param string $params
	 * @return mixed
	 */
	public function getFeed($feed, $format = 'ATOM', $num = -1, $params = '', $timeout = DEFAULT_EXPIRY) {
		
		$format = strtoupper($format);
		
		# Builds the feed URL based on required format.
		if ('ATOM' == $format) {
			$url = "http://code.google.com/feeds/p/".$this->project."/$feed/basic$params";
		} else if ('CSV' == $format) {
			$url = "http://code.google.com/p/".$this->project."/$feed/csv$params";
		} else {
			throw new Exception("Unsupported feed format: $format");
		}
		
		# Generates the cache ID
		$id = $this->project . "-$num-" . preg_replace("[^a-zA-Z0-9]", '', $params);
		
		
		try {
			$data = $this->cache->fetch($id. $timeout);
			return $data;
		} catch (Exception $e) {
			if ('ATOM' == $format) {
				# Parses ATOM feed using SimplePie
				$this->parser->set_feed_url($url);
				$this->parser->init();
				$this->parser->handle_content_type();
				$data = $this->parser->get_items();
			} else {
				# Parses CSV feed
				$fp = fopen($url, 'r');
				$data = array();
				
				# We'll use the top row to locate headers
				$headers = fgetcsv($fp);
				
				# This block creates a hashmap from the CSV data using the headers map.
				while (($row = fgetcsv($fp)) !== FALSE) {
					$pos = 0;
					$container = array();
					foreach($row as $block) {
						$container[$headers[$pos++]] = $block;
					}
					$data[] = $container;
				}
			}
			
			# We'll return only the required number of elements.
			if ($num >= 1) {
				$data = array_slice($data, 0, $num, TRUE);
			} else {
				$data = $data;
			}		
			
			$this->cache->store($id, $data);
		}
		
		return $data;
	}
}


?>
