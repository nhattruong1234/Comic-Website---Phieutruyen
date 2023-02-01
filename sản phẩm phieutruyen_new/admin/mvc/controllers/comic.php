<?php

class Comic extends Controller
{
    /**
     * @inheritDoc
     */
    function execute()
    {
        $model  = $this->model('ComicModel');                        
        $comic   = $model->getListComic();
        $model1 = $this->model('CountryModel'); 
        $model2 = $this->model('TagModel'); 
        $country= $model1->getCountry();
        $tag    =$model2->getTag();
        $nkhd   =$model->nhatkyhd();
        $this->view('index',
            [
                'page'          => 'Admin-NhatkyHD-DST',
                'title'         => 'Quản lý truyện',
                'tag'           =>  $tag,
                'country'       =>  $country,
                'comic'         =>  $comic,
                'nkhd'          =>  $nkhd
            ]
        );
    }
    public function search()
    {
        /* if($_POST['q']) $q = $_POST['q'];
        else $q = "";
        if($_POST['q1']) $q1 = $_POST['q1'];
        else $q1 = ""; */
        $q = $_POST['q'];
        $q1 = $_POST['q1'];
        $proModel = $this->model('ComicModel');
        $search = $proModel->search($q,$q1);
        $model1 = $this->model('CountryModel'); 
        $model2 = $this->model('TagModel');                       
        $country= $model1->getCountry();
        $tag=$model2->getTag();
        $this->view('index',
            [
                'page'      => 'search',
                'title'     => 'Tìm kiếm sản phẩm với từ khóa ',
                "category"  => $this->getCategory(),
                'tag'       =>  $tag,
                'country'   =>  $country,
                'search'    =>  $search,
                'q'         =>  $q,
            ]
        );
    } 
    function chapter_detail($id)
    {

        $model1 =  $this->model('ComicModel');
        $comic_chapter= $model1->getByChapterId($id);
        $this->view("index",
            [
                "page"              => "chapter_detail",
                "title"             => 'title',
                //"category"          => $this->getCategory()
                "comic_chapter"     => $comic_chapter
            ]
        );
    }
    /* public function duyet($id)
    {
        $model = $this->model('ComicModel');
        $status = $model->updateStatus($id);
        if($status){
            $this->redirect('?url=post_comic');
        }
    }  */ 
    public function index()
    {
        $model = $this->model('ComicModel');  
        $model1 = $this->model('CountryModel'); 
        $model2 = $this->model('TagModel');                       
        $data = $model->getList();
        $country= $model1->getCountry();
        $tag=$model2->getTag();
        $nkhd=$model->nhatkyhd();
        $this->view('index',
            [
                'page'          => 'Admin-DST',
                'title'         => 'Quản lý truyện',
                'tag'           =>  $tag,
                'country'       =>  $country,
                'comic'         =>  $data,
                'nkhd'          =>  $nkhd
            ]
        );
    }
    public function delete_chapter($id)
    {
        $model = $this->model('ComicModel');
        $status = $model->deleteById_chapter($id); 
        if($status){
            return $this->redirect('?url=comic');
        }
    }
    function delete($id = null)
    {
        $model = $this->model('ComicModel');
        $status = $model->deleteById_comic($id);
        if($status){
            return $this->redirect('?url=comic');
        }else{
            return $this->redirect('?url=');
        }
    }

}
