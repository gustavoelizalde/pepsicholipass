<?php

class UploadController extends Controller {

    public function actionCropper() {
        $this->renderPartial('cropper');
    }

    public function actionDeleteArchivo() {
        // Elimino archivos fisicos
        $ruta = Yii::app()->request->baseUrl . '/upload/';
        if (is_dir($ruta)) {
            if ($dh = opendir($ruta)) {
                while (($dir = readdir($dh)) !== false) {
                    if (is_dir($ruta . $dir) && $dir != "." && $dir != "..") {
                        if (file_exists($ruta . $dir . '/' . $_POST['archivo']))
                            unlink($ruta . $dir . '/' . $_POST['archivo']);
                    }
                }
                closedir($dh);
            }
        }
        if (file_exists($ruta . $_POST['archivo']))
            unlink($ruta . $_POST['archivo']);

        // Elimino base de datos
        $archivo = Archivos::model()->findByAttributes(array('archivo' => $_POST['archivo']));
        $archivoCont = ArchivosXContenidos::model()->findByAttributes(array('archivos_id' => $archivo->id));
        $usuarioAvatar = Usuarios::model()->findByAttributes(array('avatar' => $_POST['archivo']));
        $staffAvatar = Staff::model()->findByAttributes(array('avatar' => $_POST['archivo']));

        if (is_object($archivoCont))
            $archivoCont->delete();
        if (is_object($archivo))
            $archivo->delete();
        if (is_object($usuarioAvatar)) {
            $usuarioAvatar->avatar = null;
            $usuarioAvatar->save();
        }
        if (is_object($staffAvatar)) {
            $staffAvatar->avatar = null;
            $staffAvatar->save();
        }


        echo "ok";
    }

    public function actionCrop() {
        Yii::import('application.extensions.upload.Crop');

        if (!is_dir($_POST["folder_dest"])) {
            mkdir($_POST["folder_dest"]);
        }

        $c = new Crop();

        $width = ($_POST['tam_0'] * $_POST['width']) / $_POST['anchoI'];
        $height = ($_POST['tam_1'] * $_POST['height']) / $_POST['altoI'];

        $x = ($_POST['tam_0'] * $_POST['x_top']) / $_POST['anchoI'];
        $y = ($_POST['tam_1'] * $_POST['y_top']) / $_POST['altoI'];

        $c->CropImg(
                null, $_POST["file"], null, $_POST["file_dest"], $x, $y, $width, $height, $_POST['width_thumb'], $_POST['height_thumb']
        );

        echo "ok";
    }

    public function actionUpload() {
        /*         * *** */
        $busca = array("Ã¡", "Ã©", "Ã­", "Ã³", "Ãº", "Ã±", "Ã�", "Ã‰", "Ã�", "Ã“", "Ãš", "Ã¤", "Ã«", "Ã¯", "Ã¶", "Ã¼", "Ã„", "Ã‹", "Ã�", "Ã–", "Ãœ", "Ã‘", "&", "&amp;");
        $reemplaza = array("a", "e", "i", "o", "u", "n", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "N", "", "");
        /*         * *** */
        $uploaddir = Yii::app()->request->baseUrl . '/upload/';
        $nomFile = utf8_decode(basename($_FILES['userfile']['name']));
        $nomFile = str_replace($busca, $reemplaza, $nomFile);

        $nomFile = time() . "_" . $nomFile;
        $uploadfile = $uploaddir . $nomFile;

        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            echo $nomFile;
        } else {
            echo "error";
        }
    }

}

?>