<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuSection;
use App\Models\Section;
use App\Models\Slug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    /**
     * index
     *  Lists Sections
     *
     * @return void
     */
    public function index()
    {

        $sections = Section::where('parent_id', null)->orderBy('order', 'asc')->with('children')->get();
        // dd($sections);

        return view('admin.sections.list', compact('sections'));
    }

    public function create()
    {
        $sectionTypes = sectionTypes();

        $sections = Section::with('translations')->get();

        $home = Section::where('type_id', 1)->with('translations')->count();

        $menuTypes = menuTypes();

        return view('admin.sections.add', compact(['sectionTypes', 'sections', 'menuTypes', 'home']));
    }

    public function store(Request $request)
    {

        $values = $request->all();

      
        $values['additional'] = getAdditional($values, config('sectionAttr.additional'));

        foreach (config('app.locales') as $locale) {
            if ($values[$locale]['slug'] != '') {
                $values[$locale]['slug'] = str_replace(' ', '-', $values[$locale]['slug']);
            }
          
            if (isset($values[$locale]['cover']) && $values[$locale]['cover'] != '') {
                if ($values[$locale]['cover']->getSize() > 2097152) {
                    return redirect()->back()->with('error', 'File size is greater than 2MB.');
                }
                $newimageName = uniqid().'.'.$values[$locale]['cover']->getClientOriginalExtension();
                $orignalName = $values[$locale]['cover']->getClientoriginalname();
                $values[$locale]['cover']->move(config('config.image_path'), $newimageName);
                $values[$locale]['cover'] = '';
                $values[$locale]['cover'] = $newimageName;
                $values[$locale]['covername'] = $orignalName;
                if (isset($values[$locale]['old_cover'])) {
                    // Delete the old file if it exists
                    Storage::delete(config('config.image_path').$values[$locale]['old_cover']);
                }
            }
            $fullslug[$locale] = $locale.'/'.$values[$locale]['slug'];

            $values[$locale]['locale_additional'] = getAdditional($values[$locale], config('sectionAttr.translateable_additional'));
        }
        $section = Section::create($values);
        if (isset($values['menu_types']) && $values['menu_types'] != '') {
            foreach ($values['menu_types'] as $type) {
                MenuSection::create([
                    'section_id' => $section->id,
                    'menu_type_id' => $type,
                ]);
            }
        }
        foreach (config('app.locales') as $locale) {
            $section->slugs()->create([
                'fullSlug' => $fullslug[$locale],
                'slugable_id' => $section->id,
                'locale' => $locale,
            ]);
        }

        return Redirect::route('section.list', [app()->getLocale()]);
    }

    public function edit($id)
    {
        $sectionTypes = sectionTypes();

        $home = Section::where('type_id', 0)->with('translations')->count();
        $section = Section::where('id', $id)->with(['translations', 'menuTypes'])->first();
        $sections = Section::with('translations')->where('id', '!=', $section->id)->where('parent_id', '!=', $section->id)->orWhere('parent_id', null)->get();
        $menuTypes = menuTypes();

        return view('admin.sections.edit', compact(['sections', 'section', 'sectionTypes', 'menuTypes', 'home']));
    }

    public function update($id, Request $request)
    {

        $values = $request->all();

        Validator::validate($values, [
            'type_id' => 'required',
        ]);
        $section = Section::where('id', $id)->with('translations')->first();

        MenuSection::where('section_id', $id)->delete();

        Slug::where('slugable_id', $id)->delete();

       
        $values['additional'] = getAdditional($values, config('sectionAttr.additional'));
        foreach (config('app.locales') as $locale) {
            if ($values[$locale]['slug'] != $section[$locale]->slug) {

                $values[$locale]['slug'] = str_replace(' ', '-', $values[$locale]['slug']);
            }
            if (isset($values[$locale]['cover']) && $values[$locale]['cover'] != '') {
                if ($values[$locale]['cover']->getSize() > 2097152) {
                    return redirect()->back()->with('error', 'File size is greater than 2MB.');
                }
                $newimageName = uniqid().'.'.$values[$locale]['cover']->getClientOriginalExtension();
                $orignalName = $values[$locale]['cover']->getClientoriginalname();
                $values[$locale]['cover']->move(config('config.image_path'), $newimageName);
                $values[$locale]['cover'] = '';
                $values[$locale]['cover'] = $newimageName;
                $values[$locale]['covername'] = $orignalName;
                
            }elseif(isset($values[$locale]['old_cover']) && $values[$locale]['old_cover'] != ''){
                $values[$locale]['cover'] = $values[$locale]['old_cover'];
            }
            
            $section->slugs()->create([
                'fullSlug' => $locale.'/'.$values[$locale]['slug'],
                'slugable_id' => $id,
                'locale' => $locale,
            ]);

            $values[$locale]['locale_additional'] = getAdditional($values[$locale], config('sectionAttr.translateable_additional'));

        }

        $section = Section::find($id)->update($values);

        if (isset($values['menu_types']) && $values['menu_types'] !== null) {
            foreach ($values['menu_types'] as $type) {
                MenuSection::create([
                    'section_id' => $id,
                    'menu_type_id' => $type,
                ]);
            }
        }

        return  redirect()->back();
    }

    public function destroy($id)
    {
        $sec = Section::find($id)->with('translations')->first();
        foreach (Section::find($id)->slugs()->get() as $slug) {
            Slug::where('fullSlug', 'LIKE', $slug->fullSlug.'%')->delete();
        }

        Section::find($id)->slugs()->delete();
        Section::find($id)->delete();

        return Redirect::route('section.list', [app()->getLocale()]);
    }

    public function arrange(Request $request)
    {
        $array = $request->input('orderArr');
        Section::rearrange($array);

        return ['error' => false];
    }

    public function DeleteCover(Request $request)
    {

        $lang = $request->lang;
        $que = $request->que;
        $section = Section::where('id', $que)->whereHas('translations', function ($q) use ($lang) {
            $q->where('locale', $lang);
        })->with('translation')->first();

        $localeAdditional = $section->$lang->locale_additional;
	
        if (isset($localeAdditional['cover']) && file_exists(config('config.image_path').$localeAdditional['cover'])) {
            unlink(config('config.image_path').$localeAdditional['cover']);
            unset($localeAdditional['cover']);
        }
        $section->$lang->locale_additional = $localeAdditional;
        $section->save();
        return response()->json(['success' => 'Files Deleted']);
    }

     public function CheckSlug(Request $request)
     {

        $locale = $request->locale;

        $slug = $request->slug;

        $id = $request->id;

        $fullSlug = $locale.'/'.$slug;

        if (Slug::where('fullSlug', $fullSlug)->where('locale', $locale)->where('slugable_id', '!=', $id)->exists()) {

            return response()->json(['error' => 'This slug already exists'], 401);
        } else {
            return response()->json(['message' => 'Slug is available'], 200);
        }

        return response()->json(['Slug' => $slug]);
     }
}
