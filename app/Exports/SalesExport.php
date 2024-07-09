namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SalesExport implements FromCollection, WithHeadings, WithMapping
{
    protected $start_date;
    protected $end_date;

    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('transactions')
            ->select('stores.name', DB::raw('SUM(transactions.amount) as total_sales'))
            ->join('stores', 'transactions.stores_id', '=', 'stores.id')
            ->whereBetween('transactions.created_at', [$this->start_date, $this->end_date])
            ->groupBy('stores.name')
            ->orderByDesc('total_sales')
            ->get();
    }

    public function headings(): array
    {
        return [
            'ชื่อร้านค้า', // "Store Name" in Thai
            'ยอดขายรวม'  // "Total Sales" in Thai
        ];
    }

    public function map($row): array
    {
        return [
            $row->name,
            $row->total_sales
        ];
    }
}
