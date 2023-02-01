<?php

/**
 * Class Dashboard
 */
class Post_comic extends Controller
{
    /**
     * @inheritDoc
     */
    function execute()
    {
        $model = $this->model('ComicModel');
        $post_comic = $model->getList();
        $chapter= $model->getChapter();
        $this->view('index',
            [
                'page'          => 'QLDangTruyen',
                'title'         => 'Thống kê',
                'post_comic'    => $post_comic,
                'chapter'       => $chapter
            ]
        );
    }
    function index()
    {
        $model = $this->model('ComicModel');
        $post_comic = $model->getList();
        $chapter= $model->getChapter();
        $this->view('index',
            [
                'page'          => 'QLDT_chapter',
                'title'         => 'Thống kê',
                'post_comic'    => $post_comic,
                'chapter'       => $chapter
            ]
        );
    }
    public function delete_comic($id)
    {
        $model = $this->model('ComicModel');
        $status = $model->deleteById_comic($id);            
        if($status){
            $this->addSuccessMessage('Xóa truyện thành công.');
            return $this->redirect('?url=post_comic');
        }else{
            $this->addErrorMessage('Xóa truyện thất bại');
            return $this->redirect('?url=post_comic');
        }
    }
    public function delete_chapter($id)
    {
        $model = $this->model('ComicModel');
        $status = $model->deleteById_chapter($id);            
        if($status){
            return $this->redirect('?url=post_comic');
        }
    }
    public function duyet_comic($id)
    {
        $model = $this->model('ComicModel');
        $status = $model->updateStatusComic($id);
        if($status){
            $this->addSuccessMessage('Đã duyệt');
            
        }
        $this->redirect('?url=post_comic');
    }  
    public function duyet_chapter($id)
    {
        $model = $this->model('ComicModel');
        $status = $model->updateStatusChapter($id);
        if($status){
            $this->addSuccessMessage('Đã duyệt');
            $this->redirect('?url=post_comic');
        }
    } 
    public function duyet_chuong($id)
    {
        $model = $this->model('ComicModel');
        $status = $model->updateStatusChuong($id);
        //$comic_chapter= $model->getChuong($id);
        if($status){
            $this->addSuccessMessage('Chờ duyệt');
            $this->redirect('?url=post_comic');
        }
    } 
    public function xoa_chuong($id)
    {
        $model = $this->model('ComicModel');
        $status = $model->deleteById_chapter($id);            
        if($status){
            return $this->redirect('?url=post_comic');
        }
    }
    function chapter_detail($id)
    {
        $model1 =  $this->model('ComicModel');
        $comic_chapter= $model1->getByChapterId_choduyet($id);
        $this->view("index",
            [
                "page"              => "QLDT_chuong",
                "title"             => 'title',
                "comic_chapter"     => $comic_chapter
            ]
        );
    }
} 
