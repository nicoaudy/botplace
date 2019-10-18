<?php

namespace App\DataTables;

use App\Models\Token;
use Illuminate\Support\Carbon;
use Telegram\Bot\Api;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MessageDatatable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->of($query)
            ->addColumn('id', function ($row) {
                return $row['update_id'];
            })
            ->addColumn('from', function ($row) {
                return $row['message']['from']['id'] . ' - ' . $row['message']['from']['username'];
            })
            ->addColumn('text', function ($row) {
                return $row['message']['text'];
            })
            ->addColumn('timestamp', function ($row) {
                return Carbon::parse($row['message']['date'])->format('d-M-Y H:i:s');
            });
    }

    public function query()
    {
        $telegram = new Api(Token::first()->value);
        return $telegram->getUpdates();
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    protected function getColumns()
    {
        return [
            Column::make('id')->title('#'),
            Column::make('from'),
            Column::make('text'),
            Column::make('timestamp'),
        ];
    }

    protected function filename()
    {
        return 'Message_' . date('YmdHis');
    }
}
