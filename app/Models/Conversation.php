<?php

namespace App\Models;

use App\Enums\ConversationChannel;
use App\Enums\ConversationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_id',
        'channel',
        'status',
        'last_message_at',
    ];

    protected function casts(): array
    {
        return [
            'channel' => ConversationChannel::class,
            'status' => ConversationStatus::class,
            'last_message_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class)->oldest();
    }

    /**
     * Dipakai di halaman index untuk menampilkan preview pesan terakhir tanpa N+1
     * (eager load dengan: Conversation::with('latestMessage')).
     */
    public function latestMessage(): HasOne
    {
        return $this->hasOne(Message::class)->latestOfMany();
    }
}
