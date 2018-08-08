<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property extends Admin_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('property_model');
        $this->load->helper('common');
        $this->author_data = handle_author_common_data();
    }

	public function index()
	{
		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->property_model->count_search($keywords, false);

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/property/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->property_model->fetch_all_pagination($per_page, $this->data['page'], $keywords, false);
        $this->data['result'] = $result;
        $this->data['keywords'] = $keywords;

		$this->render('admin/property/list_property_view');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		if(empty($_FILES['image']['name'])){
			$this->form_validation->set_rules('image', 'Hình Ảnh', 'required',
											array('required' => '%s không được trống')
										);
		}
		$this->form_validation->set_rules('title', 'Tên Tính Chất', 'trim|required',
											array('required' => '%s không được trống')
										);
		if ($this->form_validation->run() == FALSE) {
			$this->render('admin/property/create_property_view');
		}else{
			if ($this->input->post()) {
				if(!empty($_FILES['image']['name'])){
                    $this->check_img($_FILES['image']['name'], $_FILES['image']['size']);
                    $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/property', 'assets/upload/property/thumb');
                }
				$data = array(
					'title' => $this->input->post('title'),
					'image' => $image,
					'created_at' => $this->author_data['created_at'],
                    'created_by' => $this->author_data['created_by']
				);

				$insert = $this->property_model->insert($data);
				if($insert){
					$this->session->set_flashdata('message_success', 'Thêm mới thành công!');
				}else{
					$this->session->set_flashdata('message_error', 'Thêm mới thất bại!');
					$this->render('admin/property/create_property_view');
				}
				redirect('admin/property');
			}
		}
	}

	public function edit($id='')
	{
		$detail = $this->property_model->get_by_id($id);
		if(!$detail){
			redirect('admin/property','refresh');
		}
		$this->data['detail'] = $detail;
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Tên Tính Chất', 'trim|required',
											array('required' => '%s không được trống')
										);
		if ($this->form_validation->run() == FALSE) {
			$this->render('admin/property/edit_property_view');
		}else{
			if ($this->input->post()) {
				if(!empty($_FILES['image']['name'])){
                    $this->check_img($_FILES['image']['name'], $_FILES['image']['size']);
                    $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/property', 'assets/upload/property/thumb');
                }
				$data = array(
					'title' => $this->input->post('title'),
					'updated_at' => $this->author_data['updated_at'],
                    'updated_by' => $this->author_data['updated_by']
				);
				if(!empty($_FILES['image']['name'])){
					$data['image'] = $image;
				}

				$update = $this->property_model->update($id, $data);
				if($update){
					$this->session->set_flashdata('message_success', 'Cập nhật thành công!');
				}else{
					unlink('assets/upload/property/'.$image);
					$this->session->set_flashdata('message_error', 'Cập nhật thất bại!');
					$this->render('admin/property/edit_property_view');
				}
				redirect('admin/property');
			}
		}
	}

	public function remove()
	{
		$id = $this->input->get('id');
		$data = array('is_deleted' => 1);
        $update = $this->property_model->update($id, $data);
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

	protected function check_img($filename, $filesize){
        $map = strripos($filename, '.')+1;
        $fileextension = substr($filename, $map,(strlen($filename)-$map));
        if(!($fileextension == 'jpg' || $fileextension == 'jpeg' || $fileextension == 'png' || $fileextension == 'gif')){
            $this->session->set_flashdata('message_error', 'Đuôi file image phải là jpg | jpeg | png | gif!');
            redirect('admin/property');
        }
        if ($filesize > 1228800) {
            $this->session->set_flashdata('message_error', sprintf('Hình ảnh vượt quá %u Kb. Vui lòng kiểm tra lại và thực hiện lại thao tác!', 1200));
            redirect('admin/property');
        }
    }

}

/* End of file property.php */
/* Location: ./application/controllers/admin/property.php */