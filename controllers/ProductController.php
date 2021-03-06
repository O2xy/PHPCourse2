<?php


namespace app\controllers;


use app\models\Product;

class ProductController
{
    protected $defaultAction = 'index';
    protected $action;
    protected $useLayout = true;
    protected $layout = 'main';

    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);

        if(method_exists($this, $method)) {
            $this->$method();
        } else {
            echo "404";
        }
    }

    public function actionIndex()
    {
        echo "catalog";
    }
    
    public function actionCard()
    {
        $id = $_GET['id'];
        $model = Product::getById($id);
        echo $this->render('product_card', ['model' => $model]);
    }

    protected function render($template, $params = []){
        $content = $this->renderTemplate($template, $params);
        if($this->useLayout) {
            return $this->renderTemplate(
                "layouts/{$this->layout}",
                ['content' => $content]
            );
        }
        return $content;
    }

    protected function renderTemplate($template, $params = []) {
        ob_start();
        $templatePath = VIEWS_DIR . $template . ".php";
        extract($params);
        include $templatePath;
        return ob_get_clean();
    }
}