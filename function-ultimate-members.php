/**
* When an user is approved with Ultimate Members, then he is added to the Premium group.
**/

add_action( 'um_after_user_is_approved', 'my_um_after_user_is_approved', 10, 1 );

function my_um_after_user_is_approved ( $user_id ) {
	if ($user_id != null) {
		if ( $group = Groups_Group::read_by_name( 'Premium' ) ) {
			$result = Groups_User_Group::create( array( "user_id"=>$user_id, "group_id"=>$group->group_id ) );
		}
	}
}
