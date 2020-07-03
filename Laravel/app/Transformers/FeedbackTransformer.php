<?php

namespace App\Api\V1\Transformers;

use App\Api\V1\Helpers\Utility;
use App\clientFeedbackFromTherapist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use League\Fractal\TransformerAbstract;

class FeedbackTransformer extends TransformerAbstract
{
    public function __construct($request)
    {
        $this->request = $request;
    }
    /**
     * List of resources possible to include.
     *
     * @var array
     */

    /**
     * List of resources to automatically include.
     *
     * @var array
     */
    protected $defaultIncludes = ['therapist'];
    /**
     * @property string name
     * @property string email
     */
    public function transform(clientFeedbackFromTherapist $feedback)
    {
        $currentTherapistId = 0;
        if(!is_null(Auth::user()->selectedTherapists()->where('is_active', 1)->first())){
            $currentTherapistId = Auth::user()->selectedTherapists()->where('is_active', 1)->first()->therapist_id;

            $currentTherapistId = Auth::user()->selectedTherapists()->count() == 1 ? 0 : $currentTherapistId;
        }

        $isShared = 0;

        if($currentTherapistId != 0){
            $sharedCount = Auth::user()->shareFeedback()->where('clients_shared_feedback_and_journals_with_therapist.therapist_id', $currentTherapistId)->where('active', 1)->count();
            if($sharedCount > 0){
                $isShared = 1;
            }
        }


        return [
            'id' => $feedback->id,
            'feedback' => $feedback->feedback,
            'therapist_id' => $feedback->therapist_id,
            'user_id' => $feedback->user_id,
            'is_first' => Auth::user()->selectedTherapists()->count() == 1 ? 1 : 0,
            'is_shared' => $isShared,
            'created_at' => Carbon::parse($this->gettime($feedback->created_at))->format('m/d/Y h:i A'),
            'updated_at' => Carbon::parse($this->gettime($feedback->updated_at))->format('m/d/Y h:i A')
        ];
    }

    public function includeTherapist($selectedTherapist)
    {
        $therapist = $selectedTherapist->therapist;
        return $this->item($therapist, new TherapistTransformer());
    }

    public function gettime($datetime){
        $utilityClass = new Utility();
        if($this->request->has('timezone') && $this->request->get('timezone') !== config('app.timezone')){
            $from = config('app.timezone');
            $to = $this->request->get('timezone');
            return $utilityClass->convertTimeZone($datetime, $from, $to);
        }
        return $datetime;
    }
}
