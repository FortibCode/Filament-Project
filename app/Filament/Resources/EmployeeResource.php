<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use Filament\Forms\Get;
use App\Models\State;
use App\Models\City;
use Filament\Forms\Set;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;
use Carbon\Carbon;
use Filament\Tables\Filters\Indicator;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Actions\BulkActionGroup;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;






class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Employee Management';

    protected static ?string $recordTitleAttribute = 'first_name';

     public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->first_name;
    }

    public function getGlobalSearchableAttributes(): array
    {
        return ['first_name', 'last_name', 'middle_name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Last Name' => $record->last_name,
            'Middle Name' => $record->middle_name,
        ];
    }

    public static function getDefaultTableFiltersLayout():  ?FiltersLayout
    {
        return FiltersLayout::AboveContent;
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['contry']);
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return static::getModel()::count() > 50 ? 'danger' : 'primary';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Relationship')
                    ->schema([
                        Forms\Components\Select::make('contry_id')
                            ->label('Pays')
                            ->relationship('contry', 'name')  
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(function (Set $set){
                                $set('state_id', null);
                                $set('city_id', null);
                            })
                            ->required(),
                            Forms\Components\Select::make('state_id')
                            ->options(fn(Get $get ): Collection => State::query()
                            ->where('contry_id', $get('contry_id'))
                            ->pluck('name', 'id')
                            )   
                            ->searchable()
                            ->preload()
                            ->live()
                             ->afterStateUpdated(fn (Set $set) => $set('city_id', null))
                            ->required(),
                            Forms\Components\Select::make('city_id')
                            ->options(fn(Get $get ): Collection => City::query()
                            ->where('state_id', $get('state_id'))
                            ->pluck('name', 'id')
                            )
                            ->searchable()
                            ->preload()
                            ->live()
                            ->required(),
                            Forms\Components\Select::make('department_id')
                            ->relationship(name: 'department', titleAttribute: 'name')  
                            ->searchable()
                            ->preload()
                            ->required(),
                    ])->columns(2),

                Forms\Components\Section::make('User Name')
                    ->description('Put the user name details in.')
                    ->schema([
                        Forms\Components\TextInput::make('first_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('last_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('middle_name')
                            ->maxLength(255),
                    ])->columns(3),
                Forms\Components\Section::make('User Address')
                ->schema([
                    Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('zip_code')
                    ->required()
                    ->maxLength(255),
                ])->columns(2),
                Forms\Components\Section::make('User Details')
                ->schema([
                    Forms\Components\DatePicker::make('date_of_birth')
                    ->native(false)
                    ->displayFormat('d/m/Y')
                    ->required(),
                Forms\Components\DatePicker::make('date_of_hire')
                    ->native(false)
                    ->displayFormat('d/m/Y')
                    ->required(),
                ])->columns(2)
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                 Tables\Columns\TextColumn::make('contry.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('middle_name')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('address')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('zip_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_of_birth')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('date_of_hire')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters(
    [
        SelectFilter::make('department')
            ->relationship('department', 'name')
            ->searchable()
            ->preload()
            ->label('Filter by Department')
            ->indicator('Department')
            ->multiple(),

        Filter::make('created_at')
            ->form([
                DatePicker::make('created_from'),
                DatePicker::make('created_until'),
            ])
            ->query(function (Builder $query, array $data): Builder {
                return $query
                    ->when(
                        $data['created_from'] ?? null,
                        fn (Builder $query, $date) =>
                            $query->whereDate('created_at', '>=', $date),
                    )
                    ->when(
                        $data['created_until'] ?? null,
                        fn (Builder $query, $date) =>
                            $query->whereDate('created_at', '<=', $date),
                    );
            })
            ->indicateUsing(function (array $data): array {
                $indicators = [];

                if ($data['created_from'] ?? null) {
                    $indicators[] = Indicator::make(
                        'Created from ' . Carbon::parse($data['created_from'])->toFormattedDateString()
                    )->removeField('created_from');
                }

                            if ($data['created_until'] ?? null) {
                                $indicators[] = Indicator::make(
                                    'Created until ' . Carbon::parse($data['created_until'])->toFormattedDateString()
                                )->removeField('created_until');
                            }

                            return $indicators;
                        }),
                ])

                ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                ->successNotification(
            Notification::make()
                        ->success()
                        ->title('Employee Updated.')
                        ->body('The employee has been update successfully.'))
                ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Relationship')
                    ->schema([
                        TextEntry::make('contry.name'),
                        TextEntry::make('state.name'),
                        TextEntry::make('city.name'),
                        TextEntry::make('department.name'),
                    ])->columns(4),

                Section::make('User Name')
                    ->schema([
                        TextEntry::make('first_name')
                            ->label('First Name'),
                        TextEntry::make('last_name')
                            ->label('Last Name'),
                        TextEntry::make('middle_name')
                            ->label('Middle Name'),
                    ])->columns(3),

                Section::make('User Address')
                ->schema([
                    TextEntry::make('address')
                    ->label('Address'),
                TextEntry::make('zip_code')
                    ->label('Zip Code'),
                ])->columns(2),

                Section::make('User Details')
                ->schema([
                    TextEntry::make('date_of_birth')
                    ->label('Date of Birth')
                    ->date(),
                TextEntry::make('date_of_hire')
                    ->label('Date of Hire')
                    ->date(),
                ])->columns(2),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            // 'view' => Pages\ViewEmployee::route('/{record}'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
