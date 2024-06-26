<?php

namespace App\Data;

enum FacilityTypes: int
{
    case PARKING = 1;
    case WIFI = 2;
    case FAMILY_ROOMS = 3;
    case NO_SMOKING_ROOMS = 4;
    case DISABILITIES_COMFORT = 5;
    case ROOM_SERVICE = 6;
    case DRINKS_IN_ROOMS = 7;
    case RESTAURANT = 8;
    case BAR = 9;
    case BATH_IN_ROOMS = 10;
    case POOL = 11;
    case SPA = 12;
    case PLAYGROUND = 13;
    case SOUND_INSULATION = 14;
    case MINI_KITCHEN = 15;
    case FRIDGE = 16;
}
