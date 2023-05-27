<?php

namespace App\Nova;

use Laravel\Nova\Fields\Number;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;

class Booking extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Booking>
     */
    public static $model = \App\Models\Booking::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            HasOne::make('User')->required(),

            BelongsTo::make('Apartment')
                ->display(function ($apartment) { return $apartment->name; })->required()->filterable(),

            BelongsTo::make('Room')
                ->display(function ($room) { return $room->number; })->required(),

            Date::make('Check_in')->sortable()->required(),

            Date::make('Check_out')->sortable()->required(),

            Number::make('People')->required(),

            Number::make('Total')->sortable()->required(),

            Select::make('Status')->options([
                'processing' => 'processing',
                'confirmed' => 'confirmed',
                'canceled' => 'canceled',
                'finished' => 'finished'
            ])->filterable()->hideWhenCreating(),

            Text::make('Guest_firstname')->hideFromIndex()->required(),

            Text::make('Guest_lastname')->hideFromIndex()->required(),

            Text::make('Guest_email')->hideFromIndex()->required(),

            Text::make('Notice')->hideFromIndex()->nullable()
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
