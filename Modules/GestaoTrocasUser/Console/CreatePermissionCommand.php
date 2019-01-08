<?php

namespace GestaoTrocasUser\Console;

use GestaoTrocasUser\Annotations\PermissionReader;
use GestaoTrocasUser\Repositories\PermissionRepository;
use Illuminate\Console\Command;

class CreatePermissionCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'gestaotrocasuser:make-permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Criação de permissões baseado em controlles e ações';
    /**
     * @var PermissionRepository
     */
    private $repository;
    /**
     * @var PermissionReader
     */
    private $reader;

    public function __construct(PermissionRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }

    /**
     *
     */
    public function fire()
    {
        $permissions = PermissionReader::getPermissions();
        foreach ($permissions as $permission) {
            if (!$this->existsPermission($permission)) {
                $this->repository->create($permission);
            }
        }
        $this->info("<info>Permissões carregadas</info>");
    }

    private function existsPermission($permission)
    {
        $permission = $this->repository->findWhere([
            'name' => $permission['name'],
            'resource_name' => $permission['resource_name']
        ])->first();
        return $permission != null;
    }
}