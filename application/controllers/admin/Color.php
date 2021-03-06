<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Color extends Admin_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('color_model');
        $this->load->helper('common');
        $this->author_data = handle_author_common_data();
    }

	public function index()
	{
		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->color_model->count_search($keywords);

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/blog/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->color_model->fetch_all_pagination($per_page, $this->data['page'], $keywords);
        $this->data['result'] = $result;
        $this->data['keywords'] = $keywords;

		$this->render('admin/color/list_color_view');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Tên Mã Màu', 'trim|required',
											array('required' => '%s không được trống')
										);
		$this->form_validation->set_rules('hexcolor', 'Mã Màu', 'trim|required',
											array('required' => '%s không được trống')
										);
		if ($this->form_validation->run() == FALSE) {
			$this->render('admin/color/create_color_view');
		}else{
			if ($this->input->post()) {
				$data = array(
					'title' => $this->input->post('title'),
					'hexcolor' => $this->input->post('hexcolor'),
					'created_at' => $this->author_data['created_at'],
                    'created_by' => $this->author_data['created_by']
				);

				$insert = $this->color_model->insert($data);
				if($insert){
					$this->session->set_flashdata('message_success', 'Thêm mới thành công!');
				}else{
					$this->session->set_flashdata('message_error', 'Thêm mới thất bại!');
					$this->render('admin/color/create_color_view');
				}
				redirect('admin/color');
			}
		}
	}

	public function edit($id='')
	{
		$detail = $this->color_model->get_by_id($id);
		if(!$detail){
			redirect('admin/color','refresh');
		}
		$this->data['detail'] = $detail;
		$this->load->helper('form');
		$this->load->library('form_validation');
		// echo '<pre>';
		// print_r($detail);die;

		$this->form_validation->set_rules('title', 'Tên Mã Màu', 'trim|required',
											array('required' => '%s không được trống')
										);
		$this->form_validation->set_rules('hexcolor', 'Mã Màu', 'trim|required',
											array('required' => '%s không được trống')
										);
		if ($this->form_validation->run() == FALSE) {
			$this->render('admin/color/edit_color_view');
		}else{
			if ($this->input->post()) {
				$data = array(
					'title' => $this->input->post('title'),
					'hexcolor' => $this->input->post('hexcolor'),
					'updated_at' => $this->author_data['updated_at'],
                    'updated_by' => $this->author_data['updated_by']
				);

				$update = $this->color_model->update($id, $data);
				if($update){
					$this->session->set_flashdata('message_success', 'Cập nhật thành công!');
				}else{
					$this->session->set_flashdata('message_error', 'Cập nhật thất bại!');
					$this->render('admin/color/edit_color_view');
				}
				redirect('admin/color');
			}
		}
	}

	public function remove()
	{
		$id = $this->input->get('id');
		$data = array('is_deleted' => 1);
        $update = $this->color_model->update($id, $data);
        if($update == 1){
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array('status' => 200)));
        }
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(400)
                    ->set_output(json_encode(array('status' => 400)));
	}

}

/* End of file Color.php */
/* Location: ./application/controllers/admin/Color.php */