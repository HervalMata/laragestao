<?php
namespace GestaoTrocasUser\Annotations\Mapping;

/**
 * @Annotation
 * @Target("METHOD")
 * @package GestaoTrocasUser\Annotations\Mapping
 */
class Action{
    public $name;
    public $description;
}