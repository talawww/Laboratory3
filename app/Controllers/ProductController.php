<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProductController extends BaseController
{
  private $mall;
public function __construct()
{
$this->mall = new \App\Models\ProductModel();
}

public function MallDetails($id)
{
$mall = $this->mall->find($id);
if ($mall) {
  $data = [
    'mall' => $mall
  ];
  return view('mallhome', $data);
} else {
  return redirect()->to('/home');
}

}
public function edit($id)
{
  $data = [
    'mall' => $this->mall->findAll(),
    'm' => $this->mall->where('id', $id)->first(),
  ];

  if (!$data['m']) {
    echo 'ERORR';
  }
  return view('admin', $data);
}


  //return data from the items
  public function admin()
  {
    $data = [
      'items' => $this->mall->findAll()
    ];
    return view('admin', $data);
      }


      public function delete($id)
      {
        $this->mall->delete($id);
        return redirect()->to('/admin');
      }


      public function save()
      {
          $id = $this->request->getPost('id');
          $data = [
              'name' => $this->request->getPost('name'),
              'description' => $this->request->getPost('description'),
              'price' => $this->request->getPost('price'),
          ];


          if ($imageFile = $this->request->getFile('image')) {

              $imageName = $imageFile->getRandomName();

              $uploadPath = FCPATH . 'uploads/';


              if ($imageFile->move($uploadPath, $imageName)) {

                  $data['image'] = $imageName;
              } else {
                  $error = $imageFile->getError();
              }
          }

          if (!empty($id)) {
              // Update the existing record
              $this->mall->set($data)->where('id', $id)->update();
          } else {
              // Insert a new record
              $this->mall->insert($data);
          }

          return redirect()->to('/admin');
      }



//Return datas
public function home()
{
$data = [
  'mall' => $this->mall->findAll()
];
return view('MallDetails', $data);
}
  }
//Return datas
