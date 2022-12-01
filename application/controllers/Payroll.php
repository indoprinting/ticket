<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load library phpspreadsheet
require('./excel/vendor/autoload.php');
//require __DIR__ . '/../Header.php';

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet





class Payroll extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('url','download'));	
		$this->load->model("Payroll_model");
		if(!$this->session->isLogin){
			redirect(base_url());
		}
	}

	public function index()
	{

	}

	public function payrollsheet()
	{
		$query = $this->Payroll_model->getPayroll();
		

		$ress['data'] = $query->result();
		

		$this->load->view('v_header');
		$this->load->view('v_payrollinput', $ress);
		$this->load->view('v_footer');
	}



	public function editpayroll($id)
	{
		$data = $_POST;
		$update = $this->Payroll_model->editPayroll($id, $data);

		if($update){
			$this->session->set_flashdata('status','success');
			$this->session->set_flashdata('message','Input Data Save');
			redirect('payroll/payrollsheet');
		} else {
			$this->session->set_flashdata('status','danger');
			$this->session->set_flashdata('message','Input Data failed to Save');
			redirect('payroll/payrollsheet');
		}
	}

	public function deleteemployee($id)
	{
		$data = $_POST;
		$delete = $this->Payroll_model->deleteEmployee($id, $data);

		if($delete){
			$this->session->set_flashdata('status','success');
			$this->session->set_flashdata('message','Employee successfully deleted');
			redirect('payroll/payrollemployee');
		} else {
			$this->session->set_flashdata('status','danger');
			$this->session->set_flashdata('message','Employee failed to deleted');
			redirect('payroll/payrollemployee');
		}
	}


	public function addemployee()
	{
		$data = $_POST;
		$insert = $this->Payroll_model->addEmployee($data);

		if($insert){
			$this->session->set_flashdata('status','success');
			$this->session->set_flashdata('message','Employee successfully created');
			redirect('payroll/payrollemployee');
		} else {
			$this->session->set_flashdata('status','danger');
			$this->session->set_flashdata('message','Employee failed to created');
			redirect('payroll/payrollemployee');
		}
	}

	public function editemployee($id)
	{
		$data = $_POST;
		$update = $this->Payroll_model->editEmployee($id, $data);

		if($update){
			$this->session->set_flashdata('status','success');
			$this->session->set_flashdata('message','Employee successfully update');
			redirect('Payroll/payrollemployee');
		} else {
			$this->session->set_flashdata('status','danger');
			$this->session->set_flashdata('message','Employee failed to update');
			redirect('Payroll/payrollemployee');
		}
	}


public function addviolation()
	{
		$data = $_POST;
		$insert = $this->Payroll_model->addViolation($data);

		if($insert){
			$this->session->set_flashdata('status','success');
			$this->session->set_flashdata('message','Violation successfully created');
			redirect('payroll/payrollviolation');
		} else {
			$this->session->set_flashdata('status','danger');
			$this->session->set_flashdata('message','Violation failed to created');
			redirect('payroll/payrollviolation');
		}
	}

public function editviolation($id)
	{
		$data = $_POST;
		$update = $this->Payroll_model->editViolation($id, $data);

		if($update){
			$this->session->set_flashdata('status','success');
			$this->session->set_flashdata('message','Violation successfully update');
			redirect('payroll/payrollviolation');
		} else {
			$this->session->set_flashdata('status','danger');
			$this->session->set_flashdata('message','Violation failed to update');
			redirect('payroll/payrollviolation');
		}
	}

	public function deleteviolation($id)
	{
		$data = $_POST;
		$delete= $this->Payroll_model->deleteViolation($id, $data);

		if($delete){
			$this->session->set_flashdata('status','success');
			$this->session->set_flashdata('message','Violation successfully deleted');
			redirect('payroll/payrollviolation');
		} else {
			$this->session->set_flashdata('status','danger');
			$this->session->set_flashdata('message','Violation failed to deleted');
			redirect('payroll/payrollviolation');
		}
	}


	public function payrollviolation()
	{
	
		$ress['data'] = $this->Payroll_model->getViolation()->result();
		$ress['sop'] = $this->Payroll_model->getSop()->result();
		$ress['eployeenya'] = $this->Payroll_model->getemployee()->result();
		

		$this->load->view('v_header');
		$this->load->view('v_payrollviolation', $ress);
		$this->load->view('v_footer');
	}
	

	public function payrollemployee()
	{
	
		$ress['data'] = $this->Payroll_model->getEmployee()->result();
		$ress['jobnya'] = $this->Payroll_model->getJobtitle()->result();
		$ress['bagian'] = $this->Payroll_model->getBagian()->result();
		$ress['compnya'] = $this->Payroll_model->getCompany()->result();

		$this->load->view('v_header');
		$this->load->view('v_payrollemployee', $ress);
		$this->load->view('v_footer');
	}

	public function payrollrekap()
	{
	    $ress['data'] = $this->Payroll_model->getRekap()->result();

		$this->load->view('v_header');
		$this->load->view('v_payrollrekap', $ress);
		$this->load->view('v_footer');
	}

	public function payrollall()
	{
	    $ress['data'] = $this->Payroll_model->getAll()->result();

		$this->load->view('v_header');
		$this->load->view('v_payrollall', $ress);
		$this->load->view('v_footer');
	}


	

	public function payrollslip()
	{
		

	    $ress['data'] = $this->Payroll_model->getPayrollslip($this->session->username)->result();

		$this->load->view('v_header');
		$this->load->view('v_payrollslip', $ress);
		$this->load->view('v_footer');
	}


	public function payrollnew()
	{
		$ress = [];
		if(isset($_POST['begin_date'])){
			$var1 = $_POST['begin_date'];
			$var2 = $_POST['end_date'];
		    $ress['hapus'] = $this->Payroll_model->hapusSheet();
		    $ress['isi'] = $this->Payroll_model->isiSheet($var1,$var2);
		    $ress['hapus1'] = $this->Payroll_model->hapusPoin();
		    $ress['isi1'] = $this->Payroll_model->isiPoin($var1,$var2);
		 
		    $ress['isi2'] = $this->Payroll_model->isiPoinkesallary();
		    $ress['isi3'] = $this->Payroll_model->IsiHrokesallary();
		    $ress['isi4'] = $this->Payroll_model->IsiMgrkesallary();
		    $ress['isi5'] = $this->Payroll_model->IsiIckesallary();
		    $ress['isi6'] = $this->Payroll_model->IsiArkesallary();
		    $ress['isi7'] = $this->Payroll_model->IsiTotalkesallary();
		    $this->session->set_flashdata('status','success');
		    $this->session->set_flashdata('message','Payroll Sheet Successfully Generate');
		}

		$this->load->view('v_header');
		$this->load->view('v_payrollnew', $ress);
		$this->load->view('v_footer');
	}


	public function hro()
	{
		
		$ress['data'] = $this->Payroll_model->getHro()->result();;
		$this->load->view('v_header');
		$this->load->view('v_hro', $ress);
		$this->load->view('v_footer');
	}

	public function mgr()
	{
		
		$ress['data'] = $this->Payroll_model->getMgr()->result();;
		$this->load->view('v_header');
		$this->load->view('v_mgr', $ress);
		$this->load->view('v_footer');
	}

	public function ic()
	{
		
		$ress['data'] = $this->Payroll_model->getIc()->result();;
		$this->load->view('v_header');
		$this->load->view('v_ic', $ress);
		$this->load->view('v_footer');
	}

	public function ar()
	{
		
		$ress['data'] = $this->Payroll_model->getAr()->result();;
		$this->load->view('v_header');
		$this->load->view('v_ar', $ress);
		$this->load->view('v_footer');
	}

	public function up_employee()
	{
		
		$ress['data'] = $this->Payroll_model->getUpemployee()->result();;
		$this->load->view('v_header');
		$this->load->view('v_upemployee', $ress);
		$this->load->view('v_footer');
	}


	
   public function addhro()
	{
		
		$data = $_POST;

		if(!empty($_FILES['attachment']['name'])){
			

	
			$config['upload_path'] = './upload_payroll/';
			$config['allowed_types'] = '*';
			$config['overwrite'] = true;
			$config['file_name'] = 'hro';
	
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('attachment'))
	        {
				$this->session->set_flashdata('status','danger');
				$this->session->set_flashdata('message','File upload error, please try again.');
				redirect('payroll/hro');
	        } 
		}

		  
            
		    $xlsxreader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");   

		    $xlsxreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		    $loadxlsx = $xlsxreader->load('upload_payroll/hro.xlsx');
		    $sheet = $loadxlsx->getActiveSheet()->getRowIterator();        
		    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database    
		    $data1 = array();        
		    $numrow = 1;    
		    foreach($sheet as $row){      
		    // Cek $numrow apakah lebih dari 1      
		    // Artinya karena baris pertama adalah nama-nama kolom     
		     // Jadi dilewat saja, tidak usah diimport     
		      if($numrow > 1){        
		      // START -->        
		      // Skrip untuk mengambil value nya        
		      $cellIterator = $row->getCellIterator();       
		      $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set               
		      $get = array(); // Valuenya akan di simpan kedalam array,dimulai dari index ke 0        
		      foreach ($cellIterator as $cell) {          
		      array_push($get, $cell->getValue()); // Menambahkan value ke variabel array $get       
		      }        // <-- END                
		      // Ambil data value yang telah di ambil dan dimasukkan ke variabel $get       
		       $date_trans = $get[0];      
		       $pin = $get[1]; 
		       $nama = $get[2];         
		       $absen = $get[3];     
		       $late = $get[4];  
		       $violation = $get[5];
		       $overtime = $get[6];       
		      
		       // Kita push (add) array data ke variabel data        
		       array_push($data1, array(          
		       'date_trans'=>$date_trans, // Insert data      
		       'pin'=>$pin, // Insert data          
		       'nama'=>$nama, // Insert data          
		       'absen'=>$absen, // Insert data 
		       'late'=>$late,
		       'violation'=>$violation,
		       'overtime'=>$overtime,
			   
		        ));      
		       }            
		       $numrow++; // Tambah 1 setiap kali looping    
		       }    
		       // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model    
		         
		       $this->Payroll_model->addHro($data1); 
		      
		       
			      $this->session->set_flashdata('status','success');
		          $this->session->set_flashdata('message','Upload data Successfully');
			      redirect('payroll/hro');      
	 	}


    public function addmgr()
	{
		
		$data = $_POST;

		if(!empty($_FILES['attachment']['name'])){
			

	
			$config['upload_path'] = './upload_payroll/';
			$config['allowed_types'] = '*';
			$config['overwrite'] = true;
			$config['file_name'] = 'mgr';
	
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('attachment'))
	        {
				$this->session->set_flashdata('status','danger');
				$this->session->set_flashdata('message','File upload error, please try again.');
				redirect('payroll/mgr');
	        } 
		}

		  
            
		    $xlsxreader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");   

		    $xlsxreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		    $loadxlsx = $xlsxreader->load('upload_payroll/mgr.xlsx');
		    $sheet = $loadxlsx->getActiveSheet()->getRowIterator();        
		    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database    
		    $data1 = array();        
		    $numrow = 1;    
		    foreach($sheet as $row){      
		    // Cek $numrow apakah lebih dari 1      
		    // Artinya karena baris pertama adalah nama-nama kolom     
		     // Jadi dilewat saja, tidak usah diimport     
		      if($numrow > 1){        
		      // START -->        
		      // Skrip untuk mengambil value nya        
		      $cellIterator = $row->getCellIterator();       
		      $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set               
		      $get = array(); // Valuenya akan di simpan kedalam array,dimulai dari index ke 0        
		      foreach ($cellIterator as $cell) {          
		      array_push($get, $cell->getValue()); // Menambahkan value ke variabel array $get       
		      }        // <-- END                
		      // Ambil data value yang telah di ambil dan dimasukkan ke variabel $get       
		       $date_trans = $get[0];      
		       $pin = $get[1]; 
		       $nama = $get[2];         
		       $bonus = $get[3];     
		       $desain = $get[4];  
		        
		       // Kita push (add) array data ke variabel data        
		       array_push($data1, array(          
		       'date_trans'=>$date_trans, // Insert data      
		       'pin'=>$pin, // Insert data          
		       'nama'=>$nama, // Insert data          
		       'bonus'=>$bonus, // Insert data 
		       'desain'=>$desain,
		        ));      
		       }            
		       $numrow++; // Tambah 1 setiap kali looping    
		       }    
		       // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model    
		         
		       $this->Payroll_model->addMgr($data1); 
		      
		       
			      $this->session->set_flashdata('status','success');
		          $this->session->set_flashdata('message','Upload data Successfully');
			      redirect('payroll/mgr');      
	 	}

    public function addIc()
	{
		
		$data = $_POST;

		if(!empty($_FILES['attachment']['name'])){
			

	
			$config['upload_path'] = './upload_payroll/';
			$config['allowed_types'] = '*';
			$config['overwrite'] = true;
			$config['file_name'] = 'ic';
	
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('attachment'))
	        {
				$this->session->set_flashdata('status','danger');
				$this->session->set_flashdata('message','File upload error, please try again.');
				redirect('payroll/ic');
	        } 
		}

		  
            
		    $xlsxreader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");   

		    $xlsxreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		    $loadxlsx = $xlsxreader->load('upload_payroll/ic.xlsx');
		    $sheet = $loadxlsx->getActiveSheet()->getRowIterator();        
		    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database    
		    $data1 = array();        
		    $numrow = 1;    
		    foreach($sheet as $row){      
		    // Cek $numrow apakah lebih dari 1      
		    // Artinya karena baris pertama adalah nama-nama kolom     
		     // Jadi dilewat saja, tidak usah diimport     
		      if($numrow > 1){        
		      // START -->        
		      // Skrip untuk mengambil value nya        
		      $cellIterator = $row->getCellIterator();       
		      $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set               
		      $get = array(); // Valuenya akan di simpan kedalam array,dimulai dari index ke 0        
		      foreach ($cellIterator as $cell) {          
		      array_push($get, $cell->getValue()); // Menambahkan value ke variabel array $get       
		      }        // <-- END                
		      // Ambil data value yang telah di ambil dan dimasukkan ke variabel $get       
		       $date_trans = $get[0];      
		       $pin = $get[1]; 
		       $nama = $get[2];         
		       $counter = $get[3];     
		       $paper = $get[4];
		       $waste = $get[5];    
		        
		       // Kita push (add) array data ke variabel data        
		       array_push($data1, array(          
		       'date_trans'=>$date_trans, // Insert data      
		       'pin'=>$pin, // Insert data          
		       'nama'=>$nama, // Insert data          
		       'counter'=>$counter, // Insert data 
		       'paper'=>$paper,
		       'waste'=>$waste,
		        ));      
		       }            
		       $numrow++; // Tambah 1 setiap kali looping    
		       }    
		       // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model    
		         
		       $this->Payroll_model->addIc($data1); 
		      
		       
			      $this->session->set_flashdata('status','success');
		          $this->session->set_flashdata('message','Upload data Successfully');
			      redirect('payroll/ic');      
	 	}

    public function addAr()
	{
		
		$data = $_POST;

		if(!empty($_FILES['attachment']['name'])){
			

	
			$config['upload_path'] = './upload_payroll/';
			$config['allowed_types'] = '*';
			$config['overwrite'] = true;
			$config['file_name'] = 'ar';
	
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('attachment'))
	        {
				$this->session->set_flashdata('status','danger');
				$this->session->set_flashdata('message','File upload error, please try again.');
				redirect('payroll/ar');
	        } 
		}

		  
            
		    $xlsxreader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");   

		    $xlsxreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		    $loadxlsx = $xlsxreader->load('upload_payroll/ar.xlsx');
		    $sheet = $loadxlsx->getActiveSheet()->getRowIterator();        
		    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database    
		    $data1 = array();        
		    $numrow = 1;    
		    foreach($sheet as $row){      
		    // Cek $numrow apakah lebih dari 1      
		    // Artinya karena baris pertama adalah nama-nama kolom     
		     // Jadi dilewat saja, tidak usah diimport     
		      if($numrow > 1){        
		      // START -->        
		      // Skrip untuk mengambil value nya        
		      $cellIterator = $row->getCellIterator();       
		      $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set               
		      $get = array(); // Valuenya akan di simpan kedalam array,dimulai dari index ke 0        
		      foreach ($cellIterator as $cell) {          
		      array_push($get, $cell->getValue()); // Menambahkan value ke variabel array $get       
		      }        // <-- END                
		      // Ambil data value yang telah di ambil dan dimasukkan ke variabel $get       
		       $date_trans = $get[0];      
		       $pin = $get[1]; 
		       $nama = $get[2];         
		       $dp = $get[3];     
		       $rs = $get[4];
		       $debt = $get[5];    
		        
		       // Kita push (add) array data ke variabel data        
		       array_push($data1, array(          
		       'date_trans'=>$date_trans, // Insert data      
		       'pin'=>$pin, // Insert data          
		       'nama'=>$nama, // Insert data          
		       'dp'=>$dp, // Insert data 
		       'rs'=>$rs,
		       'debt'=>$debt,
		        ));      
		       }            
		       $numrow++; // Tambah 1 setiap kali looping    
		       }    
		       // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model    
		         
		       $this->Payroll_model->addAr($data1); 
		      
		       
			      $this->session->set_flashdata('status','success');
		          $this->session->set_flashdata('message','Upload data Successfully');
			      redirect('payroll/ar');      
	 	}

	 	public function addUpemployee()
	{
		
		$data = $_POST;

		if(!empty($_FILES['attachment']['name'])){
			

	
			$config['upload_path'] = './upload_payroll/';
			$config['allowed_types'] = '*';
			$config['overwrite'] = true;
			$config['file_name'] = 'employee';
	
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('attachment'))
	        {
				$this->session->set_flashdata('status','danger');
				$this->session->set_flashdata('message','File upload error, please try again.');
				redirect('payroll/up_employee');
	        } 
		}

		  
            
		    $xlsxreader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");   

		    $xlsxreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		    $loadxlsx = $xlsxreader->load('upload_payroll/employee.xlsx');
		    $sheet = $loadxlsx->getActiveSheet()->getRowIterator();        
		    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database    
		    $data1 = array();        
		    $numrow = 1;    
		    foreach($sheet as $row){      
		    // Cek $numrow apakah lebih dari 1      
		    // Artinya karena baris pertama adalah nama-nama kolom     
		     // Jadi dilewat saja, tidak usah diimport     
		      if($numrow > 1){        
		      // START -->        
		      // Skrip untuk mengambil value nya        
		      $cellIterator = $row->getCellIterator();       
		      $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set               
		      $get = array(); // Valuenya akan di simpan kedalam array,dimulai dari index ke 0        
		      foreach ($cellIterator as $cell) {          
		      array_push($get, $cell->getValue()); // Menambahkan value ke variabel array $get       
		      }        // <-- END                
		      // Ambil data value yang telah di ambil dan dimasukkan ke variabel $get       
		       $pin  = $get[0];      
		       $nama  = $get[1]; 
		       $job_title = $get[2];         
		       $div_name = $get[3];     
		       $company = $get[4];
		       $basic = $get[5]; 
		       $allowance  = $get[6];      
		       $bpjs  = $get[7]; 
		       $pulsa = $get[8];         
		       $hire_date = $get[9];     
		       $norek = $get[10];
		       $whatsapp = $get[11];       
		       $birth_date  = $get[12];      
		       $gender  = $get[13]; 
		       $marriage = $get[14];         
		       $ktp = $get[15];     
		       $addr = $get[16];
		       $daywork = $get[17]; 
		       $penalty  = $get[18];      
		        
		       // Kita push (add) array data ke variabel data        
		       array_push($data1, array(          
		       'pin'=>$pin, // Insert data      
		       'nama'=>$nama, // Insert data          
		       'job_title'=>$job_title, // Insert data          
		       'div_name'=>$div_name, // Insert data 
		       'company'=>$company,
		       'basic'=>$basic,
		       'allowance'=>$allowance, // Insert data      
		       'bpjs'=>$bpjs, // Insert data          
		       'pulsa'=>$pulsa, // Insert data          
		       'hire_date'=>$hire_date, // Insert data 
		       'norek'=>$norek,
		       'whatsapp'=>$whatsapp,
		       'birth_date'=>$birth_date, // Insert data      
		       'gender'=>$gender, // Insert data          
		       'marriage'=>$marriage, // Insert data          
		       'ktp'=>$ktp, // Insert data 
		       'addr'=>$addr,
		       'daywork'=>$daywork,
		       'penalty'=>$penalty,
		        ));      
		       }            
		       $numrow++; // Tambah 1 setiap kali looping    
		       }    
		       // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model    
		         
		       $this->Payroll_model->addUpemployee($data1); 
		      
		       
			      $this->session->set_flashdata('status','success');
		          $this->session->set_flashdata('message','Upload data Successfully');
			      redirect('payroll/up_employee');      
	 	}

	public function downloadhro(){				
		force_download('upload_payroll/form_hro.xlsx',NULL);
	}	

	public function downloadmgr(){				
		force_download('upload_payroll/form_mgr.xlsx',NULL);
	}	

    public function downloadic(){				
		force_download('upload_payroll/form_ic.xlsx',NULL);
	}	

	public function downloadar(){				
		force_download('upload_payroll/form_ar.xlsx',NULL);
	}

	public function downloademployee(){				
		force_download('upload_payroll/form_employee.xlsx',NULL);
	}







}
