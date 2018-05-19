<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rooms = Room::orderBy('number', 'asc')->paginate(6);
        return [
            'pagination' => [
                'total' => $rooms->total(),
                'current_page' => $rooms->currentPage(),
                'per_page' => $rooms->perPage(),
                'last_page' => $rooms->lastPage(),
                'from' => $rooms->firstItem(),
                'to' => $rooms->lastPage()
            ],
            'rooms' => $rooms
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'required|numeric|min:1|max:1000|unique:rooms,number',
            'price' => 'required|numeric|max:5000000',
            'type' => ['required', Rule::in(['Individual', 'Familiar'])],
            'maxpeople' => 'required|numeric|min:1|max:100',
            'description' => 'required|string|max:200'
        ], [
            'price.max' => 'El precio no es un valor válido'
        ], [
            'number' => 'Número de habitación',
            'price' => 'Precio',
            'type' => 'Tipo',
            'maxpeople' => 'Número máximo de personas',
            'description' => 'Descripción'
        ]);
        Room::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return $room;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return $room;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $data = $request->validate([
            'number' => 'required|numeric|min:1|max:1000|unique:rooms,number,'.$room->id,
            'price' => 'required|numeric|max:5000000',
            'type' => ['required', Rule::in(['Individual', 'Familiar'])],
            'maxpeople' => 'required|numeric|min:1|max:100',
            'description' => 'required|string|max:200'
        ], [
            'price.max' => 'El precio no es un valor válido'
        ], [
            'number' => 'Número de habitación',
            'price' => 'Precio',
            'type' => 'Tipo',
            'maxpeople' => 'Número máximo de personas',
            'description' => 'Descripción'
        ]);
        $room->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
    }
}
