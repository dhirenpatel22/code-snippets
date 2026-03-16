<?php 
// Remove child category from Sitemap.xml
add_filter( 'wpseo_sitemap_url', 'sitemap_exclude_taxonomy' );
function sitemap_exclude_taxonomy( $url = null, $type = null, $term = null ) {
	$dataurl = $url;
	$url = explode('brands/',$url);
	$url_data = explode('/',$url[1]);
	$term_slug = $url_data[0];
	$texonomy = get_term_by('slug', $term_slug , "wsac_cse_make");
	if(!$texonomy->parent)
	{
		return $dataurl;
	}
}
add_filter('wpseo_sitemap_exclude_empty_terms', 'return_false');
?>