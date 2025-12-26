<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_order_id',
        'part_name',
        'specification',
        'quantity',
        'invoiced_quantity',
        'remaining_quantity',
        'unit',
        'unit_price',
        'total_price',
        'transaction_type'
    ];

    protected $casts = [
        'quantity' => 'decimal:2',
        'invoiced_quantity' => 'decimal:2',
        'remaining_quantity' => 'decimal:2',
        'unit_price' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function updateInvoicedQuantity()
    {
        $this->invoiced_quantity = $this->invoiceItems()->sum('quantity');
        $this->remaining_quantity = $this->quantity - $this->invoiced_quantity;
        $this->save();
    }

    public function canInvoice($requestedQuantity)
    {
        return $this->remaining_quantity >= $requestedQuantity;
    }
}