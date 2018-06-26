<?php namespace Expressuals\Pbform;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Expressuals\Pbform\Components\RegisterForm' => 'RegisterForm'
        ];
    }

    public function registerSettings()
    {
    }

    public function registerFormWidgets()
{
    return [
        'Backend\FormWidgets\CodeEditor' => [
            'label' => 'Code editor',
            'code'  => 'codeeditor'
        ],

        'Backend\FormWidgets\RichEditor' => [
            'label' => 'Rich editor',
            'code'  => 'richeditor'
        ],

        'Backend\FormWidgets\MarkdownEditor' => [
            'label' => 'Markdown editor',
            'code'  => 'markdown'
        ],

        'Backend\FormWidgets\FileUpload' => [
            'label' => 'File uploader',
            'code'  => 'fileupload'
        ],

        'Backend\FormWidgets\Relation' => [
            'label' => 'Relationship',
            'code'  => 'relation'
        ],

        'Backend\FormWidgets\DatePicker' => [
            'label' => 'Date picker',
            'code'  => 'datepicker'
        ],

        'Backend\FormWidgets\TimePicker' => [
            'label' => 'Time picker',
            'code'  => 'timepicker'
        ],

        'Backend\FormWidgets\ColorPicker' => [
            'label' => 'Color picker',
            'code'  => 'colorpicker'
        ],

        'Backend\FormWidgets\DataTable' => [
            'label' => 'Data Table',
            'code'  => 'datatable'
        ],

        'Backend\FormWidgets\RecordFinder' => [
            'label' => 'Record Finder',
            'code'  => 'recordfinder'
        ],

        'Backend\FormWidgets\Repeater' => [
            'label' => 'Repeater',
            'code'  => 'repeater'
        ],

        'Backend\FormWidgets\TagList' => [
            'label' => 'Tag List',
            'code'  => 'taglist'
        ]
    ];
}
}
