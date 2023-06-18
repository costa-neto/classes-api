<?php

namespace Src\Controllers;

use Leaf\Http\Status;
use Src\Exceptions\DateOccupiedException;
use Src\Exceptions\InvalidDateException;
use Src\Services\ClassesService;
use Src\Repositories\ClassesRepository;

class ClassesController extends Controller{
    private ClassesRepository $classesRepository;
    private ClassesService $classesService;

    public function __construct(){
        $this->classesRepository = new ClassesRepository();
        $this->classesService = new ClassesService($this->classesRepository);
    }
    public function index(){
        $classes = $this->classesService->all();
        response()->json($classes);
    }

    public function create() {
        try {
            $payload_data = request()->body();
            $class = $this->classesService->create($payload_data);
            return response()->json($class, Status::HTTP_CREATED);
        } catch (InvalidDateException $err) {
            return response()->json(['message' => $err->getMessage()], Status::HTTP_UNPROCESSABLE_ENTITY);
        } catch (DateOccupiedException $err) {
            return response()->json(['message' => $err->getMessage()], Status::HTTP_CONFLICT);
        }
    }
}
