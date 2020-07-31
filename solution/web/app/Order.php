<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Order
 *
 * @property int $id
 * @property int $author_id
 * @property string $from
 * @property string $to
 * @property int $transport_type_id
 * @property int $status_id
 * @property int|null $transport_id
 * @property int|null $operator_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereTransportId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereTransportTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read mixed $next_status
 * @property-read \App\OrderStatus $status
 * @property-read \App\TransportType $transportType
 * @property-read mixed $next_status_css
 */
class Order extends Model
{
    protected $guarded = [];

    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function transportType()
    {
        return $this->belongsTo(TransportType::class);
    }

    public function getNextStatusAttribute()
    {
        switch ($this->status->title) {
            case "Создан":
            case "В работе":
                return "Отменен";
                break;
            case "Выполнен":
                return "Завершен";
                break;
        }
        return '';
    }

    public function getNextStatusCssAttribute()
    {
        switch ($this->status->title) {
            case "Создан":
            case "В работе":
                return "context-menu-cancel";
                break;
            case "Выполнен":
                return "context-menu-finish";
                break;
        }
        return '';
    }
}
