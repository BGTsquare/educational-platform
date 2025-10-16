<?php

namespace App\Filament\Resources\Courses;

use App\Filament\Resources\Courses\Pages;
use App\Filament\Resources\Courses\RelationManagers\MaterialsRelationManager;
use App\Models\Course;
use App\Filament\Resources\Courses\Schemas\CourseForm;
use App\Filament\Resources\Courses\Tables\CoursesTable;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use BackedEnum;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Schema $schema): Schema
    {
        return CourseForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CoursesTable::configure($table);
    }

    // We will configure the relation manager in the next step
    public static function getRelations(): array
    {
        return [
            MaterialsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}
