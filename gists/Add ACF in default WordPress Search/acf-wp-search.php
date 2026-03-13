<?php 

// Define list of ACF fields you want to search through - do NOT include taxonomies here
function list_searcheable_acf(){
  $list_searcheable_acf = array(
    "main_title",
    "buttons",
    "section_title",
    "policies",
    "latest_press",
    "press_release_post",
    "press_contact",
    "archive",
    "posts_slider",
    "locations",
    "squote",
    "services",
    "meet_danuta",
    "video_section",
    "instagram_section",
    "blog_post",
    "ptitle",
    "pposts",
    "vtitle",
    "main_video_title",
    "additional_videos",
    "quote",
    "designation",
    "location",
    "service_categories",
    "sub_category_group",
    "services_list",
    "addons_title",
    "addons",
    "subtitle",
	"title",
	"atitle",
	"asdesc",
	"l_address",
	"l_phoneText",
	"opening_hours",
	"social_links",
	"location"
  );
  return $list_searcheable_acf;
}

function advanced_custom_search( $search, $wp_query ) {
  global $wpdb;

  if ( empty( $search )) {
    return $search;
  }

  $terms_raw = $wp_query->query_vars[ 's' ];

  $terms_xss_cleared = strip_tags($terms_raw);

  $terms = esc_sql($terms_xss_cleared);

  $exploded = explode( ' ', $terms );
  if( $exploded === FALSE || count( $exploded ) == 0 ) {
    $exploded = array( 0 => $terms );
  }

  $search = '';

  $list_searcheable_acf = list_searcheable_acf();

  $table_prefix = $wpdb->prefix;
    
  foreach( $exploded as $tag ) {
    $search .= "
      AND (
        (".$table_prefix."posts.post_title LIKE '%$tag%')
        OR (".$table_prefix."posts.post_content LIKE '%$tag%')

        OR EXISTS (
          SELECT * FROM ".$table_prefix."postmeta
          WHERE post_id = ".$table_prefix."posts.ID
          AND (";

            foreach ($list_searcheable_acf as $searcheable_acf) {
              if ($searcheable_acf == $list_searcheable_acf[0]) {
                $search .= " (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
              } else {
                $search .= " OR (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
              }
            }
          $search .= ")
        )
        
        OR EXISTS (
          SELECT * FROM ".$table_prefix."comments
          WHERE comment_post_ID = ".$table_prefix."posts.ID
          AND comment_content LIKE '%$tag%'
        )

        OR EXISTS (
          SELECT * FROM ".$table_prefix."terms
          INNER JOIN ".$table_prefix."term_taxonomy
          ON ".$table_prefix."term_taxonomy.term_id = ".$table_prefix."terms.term_id
          INNER JOIN ".$table_prefix."term_relationships
          ON ".$table_prefix."term_relationships.term_taxonomy_id = ".$table_prefix."term_taxonomy.term_taxonomy_id

          WHERE (
            taxonomy = 'spa-services'
            OR taxonomy = 'staff-type'
          )
          AND object_id = ".$table_prefix."posts.ID
          AND ".$table_prefix."terms.name LIKE '%$tag%'
        )
      )"; // closes $search
    } // closes foreach
  return $search;
} // closes function advanced_custom_search
add_filter( 'posts_search', 'advanced_custom_search', 500, 2 );
?>