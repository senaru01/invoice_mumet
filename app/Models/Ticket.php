<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_number',
        'user_id',
        'company_id',
        'planned_delivery_date',
        'has_invoice',
        'has_faktur_pajak',
        'has_surat_jalan',
        'has_po',
        'document_notes',
        'status',
        'received_at',
        'received_by',
    ];

    protected $casts = [
        'planned_delivery_date' => 'date',
        'received_at' => 'datetime',
        'has_invoice' => 'boolean',
        'has_faktur_pajak' => 'boolean',
        'has_surat_jalan' => 'boolean',
        'has_po' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($ticket) {
            if (empty($ticket->ticket_number)) {
                $ticket->ticket_number = self::generateTicketNumber();
            }
        });
    }

    public static function generateTicketNumber(): string
    {
        $date = now()->format('Ymd');
        $lastTicket = self::whereDate('created_at', today())
            ->latest()
            ->first();

        $sequence = $lastTicket ? (int) substr($lastTicket->ticket_number, -4) + 1 : 1;

        return 'TKT-' . $date . '-' . str_pad($sequence, 4, '0', STR_PAD_LEFT);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function getTotalAmountAttribute(): float
    {
        return $this->invoices->sum('grand_total');
    }

    public function getInvoiceCountAttribute(): int
    {
        return $this->invoices->count();
    }
}