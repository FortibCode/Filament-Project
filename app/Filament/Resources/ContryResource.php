<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContryResource\Pages;
use App\Filament\Resources\ContryResource\RelationManagers;
use App\Models\Contry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\ContryResource\RelationManagers\StatesRelationManager;
use App\Filament\Resources\ContryResource\RelationManagers\EmployeesRelationManager;

class ContryResource extends Resource
{
    protected static ?string $model = Contry::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';
    protected static ?string $navigationLabel = 'Contry';
    protected static ?string $modelLabel = 'Employees Contry';

    protected static ?string $navigationGroup = 'System Management';

    protected static ?int $navigationSort = 1;
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(3),
                Forms\Components\TextInput::make('phonecode')
                    ->required()
                    ->numeric()
                    ->maxLength(5),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('code')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('phonecode')
                    ->label('Phone Code')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
                Section::make('Country Information')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Country Name'),
                        TextEntry::make('code')
                            ->label('Country Code'),
                        TextEntry::make('phonecode')
                            ->label('Phone Code'),
                        
                    ])->columns(3),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            StatesRelationManager::class,
            EmployeesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContries::route('/'),
            'create' => Pages\CreateContry::route('/create'),
            'edit' => Pages\EditContry::route('/{record}/edit'),
        ];
    }
}
