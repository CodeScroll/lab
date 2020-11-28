<?php

namespace App\Http\Requests;

use App\Models\Skill;
use Illuminate\Foundation\Http\FormRequest;

class UsersSkillsStoreRequest extends FormRequest
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
        $skillsRequested = json_decode($this->skills);
        $skillsRequestedCount = count($skillsRequested);
        $skillsCount = Skill::whereIn('id',$skillsRequested)->count();
        if($skillsCount != $skillsRequestedCount){
            return false;
        }

        return [
            'skills' => 'required'
        ];
    }
}
