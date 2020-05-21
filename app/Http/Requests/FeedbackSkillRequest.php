<?php

namespace App\Http\Requests;

use App\Services\SkillService;
use Illuminate\Foundation\Http\FormRequest;

class FeedbackSkillRequest extends FormRequest
{
    /**
     * @var SkillService
     */
    private $skillService;

    public function __construct(SkillService $skillService, array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null)
    {
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
        $this->skillService = $skillService;
    }

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
        $rules = [
//            'feedback_1' => 'required',
//            'feedback_2' => 'required',
        ];

//        foreach($this->skillService->all() as $skill)
//        {
//            $rules['rating_' . $skill->id] = 'required';
//        }
        return $rules;
    }
}
