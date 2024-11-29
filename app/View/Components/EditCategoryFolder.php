<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\CategoryFolder;

class EditCategoryFolder extends Component
{
    public $folder;

    /**
     * Create a new component instance.
     *
     * @param  CategoryFolder  $folder
     * @return void
     */
    public function __construct(CategoryFolder $folder)
    {
        $this->folder = $folder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.edit-folder');
    }
}
