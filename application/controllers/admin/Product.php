<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Admin_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('product_model');
        $this->load->helper('common');
        $this->author_data = handle_author_common_data();
    }

	public function index()
	{
		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->product_model->count_search($keywords, false);

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

        $result = $this->product_model->fetch_all_pagination($per_page, $this->data['page'], $keywords, false);
        $this->data['result'] = $result;
        $this->data['keywords'] = $keywords;

		$this->render('admin/product/list_product_view');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('color_model');
		$this->load->model('property_model');
		$this->load->model('weight_model');

		$colors = $this->color_model->fetch_all();
		$colors = build_array_for_dropdown($colors);
        $this->data['colors'] = $colors;

        $properties = $this->property_model->fetch_all();
		$properties = build_array_for_dropdown($properties);
        $this->data['properties'] = $properties;

        $weights = $this->weight_model->fetch_all();
		$weights = build_array_for_dropdown($weights);
        $this->data['weights'] = $weights;

        if(empty($_FILES['image']['name'])){
			$this->form_validation->set_rules('image', 'Hình Ảnh', 'required',
											array('required' => '%s không được trống')
										);
		}
		$this->form_validation->set_rules('title', 'Tên Sản Phẩm', 'trim|required',
											array('required' => '%s không được trống')
										);
		$this->form_validation->set_rules('color[]', 'Mã Màu', 'trim|required',
											array('required' => '%s không được trống')
										);
		$this->form_validation->set_rules('property[]', 'Tính Chất', 'trim|required',
											array('required' => '%s không được trống')
										);
		$this->form_validation->set_rules('weight[]', 'Định Lượng', 'trim|required',
											array('required' => '%s không được trống')
										);
		if ($this->form_validation->run() == FALSE) {
			$this->render('admin/product/create_product_view');
		}else{
			if ($this->input->post()) {
				if(!empty($_FILES['image']['name'])){
                    $this->check_img($_FILES['image']['name'], $_FILES['image']['size']);
                    $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/products', 'assets/upload/products/thumb');
                }
				$data = array(
					'title' => $this->input->post('title'),
					'image' => $image,
					'color' => json_encode($this->input->post('color')),
					'property' => json_encode($this->input->post('property')),
					'weight' => json_encode($this->input->post('weight')),
					'created_at' => $this->author_data['created_at'],
                    'created_by' => $this->author_data['created_by']
				);

				$insert = $this->product_model->insert($data);
				if($insert){
					$this->session->set_flashdata('message_success', 'Thêm mới thành công!');
				}else{
					$this->session->set_flashdata('message_error', 'Thêm mới thất bại!');
					$this->render('admin/product/create_product_view');
				}
				redirect('admin/product');
			}
		}
	}

	public function detail($id='')
	{

		$detail = $this->product_model->get_by_id($id);
		if(!$detail){
			redirect('admin/product','refresh');
		}

		$this->load->model('color_model');
		$this->load->model('property_model');
		$this->load->model('weight_model');

		foreach (json_decode($detail['color']) as $key => $value) {
			$color = $this->color_model->get_by_id($value);
			$colors[] = $color;
			$detail['color'] = $colors;
		}

		foreach (json_decode($detail['property']) as $key => $value) {
			$property = $this->property_model->get_by_id($value);
			$properties[] = $property;
			$detail['property'] = $properties;
		}

		foreach (json_decode($detail['weight']) as $key => $value) {
			$weight = $this->weight_model->get_by_id($value);
			$weights[] = $weight;
			$detail['weight'] = $weights;
		}

		$this->data['detail'] = $detail;
		// echo '<pre>';
		// print_r($detail);die;
		
		$this->render('admin/product/detail_product_view');
	}

	public function edit($id='')
	{
		$detail = $this->product_model->get_by_id($id);
		if(!$detail){
			redirect('admin/product','refresh');
		}
		$this->data['detail'] = $detail;

		$this->load->model('color_model');
		$this->load->model('property_model');
		$this->load->model('weight_model');

		$colors = $this->color_model->fetch_all();
		$colors = build_array_for_dropdown($colors);
        $this->data['colors'] = $colors;

        $properties = $this->property_model->fetch_all();
		$properties = build_array_for_dropdown($properties);
        $this->data['properties'] = $properties;

        $weights = $this->weight_model->fetch_all();
		$weights = build_array_for_dropdown($weights);
        $this->data['weights'] = $weights;

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Tên Sản Phẩm', 'trim|required',
											array('required' => '%s không được trống')
										);
		$this->form_validation->set_rules('color[]', 'Mã Màu', 'trim|required',
											array('required' => '%s không được trống')
										);
		$this->form_validation->set_rules('property[]', 'Tính Chất', 'trim|required',
											array('required' => '%s không được trống')
										);
		$this->form_validation->set_rules('weight[]', 'Định Lượng', 'trim|required',
											array('required' => '%s không được trống')
										);
		if ($this->form_validation->run() == FALSE) {
			$this->render('admin/product/edit_product_view');
		}else{
			if ($this->input->post()) {
				if(!empty($_FILES['image']['name'])){
                    $this->check_img($_FILES['image']['name'], $_FILES['image']['size']);
                    $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/products', 'assets/upload/products/thumb');
                }
				$data = array(
					'title' => $this->input->post('title'),
					'color' => json_encode($this->input->post('color')),
					'property' => json_encode($this->input->post('property')),
					'weight' => json_encode($this->input->post('weight')),
					'updated_at' => $this->author_data['updated_at'],
                    'updated_by' => $this->author_data['updated_by']
				);
				if(!empty($_FILES['image']['name'])){
					$data['image'] = $image;
				}

				$update = $this->product_model->update($id, $data);
				if($update){
					if(!empty($_FILES['image']['name'])){
						unlink('assets/upload/products/'.$detail['image']);
					}
					$this->session->set_flashdata('message_success', 'Cập nhật thành công!');
				}else{
					unlink('assets/upload/products/'.$image);
					$this->session->set_flashdata('message_error', 'Cập nhật thất bại!');
					$this->render('admin/product/edit_product_view');
				}
				redirect('admin/product');
			}
		}
	}

	public function remove()
	{
		$id = $this->input->get('id');
		$detail = $this->product_model->get_by_id($id);
		$data = array('is_deleted' => 1);
        $update = $this->product_model->update($id, $data);
        if($update == 1){
        	if(file_exists('assets/upload/products/'.$detail['image'])){
        		unlink('assets/upload/products/'.$detail['image']);
        	}
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
            redirect('admin/product');
        }
        if ($filesize > 1228800) {
            $this->session->set_flashdata('message_error', sprintf('Hình ảnh vượt quá %u Kb. Vui lòng kiểm tra lại và thực hiện lại thao tác!', 1200));
            redirect('admin/product');
        }
    }

}

/* End of file product.php */
/* Location: ./application/controllers/admin/product.php */