<?php


namespace controllers;


use core\Controller;
use core\Core;
use models\DataTable;
use models\Product;
use models\User;
use utils\Photo;

class ProductController extends Controller
{
    public function indexAction() {
        $searchString = $_GET['search'];
        if(isset($_GET['page']))
            $page = intval($_GET['page']);
        else
            $page = 1;
        $countPerPage = 12;
        $rows = Product::search($searchString, User::isAdmin());
        $products = Product::getOnePage($rows, $page, $countPerPage);
        $totalNumber = count($rows);
        if(!isset($products))
            return $this->render('views/main/exception-no-content.php');
        if(($page - 1) * $countPerPage > $totalNumber || $page <= 0)
            return $this->error(404);
        return $this->render(null, [
            'products' => $products,
            'pagination' => [
                'page' => $page,
                'count' => $countPerPage,
                'totalNumber' => $totalNumber
            ],
            'searchString' => $searchString
        ]);
        return $this->render();
    }
    public function getInputErrors() {
        $errors = [];
        $_POST['name'] = trim($_POST['name']);
        if (empty($_POST['name']))
            $errors['name'] = 'Не вказано назву продукту';
        if ($_POST['price'] <= 0)
            $errors['price'] = 'Неправильно вказана ціна';
        if ($_POST['count'] < 0)
            $errors['count'] = 'Неправильно вказана кількість продуктів';
        return $errors;
    }
    public function addAction($params) {
        $moduleName = $params[0];
        $module_id = intval($params[1]);
        if (empty($module_id))
            $module_id = null;

        $materialsList = DataTable::getSortedItems('material');
        $typesList = DataTable::getSortedItems('type');
        $gendersList = DataTable::getSortedItems('gender');
        $brandsList = DataTable::getSortedItems('brand');
        if (Core::getInstance()->requestMethod === 'POST') {
            $errors = $this->getInputErrors();

            if (empty($errors)) {
                $fileName = Photo::loadPhoto('product', $_FILES['file']['tmp_name']);
                Product::add($_POST, $fileName);
                $this->redirect('/product');
            } else {
                $model = $_POST;
                return $this->render(null, [
                    'errors' => $errors,
                    'model' => $model,
                    'materials' => $materialsList,
                    'types' => $typesList,
                    'genders' => $gendersList,
                    'brands' => $brandsList,
                    $moduleName.'_id' => $module_id
                ]);
            }
        }
        return $this->render(null, [
            'materials' => $materialsList,
            'types' => $typesList,
            'genders' => $gendersList,
            'brands' => $brandsList,
            $moduleName.'_id' => $module_id
        ]);
    }
    public function editAction($params) {
        $id = $params[0];
        if(!User::isAdmin())
            return $this->error(403);
        if($id > 0) {
            $row = Product::getById($id);
            $materialsList = DataTable::getSortedItems('material');
            $typesList = DataTable::getSortedItems('type');
            $gendersList = DataTable::getSortedItems('gender');
            $brandsList = DataTable::getSortedItems('brand');
            if(Core::getInstance()->requestMethod === 'POST') {
                $errors = [];
                $_POST['name'] = trim($_POST['name']);
                $errors = $this->getInputErrors();

                if (empty($errors)) {
                    Product::update($id, $_POST);
                    if(!empty($_FILES['file']['tmp_name']))
                        Photo::changePhoto('product', $id, $_FILES['file']['tmp_name']);
                    $this->redirect("/product/view/{$id}");
                } else {
                    $model = $_POST;
                    return $this->render(null, [
                        'errors' => $errors,
                        'model' => $model,
                        'row' => $row,
                        'materials' => $materialsList,
                        'types' => $typesList,
                        'genders' => $gendersList,
                        'brands' => $brandsList
                    ]);
                }
            }
            return $this->render(null, [
                'row' => $row,
                'materials' => $materialsList,
                'types' => $typesList,
                'genders' => $gendersList,
                'brands' => $brandsList
            ]);
        } else
            return $this->error(403);
    }
    public function deleteAction($params) {
        $id = intval($params[0]);
        if(!User::isAdmin())
            return $this->error(403);
        if($id > 0) {
            Photo::deletePhoto('product', $id);
            Product::delete($id);
            $this->redirect('/product/index');
        } else
            return $this->error(403);
    }
    public function viewAction($params) {
        $id = intval($params[0]);
        $product = Product::getById($id);
        return $this->render(null, [
            'product' => $product
        ]);
    }
    public function searchAction($params) {
        $searchString = $params[0];
        $rows = Product::search($searchString);
    }
}