<?php


function xmldb_block_gsb_upgrade($oldversion = 0) {
    global $DB;
	$dbman = $DB->get_manager();

    return true;
	
	if($result && $oldversion <= '2012103000') {

		if($dbman->table_exists('block_gsb_content')){
			$dbman->rename_table('block_gsb_content', 'block_gsb');
		}
	}
}

?>