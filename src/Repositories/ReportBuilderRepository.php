<?php

namespace ReportBuilder\PageBuilder\Repositories;

use ReportBuilder\PageBuilder\Entities\ReportButilder;

class ReportBuilderRepository implements ReportBuilderRepositoryInterface
{
    public function all()
    {
        return ReportButilder::latest()->get();
    }

    public function save(array $data)
    {
        return ReportButilder::create($data);
    }

    public function find($id)
    {
        return ReportButilder::findOrFail($id);
    }

    public function update($id, array $newData)
    {
        return ReportButilder::whereId($id)->update($newData);
    }

    public function delete($id)
    {
        ReportButilder::destroy($id);
    }
}
