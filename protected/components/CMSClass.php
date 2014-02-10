<?php

abstract class CMSClass {
    /*
      function getCategorias by Rodri

      - Descripcion:
      Trae las categorias hijas inmediatas de $padre (ID). Por defecto devuelve las categorias raiz.

      - Params:
      int $padre - 0 default

      - Return:
      array ContenidosCategorias []

      - Estructura Objeto ContenidosCategorias:
      int $id - Clave primaria
      int $contenidos_categorias_id - Clave categoria padre
      string $nombre - Nombre de la categoria

      - Ejemplo:
      foreach(CMSClass::getCategorias(0) as $cat)
      echo $cat->nombre."<br>";
     */

    public function getCategorias($padre = 0) {
        $criteria = new CDbCriteria();

        $criteria->compare('contenidos_categorias_id', $padre, false);
        $criteria->compare('activo', 1, false);

        return ContenidosCategorias::model()->findAll($criteria);
    }

    /*
      function getContenidos by Rodri

      - Descripcion:
      Devuelve un array de contenidos que cumplan con el filtro pasado.

      - Params:
      array(
      'categoria', // Categoria a la cual pertenece
      'destacado', // 1 - true or 0 - false
      'subcategorias', // array subcategorias (ids)
      'order', // Orden de la consulta
      'page', // Pagina de la consulta
      'limit' // Cantidad de registros
      )

      - Return:
      array Contenidos []

      - Estructura Objeto Contenidos:
      int $id - Clave primaria
      int $contenidos_categorias_id - Clave categoria padre
      timestamp $fecha_alta - Fecha de creacion
      timestamp $fecha_edit - Fecha de ultimo edit
      int $destacado - Destacado / 1-true or 0-false
      ContenidosCategorias[] $categorias - Subcategorias relacionadas
      Archivos[] $archivos - Archivos relacionados

      Metodos Publicos:
      - getParam($param, $id_idioma)
      string $param / Nombre del parametro
      int $id_idioma / Clave primaria del idioma en que se pide el param

      - getText($param, $id_idioma)
      string $param / Texto requerido / "titulo" or "copete" or "descripcion"
      int $id_idioma / Clave primaria del idioma en que se pide el param

      - Ejemplo:
      foreach(CMSClass::getContenidos(array('categoria'=>1)) as $cont)
      echo $cont->id."<br>";
     */

    public function getContenidos
    (
    $filter = array(
        'categoria' => NULL,
        'destacado' => NULL,
        'subcategorias' => array(),
        'order' => NULL,
        'page' => NULL,
        'limit' => NULL
    )
    ) {
        $criteria = new CDbCriteria();

        $criteria->join = "LEFT OUTER JOIN contenidos_x_contenidos_categorias ON (t.id = contenidos_x_contenidos_categorias.contenidos_id) LEFT OUTER JOIN contenidos_categorias ON (contenidos_categorias.id = contenidos_x_contenidos_categorias.contenidos_categorias_id)";

        if ($filter['categoria'] !== NULL)
            $criteria->compare('t.contenidos_categorias_id', $filter['categoria'], false);

        if ($filter['destacado'] !== NULL)
            $criteria->compare('t.destacado', $filter['destacado'], false);

        if (!empty($filter['subcategorias']))
            $criteria->compare('contenidos_categorias.id', $filter['subcategorias'], false);

        $criteria->compare('t.activo', 1, false);

        if ($filter['order'] !== NULL)
            $criteria->order = $filter['order'];

        if ($filter['page'] !== NULL && $filter['limit'] !== NULL)
            $criteria->offset = $filter['page'] * $filter['limit'];

        if ($filter['limit'] !== NULL)
            $criteria->limit = $filter['limit'];

        return Contenidos::model()->findAll($criteria);
    }

    /*
      function getContenido by Rodri

      - Descripcion:
      Devuelve un contenido por ID.

      - Params:
      int $id

      - Return:
      Contenidos $var

      - Estructura Objeto Contenidos:
      int $id - Clave primaria
      int $contenidos_categorias_id - Clave categoria padre
      timestamp $fecha_alta - Fecha de creacion
      timestamp $fecha_edit - Fecha de ultimo edit
      int $destacado - Destacado / 1-true or 0-false
      ContenidosCategorias[] $categorias - Subcategorias relacionadas
      Archivos[] $archivos - Archivos relacionados

      Metodos Publicos:
      - getParam($param, $id_idioma)
      string $param / Nombre del parametro
      int $id_idioma / Clave primaria del idioma en que se pide el param

      - getText($param, $id_idioma)
      string $param / Texto requerido / "titulo" or "copete" or "descripcion"
      int $id_idioma / Clave primaria del idioma en que se pide el param

      - Ejemplo:
      foreach(CMSClass::getContenidos(array('categoria'=>1)) as $cont)
      echo $cont->id."<br>";
     */

    public function getContenido($id = NULL) {
        $criteria = new CDbCriteria();
        $criteria->compare('activo', 1, false);
        $criteria->compare('id', $id, false);
        $return = Contenidos::model()->findAll($criteria);
        return $return[0];
    }

}