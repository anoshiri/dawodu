<?php

namespace App\Filament\Resources\Articles\Schemas;

use App\Models\Article;
use App\Models\Contributor;
use Filament\Forms;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\DatePicker::make('publication_date'),
                        
                Forms\Components\TextInput::make('subject')
                    ->label('Subject / Title')
                    ->required()
                    ->maxLength(255),

                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Select::make('category_id')
                    ->label('Category')
                    ->required()
                    ->relationship('category', 'title')
                    ->helperText('Select a category for this article.'),

                Forms\Components\Select::make('contributor_id')
                    ->label('Contributing Writer')
                    ->options(Contributor::get()->pluck('full_name', 'id'))
                    ->searchable()
                    ->helperText('Select writer if appropriate'),
                    //->getOptionLabelFromRecordUsing(fn (Contributor $record) => "{$record->first_name} {$record->last_name}"),
                
                Forms\Components\TextInput::make('source', 'Source/Author')
                    ->maxLength(255),
                
                Forms\Components\Select::make('related')
                    ->multiple()
                    ->label('Related Articles')
                    ->getSearchResultsUsing(fn (string $query) => Article::where('subject', 'like', "%{$query}%")->limit(50)->pluck('subject', 'id'))
                    ->getOptionLabelsUsing(fn (array $values) => Article::find($values)->pluck('subject', 'id'))
                    ->helperText('Search and add by title.'),

                Forms\Components\TagsInput::make('sites')
                    ->label('Site(s) to public article on')
                    ->suggestions(config('dawodu.sites'))
                    ->helperText('Select one or more sites.'),

                Forms\Components\TagsInput::make('sections')
                    ->label('Feature in a specific section(s)')
                    ->suggestions(config('dawodu.sections'))
                    ->helperText('Select one or more sections to promote this article.'),

                
                
                Forms\Components\TagsInput::make('tags')
                    ->label('SEO Tags')
                    ->helperText('Add keywords to help search engine indexing. Press [ Enter ] key after each keyword or phrase.'),

                Forms\Components\TextInput::make('video_url')
                    ->label('Video Url')
                    ->helperText('Add youtube link to add a video to the article.'),

                Forms\Components\FileUpload::make('image')
                    ->columnSpanFull()
                    ->label('Add an image')
                    ->image()
                    ->disk('local')
                    ->directory('public/articles')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $date = time().'-';
                        return (string) Str::of($file->getClientOriginalName())->prepend($date);
                    }),

                Forms\Components\Toggle::make('status')
            ]);
    }
}
