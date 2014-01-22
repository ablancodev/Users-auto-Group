add_action('user_register', 'uag_user_register' );

function uag_user_register ( $user_id ) {
        if ($user_id != null) {
                if ( $group = Groups_Group::read_by_name( 'Premium' ) ) {
                        $result = Groups_User_Group::create( array( "user_id"=>$user_id, "group_id"=>$group->group_id ) );
                }
        }
}
