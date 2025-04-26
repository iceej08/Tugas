<?php
require_once './models/Mahasiswa.php';
require_once './views/viewMahasiswa.php';

class controllerMahasiswa {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new Mahasiswa();
        $this->view = new viewMahasiswa();
    }

    public function handleRequest() {
        // Handle delete action
        if (isset($_GET['delete'])) {
            $this->model->delete($_GET['delete']);
            header('Location: index.php');
            exit;
        }

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['simpan'])) {
                $this->model->create($_POST);
                header('Location: index.php');
                exit;
            } elseif (isset($_POST['update'])) {
                $id = $_GET['edit'];
                $this->model->update($id, $_POST);
                header('Location: index.php');
                exit;
            }
        }

        // Prepare data for view
        $editData = null;
        if (isset($_GET['edit'])) {
            $editData = $this->model->getById($_GET['edit']);
        }

        $mahasiswa = $this->model->getAll();
        
        // Render view
        $this->view->render($mahasiswa, $editData);
    }
}
?>