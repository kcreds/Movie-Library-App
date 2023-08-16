<?php
namespace App\Enums;

class MovieStatusEnum extends \Illuminate\Validation\Rules\Enum
{
    const Not_viewed = 'Not viewed';
    const Watched = 'Watched';
    const To_view = 'To view';
    const To_review = 'To review';

    public static function getValues(): array
    {
        return [
            self::Not_viewed,
            self::Watched,
            self::To_view,
            self::To_review,
        ];
    }
}