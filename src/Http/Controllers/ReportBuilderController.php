<?php

namespace ReportBuilder\PageBuilder\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use ReportBuilder\PageBuilder\Repositories\ReportBuilderRepositoryInterface;


class ReportBuilderController extends Controller
{
    private ReportBuilderRepositoryInterface $reportbuilderRepository;

    public function __construct(ReportBuilderRepositoryInterface $reportbuilderRepository)
    {
        $this->reportbuilderRepository = $reportbuilderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->reportbuilderRepository->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'content' => 'required'
        ]);

        $data = $request->only([
            'name',
            'description',
            'content'
        ]);

        return response()->json(
            [
                'message' => 'Created',
                'data' => $this->reportbuilderRepository->save($data)
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request): JsonResponse
    {
        $id = $request->route('id');

        return response()->json([
            'data' => $this->reportbuilderRepository->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'content' => 'required'
        ]);

        $data = $request->only([
            'name',
            'description',
            'content'
        ]);

        return response()->json([
            'message' => "Updated",
            'data' => $this->reportbuilderRepository->update($id, $data)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $this->reportbuilderRepository->delete($id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
