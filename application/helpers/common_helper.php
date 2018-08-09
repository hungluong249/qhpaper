<?php

if (!function_exists('handle_common_author_data')) {
    /**
     * @return array
     */
    function handle_author_common_data() {
        $CI =& get_instance();
        $CI->load->library('ion_auth');

        date_default_timezone_set('Asia/Ho_Chi_Minh');

        return array(
            'created_at' => date('Y-m-d H:i:s', now()),
            'created_by' => $CI->ion_auth->user()->row()->username,
            'updated_at' => date('Y-m-d H:i:s', now()),
            'updated_by' => $CI->ion_auth->user()->row()->username
        );
    }
}

//build array for dropdown form template
if (!function_exists('build_array_for_dropdown')) {
    /**
     * @param array $data
     * @param null $id
     * @return array
     */
    function build_array_for_dropdown($data = array(), $id = null){
        foreach ($data as $key => $value) {
            $new_data[$value['id']] = $value['title'];

        }
        unset($new_data[$id]);
        return $new_data;
    }
}

if (!function_exists('build_array_by_slug_for_dropdown')) {
    /**
     * @param array $data
     * @return array
     */
    function build_array_by_slug_for_dropdown($data = array()){
        $new_data = array('' => 'Click để chọn');
        foreach ($data as $key => $value) {
            if($value['is_activated'] == 0){
                $new_data[$value['slug']] = $value['title'];
            }else{
                $new_data[$value['slug']] = $value['title'].MESSAGE_ERROR_TURN_ON_POST_PERSENT;
            }

        }
        return $new_data;
    }
}

