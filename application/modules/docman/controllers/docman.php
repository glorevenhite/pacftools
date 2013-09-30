<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DocMan extends MX_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('document_model');
    $this->load->library('form_validation');
  }

  function index()
  {
    $data['main_content'] = 'docman';
    $data['title'] = 'Quản lý Công văn - Tài liệu';
    $this->template->title('Docs Man', 'Quản lý Công văn - Tài liệu');
    $this->template->set_layout('default');
    $this->template->build('docman', $data);
  }

  function edit($id)
  {
    $doc = $this->document_model->get_document_by_id($id);

    if($doc)
    {
      $data['form_values'] = $doc[0];
      $data['main_content'] = 'edit_form';
      $this->template->set_layout('default');
      $this->template->build('edit_form', $data);
    }

  }

  function update($id)
  {
    #Validation
    $this->form_validation->set_rules('arrived_date', 'Arrival Date', 'required');
    $this->form_validation->set_rules('doc_author', 'Author', 'required');
    $this->form_validation->set_rules('doc_code', 'Code', 'required');
    $this->form_validation->set_rules('doc_date', 'Date', 'required');
    $this->form_validation->set_rules('doc_title', 'Title', 'required');
    $this->form_validation->set_rules('doc_cat', 'Category', 'required');
    $this->form_validation->set_rules('doc_security', 'Security', 'required');
    $this->form_validation->set_rules('doc_priority', 'Priority', 'required');
    $this->form_validation->set_rules('doc_pages', 'Pages', 'required');

    if($this->form_validation->run() == FALSE)
    {
      $data['main_content'] = "edit_form";
      $this->template->title('Cập nhật thông tin Công văn - Văn bản');
      $this->template->set_layout('default');
      $this->template->build('edit_form', $data);
    }
    else
    {
      #Pass validation
      $new_document = array(
          'arrived_date' => date('Y-m-d', strtotime($this->input->post('arrived_date'))),
          'doc_author' => $this->input->post('doc_author'),
          'doc_code' => $this->input->post('doc_code'),
          'doc_date' => date('Y-m-d', strtotime($this->input->post('doc_date'))),
          'doc_title' => $this->input->post('doc_title'),
          'doc_cat' => $this->input->post('doc_cat'),
          'doc_security' => $this->input->post('doc_security'),
          'doc_priority' => $this->input->post('doc_priority'),
          'doc_pages' => $this->input->post('doc_pages'),
          'doc_deadline' => date('Y-m-d',strtotime($this->input->post('doc_deadline'))),
          #'comment' => $this->input->post('comment')
          #'attachment' => base_url() . '/uploads/'. $upload_data['file_name'],
          );

      if ($query = $this->document_model->update($id, $new_document))
      {
          $data['main_content'] = 'success';
          $this->template->title('Successfully Creation');
          $this->template->set_layout('default');
          $this->template->build('success', $data);
        }
        else
        {
          $doc = $this->document_model->get_document_by_id($id);
          $data['form_values'] = $doc[0];
          $data['main_content'] = "edit_form";
          $this->template->set_layout('default');
          $this->template->build('edit_form', $data);
        }

    }
  }

   /**
    * Search document based on several input
    *
    * @access public
    *
    */
  function search()
  {
    #Get information from form
    $from = date('Y-m-d', strtotime($this->input->post('from_date')));
    $to = date('Y-m-d', strtotime($this->input->post('to_date')));
    $code = $this->input->post('doc_code');
    $title = $this->input->post('doc_title');

    $result = $this->document_model->get_document_by($from, $to, $title, $code);
    if($result)
    {
      $data['content'] = $result;
      $data['main_content'] = 'result';

      #Setting output
      $this->template->title('Quản lý Công văn', 'Kết quả tìm kiếm');
      $this->template->set_layout('default');
      $this->template->build('result', $data);
    }
    else
    {
      $data['main_content'] = 'search_document_form';
      $this->template->set_layout('default');
      $this->template->build('search_document_form', $data);

    }
  }

  function get_all_documents()
  {
    $this->load->library('table');

    $records = $this->document_model->get_all_documents();
    $data['content'] = $this->table->generate($records);
    $data['main_content'] = "docman_widget";
    // Call the view corresponded
    $this->template->set_layout('default');
    $this->template->build('docman_widget', $data);
  }


  function deliver($id)
  {
    $doc = $this->document_model->get_document_by_id($id);
    if($doc)
    {
      $data['document'] = $doc[0];
      $data['main_content'] = "delivery_form";
      $this->template->title("Chuyển Công văn");
      $this->template->build('delivery_form', $data);
    }
  }

  function assign()
  {
     $doc_id = $this->input->post('doc_id');
     $this->load->model('Assignment_model', 'assignment_model');
     foreach($this->input->post('assignee') as $k=>$user_id)
     {
        $this->assignment_model->insert($user_id, $doc_id);
     }
	
     $data['main_content'] = 'docman';
     $this->template->build('docman', $data);
  }

  function create_in_doc()
  {
    #Validation
    $this->load->library('form_validation');

    $this->form_validation->set_rules('arrived_date', 'Arrival Date', 'required');
    $this->form_validation->set_rules('doc_author', 'Author', 'required');
    $this->form_validation->set_rules('doc_code', 'Code', 'required');
    $this->form_validation->set_rules('doc_date', 'Date', 'required');
    $this->form_validation->set_rules('doc_title', 'Title', 'required');
    $this->form_validation->set_rules('doc_cat', 'Category', 'required');
    $this->form_validation->set_rules('doc_security', 'Security', 'required');
    $this->form_validation->set_rules('doc_priority', 'Priority', 'required');
    $this->form_validation->set_rules('doc_pages', 'Pages', 'required');

    if($this->form_validation->run() == FALSE)
    {
      $data['main_content'] = "creation_form";
      $this->template->title('Thêm Công văn - Văn bản');
      $this->template->set_layout('default');
      $this->template->build('creation_form', $data);
    }
    else
    {
      #Pass validation
      //upload file
      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = 'doc|docx|pdf';
      $config['max_size'] = 5000;
      $this->load->library('upload', $config);

      if(!$this->upload->do_upload('attachment'))
      {
        $error = array('error' => $this->upload->display_errors());
        $this->template->build('creation_form', $error);
      }
      else
      {
        #Saving to database
        $this->load->helper('url');
        $data = array('upload_data' => $this->upload->data());

        $upload_data = $this->upload->data();
        $error = $this->upload->display_errors();

        $new_document = array(
          'arrived_date' => date('Y-m-d', strtotime($this->input->post('arrived_date'))),
          'doc_author' => $this->input->post('doc_author'),
          'doc_code' => $this->input->post('doc_code'),
          'doc_date' => date('Y-m-d', strtotime($this->input->post('doc_date'))),
          'doc_title' => $this->input->post('doc_title'),
          'doc_cat' => $this->input->post('doc_cat'),
          'doc_security' => $this->input->post('doc_security'),
          'doc_priority' => $this->input->post('doc_priority'),
          'doc_pages' => $this->input->post('doc_pages'),
          'doc_deadline' => date('Y-m-d',strtotime($this->input->post('doc_deadline'))),
          #'comment' => $this->input->post('comment')
          'attachment' => base_url() . '/uploads/'. $upload_data['file_name'],
          );

        if ($query = $this->document_model->create_document($new_document))
        {
          $data['main_content'] = 'success';
          $this->template->title('Successfully Creation');
          $this->template->set_layout('default');
          $this->template->build('success', $data);
        }
        else
        {
          $data['main_content'] = "creation_form";
          $this->template->set_layout('default');
          $this->template->build('creation_form');
        }
      }
    }
  }

  function inbox()
  {
    $user_id = $this->session->userdata('user_id');
    $result = $this->document_model->get_documents_assigned_to_user($user_id);

    $data['content'] = $result;

    $data['main_content'] = 'result';
    $this->template->build('result', $data);

  }
}
