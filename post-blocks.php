<?php
/*
Plugin Name: Post Blocks
Plugin URI: http://wordpress.org/extend/plugins/post-blocks/
Description: Extends the basic WordPress functionality to enable posts to be listed anywhere you can put a widget.
Version: 0.0.4
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

add_action('admin_menu', 'post_blocks_menu');

function post_blocks_menu() {
  add_options_page('Post Blocks Options', 'Post Blocks', 8, __FILE__, 'post_blocks_options');
}

function post_blocks_options() {
  $pb_options = get_option('widget_post_blocks');
  $pb_options_to_update = array('post_blocks_css','post_blocks_future_posts','post_blocks_remove_css')
 ?>
<div class="wrap">
  <h2>Post Blocks</h2>
  <form method="post" action="options.php"><input type="hidden" name="action" value="update" />
  <input type="hidden" name="page_options" value="<?php echo esc_attr( implode( ',', $pb_options_to_update ) ); ?>" />
  <?php wp_nonce_field('update-options'); ?>
  <table class="form-table">
   <tr valign="top">
    <th scope="row" rowspan="2">CSS</th>
    <td>&lt;style&gt;<br>
    #post_blocks .post_blocks_post { width: <?php echo absint($pb_options['pwidth']); ?>px; }<br>
    #post_blocks .datetime { width: <?php echo absint($pb_options['dwidth']); ?>px;}<br>
    <textarea rows="10" style="width:100%;" name="post_blocks_css"><?php echo (get_option("post_blocks_css")) ? get_option("post_blocks_css") : "#post_blocks, #post_blocks ul { margin: 0; padding: 1px; }
#post_blocks ul li { display: table;  border: 1px solid #c0c0c0; border-radius: 3px 3px 3px 3px; float:relative; float: left; margin: 5px; }
#post_blocks .post_blocks_post { display: table-cell; color:#000;font:1em 'Georgia','Myriad Pro',sans-serif;height:40px;line-height:100%;overflow:hidden;padding:5px;text-align:left; vertical-align: top; }
#post_blocks .post_blocks_post h3 { padding-bottom: 3px; margin: 0px; }
#post_blocks .post_blocks_post a { color:#000; text-decoration: none; font-weight: bold; }
#post_blocks .post_blocks_post a:hover { text-decoration: underline; }
#post_blocks .datetime { display: table-cell; background: #c0c0c0; color: #919191; padding: 5px; margin: 0 !important; font:2em 'Georgia','Myriad Pro',sans-serif; text-align:center; text-shadow: 1px 1px #D3D3D3, -1px -1px #6E6E6E;}
#post_blocks .monthday, #post_blocks .year{ display: block; }"; ?></textarea>&lt;/style&gt;</td>
   </tr>
   <tr valign="top">
    <td>
    <input type="checkbox" value="y" id="post_blocks_remove_css" name="post_blocks_remove_css"<?php echo get_option("post_blocks_remove_css") ? " checked='checked' " : " " ?>/><label for="post_blocks_remove_css">Disable CSS?</label>
    </td>
   </tr>
   <tr valign="top">
    <th scope="row">Future Posts</th>
    <td>
    <input type="checkbox" value="y" id="post_blocks_future_posts" name="post_blocks_future_posts"<?php echo get_option("post_blocks_future_posts") ? " checked='checked' " : " " ?>/><label for="post_blocks_future_posts">Enable future posts?</label>
    </td>
   </tr>
  </table>
  <p class="submit">
  <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
  </p></form>
</div>
<?php
}

include_once dirname( __FILE__ ) . '/widget.php';

?>