<?php

namespace App\Http\Requests;

use App\Models\BlogCategory;
use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $existsBlocCategoryId = BlogCategory::TABLE . ',' . BlogCategory::PROP_ID;

        return [
            BlogCategory::PROP_TITLE        => 'required|min:5|max:200',
            BlogCategory::PROP_SLUG         => 'max:200',
            BlogCategory::PROP_DESCRIPTION  => 'string|max:500|min:3',
            BlogCategory::PROP_PARENT_ID    => 'required|integer|exists:' . $existsBlocCategoryId
        ];
    }
}
