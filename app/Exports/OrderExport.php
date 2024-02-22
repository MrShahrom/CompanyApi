<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection, WithHeadings
{
    protected $orders;

    public function __construct()
    {
        // Получаем все заказы в виде коллекции
        $this->orders = Order::all();
    }

    public function headings(): array
    {
        return [
            'Id',
            'ID клиента',
            'ID продукта',
            'Дата отгрузки',
            'Единицы измерения',
            'Цена за единицу',
            'Общая сумма',
            'Количество',
            'Тип продажи',
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

        // Добавляем данные из заказов в коллекцию
        foreach ($this->orders as $order) {
            $collection->push([
                $order->id,
                $order->id_client,
                $order->id_product,
                $order->date_of_shipment,
                $order->units_of_measurement,
                $order->price_per_unit,
                $order->total_amount,
                $order->quantity,
                $order->type_of_sale,
                $order->created_at,
                $order->updated_at
            ]);
        }

        return $collection;
    }
}
