<?php

namespace App\Data;

enum BookingStatuses: int
{
    case WAITING_FOR_APPROVE = 1;
    case APPROVED = 2;
    case CONTACTED_GUEST = 3;
    case DECLINED = 4;
}
