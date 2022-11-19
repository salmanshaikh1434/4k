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
        // $page['cat_name'] = $categories['cat_name'];
        $page['videos'] = $videos->where('categories', $id)->orderBy('sort', 'ASC')->findAll();
        $data['page'] = view('backend/topics/videos', $page);
        return view("backend/template", $data);
    }
    public function sort($id = null, $category_id = null)
    {
        // echo "<pre>";
        helper('alert_helper');
        $post = $this->request->getPost();
        $videos = new Video();
        $videos->select('sort');
        $ex = $videos->find($id);
        $existing = $ex['sort'];
        $newchange = $post['sort'];

        $videos->select(['sort', 'id']);
        $videos->where('categories', 1);
        $newvalues = $videos->where('sort >=', $newchange)->orderBy('sort', 'ASC')->findAll();
        $videos->select(['sort', 'id']);
        // $oldvalues = $videos->where('sort >', $existing)->findAll();
        // echo '<pre>';
        // print_r($oldvalues);
        // exit();

        for ($i = 0; $i < count($newvalues); $i++) {
            $newchange += 1;
            $videos->update($newvalues[$i]['id'], ['sort' => $newchange]);
        }
        $videos->update($id, $post);



        $massage = 'Sorting Successfully';
        return redirect()->back()->with('message', $massage);
    }
    public function approve($id = null)
    {
        $videos = new Video();
        if (!empty($videos->find($id))) {
            $post['show-v'] = 1;
            $cat_id = $videos->select('categories')->where('id', $id)->first();
            $videos->update($id, $post);
            return redirect()->to('/admin/topics/videos/' . $cat_id['categories'])->with('message', 'Video Show successfully');
        }
    }
    public function reject($id = null)
    {
        $videos = new Video();
        if (!empty($videos->find($id))) {
            $videos->set('show-v', 0)->update($id);
            $cat_id = $videos->select('categories')->where('id', $id)->first();
            return redirect()->to('/admin/topics/videos/' . $cat_id['categories'])->with('message', 'Video hidden successfully');
        }
    }

    public function add_video()
    {

        helper('alert_helper');
        $video = new Video();
        $categories = new Category();
        if ($this->request->getMethod() == "post") {
            $post = $this->request->getPost();
            $apiKey = 'AIzaSyAxDutr3XtpX4x3faUDU_2nJG32Mms7u7o';
            $video_id = $post['video_code'];
            $response = file_get_contents('https://youtube.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id=' . $video_id . '&key=' . $apiKey);
            $data = json_decode($response);
            $photo = (!empty($data->items[0]->snippet->thumbnails->maxres)) ? $data->items[0]->snippet->thumbnails->maxres->url : $data->items[0]->snippet->thumbnails->default->url;
            $titel = $data->items[0]->snippet->title; /// 
            $post['photo'] = $photo;
            $post['titel'] = $titel;
            $video_code = str_replace(' ', '', $_POST['video_code']);
            $check = $video->where('video_code', $video_code)->countAllResults();
            $sort = $video->select('sort')->where('categories', $post['categories'])->orderBy('sort', 'desc')->first();
            if(empty($sort)){
                $post['sort']=1;
            }else{
                $post['sort'] = $sort['sort'] + 1;
            }
            if ($check == 0) {
                $video->insert($post);
                return redirect()->to('/admin/topics/add_video')->with('message', 'Video Added successfully');
            } else {
                $page['message'] = "Failed to add Video please try again or Video Already Exist!";
            }
        }

        $page['categories'] = $categories->findAll();
        $dataView['page'] = view('backend/topics/addvideos', $page);
        return view("backend/template", $dataView);
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
            $photo = (!empty($data->items[0]->snippet->thumbnails->maxres)) ? $data->items[0]->snippet->thumbnails->maxres->url : $data->items[0]->snippet->thumbnails->default->url;
            $titel = $data->items[0]->snippet->title; /// 
            $post = $this->request->getPost();
            $post['photo'] = $photo;
            $post['titel'] = $titel;
            $post['type'] = 0;
            $video_code = str_replace(' ', '', $_POST['video_code']);
            $check = $video->where('video_code', $video_code)->countAllResults();
            $sort = $video->select('sort')->where('categories', $post['categories'])->orderBy('sort', 'desc')->first();
            if(empty($sort)){
                $post['sort']=1;
            }else{
                $post['sort'] = $sort['sort'] + 1;
            }
            if ($check == 0) {
                $video->insert($post);
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
