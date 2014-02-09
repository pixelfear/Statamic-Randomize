<?php
class Plugin_randomize extends Plugin 
{

	public $meta = array(
		'name'       => 'Randomize',
		'version'    => 1.0,
		'author'     => 'Jason Varga',
		'author_url' => 'http://pixelfear.com'
	);

	//--------------------------------------------------------------------------

	public function index()
	{

		$delimiter   = $this->fetchParam(array('delimiter','tag','tag_pair','wrapper'), 'section');
		$page_url    = $this->fetchParam(array('url','from'), URL::getCurrent());
		$array_name  = $this->fetchParam(array('array','grid','grid_field'), null);
		$tag_content = $this->content;

		// Random row from grid/array?
		if ($array_name) {
			$page_content = Content::get($page_url);
			$array_content = $page_content[$array_name];
			$random_key = array_rand($array_content);
			return Parse::template($tag_content, $array_content[$random_key]);
		}

		// Random from template
		else {
			$pattern = "/\{\{\s$delimiter\s\}\}(.*?)\{\{\/\s$delimiter\s\}\}/ms";
			preg_match_all($pattern, $tag_content, $matches);
			$sections = $matches[1];
			$random_key = array_rand($sections);
			return $sections[$random_key];
		}

	}

}