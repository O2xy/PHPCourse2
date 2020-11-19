<?php
namespace app\interfaces;

interface ModelInterface
{
    function getAll();

    function getById(int $id);

    function getTableName() : string;
}