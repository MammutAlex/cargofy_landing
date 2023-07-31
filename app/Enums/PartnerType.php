<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PartnerType extends Enum
{
    const Detail = 1;
    const Cto = 2;
    const Gas = 3;
}
