<?php 

App::uses('AppController', 'Controller');

class ProductsController extends Controller 
    {
        public $helpers = array('Html', 'Form');
        public $components = array('Flash');

        public function index() {
        $this->layout = 'master';
		$productData  = $this->Product->find('all');
        $this->set('products', $productData);
        // pr($productData);exit;
        }

        // public function add() {
        //     $this->layout = 'master';
        //     if ($this->request->is('post')) {
        //         $this->Product->create();

        //          //Check if image has been uploaded
        //          if(!empty($this->data['products']['image']['name']))
        //          {
        //              $file = $this->data['products']['image']; //put the data into a var for easy use

        //              $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
        //              $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions

        //              //only process if the extension is valid
        //              if(in_array($ext, $arr_ext))
        //              {
        //                  //do the actual uploading of the file. First arg is the tmp name, second arg is
        //                  //where we are putting it
        //                  move_uploaded_file($file['tmp_name'], WWW_ROOT . 'public/img/' . $file['name']);

        //                  //prepare the filename for database entry
        //                  $this->data['products']['image'] = $file['name'];
        //              }
        //          }


        //         if ($this->Product->save($this->request->data)) {
        //             $this->Flash->success(__('Your post has been saved.'));
        //             return $this->redirect(array('action' => 'index'));
        //         }
        //         $this->Flash->error(__('Unable to add your post.'));
        //     }

        // }

        public function add() {
            $this->layout = 'master';
            if ($this->request->is('post')) {
                if(!empty($this->request->data))
                {
                    //Check if image has been uploaded
                    // pr($this->data['Product']['image']['name']);exit;
                    if(!empty($this->request->data['Product']['image']['name']))
                    {
                        $file = $this->request->data['Product']['image']; //put the data into a var for easy use

                        $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions

                        //only process if the extension is valid
                        if(in_array($ext, $arr_ext))
                        {
                            //do the actual uploading of the file. First arg is the tmp name, second arg is
                            //where we are putting it
                            move_uploaded_file($file['tmp_name'], WWW_ROOT . 'public/img/' . $file['name']);

                            //prepare the filename for database entry
                            $this->request->data['Product']['image'] = $file['name'];
                        }
                    }

                    //now do the save
                    if($this->Product->save($this->request->data)){
                        $this->Flash->success(__('Your post has been saved.'));
                         return $this->redirect(array('action' => 'index'));
                    }
                }
            }

        }


        public function edit($id = null) {
            $this->layout = 'master';
            if (!$id) {
                throw new NotFoundException(__('Invalid post'));
            }
            // pr($this->Product['']);exit;
            $product = $this->Product->findById($id);
            // $product = $this->request->data['Product']->findById($id);
            // pr($product);exit;

            if (!$product) {
                throw new NotFoundException(__('Invalid post'));
            }
        
            // if ($this->request->is('post')) 
            // if ($this->request->is(array('post', 'put'))) {
            //     $this->Product->id = $id;
            //     if ($this->Product->save($this->request->data)) {
            //         $this->Flash->success(__('Your post has been updated.'));
            //         return $this->redirect(array('action' => 'index'));
            //     }
            //     $this->Flash->error(__('Unable to update your post.'));
            // }
        
            // if (!$this->request->data) {
            //     $this->request->data = $product;
            // }

            if ($this->request->is('post','put')) {
                $this->Product->id = $id;

                if(!empty($this->request->data))
                {
                    //Check if image has been uploaded
                    // pr($this->data['Product']['image']['name']);exit;
                    if(!empty($this->request->data['Product']['image']['name']))
                    {
                        $file = $this->request->data['Product']['image']; //put the data into a var for easy use

                        $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                        $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions

                        //only process if the extension is valid
                        if(in_array($ext, $arr_ext))
                        {
                            //do the actual uploading of the file. First arg is the tmp name, second arg is
                            //where we are putting it
                            move_uploaded_file($file['tmp_name'], WWW_ROOT . 'public/img/' . $file['name']);

                            //prepare the filename for database entry
                            $this->request->data['Product']['image'] = $file['name'];
                        }
                    }

                    //now do the save
                    if($this->Product->save($this->request->data)){
                        $this->Flash->success(__('Your post has been saved.'));
                         return $this->redirect(array('action' => 'index'));
                    }
                }
            }
        }
    }
