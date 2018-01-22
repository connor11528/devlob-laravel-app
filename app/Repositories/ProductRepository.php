<?php

namespace App\Repositories;

// A repository represents the concept of a storage collection for a specific type of entity.

interface ProductRepository {
    function getAll();

    function getById($id);

    function create(array $attributes);

    function update($id, array $attributes);

    function delete($id);
}