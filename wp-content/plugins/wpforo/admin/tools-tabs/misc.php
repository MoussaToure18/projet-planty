<?php
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;
if( ! current_user_can( 'administrator' ) ) exit;
?>

<form action="" method="POST" class="validate">
	<?php wp_nonce_field( 'wpforo-tools-misc' ) ?>
    <input type="hidden" name="wpfaction" value="misc_options_save">
    <div class="wpf-tool-box" style="width:98%; margin-left: 1%; margin-top: 15px; border: none;">
        <h3><?php _e( 'Admin Note', 'wpforo' ); ?>
            <p class="wpf-info"></p>
        </h3>
        <div style="margin-top:10px; clear:both;">
            <table style="width:100%;">
                <tbody style="padding:10px;">
                <tr>
                    <td colspan="2">
                        <label style="padding-bottom:5px; display:block; font-weight: 600;"><?php _e( 'Admin message on forum front page', 'wpforo' ); ?></label>
                        <p class="wpf-info"><?php _e( 'If you have something important to say on forum front page, you can use this editor. The text will be displayed under forum breadcrumb menu, above forum and topic titles.', 'wpforo' ); ?></p>
                        <br>
						<?php
						$value = WPF()->tools_misc['admin_note'];
						$args  = [
							'teeny'         => false,
							'media_buttons' => true,
							'textarea_rows' => '8',
							'tinymce'       => true,
							'quicktags'     => [ 'buttons' => 'strong,em,link,block,del,ins,img,ul,ol,li,code,close' ],
							'textarea_name' => 'wpforo_tools_misc[admin_note]',
						];
						wp_editor( wp_unslash( $value ), 'wpforo_tools_misc_admin_note', $args ); ?>

                    </td>
                </tr>
                <tr>
                    <th style="vertical-align: top; padding: 10px;">
                        <label style="font-weight: 600"><?php _e( 'Display for Usergroups', 'wpforo' ); ?></label>
                    </th>
                    <td>
						<?php
						$usergroups        = WPF()->usergroup->get_usergroups();
						$admin_note_groups = WPF()->tools_misc['admin_note_groups'];
						?>
						<?php if( ! empty( $usergroups ) ): ?>
							<?php foreach( $usergroups as $usergroup ): ?>
                                <label style="min-width: 30%; display: inline-block; padding-bottom: 5px;">
                                    <input type="checkbox"
                                           name="wpforo_tools_misc[admin_note_groups][]"
                                           value="<?php echo intval( $usergroup['groupid'] ) ?>"
										<?php echo ( ! empty( $admin_note_groups ) && in_array( $usergroup['groupid'], $admin_note_groups ) ) ? 'checked="checked"' : ''; ?>>&nbsp;
									<?php echo esc_html( $usergroup['name'] ); ?>
                                </label>
							<?php endforeach; ?>
						<?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th style="vertical-align: top; padding: 10px;">
                        <label style="font-weight: 600"><?php _e( 'Display on forum pages', 'wpforo' ); ?></label>
                    </th>
                    <td>
						<?php $pages = WPF()->tools_misc['admin_note_pages'];
						if( empty( $pages ) ) $pages = []; ?>
                        <label style="min-width: 30%; display: inline-block; padding-bottom: 5px;">
                            <input name="wpforo_tools_misc[admin_note_pages][]" <?php if( in_array( 'forum', $pages ) ) echo 'checked' ?> value="forum" type="checkbox">&nbsp;
							<?php _e( 'Forums', 'wpforo' ) ?>
                        </label>
                        <label style="min-width: 30%; display: inline-block; padding-bottom: 5px;">
                            <input name="wpforo_tools_misc[admin_note_pages][]" <?php if( in_array( 'topic', $pages ) ) echo 'checked' ?> value="topic" type="checkbox">&nbsp;
							<?php _e( 'Forum (topic list)', 'wpforo' ) ?>
                        </label>
                        <label style="min-width: 30%; display: inline-block; padding-bottom: 5px;">
                            <input name="wpforo_tools_misc[admin_note_pages][]" <?php if( in_array( 'post', $pages ) ) echo 'checked' ?> value="post" type="checkbox">&nbsp;
							<?php _e( 'Topic (post list)', 'wpforo' ) ?>
                        </label>
                        <label style="min-width: 30%; display: inline-block; padding-bottom: 5px;">
                            <input name="wpforo_tools_misc[admin_note_pages][]" <?php if( in_array( 'recent', $pages ) ) echo 'checked' ?> value="recent" type="checkbox">&nbsp;
							<?php _e( 'Recent Posts', 'wpforo' ) ?>
                        </label>
                        <label style="min-width: 30%; display: inline-block; padding-bottom: 5px;">
                            <input name="wpforo_tools_misc[admin_note_pages][]" <?php if( in_array( 'tags', $pages ) ) echo 'checked' ?> value="tags" type="checkbox">&nbsp;
							<?php _e( 'Tags', 'wpforo' ) ?>
                        </label>
                        <label style="min-width: 30%; display: inline-block; padding-bottom: 5px;">
                            <input name="wpforo_tools_misc[admin_note_pages][]" <?php if( in_array( 'members', $pages ) ) echo 'checked' ?> value="members" type="checkbox">&nbsp;
							<?php _e( 'Members', 'wpforo' ) ?>
                        </label>
                        <label style="min-width: 30%; display: inline-block; padding-bottom: 5px;">
                            <input name="wpforo_tools_misc[admin_note_pages][]" <?php if( in_array( 'profile', $pages ) ) echo 'checked' ?> value="profile" type="checkbox">&nbsp;
							<?php _e( 'Profile Home', 'wpforo' ) ?>
                        </label>
                        <label style="min-width: 30%; display: inline-block; padding-bottom: 5px;">
                            <input name="wpforo_tools_misc[admin_note_pages][]" <?php if( in_array( 'account', $pages ) ) echo 'checked' ?> value="account" type="checkbox">&nbsp;
							<?php _e( 'Profile Account', 'wpforo' ) ?>
                        </label>
                        <label style="min-width: 30%; display: inline-block; padding-bottom: 5px;">
                            <input name="wpforo_tools_misc[admin_note_pages][]" <?php if( in_array( 'activity', $pages ) ) echo 'checked' ?> value="activity" type="checkbox">&nbsp;
							<?php _e( 'Profile Activity', 'wpforo' ) ?>
                        </label>
                        <label style="min-width: 30%; display: inline-block; padding-bottom: 5px;">
                            <input name="wpforo_tools_misc[admin_note_pages][]" <?php if( in_array( 'subscriptions', $pages ) ) echo 'checked' ?> value="subscriptions" type="checkbox">&nbsp;
							<?php _e( 'Profile Subscriptions', 'wpforo' ) ?>
                        </label>

                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="wpforo_settings_foot" style="clear:both; margin-top:20px;">
        <input type="submit" class="button button-primary" value="<?php _e( 'Update Options', 'wpforo' ); ?>"/>
        <input type="submit" class="button" value="<?php _e( 'Reset Options', 'wpforo' ); ?>" name="reset" onclick="return confirm('<?php wpforo_phrase( 'Do you really want to reset options?' ) ?>')"/>
    </div>
</form>
