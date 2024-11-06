<?php

namespace App\Commons;


use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Query\QueryBuilder;

class Model
{
    protected string $table;
    protected Connection|null $connect;
    protected $queryBuilder;


    public function __construct()
    {
        $connectionParams = [
            'host' => $_ENV['DB_HOST'],
            'dbname' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD'],
            'driver' => $_ENV['DB_DRIVER'],
        ];
        $this->connect = DriverManager::getConnection($connectionParams);
        $this->queryBuilder = $this->connect->createQueryBuilder();
    }

    public function find($id)
    {
        try {
            return $this->queryBuilder
                ->select('*')
                ->from($this->table)
                ->where('id = :id')
                ->setParameter('id', $id)
                ->fetchAssociative();
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    public function getAll()
    {
        try {
            return $this->queryBuilder
                ->select('*')
                ->from($this->table)
                ->orderBy('id', 'DESC')
                ->fetchAllAssociative();
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    public function insert(array $data)
    {
        try {
            if (!empty($data)) {
                $query = $this->queryBuilder
                    ->insert($this->table);

                $index = 0;

                foreach ($data as $key => $value) {
                    $query->setValue($key, '?')->setParameter($index, $value);
                    ++$index;
                }

                $query->executeQuery();
                return true;
            }
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    public function update($id, array $data) {
        try {
            if (!empty($data)) {
                $query = $this->queryBuilder
                    ->update($this->table);
                $index = 0;
                foreach ($data as $key => $value) {
                    $query->set($key, '?')->setParameter($index, $value);
                    ++$index;
                }

                $query->where('id = ?')
                ->setParameter(count($data), $id)
                ->executeQuery();

                return true;
            }
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    public function delete($id)
    {
        return $this->queryBuilder
            ->delete($this->table)
            ->where('id = :id')
            ->setParameter('id', $id)
            ->executeQuery();
    }


    public function __destruct()
    {
        $this->connect = null;
    }
}
