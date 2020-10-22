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
 * Social block
 *
 * @package   block_leeloo_social
 * @copyright  2020 Leeloo LXP (https://leeloolxp.com)
 * @author     Leeloo LXP <info@leeloolxp.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die;

/**
 * Social block
 *
 * @package   block_leeloo_social
 * @copyright  2020 Leeloo LXP (https://leeloolxp.com)
 * @author     Leeloo LXP <info@leeloolxp.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_leeloo_social extends block_base {
    /**
     * Block initialization.
     */
    public function init() {
        $this->title = get_string('pluginname', 'block_leeloo_social');
    }

    /**
     * Allow instace configration.
     */
    public function instance_allow_config() {
        return true;
    }

    /**
     * Dont allow multiple blocks
     */
    public function instance_allow_multiple() {
        return false;
    }

    /**
     * Return contents of leeloo_social block
     *
     * @return stdClass contents of block
     */
    public function get_content() {

        global $CFG;
        global $SESSION;
        $jsessionid = $SESSION->jsession_id;

        if ($this->content !== null) {
            return $this->content;
        }
        
        $this->title = get_string('displayname', 'block_leeloo_social');

        if($jsessionid){
            $this->content->text = '<iframe src="https://leeloolxp.com/es-frame?session_id='.$jsessionid.'" class="leeloosocial"></iframe>';
        }else{
            $this->content->text = '';
        }

        $this->content->footer = '';

        return $this->content;
    }

    /**
     * Allow the block to have a configuration page
     *
     * @return boolean
     */
    public function has_config() {
        return false;
    }

    /**
     * Locations where block can be displayed
     *
     * @return array
     */
    public function applicable_formats() {
        return array('all' => true);
    }
}
