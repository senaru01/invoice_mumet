<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function purchaseOrder(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function invoiceItems(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    /**
     * Check if this item can be invoiced with given quantity
     */
    public function canInvoice(float $quantity): bool
    {
        return $this->remaining_quantity >= $quantity;
    }

    /**
     * Update invoiced and remaining quantities
     * Call this after creating invoice item
     */
    public function updateInvoicedQuantity(): void
    {
        // Recalculate from all invoice items
        $totalInvoiced = $this->invoiceItems()
            ->whereHas('invoice.ticket', function($query) {
                // Only count invoices that are not cancelled
                $query->whereIn('status', ['pending', 'received', 'completed']);
            })
            ->sum('quantity');
        
        $this->invoiced_quantity = $totalInvoiced;
        $this->remaining_quantity = $this->quantity - $totalInvoiced;
        $this->save();
    }

    /**
     * Get remaining quantity for display
     */
    public function getRemainingQtyAttribute(): float
    {
        return $this->remaining_quantity;
    }
}