<?php
class MainController extends Controller{
    public function action_index(){
        $this->model = new MainModel();
        $this->view->persons = $this->model->getPersons();
        $this->view->page = 'page_table';
        $this->view->render();
        
    }

    public function action_delete(){
        $id = $_POST['id'];
        $this->model = new MainModel();
        $this->model->deletePerson($id);
    }

    public function action_add(){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $this->model = new MainModel();
        $this->model->addPerson($name, $surname, $email);
    }

    public function action_edit(){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $id = $_POST['id'];
        $this->model = new MainModel();
        $this->model->editPerson($id, $name, $surname, $email);
    }

    public function action_information(){
        $this->model = new MainModel();
        $persons = $this->model->getPersons();
        $json = json_encode($persons);
        header('Content-type: application/json; charset=utf-8');
        echo $json;
    }

    public function action_person(){
        $id = $_POST['id'];
        $this->model = new MainModel();
        $person = $this->model->getPerson($id);
        $json = json_encode($person);
        header('Content-type: application/json; charset=utf-8');
        echo $json;
    }

}