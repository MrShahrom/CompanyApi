<?php

namespace App\Exports;

use App\Models\RawMaterial;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RawMaterialExport implements FromCollection, WithHeadings
{
    protected $rawmaterials;

    public function __construct()
    {
        // Получаем все заказы в виде коллекции
        $this->rawmaterials = RawMaterial::all();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Название',
            'Единица измерения',
            'Количество',
            'Покупательская цена',
            'Единицы измерения(сомони)',
            'ID поставщика',
            'Дата прихода',
            'Описание',
            'Статус',
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
        foreach ($this->rawmaterials as $rawmaterial) {
            $collection->push([
                $rawmaterial->id,
                $rawmaterial->name,
                $rawmaterial->unit,
                $rawmaterial->quantity,
                $rawmaterial->purchase_price,
                $rawmaterial->units_of_measurement,
                $rawmaterial->id_supplier,
                $rawmaterial->date,
                $rawmaterial->description,
                $rawmaterial->status,
                $rawmaterial->created_at,
                $rawmaterial->updated_at
            ]);
        }

        return $collection;
    }
}
