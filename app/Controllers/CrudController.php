<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CrudModel;
class CrudController extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function index()
    {
        $model = new CrudModel();
        $data = [];
        $Errordata['validation'] = null;
        if($this->request->getMethod() == 'post')
        {
            $rules = [
                'fname' => [
                    'rules'  => 'required|max_length[20]|min_length[2]',
                    'errors' => [
                        'required'   => 'First Name is required.',
                        'max_length' => 'please enter less than 20 character in this field.',
                        'min_length' => 'please enter more than 2 characters in this field.',
                    ],
                ],
            
                'lname' => [
                    'rules'  => 'required|max_length[20]|min_length[2]',
                    'errors' => [
                        'required'   => 'Last Name is required.',
                        'max_length' => 'please enter less than 20 character in this field.',
                        'min_length' => 'please enter more than 2 characters in this field.',
                    ],
                ],

                'email'     => [
                    'rules' =>'required|valid_email|is_unique[users.email]',
                    'errors'=> [
                        'required'   => 'email is required.',
                        'valid_email'=> 'please enter valid email address.',               
                        'is_unique'  => 'Email exits'
                    ],
                ],
        
                'password'  => [
                    'rules' =>'required|min_length[5]',
                    'errors'=> [
                        'required'     => 'password is required.',
                        'min_length' => 'please enter more than 5 length value in this field.',    
                    ],
                ],
        
                'cpassword'=>[
                    'rules'       =>'required|matches[password]',
                    'errors'      => [
                        'required'=> 'confirm password is required.',
                        'matches' => 'please enter the same password in this field to confirm your password.',   
                    ],
                ],
            ];
            if($this->validate($rules))
            {
                
                $data = [
                    'fname' => $this->request->getVar('fname'),
                    'lname' => $this->request->getVar('lname'),
                    'email' => $this->request->getVar('email'),
                    'password' => md5($this->request->getVar('password')),   
                ];
                $result = $model->save($data); 
                if($result)
                {
                    session()->setFlashdata('status','Inserted success.');
                    return redirect()->to('/data');
                }
                
            }
            else
            {
                $Errordata['validation'] = $this->validator;
                return view('crud', $Errordata);
            } 
        }
        else{
            return view('crud', $Errordata);
        }
        
    }


    public function show()
    {
        $model = new CrudModel();
        $data['users'] = $model->findAll();
        return view('data', $data);
    }

    public function editData($id)
    {
        $model = new CrudModel();
        $data['users'] = $model->find($id);
        return view('update', $data);
    }
    public function updateData()
    {
        $id = $this->request->getVar('id');
        $data = [
            'fname' => $this->request->getVar('fname'),
            'lname' => $this->request->getVar('lname'),
            'email' => $this->request->getVar('email'),
            'password' => md5($this->request->getVar('password')),   
        ];
        $model = new CrudModel();
        $result = $model->update($id , $data);
        if($result){
            session()->setFlashdata('status', 'Updated Success');
            return redirect()->to('/data');
        }

    }

    public function deleteData($id)
    {
        $model = new CrudModel();
        $result = $model->delete($id);
        if($result){
            session()->setFlashdata('status', 'deleted Success');
            return redirect()->to('/data');
        }
    }
}
