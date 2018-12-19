<?php

App::uses('AppController', 'Controller');

class ProductsController extends AppController
{

    public $helpers = array('Html', 'Form');
    public $components = array('Flash');

    public function index() {
        $this->layout = 'master';
//        $this->layout = 'ajax';
//        pr($this->Product->find('all'));exit;
        $productData = $this->Product->find('all');
        $this->set('products', $productData);
    }

    public function add()
    {
        $this->layout = 'ajax';
        if ($this->request->is('post') && !empty($this->request->data)) {
            // Get id user from table users
            $this->request->data['user_id'] = $this->Auth->user('id');
            // For file upload
            if (isset($_FILES['image']['name'])) {
                $file_name = $_FILES['image']['name'];
                $extension = explode('.', $file_name);
                $extension = end($extension);
                $newfilename = md5(round(microtime(true))) . '.' . $extension;
                $this->request->data['image'] = $newfilename;
                $upload = move_uploaded_file($_FILES['image']['tmp_name'], WWW_ROOT . 'public/img/' . $newfilename);
            }
//            echo json_encode($this->request->data);exit;
//            pr($this->request->data);exit;
            $isSaved = $this->Product->save($this->request->data);

            if ($isSaved) {
                echo json_encode($this->request->data); exit;
//                        return $this->redirect(array('action' => 'index'));
            }

            return json_encode(['code' => 406]);
        }
    }

    public function edit($id = null)
    {
        $this->layout = 'master';
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
        // pr($this->Product['']);exit;
        $product = $this->Product->findById($id);
        // $product = $this->request->data['Product']->findById($id);
//         pr($product);exit;

        if (!$product) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Product->id = $id;
            //Check if image has been uploaded
            // pr($this->data['Product']['image']['name']);exit;
            if (!empty($this->request->data['Product']['image']['name'])) {
                $file = $this->request->data['Product']['image']; //put the data into a var for easy use
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
                //only process if the extension is valid
                if (in_array($ext, $arr_ext)) {
                    //do the actual uploading of the file. First arg is the tmp name, second arg is
                    //where we are putting it
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'public/img/' . $file['name']);
                    //prepare the filename for database entry
                    $this->request->data['Product']['image'] = $file['name'];
                }
            }
            if ($this->Product->save($this->request->data)) {
                $this->Flash->success(__('Your post has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your post.'));
        }

        if (!$this->request->data) {
            $this->request->data = $product;
        }
    }

    public function delete($id)
    {
        $this->layout = 'ajax';
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Product->delete($id)) {
            $this->Flash->success(
                __('The post with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Flash->error(
                __('The post with id: %s could not be deleted.', h($id))
            );
        }

//            return $this->redirect(array('action' => 'index'));
//        exit;
    }

    public function detail($id = null)
    {
        $this->layout = 'master';
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $product = $this->Product->findById($id);
        if (!$product) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('product', $product);
    }

    public function isAuthorized($user) {
        // All registered users can add posts
        if ($this->action === 'add') {
            return true;
        }

        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $postId = (int) $this->request->params['pass'][0];
            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

}

