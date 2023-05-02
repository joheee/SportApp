<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class AdminController extends BaseController
{
    public function index(){
        $model = new ProductModel();
        $data['products'] = $model->findAll();
        return view('admin/dashboard', $data);   
    }
    public function transaction(){
        return view('admin/transaction');
    }
    public function insert(){
        return view('admin/insertProduct');
    }
    public function update($id){
        $model = new ProductModel();
        $data['product'] = $model->find($id);
        return view('admin/updateProduct', $data);
    }

    public function handleInsert(){
        $model = new ProductModel();
        $rules = [
            'name' => 'required',
            'price' => 'required',            
            'image' => [
                'uploaded[image]',
            ],
            'ammount' => 'required'
        ];
        if($this->validate($rules)){
            $image = $this->request->getFile('image');
            $imageExt = $image->getExtension();
            $uniqueId = uniqid();
            $currentDateTime = date('Ymd_His');
            $newImageName = $currentDateTime . '_' . $uniqueId . '.' . $imageExt;
            $image->move('./public/uploads', $newImageName);

            $name = $this->request->getPost('name');
            $price = $this->request->getPost('price');
            $ammount = $this->request->getPost('ammount');
            $model->handleInsert($name,$newImageName,$price,$ammount);

            return redirect()->route('admin.dashboard');
        } else {
            $getError = $this->validator;
            $errors = $getError->getErrors();
            return redirect()->back()->with('error', reset($errors));
        }
    }
    public function handleDelete($id){
        $model = new ProductModel();
        $model->delete($id);
        return redirect()->route('admin.dashboard');
    }
    public function handleUpdate($id){
        $model = new ProductModel();
        $rules = [
            'name' => 'required',
            'price' => 'required',    
            'image' => [
                'uploaded[image]',
            ],
            'ammount' => 'required'
        ];
        if($this->validate($rules)){
            $image = $this->request->getFile('image');
            $imageExt = $image->getExtension();
            $uniqueId = uniqid();
            $currentDateTime = date('Ymd_His');
            $newImageName = $currentDateTime . '_' . $uniqueId . '.' . $imageExt;
            $image->move('./public/uploads', $newImageName);

            $data = [
                'name' => $this->request->getPost('name'),
                'image' => $newImageName,
                'price' => $this->request->getPost('price'),
                'ammount' => $this->request->getPost('ammount'),
            ];

            $model->update($id,$data);

            return redirect()->route('admin.dashboard');
        } else {
            $getError = $this->validator;
            $errors = $getError->getErrors();
            return redirect()->back()->with('error', reset($errors));
        }
    }
}
