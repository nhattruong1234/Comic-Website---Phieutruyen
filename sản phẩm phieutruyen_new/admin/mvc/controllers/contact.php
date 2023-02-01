<?php

/**
 * Class Contact
 */
class Contact extends Controller
{
    /**
     * @inheritDoc
     */
    function execute()
    {
        $model = $this->model('ContactModel');
        $data = $model->getList();
        $this->view('index',
            [
                'page'          => 'QLPhanHoi',
                'title'         => 'Phản hồi',
                'contact'       => $data
            ]
        );
    }

    /**
     * @inheritDoc
     */
    public function markall_feedback()
    {
        $str=$_POST['checkbox'];
        $model = $this->model('ContactModel');
        $status = $model->updateStatusMark($str);
        if($status){
            $this->addSuccessMessage('Đã duyệt');
            $this->redirect('?url=contact');
        }
       
    } 
    public function mark_feedback($id)
    {
        $model = $this->model('ContactModel');
        $status = $model->updateStatus($id);
        if($status){
            $this->addSuccessMessage('Đã duyệt');
            $this->redirect('?url=contact');
        }
    } 
    public function mark_bin($id)
    {
        $model = $this->model('ContactModel');
        $status = $model->updateStatusBin($id);
        if($status){
            $this->addSuccessMessage('Đã duyệt');
            $this->redirect('?url=contact');
        }
    } 

    function delete($id)
    {
        $model = $this->model('ContactModel');
        $model->deleteById($id);
        $this->addSuccessMessage('Xóa thành công');
        return $this->redirect('?url=contact');
    }
}
