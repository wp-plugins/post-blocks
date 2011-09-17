<?php
/*
Plugin Name: Post Blocks
Plugin URI: http://wordpress.org/extend/plugins/post-blocks/
Description: Extends the basic WordPress functionality to enable posts to be listed anywhere you can put a widget.
Version: 0.0.1
Author: Jeremy Tompkins
Author URI: http://www.exec-tools.com/
Copyright: 2011, Jeremy Tompkins, Exec Tools

GNU General Public License, Free Software Foundation <http://creativecommons.org/licenses/GPL/2.0/>
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

if(!function_exists('str_split')) {
  function str_split($string, $split_length = 1) {
    $array = explode("\r\n", chunk_split($string, $split_length));
    array_pop($array);
    return $array;
  }
}

include_once dirname( __FILE__ ) . '/widget.php';
?>