<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminAuth;
use App\Models\Category;
use App\Models\Video;

class Topics extends AdminAuth
{
    public function index()
    {
        helper('alert_helper');
        $category = new Category();
        $page['categories'] = $category->findAll();
        $data['page'] = view('backend/topics/list', $page);
        return view("backend/template", $data);
    }
    public function add($id = NULL)
    {


        
        $validationRule = [
            'photo' => [
                'label' => 'Image File',
                'rules' => 'uploaded[photo]'
                    . '|is_image[photo]'
                    . '|max_size[photo,1000]'
                    . '|mime_in[photo,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
            ],
        ];
        $page['error_message'] = "";
        $category = new Category();
        if ($this->request->getMethod() == "post") {
            $post = $this->request->getPost();
            $file = $this->request->getFile('photo');
            if (!$this->validate($validationRule)) {
                $data = $this->validator->getErrors();
                $ids = ($id) ? $id : '';
                return redirect()->to('/admin/topics/add/' . $ids)->with('message', $data['photo']);
            }
            if ($file->isValid()) {
                $newName = $file->getRandomName();
                $file->move('assets/backend/images/videos/', $newName);
            }
            $post['name'] = $this->request->getPost();
            $post['photo'] = $newName;
            if ($id) {
                if ($category->update($id, $post)) {
                    return redirect()->to('/admin/topics')->with('message', 'Category Updated successfully');
                } else {
                    $page['error_message'] = "Failed to Update Category please try again !";
                }
            } else {
                if ($category->insert($post)) {
                    return redirect()->to('/admin/topics/')->with('message', 'Category Added successfully');
                } else {
                    $page['error_message'] = "Failed to add Category please try again !";
                }
            }
        }
        if ($id !== NULL) {
            // find data releted to the store
            $page['category'] = $category->find($id);
        }
        $data['page'] = view('backend/topics/add', $page);
        return view("backend/template", $data);
    }
    public function delete($id)
    {
        $massage = "Failed to Delete";
        $category = new Category();
        $categories = $category->find($id);
        $imageName = $categories['photo'];
        if ($category->delete($id)) {
            unlink('assets/images/videos/' . $imageName);
            $massage = 'category Deleted Successfully';
        }
        return redirect()->back()->with('message', $massage);
    }
    public function delete_video($id)
    {
        $massage = "Failed to Delete";
        $video = new Video();
        if ($video->delete($id)) {
            $massage = 'video Deleted Successfully';
        }
        return redirect()->back()->with('message', $massage);
    }

    public function videos($id)
    {
        helper('alert_helper');
        $videos = new Video();
        $category = new Category();
        $categories = $category->find($id);
        $page['cat_name'] = $categories['cat_name'];
        $page['videos'] = $videos->where('categories', $id)->findAll();
        $data['page'] = view('backend/topics/videos', $page);
        return view("backend/template", $data);
    }
    public function sort($id)
    {
        helper('alert_helper');
        $post = $this->request->getPost();
        $sortno=$post['sort'];
       
       
        $videos = new Video();
        $page['videos'] = $videos->update($id, $post);
        $sort=$videos->where('sort >=',$post['sort'])->findAll();
        // echo '<pre>';
        // print_r($sort);
        // exit();
        $i = 0;
        $newsort = 0;
        foreach($sort as $val){
            $newsort = $sort[$i]['sort'];
            $new['sort'] = $newsort+1;
            $videos->update($sort[$i]['id'],$new);
            $i++;
            $newsort = 0;
        }
        $massage = 'Sorting Successfully';
        return redirect()->back()->with('message', $massage);
    }
    public function approve($id = null)
    {
        $videos = new Video();
        if (!empty($videos->find($id))) {
            $post['show-v'] = 1;
            $videos->update($id, $post);
            return redirect()->to('/admin/topics/videos/' . $id)->with('message', 'Video Show successfully');
        }
    }
    public function reject($id = null)
    {
        $videos = new Video();
        if (!empty($videos->find($id))) {
            $videos->set('show-v', 0)->update($id);
            return redirect()->to('/admin/topics/videos/' . $id)->with('message', 'Video hidden successfully');
        }
    }

    public function add_video()
    {
        helper('alert_helper');
        $video = new Video();
        $categories = new Category();
        if ($this->request->getMethod() == "post") {
            $apiKey = 'AIzaSyAxDutr3XtpX4x3faUDU_2nJG32Mms7u7o';
            $video_id = $_POST['video_code'];
            $response = file_get_contents('https://youtube.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id=' . $video_id . '&key=' . $apiKey);
            $data = json_decode($response);
            
            $photo = $data->items[0]->snippet->thumbnails->maxres->url;
            $titel = $data->items[0]->snippet->title; /// 
            $post = $this->request->getPost();
            $post['photo'] = $photo;
            $post['titel']=$titel;
            if ($video->insert($post)) {
                return redirect()->to('/admin/topics/add_video')->with('message', 'Video Added successfully');
            } else {
                $page['error_message'] = "Failed to add Video please try again !";
            }
        }

        $page['categories'] = $categories->findAll();
        $data['page'] = view('backend/topics/addvideos', $page);
        return view("backend/template", $data);
    }

    public function add_playlist()
    {
        helper('alert_helper');
        $video = new Video();
        $categories = new Category();
        if ($this->request->getMethod() == "post") {
            $apiKey = 'AIzaSyAxDutr3XtpX4x3faUDU_2nJG32Mms7u7o';
            $video_id = $_POST['video_code'];
            $response = file_get_contents('https://www.googleapis.com/youtube/v3/playlists?part=snippet&id=' . $video_id . '&key=' . $apiKey);
            $data = json_decode($response);
            $photo = $data->items[0]->snippet->thumbnails->maxres->url;
            $titel = $data->items[0]->snippet->title; /// 
            $post = $this->request->getPost();
            $post['photo'] = $photo;
            $post['titel']=$titel;
            $post['type'] = 0;
          
            if ($video->insert($post)) {
                return redirect()->to('/admin/topics/add_playlist')->with('message', 'Video Playlist Added successfully');
            } else {
                $page['error_message'] = "Failed to add Video Playlist please try again !";
            }
        }

        $page['categories'] = $categories->findAll();
        $data['page'] = view('backend/topics/addplaylist', $page);
        return view("backend/template", $data);
    }
    

    public function Video_delete($id)
    {
        $massage = "Failed to Delete";
        $videos = new Video();
        if ($videos->delete($id)) {
            $massage = 'Video Deleted Successfully';
        }
        return redirect()->back()->with('message', $massage);
    }
}
