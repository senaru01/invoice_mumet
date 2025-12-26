<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'purchase_order_id',
        'no_seri_fp',
        'tax_invoice_number',
        'invoice_number',
        'invoice_date',
        'currency',
        'barang',
        'jasa',
        'discount',
        'subtotal1',
        'tax',
        'subtotal2',
        'pph23',
        'grand_total',
    ];

    protected $casts = [
        'invoice_date' => 'date',
        'barang' => 'decimal:2',
        'jasa' => 'decimal:2',
        'discount' => 'decimal:2',
        'subtotal1' => 'decimal:2',
        'tax' => 'decimal:2',
        'subtotal2' => 'decimal:2',
        'pph23' => 'decimal:2',
        'grand_total' => 'decimal:2',
    ];

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }

    public function purchaseOrder(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    /**
     * Get due date from ticket's planned_delivery_date
     */
    public function getDueDateAttribute()
    {
        return $this->ticket?->planned_delivery_date;
    }

    /**
     * Auto calculate amounts
     * Formula:
     * - subtotal1 = (barang + jasa) - discount
     * - tax = subtotal1 × 11% (PPN)
     * - subtotal2 = subtotal1 + tax
     * - pph23 = jasa × 2% (hanya untuk jasa)
     * - grand_total = subtotal2 + pph23
     */
    public function calculateAmounts(): void
    {
        // Step 1: Calculate subtotal after discount
        $this->subtotal1 = ($this->barang + $this->jasa) - $this->discount;
        
        // Step 2: Calculate PPN (11% dari subtotal1)
        $this->tax = $this->subtotal1 * 0.11;
        
        // Step 3: Calculate subtotal2 (subtotal1 + PPN)
        $this->subtotal2 = $this->subtotal1 + $this->tax;
        
        // Step 4: Calculate PPh23 (2% dari jasa only)
        if ($this->jasa > 0) {
            $this->pph23 = $this->jasa * 0.02;
        } else {
            $this->pph23 = 0;
        }
        
        // Step 5: Calculate grand total (subtotal2 + pph23)
        // Supplier tanggung semua pajak, jadi semua ditambah
        $this->grand_total = $this->subtotal2 + $this->pph23;
    }
}