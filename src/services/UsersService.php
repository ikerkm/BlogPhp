<?php


namespace App\services;
use App\DoctrineManager;
use App\models\entities\User;

class UsersService{

    public function __construct(DoctrineManager $doctrine){
        $this->doctrine = $doctrine;
            }
            public function getUserById(int $id):User{

                $repository = $this->doctrine->em->getRepository(User::class);
                return $repository->find($id);
            }


       




}