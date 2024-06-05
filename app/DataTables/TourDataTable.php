<?php

namespace App\DataTables;

use Carbon\Carbon;
use App\Models\Tour;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class TourDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('nomor', function () {
                static $nomor = 0;
                return ++$nomor;
            })
            ->editColumn('price',function(Tour $var){
                return "Rp.". number_format($var->price, 0, ',', '.');
            })
            ->editColumn('start_date',function(Tour $var){
                return Carbon::parse($var->start_date)->format('d F Y');
            })
            ->editColumn('end_date',function(Tour $var){
                return Carbon::parse($var->end_date)->format('d F Y');
            })
            ->addColumn('action', function(Tour $tour){
                return view('admin.tour.action',compact('tour'));
            })
            ->setRowId('tour_id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Tour $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('tour-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {

        return [
            Column::computed("nomor")->title("No")
            ->width(30),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center'),
            Column::make('title')
                ->title('Judul')
                ->addClass('text-center text-capitalize'),
            Column::make('max_participant')
                ->title('Maksimal Peserta')
                ->addClass('text-center text-capitalize'),
            Column::make('price')
                ->title('Harga')
                ->addClass('text-center text-capitalize'),
            Column::make('start_date')
                ->title('Tanggal Keberangkatan')
                ->addClass('text-center text-capitalize'),
            Column::make('end_date')
                ->title('Tanggal Kembali')
                ->addClass('text-center text-capitalize'),

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Tour_' . date('YmdHis');
    }
}
