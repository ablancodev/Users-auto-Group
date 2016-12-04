/**
*  You need to change Premium by your group name.
*  With $num_days you set the number of days.
**/

function is_user_reg_matured( $reg_days_ago = 30 )
{
	$cu = wp_get_current_user();
	return ( isset( $cu->data->user_registered ) && strtotime( $cu->data->user_registered ) < strtotime( sprintf( '-%d days', $reg_days_ago ) ) ) ? TRUE : FALSE;
}

$user_id = get_current_user_id();
if ( $user_id ) {
	$num_days = 30;
	if ( is_user_reg_matured( $num_days ) ) {
		if ( $group = Groups_Group::read_by_name( 'Premium' ) ) {
			$result = Groups_User_Group::create( array( "user_id"=>$user_id, "group_id"=>$group->group_id ) );
			//Groups_User_Group::delete( $user_id, $group->group_id );
		}
	}
}
