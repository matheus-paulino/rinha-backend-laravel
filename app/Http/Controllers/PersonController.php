<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Models\Person;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function search(Request $request): JsonResponse
    {
        $data = $request->validate([
            't' => ['required', 'string', 'max:100']
        ]);

        return response()->json(
            Person::query()
                ->where('surname', 'like', "%{$data['t']}%")
                ->orWhere('name', 'like', "%{$data['t']}%")
                ->orWhere('stack', 'like', "%{$data['t']}%")
                ->get()
        );
    }

    public function create(StorePersonRequest $request): JsonResponse
    {
        return response()->json(
            Person::query()->create($request->validated())
        )->header('Location', '/pessoas/' . Person::query()->latest()->first()->id);
    }

    public function show(Person $person): JsonResponse
    {
        return response()->json($person);
    }

    public function count(): JsonResponse
    {
        return response()->json([
            "total" => Person::query()->count()
        ]);
    }
}
