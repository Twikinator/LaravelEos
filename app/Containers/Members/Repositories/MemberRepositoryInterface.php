<?php
namespace App\Containers\Members\Repositories;

interface MemberRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function attachTag(array $data, $memberId);
}

?>