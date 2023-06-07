<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class updatepostsexport implements FromView
{
    protected  $submissions;

    function __construct($submissions)
    {
        $this->submissions = $submissions;
    }
    public function view(): View
    {
        return view('admin.update_submission.updatepostexport', [
          
            'submissions' => $this->submissions
           
        ]);
    }
}
