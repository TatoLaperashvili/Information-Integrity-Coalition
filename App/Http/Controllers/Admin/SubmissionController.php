<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Submission;
use App\Models\Subscription;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\exportPostSubmission;
use App\Exports\updatepostsexport;
use App\Exports\updatexport;


class SubmissionController extends Controller
{
     public function index(){
        $post = null;
        if (isset(request()->all()['post_id'])) {
            $post = Post::where('id', request()->all()['post_id'])->with('translations')->first();
           
            $submissions = Submission::orderBy('created_at', 'desc')->where('post_id', request()->all()['post_id'])->with('post')->paginate(10);
        }
        else {
           
          $submissions = Submission::orderBy('created_at', 'desc')->with('post')->paginate(15);
            
        }
        return view('admin.submissions.index', compact(['submissions', 'post']));

    }
   public function contact(){
        $post = null;
        if (isset(request()->all()['post_id'])) {
            $post = Post::where('id', request()->all()['post_id'])->with('translations')->first();
           
            $submissions = Submission::orderBy('created_at', 'desc')->where('post_id', request()->all()['post_id'])->with('post')->paginate(15);
        }
        else {
           
            $submissions = Submission::where('section_type_id',2)->orWhere('section_type_id', NULL)->orderBy('created_at', 'desc')->with('post')->paginate(15);
            
        }
        return view('admin.submission_contact.index', compact(['submissions', 'post']));

    }
     public function update(){
        $post = null;
       
        if (isset(request()->all()['post_id'])) {
           
            $post = Post::where('id', request()->all()['post_id'])->with('translations')->first();
           
           
            $submissions = Submission::where('section_type_id', 7)->orderBy('created_at', 'desc')->where('post_id', request()->all()['post_id'])->with('post')->paginate(15);
        }
        else {
            $submissions = Submission::where('section_type_id', 7)->orderBy('created_at', 'desc')->with('post')->paginate(15);
        }

        return view('admin.update_submission.index', compact(['submissions', 'post' ]));
    }
   public function updateposts(){
        $post = null;
       
        if (isset(request()->all()['post_id'])) {
           
            $post = Post::where('id', request()->all()['post_id'])->with('translations')->first();
           
           
            $submissions = Submission::where('section_type_id', 7)->orderBy('created_at', 'desc')->where('post_id', request()->all()['post_id'])->with('post')->paginate(15);
        }
        else {
             $submissions = Submission::where('section_type_id', 7)->orderBy('created_at', 'desc')->where('post_id', request()->all()['post_id'])->with('post')->paginate(15);
        }
			
        return view('admin.update_submission.updatepost', compact(['submissions', 'post' ]));
    }
        public function updatepostsexport($id){
          
           $file_name = 'exportservice'.date('Y_m_d_H_i_s').'.xlsx';
        if (isset(request()->all()['post_id'])) {
           
            $submissions = Submission::where('section_type_id', 7)->orderBy('created_at', 'desc')->where('post_id', request()->all()['post_id'])->with('post')->paginate(20);
        }
        else {
          	
            $submissions = Submission::where('post_id' , $id)->orderBy('created_at', 'desc')->get();
          
        }
        return Excel::download(new updatepostsexport($submissions), $file_name  );
      
        return view('admin.update_submission.updatepost', compact(['submissions', 'post' ]));
    }
    public function updatexport(){
        $file_name = 'exportservice'.date('Y_m_d_H_i_s').'.xlsx';
        if (isset(request()->all()['post_id'])) {
           
            $submissions = Submission::where('section_type_id', 7)->orderBy('created_at', 'desc')->where('post_id', request()->all()['post_id'])->with('post')->paginate(20);
        }
        else {
            $submissions = Submission::where('section_type_id', 7)->orderBy('created_at', 'desc')->with('post')->paginate(20);
        }
        return Excel::download(new updatexport($submissions), $file_name  );
      
    }
    public function exportPostSubmission(){
        $file_name = 'exportcontact'.date('Y_m_d_H_i_s').'.xlsx';
        if (isset(request()->all()['post_id'])) {
           
            $submissions = Submission::orderBy('created_at', 'desc')->where('post_id', request()->all()['post_id'])->with('post')->paginate(20);
        }
        else {
           
            $submissions = Submission::where('section_type_id', 2)->orWhere('section_type_id', NULL)->orderBy('created_at', 'desc')->with('post')->paginate(20);
            
        }
        return Excel::download(new exportPostSubmission($submissions), $file_name  );
      
    }
    public function subscribe()
    {
        $subscribers = Subscription::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.subscribers.index', compact(['subscribers']));
    }
 public function updateshow($id){
        $submission = Submission::orderBy('created_at', 'desc')->with('post', 'post.translations', 'post.parent', 'post.parent.translations')->where('id', $id)->first();
       
        $submission->seen = 1;
        $submission->save();
        
        return view('admin.update_submission.show', compact(['submission']));

    }
    public function contactshow($id){
        $submission = Submission::orderBy('created_at', 'desc')->with('post', 'post.translations', 'post.parent', 'post.parent.translations')->where('id', $id)->first();
       
        $submission->seen = 1;
        $submission->save();
        
        return view('admin.submission_contact.show', compact(['submission']));

    }
    public function show($id)
    {
        $submission = Submission::orderBy('created_at', 'desc')->with('post', 'post.translations', 'post.parent', 'post.parent.translations')->where('id', $id)->first();
        $submission->seen = 1;
        $submission->save();

        return view('admin.submissions.show', compact(['submission']));

    }

    public function destroy($id)
    {
        Submission::where('id', $id)->delete();

        return back();

    }

    public function destroysubscribe($id)
    {
        Subscription::where('id', $id)->delete();

        return back();

    }
}
