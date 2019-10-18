<?php

namespace App\DataTables;

use App\Models\Contact;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ContactDatatable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->of($query)
            ->editColumn('token_id', function ($row) {
                return $row->token->name;
            })
            ->editColumn('is_bot', function ($row) {
                return $row->is_bot ? 'Bot' : 'Nope';
            });
    }

    public function query(Contact $contact)
    {
        return $contact->all();
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->buttons(
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    protected function getColumns()
    {
        return [
            Column::make('token_id')->title('Token'),
            Column::make('identifier'),
            Column::make('first_name'),
            Column::make('last_name'),
            Column::make('username'),
            Column::make('is_bot'),
            Column::make('created_at'),
        ];
    }

    protected function filename()
    {
        return 'Contact_' . date('YmdHis');
    }
}
