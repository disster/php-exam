<?php


namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $this->view->render('Главная');
    }

    public function sessionAction()
    {
//        if (!empty($_POST)) {
//            if ($this->model->checkData($_POST['login'])) {
//                $this->model->saveAnwsers($_POST['login']);
//                $this->view->location('admin/dashboard');
//            } else {
//                $this->view->message('Ошибка', $this->model->error);
//            }
//        }
        $vars = [
            'data' => $this->model->getSessionData($this->route['token'])
        ];
        if ($vars['data']['status'] == 0) {
            $this->view->errorCode(403);
        }
        $this->view->render('', $vars);
    }
}
