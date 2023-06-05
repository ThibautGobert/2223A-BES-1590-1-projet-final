<?php

namespace App\Enums;

use ReflectionClass;

class Category
{
    const BACKEND = 1;
    const FRONTEND = 2;
    const CMS = 3;
    const PHOTO = 4;

    public static function getDescription(int $id) : string
    {
        switch ($id) {
            case static::BACKEND:
                return 'Projet backend';
            case static::FRONTEND:
                return 'Front end';
            case static::CMS:
                return 'Projet CMS';
            case static::PHOTO:
                return 'Photo';
            default: return '';
        }
    }

    public static function getList() : array
    {
        $reflexionClass = new ReflectionClass(__CLASS__);
        $constantes = $reflexionClass->getConstants();

        $results = [];
        foreach($constantes as $constante => $id)
        {
            $results[] = [
                'id' => $id,
                'label' => static::getDescription($id)
            ];
        }
        return $results;
    }
}