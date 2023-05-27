<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;

class Apartment extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Apartment>
     */
    public static $model = \App\Models\Apartment::class;

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

            Text::make('Name')->sortable()->required(),

            Text::make('Type'),

            BelongsTo::make('City', 'city', 'App\Nova\City')
                ->display(function ($city) { return $city->city; }),

            Number::make('Stars')->sortable()->required(),

            Number::make('Rate')->sortable()->hideWhenCreating(),

            Text::make('Email')->required(),

            Select::make('Moderation')->options([
                'processing' => 'processing',
                'approved' => 'approved',
                'rejected' => 'rejected',
            ])->filterable()->hideWhenCreating(),

            Text::make('Building')->hideFromIndex()->required(),

            Text::make('Street')->hideFromIndex()->required(),

            Text::make('Postcode')->hideFromIndex()->required(),

            Text::make('Description')->hideFromIndex()->required(),

            Number::make('Comfort')->hideFromIndex()->hideWhenCreating(),

            Text::make('Clean')->hideFromIndex()->hideWhenCreating(),

            Text::make('Location')->hideFromIndex()->hideWhenCreating(),

            Text::make('Staff')->hideFromIndex()->hideWhenCreating(),

            Image::make('Image_1')->hideFromIndex()->required(),

            Image::make('Image_2')->hideFromIndex()->required(),

            Image::make('Image_3')->hideFromIndex()->required(),

            HasMany::make('Rooms'),

            HasMany::make('Bookings')
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
