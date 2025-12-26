<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'po_number',
        'po_date',
        'supplier_id',
        'subtotal',
        'ppn_amount',
        'pph23_amount',
        'total_amount',
        'status',
        'notes'
    ];

    protected $casts = [
        'po_date' => 'date',
        'subtotal' => 'decimal:2',
        'ppn_amount' => 'decimal:2',
        'pph23_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];

    public function supplier()
    {
        return $this->belongsTo(User::class, 'supplier_id');
    }

    public function items()
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function updateStatus()
    {
        $totalItems = $this->items()->count();
        $fullyInvoicedItems = $this->items()
            ->whereColumn('invoiced_quantity', '>=', 'quantity')
            ->count();

        if ($fullyInvoicedItems == 0) {
            $this->status = 'open';
        } elseif ($fullyInvoicedItems == $totalItems) {
            $this->status = 'closed';
        } else {
            $this->status = 'partial';
        }

        $this->save();
    }

    public function getRemainingAmountAttribute()
    {
        $invoicedAmount = $this->invoices()->sum('amount');
        return $this->total_amount - $invoicedAmount;
    }
}