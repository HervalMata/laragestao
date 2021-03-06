<?php

namespace GestaoTrocasUser\Annotations;

use Doctrine\Common\Annotations\Reader;
use GestaoTrocasUser\Annotations\Mapping\Action;
use GestaoTrocasUser\Annotations\Mapping\Controller;

class PermissionReader
{
    /**
     * @var Reader
     */
    private $reader;

    public function __construct(Reader $reader)
    {
        $this->reader = $reader;
    }

    public function getPermissions()
    {
        $controllerClasses = $this->getControllers();
        $declared = get_declared_classes();
        $permissions = [];
        foreach ($declared as $className) {
            $rc = new \ReflectionClass($className);
            if (in_array($rc->getFileName(), $controllerClasses)) {
                $permission = $this->getPermission($className);
                if(count($permission)) {
                    $permissions = array_merge($permissions, $permission);
                }
            }
        }
        return $permissions;
    }

    public function getPermission($controllerClass, $action = null)
    {
        $rc = new \ReflectionClass($controllerClass);
        /** @var  Controller $controllerAnnotation */
        $controllerAnnotation = $this->reader->getClassAnnotation($rc, Controller::class);
        $permissions = [];
        if ($controllerAnnotation) {
            $permission = [
                'name' => $controllerAnnotation->name,
                'description' => $controllerAnnotation->description
            ];
            $rcMethods = !$action ? $rc->getMethods() : [$rc->getMethod($action)];
            foreach ($rcMethods as $rcMethod) {
                /** @var Action $actionAnnotation */
                $actionAnnotation = $this->reader->getMethodAnnotation($rcMethod, Action::class);
                if ($actionAnnotation) {
                    $permission['resource_name'] = $actionAnnotation->name;
                    $permission['resource_description'] = $actionAnnotation->description;
                    $permissions[] = (new \ArrayIterator($permission))->getArrayCopy();
                }
            }
        }
        return $permissions;
    }

    private function getControllers()
    {
        $dirs = config('gestaotrocasuser.acl.controllers_annotations');
        $files = [];
        foreach ($dirs as $dir) {
            foreach (\File::allFiles($dir) as $file) {
                $files[] = $file->getRealPath();
                require_once $file->getRealPath();
            }
        }
        return $files;
    }
}