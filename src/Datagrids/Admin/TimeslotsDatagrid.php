<?php

namespace Bagisto\Pickup\Datagrids\Admin;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class TimeslotsDatagrid extends DataGrid
{
    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('pickup_timeslots')
            ->leftJoin('inventory_sources', 'pickup_timeslots.inventory_source_id', '=', 'inventory_sources.id')
            ->select(
                'pickup_timeslots.id',
                'pickup_timeslots.pickup_day',
                'pickup_timeslots.start_time',
                'pickup_timeslots.end_time',
                'pickup_timeslots.pickup_quota',
                DB::raw('DATE_FORMAT(pickup_timeslots.start_time, "%H:%i") as start_time'),
                DB::raw('DATE_FORMAT(pickup_timeslots.end_time, "%H:%i") as end_time'),
                'inventory_sources.name as inventory_source'
            )
            ->orderBy('pickup_timeslots.pickup_day');

        return $queryBuilder;
    }

    /**
     * Add columns to the DataGrid.
     *
     * @return void
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'inventory_source',
            'label'      => trans('pickup::app.admin.settings.pickup.timeslots.index.datagrid.inventory_source'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'pickup_day',
            'label'      => trans('pickup::app.admin.settings.pickup.timeslots.index.datagrid.weekday'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($value) {
                $days = [
                    1 => 'Monday',
                    2 => 'Tuesday',
                    3 => 'Wednesday',
                    4 => 'Thursday',
                    5 => 'Friday',
                    6 => 'Saturday',
                    7 => 'Sunday',
                ];

                return $days[$value->pickup_day] ?? 'Unknown';
            },
        ]);

        $this->addColumn([
            'index'      => 'start_time',
            'label'      => trans('pickup::app.admin.settings.pickup.timeslots.index.datagrid.start_time'),
            'type'       => 'string',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'end_time',
            'label'      => trans('pickup::app.admin.settings.pickup.timeslots.index.datagrid.end_time'),
            'type'       => 'string',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'pickup_quota',
            'label'      => trans('pickup::app.admin.settings.pickup.timeslots.index.datagrid.pickup_quota'),
            'type'       => 'string',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);
    }

    /**
     * Prepare actions (like Edit, Delete).
     *
     * @return void
     */
    public function prepareActions()
    {
        // You can add actions like Edit and Delete here if required
        $this->addAction([
            'icon'   => 'icon-edit',
            'title'  => 'Edit',
            'method' => 'GET',
            'url'    => function ($row) {
                return route('admin.settings.pickup.timeslot.edit', $row->id);
            },
        ]);
    }

    /**
     * Prepare mass actions.
     *
     * @return void
     */
    public function prepareMassActions()
    {

        $this->addMassAction([
            'title'  => trans('pickup::app.admin.settings.pickup.timeslots.index.datagrid.mass-delete'),
            'url'    => route('admin.settings.pickup.timeslot.bulk-delete'),
            'method' => 'POST',
        ]);
    }
}
