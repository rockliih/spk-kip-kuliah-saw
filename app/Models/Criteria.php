<?php

namespace App\Models;

use App\Models\Criteria;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Guarded(['id'])]
class Criteria extends Model
{
    use hasFactory;

    public static function getCostCriterias() {
        return self::where('type', 'cost')->pluck('code');
    }

    public static function getBenefitCriterias() {
        return self::where('type', 'benefit')->pluck('code');
    }

    public static function getWeightValues() {
        return self::all()->pluck('weight', 'code')->mapWithKeys(function ($weight, $code) {
            return [strtolower($code) => $weight / 100];
        });
    }
}
