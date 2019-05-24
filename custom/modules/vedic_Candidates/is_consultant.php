<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class Is_consultant {

    const DEFAULT_USER_ROLE_ID = "8f62d627-6e6d-5886-3732-567948c2d32c";

    function check_consultant($bean, $event, $arguments) {
		/* echo "<pre>";
		print_r($bean); */
        if ($bean->is_consultant_c) {
			//exit("Testxxxxxxxx");
            /* to convert to consultant 
             * 1) create user with same details of candidate - FN, LS and username as FN
             *  1.1) assign the candidate to newly created user in above step
             * 2) assign consultant role
             * 3) add/relate with vedic_Employee module
             * */
            $new_user = $this->create_user($bean);
            
        } else {
           //exit("xxxxxxxx");
        }
       
     
    }
        function create_user($bean) {
            $user = new User();
            

            if (strlen($bean->email1) == 0) {

                $user->user_name = $bean->first_name.$bean->last_name;
            } else {

                $user->user_name = $bean->email1;
            }
            $user->title = 'Consultant';
            $user->user_hash = md5('qwerty123');
            $user->first_name = $bean->first_name;
            $user->last_name = $bean->last_name;
            $user->UserType = 'Regular User';
            $user->status = 'Active';
            $user->employee_status = 'Active';
            $user->save();

            $uid = $user->id;

            // query to update candidate custom table for fiels candidate_user_id
            $assign_user_to_c = "UPDATE `vedic_candidates_cstm` SET `consultant_user_id_c`='$uid'
                                    WHERE id_c='$bean->id'";
            $result = $GLOBALS['db']->query($assign_user_to_c) or die("Query have some issue assigning user to consultant logic hook :" . mysql_error());

            $assign_role = $this->assign_consultant_role($uid, $bean);
        }

        function assign_consultant_role($uid, $bean) {
            
                $role = new ACLRole();
                
                    // Add user to role, if he/she is not already a member
                    $role->set_relationship(
                            'acl_roles_users', array('role_id' => '8f62d627-6e6d-5886-3732-567948c2d32c', 'user_id' => $uid), false
                    );
            
        }

    

}

?>
