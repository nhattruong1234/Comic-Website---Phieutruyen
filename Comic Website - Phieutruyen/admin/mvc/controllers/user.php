<?php

/**
 * Class User
 */
class User extends Controller
{
    /**
     * @inheritDoc
     */
    function execute()
    {
        $model = $this->model('KhachHangModel');
        $data = $model->getList();
        $this->view('index',
            [
                'page'          => 'QLTKhoan',
                'title'         => 'Trang chủ',
                'user'          => $data
            ]
        );
    }
    function delete($id = null)
    {
        $model = $this->model('KhachHangModel');
        $status = $model->deleteById($id);
        if($status){
            $this->addSuccessMessage('Xóa người dùng thành công.');
            return $this->redirect('?url=user');
        }
    }
}
