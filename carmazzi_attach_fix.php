<?php
/*
Template Name: dbfixdontuse

	select post_parent,guid from wp_posts where post_type = 'attachment'; AND post_parent =

	a:4:{
		i:0
		;a:1:{
			s:18:"rental-attachments"
			;s:4:"7606";
		}
		i:1
		;a:1:{
			s:18:"rental-attachments"
			;s:4:"7603";
		}
		i:2
		;a:1:{
			s:18:"rental-attachments"
			;s:4:"7596";
		}
		i:3
		;a:1:{
			s:18:"rental-attachments"
			;s:4:"7602";
		}
	}

	// this is the template for meta_value
	a:<array_len>:{
		i:<current_index>;a:1:{s:18:"rental-attachments";s:4:"7606";}
		...
	}

	
	select * from wp_postmeta where meta_key = 'rp_attach';
	
	INSERT INTO wp_meta (post_id,meta_key,meta_value) VALUE ();
	
	
	
	
	$sql="SELECT * FROM my_table";

                    $posts = $wpdb->get_results($sql);

                    print("<ul>");
                    foreach ($posts as $post)
                    {
                        print('<li>'.$post->FIELD1.'|'.$post->FIELD2.'<br/>');
                         print('</li>');
                    }
                    print("</ul>");
*/



	global $wpdb;
	
	$results = $wpdb->get_results("SELECT p.id,p.post_parent,p.guid FROM wp_posts p WHERE p.post_type = 'attachment' AND p.post_parent NOT IN (SELECT m.post_id from wp_postmeta m where m.meta_key='rp_attach') ORDER BY 1 DESC;");
	$current_post = 0;
	$current_post_counter = 0;
	$current_attach = array();
	$current_value = '';
	?><ul><?php
	foreach ($results as $row) {
		if ($row->post_parent != $current_post) {
			if ($current_post > 0) {
				if (count($current_attach > 0)) {
					$current_value = 'a:'.count($current_attach).':{';
					foreach($current_attach as $attach) {
						$current_value .= $attach;
					}
					$current_value .= '}';
					
					$sql = 'INSERT INTO wp_postmeta (post_id,meta_key,meta_value) VALUES ('.$current_post.',\'rp_attach\',\''.$current_value.'\');'
					?><li><?php
					try {
						$wpdb->query($sql);
					} catch (Exception $e) {
						echo '<pre>Exception: '.$e->getMessage().'</pre>';
					}
					?><pre><?=$sql?></pre></li><?php
				}			
			}
			$current_value = '';
			$current_post = $row->post_parent;
			$current_attach = array();
		}
		array_push($current_attach, 'i:'.count($current_attach).';a:1:{s:18:"rental-attachments";s:4:"'.$row->id.'";}');
	}	
	if ($current_post > 0) {
		if (count($current_attach > 0)) {
			$current_value = 'a:'.count($current_attach).':{';
			foreach($current_attach as $attach) {
				$current_value .= $attach;
			}
			$current_value .= '}';
			
			$sql = 'INSERT INTO wp_postmeta (post_id,meta_key,meta_value) VALUES ('.$current_post.',\'rp_attach\',\''.$current_value.'\');'
			?><li><?php
			try {
				$wpdb->query($sql);
			} catch (Exception $e) {
				echo '<pre>Exception: '.$e->getMessage().'</pre>';
			}
			?><pre><?=$sql?></pre></li><?php
		}			
	}
	?></ul><?php
?>

<html>
	<head>
		<title>DB Utility</title>
	</head>
	
	<body>
		<h2>DB Utility</h2>
		
	
	</body>
</html>

<?php

?>