<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;

class AdminController extends Controller
{
    public function dashboardAction()
    {
        $pagination = new Pagination($this->route, $this->model->sessionsCount());
        $vars = [
            'pagination' => $pagination->get(),
            'list' => $this->model->getSessionsList($this->route),
        ];
        $this->view->render('Панель управления', $vars);
    }

    public function loginAction()
    {
        if (!empty($_POST)) {
            if ($this->model->checkLoginData($_POST['login'], $_POST['password'])) {
                $this->model->login($_POST['login']);
                $this->view->location('admin/dashboard');
            } else {
                $this->view->message('Ошибка', $this->model->error);
            }
        }
        $this->view->render('Вход для администратора');
    }

    public function logoutAction()
    {
        $this->model->logout();
        $this->view->redirect('admin/login');
    }

    public function addAction()
    {
        $vars = [
            'id' => $this->model->sessionsCount()
        ];
        if (!empty($_POST)) {
            {
                $this->model->addSession($_POST['name']);
                $this->view->location('admin/dashboard');
            }
        }
        $this->view->render('Добавить опрос', $vars);
    }

    public function deleteAction()
    {
        if (!$this->model->isSessionExist($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $this->model->sessionDelete($this->route['id']);
        $this->view->redirect('admin/dashboard');
    }

    public function editAction()
    {
        if (!$this->model->isSessionExist($this->route['id'])) {
            $this->view->errorCode(404);
        }
        if (!empty($_POST)) {
            $this->model->sessionEdit($this->route['id'], $_POST);
            $this->view->redirect('admin/edit/'.$this->route['id']);
        }
        $vars = [
            'data' => $this->model->getSessionData($this->route['id']),
        ];
        $this->view->render('Редактировать вопрос', $vars);
    }
}
