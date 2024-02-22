<?php

namespace App\Exports;

use App\Models\Cost;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CostExport implements FromCollection, WithHeadings
{
    protected $costs;

    public function __construct()
    {
        // Получаем все заказы в виде коллекции
        $this->costs = Cost::all();
    }

    public function headings(): array
    {
        return [
            'Id',
            'ID продукт',
            'Описание',
            'Цена',
            'Дата расхода',
            'Дата создания',
            'Дата обновления'
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Создаем коллекцию, включая только данные
        $collection = new Collection();

        // Добавляем данные из сырье в коллекцию
        foreach ($this->costs as $cost) {
            $collection->push([
                $cost->id,
                $cost->id_product,
                $cost->description,
                $cost->amount,
                $cost->date,
                $cost->created_at,
                $cost->updated_at
            ]);
        }

        return $collection;
    }
}
