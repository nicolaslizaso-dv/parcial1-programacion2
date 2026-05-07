<?php
class Secciones
{
    private $vinculo;
    private $texto;
    private $title;
    private $inMenu;

    public function getVinculo() { return $this->vinculo; }
    public function getTexto() { return $this->texto; }
    public function getTitle() { return $this->title; }
    public function getInMenu() { return $this->inMenu; }

    public static function secciones_del_sitio(): array
    {
        $secciones = [];
        $json = file_get_contents('data/secciones.json');
        $data = json_decode($json);

        foreach ($data as $value) {
            $sec = new self();
            $sec->vinculo = $value->vinculo;
            $sec->texto = $value->texto;
            $sec->title = $value->title;
            $sec->inMenu = $value->inMenu;
            $secciones[] = $sec;
        }
        return $secciones;
    }

    public static function secciones_validas(): array
    {
        $validas = [];
        $secciones = self::secciones_del_sitio();
        foreach ($secciones as $s) {
            $validas[] = $s->getVinculo();
        }
        return $validas;
    }
}