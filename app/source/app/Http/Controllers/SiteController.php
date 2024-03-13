<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Newsletter;
use App\Models\Post;
use App\Mail\MailDynamic;
use App\Models\Customer;
use App\Models\Message;
use App\Models\Metric;
use App\Models\PostCollection;
use App\Models\PostTag;
use App\Models\Review;
use App\Models\Page;
use App\Models\Menu;
use App\Models\AboutSetting;
use App\Models\ServiceSetting;
use App\Models\PageSetting;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use stdClass;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{

    private function getTags()
    {
        return  PostTag::where('status', 'Published')->limit(10)->get();
    }
    private function getCategories()
    {
        return  PostCollection::where('status', 'Published')->withCount([
            'posts' => function ($query) {
                $query->where('status', 'Published');
            }
        ])->get();
    }



    private function getLastPosts()
    {
        return Post::orderBy('created_at', 'DESC')->where('status', 'Published')->with('collection')->limit(3)->get();
    }

    private function getPopularPosts()
    {
        return Post::orderBy('views', 'DESC')->where('status', 'Published')->with('collection')->limit(3)->get();
    }

    public function collection($slug)
    {
        $category = PostCollection::where('status', 'Published')->where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->orderBy('created_at', 'DESC')->where('status', 'Published')->paginate(8);


        $popularPosts = $this->getPopularPosts();

        $tags = $this->getTags();
        $lastPosts = $this->getLastPosts();
        $categories = $this->getCategories();


        return view('category', compact('category', 'categories', 'posts', 'lastPosts', 'tags', 'popularPosts'));
    }


    public function tag($slug)
    {
        $category = PostTag::where('status', 'Published')->where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->orderBy('created_at', 'DESC')->where('status', 'Published')->paginate(8);


        $popularPosts = $this->getPopularPosts();

        $tags = $this->getTags();
        $lastPosts = $this->getLastPosts();
        $categories = $this->getCategories();


        return view('category', compact('category', 'categories', 'posts', 'lastPosts', 'tags', 'popularPosts'));
    }

    public function home()
    {

        $page =  PageSetting::findOrFail(1);
        $reviews =  Review::orderBy('created_at', 'DESC')->where('status', 'Published')->limit(20)->get();
        $services =  Service::orderBy('order', 'DESC')->where('status', 'Published')->where('parent_id', null)->limit(10)->get();
        $sliders =  Slider::orderBy('order', 'DESC')->where('status', 'Published')->limit(10)->get();
        $metrics =  Metric::orderBy('order', 'DESC')->where('status', 'Published')->limit(10)->get();
        $customers =  Customer::orderBy('order', 'DESC')->where('status', 'Published')->limit(30)->get();
        // return $sliders;
        return view('home', compact('reviews', 'services', 'sliders', 'metrics', 'customers', 'page'));
    }

    public function about()
    {
        $page =  AboutSetting::findOrFail(1);

        // return $page;

        return view('about', compact('page'));
    }


    public function construction()
    {
        return view('construction');
    }

    public function cabinetry()
    {
        return view('cabinetry');
    }






    public function services()
    {
        $page =  PageSetting::findOrFail(2);
        $services =  Service::orderBy('order', 'DESC')->where('status', 'Published')->where('parent_id', null)->with(['child' => function ($query) {
            $query->orderBy('order', 'DESC');
        }])
            ->limit(10)->get();

        // return $services;

        return view('services', compact('page', 'services'));
    }

    public function blog()
    {
        $page =  PageSetting::findOrFail(3);
        $posts = Post::orderBy('created_at', 'DESC')->where('status', 'Published')->with('tags')->with('collection')->withCount('comments')->paginate(7);
        return view('blog', compact('posts', 'page'));
    }

    public function page($slug)
    {
        $page = Page::where('status', 'Published')->where('slug', $slug)->firstOrFail();

        if ($page->redirect) {
            return Redirect::to($page->redirect, 301);
        }
        $template = $page->template;

        return view('pages.' . $template, compact('page'));
    }

    public function post($postSlug)
    {

        $post = Post::where('status', 'Published')
            ->where('slug', $postSlug)
            ->with('collection')
            ->firstOrFail();

        if ($post->redirect) {
            return Redirect::to($post->redirect, 301);
        }

        Post::where('slug', $postSlug)->update([
            'views' => $post->views + 1
        ]);

        $lastPosts = $this->getLastPosts();

        return view('post', compact('post', 'lastPosts'));
    }


    public function comment()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } else {
            $comment = Comment::create(request()->all());
            if ($comment) {
                return response()->json([
                    'message' => 'Your comment has been registered successfully and will be displayed after checking by the site administrator',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Something went wrong, please try again',
                ], 400);
            }
        }
    }

    public function contact()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'job' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } else {

            // $secret = env('RECAPTCHA_SECRET_KEY');

            // $result = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            //     'secret' => $secret,
            //     'response' => request()->get('g-recaptcha-response')
            // ]);
            // if ($result->status() != 200) {
            //     return response()->json([
            //         'message' => request()->input('local') == 'en' ?  'There is a problem, please try again.' : 'Hay un problema, inténtalo de nuevo.'
            //     ], 500);;
            // }

            $message = Message::create(request()->all());

            if (request()->input('newsletter')) {
                $this->newsletterSubmitEmail(request()->input('email'));
            }

            $data = new stdClass;
            $data->name = request()->input('name');
            $data->email = request()->input('email');
            $data->interested = request()->input('interested');
            $data->job = request()->input('job');

            $content = new stdClass;
            $content->template = 'welcome';
            $content->email = request()->input('email');
            $content->subject = 'Welcome';
            $contact = Mail::send(new MailDynamic($content, $data));

            $content->template = 'message';
            $data->message = request()->input('message');
            $content->subject = 'New Message';
            $content->email = env('MAIL_FROM_ADDRESS');
            $contact = Mail::send(new MailDynamic($content, $data));

            if ($contact == 0) {
                return response()->json([
                    'message' => "We have received your message and will contact you as soon as possible."
                ], 200);
            }
            return response()->json([
                'message' =>  'There is a problem, please try again.'
            ], 500);
        }
    }




    public function newsletterSubmit()
    {

        $validator = Validator::make(request()->all(), [
            'email' => 'required|email'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } else {

            return  $this->newsletterSubmitEmail(request()->input('email'));
        }
    }


    public function newsletterSubmitEmail($email)
    {
        if (DB::table('newsletters')->where('email', $email)->where('status', 'Subscribe')->count()) {
            return response()->json([
                'errors' => ['email' => ['This email has already been registered.']],
            ], 422);;
        }

        if (DB::table('newsletters')->where('email', $email)->where('status', 'Unsubscribe')->count()) {
            DB::table('newsletters')->where('token', $email)->update(['status' => 'Subscribe']);
            return response()->json([
                'message' => 'Your email has been successfully added to the newsletter.',
            ], 200);;
        }

        $token = Str::random(60);
        $data = new stdClass;
        $data->token = $token;
        $content = new stdClass;
        $content->template = 'newsletter';
        $content->email = request()->input('email');
        $content->subject = 'Subscribe to newsletter';

        Mail::send(new MailDynamic($content, $data));

        $newsletter = Newsletter::create(array_merge(request()->all(), ['token' => $token]));
        // return $newsletter;
        if ($newsletter) {
            return response()->json([
                'message' => 'Your email has been successfully added to the newsletter.'
            ], 200);;
        }
        return response()->json([
            'message' => 'error.'
        ], 500);
    }

    public function unsubscribe($token)
    {
        return view('unsubscribe', compact('token'));
    }


    public function unsubscribeConfirm($token)
    {

        $subscriber = DB::table('newsletters')->where('token', $token);

        if ($subscriber) {
            $subscriber->update(['status' => 'unsubscribe']);
        }

        return redirect('/');
    }
}
