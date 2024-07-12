<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Index
    public function index(Request $request)
    {
        $attendances = Attendance::with('user')
            ->when($request->input('name'), function ($query, $name) {
                $query->whereHas('user', function ($query) use ($name) {
                    $query->where('name', 'like', '%' . $name . '%');
                });
            })->orderBy('id', 'desc')->paginate(10);
        return view('pages.absensi.index', compact('attendances'));
    }

    // Create
    public function create()
    {
        return view('pages.absensi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'status' => 'required|string',
        ]);

        Attendance::create($request->all());
        return redirect()->route('attendance.index')->with('success', 'Attendance created successfully.');
    }

    // Show
    public function show(Attendance $attendance)
    {
        return view('pages.absensi.show', compact('attendance'));
    }

    // Edit
    public function edit(Attendance $attendance)
    {
        return view('pages.absensi.edit', compact('attendance'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'status' => 'required|string',
        ]);

        $attendance->update($request->all());
        return redirect()->route('attendance.index')->with('success', 'Attendance updated successfully.');
    }

    // Destroy
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendance.index')->with('success', 'Attendance deleted successfully.');
    }
}
