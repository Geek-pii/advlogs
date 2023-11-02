<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Info;
use App\Helper\Breadcrumb;
use App\Helper\TranslateUrl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PageRepository;
use Illuminate\Support\Facades\View;
use App\Repositories\ContactRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\FaqCategoryRepository;

class PageController extends Controller
{
    protected $page;
    protected $faq_category;
    protected $contact;
    protected $department;

    public function __construct(
        PageRepository        $page,
        FaqCategoryRepository $faq_category,
        ContactRepository     $contact,
        DepartmentRepository  $department
    ) {
        $this->page = $page;
        $this->faq_category = $faq_category;
        $this->contact = $contact;
        $this->department = $department;
    }

    public function index(Request $request)
    {
        $page = $this->page->findBySlug('/', [
            'parentBlocks' => function ($with) {
                $with->with('translations');
            },
            'translations',
            'blocks' => function ($with) {
                $with->with('translations');
            },
            'meta'
        ]);
        $info = Info::first();
        // dd($page);
        $blocks = [];

        if ($page->parentBlocks->count()) {
            $blocks = $page->parentBlocks->groupBy('code');
        }

        foreach ($page->translations as $translation) {
            TranslateUrl::addWithLink($translation->locale, "/{$translation->locale}");
        }

        $metadata = $page->meta;

        if (View::exists(THEME_PATH_VIEW . ".{$page->theme}")) {
            $with = [];

            if ($page->theme == 'home') {
                //

                $with = [
                    //
                ];
            }

            return view(THEME_PATH_VIEW . ".{$page->theme}", compact('page', 'blocks', 'metadata','info'))->with($with);
        }

        return redirect()->to('/', 301);
    }

    public function show(Request $request, $slug)
    {
        $key = request()->type;
        $with = [
            'translations',
            'parentBlocks',
            'parentBlocks.children',
            'meta'
        ];

        $page = $this->page->findBySlug($slug, $with);

        $blocks = [];

        if (isset($page->parentBlocks) && $page->parentBlocks->count()) {
            $blocks = $page->parentBlocks->groupBy('code');
        }

        if (isset($page->translations)) {
            foreach ($page->translations as $translation) {
                $url = $translation->slug ?: COMING_SOON;
                TranslateUrl::addWithLink($translation->locale, "/{$translation->locale}/{$url}");
            }
        }

        $metadata = $page->meta;

        if (!$metadata || !$metadata->title) {
            $metadata = (object)[
                'title' => $page->title,
                'description' => $page->description,
            ];
        }

        if (!empty($page->parent_id)) {
            $parent = $page->parent;
            if ($parent) {
                Breadcrumb::add($parent->title, $parent->url);
            }
        }

        Breadcrumb::add($page->title);

        if (View::exists(THEME_PATH_VIEW . ".{$page->theme}")) {
            $with = [];

            switch ($page->theme) {
                case 'sign-up': {
                        if (auth()->guard('account')->check()) {
                            return redirect()->route('user.dashboard');
                        }
                    }
                    break;

                case 'faq': {
                        $faq_categories = $this->faq_category->datatable()
                            ->active()
                            ->where('level', 0)
                            ->orderBy('position')
                            ->with([
                                'children' => function ($with) {
                                    $with->active()->orderBy('position')->with([
                                        'faqs' => function ($withFaqs) {
                                            $withFaqs->active()->orderBy('position')->withTranslation();
                                        }
                                    ]);
                                }
                            ])
                            ->withTranslation()
                            ->get();

                        $with = [
                            'faq_categories' => $faq_categories,
                        ];
                    }
                    break;

                case 'contact-us': {
                        $departments = $this->department->datatable()
                            ->active()
                            ->orderBy('position')
                            ->get();

                        $with = [
                            'departments' => $departments,
                        ];
                    }
                    break;

                default:
                    # code...
                    break;
            }
            return view(
                THEME_PATH_VIEW . ".{$page->theme}",
                compact(
                    'page',
                    'blocks',
                    'metadata',
                    'key'
                )
            )->with($with);
        }

        abort(404);
    }
    /**
     * Business-client 
     */
    public function business(){
        return view('themes.business-client');
    }
     /**
     * Carriers 
     */
    public function carrier(){
        return view('themes.carrier');
    }
      /**
     *Personal Vehicle
     */
    public function vehicle(){
        return view('themes.personal-vehicles');
    }
      /**
     *Advantage Logistics
     */
    // public function logistics(Request $request){
    //     $validate = $request->validate([
    //         'first_name'=>'required|min:3',
    //         'last_name'=>'required|min:3',
    //         'email'=>'required|unique:users',
    //         'phone'=>'min:11',
    //         'send_email'=>['required', Rule::notIn(0)],
    //         'message'=>'required|min:5'
    //     ]);
    //     return redirect(url('/'));
    // }
    public function info(){
        dd('ok');
    }
     
}
