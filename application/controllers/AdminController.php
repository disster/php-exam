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
        if (!isset($_SESSION['admin'])) {
            if (!empty($_POST)) {
                if ($this->model->checkLoginData($_POST['login'], $_POST['password'])) {
                    $this->model->login($_POST['login']);
                    $this->view->location('admin/dashboard');
                } else {
                    $this->view->message('Ошибка', $this->model->error);
                }
            }
            $this->view->render('Вход для администратора');
        } else {
            $this->view->errorCode(403);
        };
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
        $this->view->render('Создать сессию', $vars);
    }

    public function removeAction()
    {
        if (!$this->model->isQuestionExist($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $this->model->removeQuestion($this->route['id']);

        $this->view->redirect('admin/edit/' . $_SESSION['sessionId']);

    }

    public function editAction()
    {
        if (!$this->model->isSessionExist($this->route['id'])) {
            $this->view->errorCode(404);
        }
        if (!empty($_POST)) {
            $this->model->sessionEdit($this->route['id'], $_POST);
            $this->view->location('admin/edit/' . $this->route['id']);
        }
        $vars = [
            'data' => $this->model->getSessionData($this->route['id']),
        ];
        $this->view->render('Редактировать сессию', $vars);
    }

    public function deleteAction()
    {
        if (!$this->model->isSessionExist($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $this->model->sessionDelete($this->route['id']);
        $this->view->redirect('admin/dashboard');
    }

    public function closeAction()
    {
        if (!$this->model->isSessionExist($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $this->model->sessionClose($this->route['id']);
        $this->view->redirect('admin/dashboard');
    }

    public function openAction()
    {
        if (!$this->model->isSessionExist($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $this->model->sessionOpen($this->route['id']);
        $this->view->redirect('admin/dashboard');
    }
}
