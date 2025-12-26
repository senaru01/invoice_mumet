<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'no_seri_fp',
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

    // Auto calculate amounts
    public function calculateAmounts(): void
    {
        $this->subtotal1 = ($this->barang + $this->jasa) - $this->discount;
        $this->tax = $this->subtotal1 * 0.11; // 11%
        $this->subtotal2 = $this->subtotal1 + $this->tax;
        
        // PPh 23 hanya untuk jasa (2% dari jasa)
        if ($this->jasa > 0) {
            $this->pph23 = $this->jasa * 0.02;
        } else {
            $this->pph23 = 0;
        }
        
        $this->grand_total = $this->subtotal2 - $this->pph23;
    }
}