<?php

class NoticiasController extends Controller {

    public function getNoticias() {
        $noticias = Noticias::model()->findAll();
        return $noticias;
    }

    public function actionIndex() {
        $this->render('index', array('noticias' => $this->getNoticias()));
    }

    public function actionEditar() {
        $form = new EditForm;
        $noticia = Noticias::model()->FindByPk($_GET['id']);
        $form->contenido = $noticia->contenido;
        if (isset($_POST['EditForm'])) {
            $form->attributes = $_POST['EditForm'];
            Noticias::model()->UpdateByPk($_GET['id'], array('titulo' => $form->titulo, 'contenido' => $form->contenido));
            $this->render('index', array('noticias' => $this->getNoticias()));
        } else {
            $this->render('editar', array('id' => $_GET['id'], 'form' => $form, 'noticia' => $noticia));
        }
    }

    public function actionEliminar() {
        Noticias::model()->deleteByPk($_GET['id']);
        $this->render('index', array('noticias' => $this->getNoticias()));
    }

    public function actionInsertar() {
        $formInsertar = new EditForm;
        $nuevaNoticia = new Noticias;
        if (isset($_POST['EditForm'])) {
            $formInsertar->attributes = $_POST['EditForm'];
            $nuevaNoticia->titulo = $formInsertar->titulo;
            $nuevaNoticia->contenido = $formInsertar->contenido;
            $nuevaNoticia->save();
            $this->render('index', array('noticias' => $this->getNoticias()));
        } else {
            $this->render('insertar', array('formInsertar' => $formInsertar));
        }
    }

}

?>