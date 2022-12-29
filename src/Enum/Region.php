<?php

namespace Mafftor\RefactoringTask\Enum;

enum Region: string implements EURegionCheckable
{
    case AT = 'AT';
    case BE = 'BE';
    case BG = 'BG';
    case CY = 'CY';
    case CZ = 'CZ';
    case DE = 'DE';
    case DK = 'DK';
    case EE = 'EE';
    case ES = 'ES';
    case FI = 'FI';
    case FR = 'FR';
    case GR = 'GR';
    case HR = 'HR';
    case HU = 'HU';
    case IE = 'IE';
    case IT = 'IT';
    case LT = 'LT';
    case LU = 'LU';
    case LV = 'LV';
    case MT = 'MT';
    case NL = 'NL';
    case PO = 'PO';
    case PT = 'PT';
    case RO = 'RO';
    case SE = 'SE';
    case SI = 'SI';
    case SK = 'SK';

    /**
     * Checks if the region belongs to Europe
     *
     * @param Region|null $region
     * @return bool
     */
    public static function isEu(?Region $region): bool
    {
        return match ($region) {
            // self::cases() => true, we can use this, but it includes everything in case there is non EU region will break the logic
            Region::AT, Region::BE, Region::BG, Region::CY, Region::CZ, Region::DE, Region::DK, Region::EE, Region::ES,
            Region::FI, Region::FR, Region::GR, Region::HR, Region::HU, Region::IE, Region::IT, Region::LT, Region::LU,
            Region::LV, Region::MT, Region::NL, Region::PO, Region::PT, Region::RO, Region::SE, Region::SI, Region::SK => true,

            default => false,
        };
    }
}
