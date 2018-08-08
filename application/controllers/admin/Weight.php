<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weight extends Admin_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('weight_model');
        $this->load->helper('common');
        $this->author_data = handle_author_common_data();
    }

	public function index()
	{
		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->weight_model->count_search($keywords, false);

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

        $result = $this->weight_model->fetch_all_pagination($per_page, $this->data['page'], $keywords, false);
        $this->data['result'] = $result;
        $this->data['keywords'] = $keywords;

		$this->render('admin/weight/list_weight_view');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Tên Định Lượng', 'trim|required',
											array('required' => '%s không được trống')
										);
		$this->form_validation->set_rules('number', 'Thông Số', 'trim|required',
											array('required' => '%s không được trống')
										);
		if ($this->form_validation->run() == FALSE) {
			$this->render('admin/weight/create_weight_view');
		}else{
			if ($this->input->post()) {
				$data = array(
					'title' => $this->input->post('title'),
					'number' => $this->input->post('number'),
					'created_at' => $this->author_data['created_at'],
                    'created_by' => $this->author_data['created_by']
				);

				$insert = $this->weight_model->insert($data);
				if($insert){
					$this->session->set_flashdata('message_success', 'Thêm mới thành công!');
				}else{
					$this->session->set_flashdata('message_error', 'Thêm mới thất bại!');
					$this->render('admin/weight/create_weight_view');
				}
				redirect('admin/weight');
			}
		}
	}

	public function edit($id='')
	{
		$detail = $this->weight_model->get_by_id($id);
		if(!$detail){
			redirect('admin/weight','refresh');
		}
		$this->data['detail'] = $detail;
		$this->load->helper('form');
		$this->load->library('form_validation');
		// echo '<pre>';
		// print_r($detail);die;

		$this->form_validation->set_rules('title', 'Tên Định Lượng', 'trim|required',
											array('required' => '%s không được trống')
										);
		$this->form_validation->set_rules('number', 'Thông Số', 'trim|required',
											array('required' => '%s không được trống')
										);
		if ($this->form_validation->run() == FALSE) {
			$this->render('admin/weight/edit_weight_view');
		}else{
			if ($this->input->post()) {
				$data = array(
					'title' => $this->input->post('title'),
					'number' => $this->input->post('number'),
					'updated_at' => $this->author_data['updated_at'],
                    'updated_by' => $this->author_data['updated_by']
				);

				$update = $this->weight_model->update($id, $data);
				if($update){
					$this->session->set_flashdata('message_success', 'Cập nhật thành công!');
				}else{
					$this->session->set_flashdata('message_error', 'Cập nhật thất bại!');
					$this->render('admin/weight/edit_weight_view');
				}
				redirect('admin/weight');
			}
		}
	}

	public function remove()
	{
		$id = $this->input->get('id');
		$data = array('is_deleted' => 1);
        $update = $this->weight_model->update($id, $data);
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

/* End of file weight.php */
/* Location: ./application/controllers/admin/weight.php */