<?php

namespace Bagisto\Pickup\Http\Controllers\Admin;

use Bagisto\Pickup\Models\PickupTimeslot;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Webkul\Inventory\Models\InventorySource;

class TimeSlotsController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $timeslots = PickupTimeslot::with('inventory')->get();

            return response()->json([
                'timeslots' => $timeslots,
            ]);
        }

        $inventorySources = InventorySource::where('status', true)->get();

        $timeslots = PickupTimeslot::with('inventory')->get();

        return view('pickup::admin.timeslots.index', compact('inventorySources', 'timeslots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pickup::admin.timeslots.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'inventory_source' => 'required|exists:inventory_sources,id',
            'pickup_day'       => 'required|integer|min:1|max:7',
            'start_time'       => 'required|date_format:H:i',
            'end_time'         => 'required|date_format:H:i|after:start_time',
            'pickup_quota'     => 'nullable|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => __('pickup::app.admin.settings.pickup.timeslots.create.error'),
                'errors'  => $validator->errors(),
            ], 422);
        }

        $existingTimeslot = PickupTimeslot::where('inventory_source_id', $request->input('inventory_source'))
            ->where('pickup_day', $request->input('pickup_day'))
            ->where('start_time', $request->input('start_time'))
            ->where('end_time', $request->input('end_time'))
            ->first();

        if ($existingTimeslot) {
            return response()->json([
                'message' => __('pickup::app.admin.settings.pickup.timeslots.create.duplicate'),
                'errors'  => [
                    'pickup_day' => __('pickup::app.admin.settings.pickup.timeslots.create.duplicate'),
                ],
            ], 422);
        }

        $timeslot = PickupTimeslot::create([
            'inventory_source_id' => $request->input('inventory_source'),
            'pickup_day'          => $request->input('pickup_day'),
            'start_time'          => $request->input('start_time'),
            'end_time'            => $request->input('end_time'),
            'pickup_quota'        => $request->input('pickup_quota') ?? null,
        ]);

        return response()->json([
            'message' => __('pickup::app.admin.settings.pickup.timeslots.create.success'),
            'data'    => $timeslot,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $timeslot = PickupTimeslot::findOrFail($id);
        $inventorySources = InventorySource::where('status', true)->get();

        return view('pickup::admin.timeslots.edit', compact('timeslot', 'inventorySources'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        \Log::info('Update timeslot request', $request->all());

        $validator = Validator::make($request->all(), [
            'id'               => 'required|exists:pickup_timeslots,id',
            'start_time'       => 'required',
            'end_time'         => 'required|after:start_time',
            'pickup_quota'     => 'nullable|integer|min:1',
        ]);

        if ($validator->fails()) {
            \Log::error('Validation failed', $validator->errors()->toArray());

            return response()->json([
                'message' => __('pickup::app.admin.settings.pickup.timeslots.edit.error'),
                'errors'  => $validator->errors(),
            ], 422);
        }

        $timeslot = PickupTimeslot::findOrFail($request->input('id'));

        if ($timeslot) {
            $timeslot->update([
                'pickup_day'   => $request->input('pickup_day'),
                'start_time'   => $request->input('start_time'),
                'end_time'     => $request->input('end_time'),
                'pickup_quota' => $request->input('pickup_quota') ?? null,
            ]);

            return response()->json([
                'message' => __('pickup::app.admin.settings.pickup.timeslots.edit.success'),
                'data'    => $timeslot,
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:pickup_timeslots,id',
        ]);

        $id = $request->input('id');
        $timeslot = PickupTimeslot::findOrFail($id);

        if ($timeslot) {
            $timeslot->delete();

            return response()->json([
                'message' => __('pickup::app.admin.settings.pickup.timeslots.delete-success'),
            ]);
        }

        return response()->json([
            'message' => __('pickup::app.admin.settings.pickup.timeslots.delete-error'),
        ], 422);
    }
}
