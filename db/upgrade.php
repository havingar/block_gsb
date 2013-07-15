<?php


function xmldb_block_gsb_upgrade($oldversion) {
    global $DB;
	$dbman = $DB->get_manager();

    return true;
	
	if($oldversion <= '2012103000') {

		if($dbman->table_exists('block_gsb_content')){
			$dbman->rename_table('block_gsb_content', 'block_gsb');
		}
	}
	
	if($oldversion <= '2013061500') {
	
	    $table = 'block_gsb';
        $xmlfield	=	new $xmldb_field('labelsnum');
        if (!$dbman->field_exists($table,$xmlfield)) {
       		
       		$xmlfield->$set_attributes(XMLDB_TYPE_int,'6',XMLDB_UNSIGNED, XMLDB_NOTNULL);
       		$dbman->add_field($table,$xmlfield);
        }

        $xmlfield	=	new $xmldb_field('labelsnum');
        if (!$dbman->field_exists($table,$xmlfield)) {
       		
       		$xmlfield->$set_attributes(XMLDB_TYPE_int,'6',XMLDB_UNSIGNED, XMLDB_NOTNULL);
       		$dbman->add_field($table,$xmlfield);
        }        

        $xmlfield	=	new $xmldb_field('foldersnum');
        if (!$dbman->field_exists($table,$xmlfield)) {
       		
       		$xmlfield->$set_attributes(XMLDB_TYPE_int,'6',XMLDB_UNSIGNED, XMLDB_NOTNULL);
       		$dbman->add_field($table,$xmlfield);
        }

        $xmlfield	=	new $xmldb_field('headingsnum');
        if (!$dbman->field_exists($table,$xmlfield)) {
       		
       		$xmlfield->$set_attributes(XMLDB_TYPE_int,'6',XMLDB_UNSIGNED, XMLDB_NOTNULL);
       		$dbman->add_field($table,$xmlfield);
        }

        $xmlfield	=	new $xmldb_field('urlsnum');
        if (!$dbman->field_exists($table,$xmlfield)) {
       		
       		$xmlfield->$set_attributes(XMLDB_TYPE_int,'6',XMLDB_UNSIGNED, XMLDB_NOTNULL);
       		$dbman->add_field($table,$xmlfield);
        }
		
	}
	
	
}

?>
