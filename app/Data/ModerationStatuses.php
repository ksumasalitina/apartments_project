<?php

namespace App\Data;

enum ModerationStatuses: int
{
    case IN_REVIEW = 1;
    case APPROVED = 2;
    case DECLINED = 3;
    case CONTACTED = 4;
}
