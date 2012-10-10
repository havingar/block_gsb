<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This file keeps track of upgrades to the newmodule module
 *
 * Sometimes, changes between versions involve alterations to database
 * structures and other major things that may break installations. The upgrade
 * function in this file will attempt to perform all the necessary actions to
 * upgrade your older installation to the current version. If there's something
 * it cannot do itself, it will tell you what you need to do.  The commands in
 * here will all be database-neutral, using the functions defined in DLL libraries.
 *
 * @package    gsb
 * @subpackage block_gsb
 * @copyright  2012 Richard Havinga
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Execute block_gsb upgrade from the given old version
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_newmodule_upgrade($oldversion) {
    global $DB;

    $dbman = $DB->get_manager(); // loads ddl manager and xmldb classes

    if ($oldversion < 2012012912) {

	    //rename courseid to id for use of Moodle API
       $table = new xmldb_table('gsb_content');
       $field = new xmldb_field('courseid', XMLDB_TYPE_INTEGER, '5', null, XMLDB_NOTNULL, null, null, '');
       $dbman->rename_field($table, $field, 'id');
		 
		 // Define field oldgsb to be added to gsb_content table
        $table = new xmldb_table('gsb_content');
        $field = new xmldb_field('oldgsb', XMLDB_TYPE_CHAR, '7', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'embednum');

        // Add field oldgsb
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
	
        // Define field oldgsb to be added to gsb_content table
        $table = new xmldb_table('gsb_content');
        $field = new xmldb_field('oldgsb', XMLDB_TYPE_CHAR, '7', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'embednum');

        // Add field oldgsb
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field gsboverride to be added to gsb
        $table = new xmldb_table('gsb_content');
        $field = new xmldb_field('gsboverride', XMLDB_TYPE_CHAR,'7', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, 'no', 'oldgsb');

        // Add field intro
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field enrolnum to be added to gsb
        $table = new xmldb_table('gsb_content');
        $field = new xmldb_field('enrolnum', XMLDB_TYPE_INTEGER,'4', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'gsboverride');

        // Add field introformat
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Once we reach this point, we can store the new version and consider the module
        // upgraded to the version 2012012912 so the next time this block is skipped
        upgrade_mod_savepoint(true, 2012012912, 'gsb_content');
    }

    

    // Third example, the next day, 2007/04/02 (with the trailing 00), some actions were performed to install.php,
    // related with the module
    /*if ($oldversion < 2007040200) {

        // insert here code to perform some actions (same as in install.php)

        upgrade_mod_savepoint(true, 2007040200, 'newmodule');
    }*/

    // And that's all. Please, examine and understand the 3 example blocks above. Also
    // it's interesting to look how other modules are using this script. Remember that
    // the basic idea is to have "blocks" of code (each one being executed only once,
    // when the module version (version.php) is updated.

    // Lines above (this included) MUST BE DELETED once you get the first version of
    // yout module working. Each time you need to modify something in the module (DB
    // related, you'll raise the version and add one upgrade block here.

    // Final return of upgrade result (true, all went good) to Moodle.
    return true;
}
