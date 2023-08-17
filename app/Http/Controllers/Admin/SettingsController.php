<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageContent;
use App\Models\ThemeComponent;
use Database\Seeders\ThemeComponentSeeder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\Component;

use Rawilk\Settings\Models\Setting;

class SettingsController extends Controller
{
    public function privacyPolicy(){
        return view('admin.settings.cms.privacy');
    }

    public function pages(Request $request){
        $title = "All pages";
        $data = Page::all();
        if($request->has('path')){
            $request->validate(
                [
                    'title' => 'required|unique:pages,title',
                    'path' => 'required|unique:pages,path',
                ]
            );
            Page::create([
                'path' => $request->input('path'),
                'title' => $request->input('title'),
            ]);

            return redirect()->route('admin.setting.pages')->with('success','Page successfully saved');
        }
        return view('admin.settings.cms.pages', compact('title','data'));
    }

    public function pageStore(){
        $title = "All pages";
        $data = Page::all();
        return view('admin.settings.cms.pages', compact('title','data'));
    }

    public function pageBuilder($id){
        $page = Page::findOrFail($id);
        $title = $page->title;
        $data = $page->contents;
        $components = ThemeComponent::all();
        return view('admin.settings.cms.page_builder', compact('title','components','data','page'));
    }

    public function toggleTheme(){
        $is_dark = settings('is_dark') == 'yes';
        if($is_dark){
            settings(['is_dark' => 'no']);
        }else{
            settings(['is_dark' => 'yes']);
        }

        return redirect()->back()->with('success', 'Theme updated');

    }

    public function pageContentStore(Request $request){
        $id = $request->input('component_id');
        $page_id = $request->input('page_id');

        $com = ThemeComponent::findOrFail($id);
        $is_shortcode = Str::contains($com->content, 'is_shortcode');

        PageContent::create([
            'page_id' => $page_id,
            'content' => $com->content,
            'title' => $com->title,
            'is_shortcode' => $is_shortcode,
        ]);

        return redirect()->back()->with('success', 'Page content successfully added');

    }

    public function pageContentUpdate(Request $request){
//        return $request->all();
        $id = $request->input('id');

        $content = PageContent::findOrFail($id);
        $content->content = $request->input('content') ?? $content->content;
        $content->title = $request->input('title');
        $content->level = $request->input('level') ?? 0;
        $content->save();

        return redirect()->back()->with('success', 'Page content successfully updated');

    }

    public function components(){
        $title = "Page Components";
        $data = ThemeComponent::latest()->get();
        return view('admin.settings.cms.components', compact('title','data'));
    }

    public function allBlocks(){
        $title = "All Component Blocks";
        return view('frontpage.builder.index', compact('title'));
    }

    public function saveComponent(Request $request){
        $request->validate(
            [
                'title' => 'required|unique:theme_components,title',
                'content' => 'required'
            ]
        );

        ThemeComponent::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);


        return redirect()->back()->with('success', 'Component successfully added');

    }

    public function themeSetting(Request $request){
        $title = "Theme setting";
        $page = Page::first();
        $data = $page->contents;
        $active = $request->get('active') ?? 'nav';
        $countries = [];
        $active_methods = [];
        $components = ThemeComponent::all();
        return view('admin.settings.cms.theme_settings', compact('title','active_methods','countries','active','components','page','data'));
    }

    public function cssEditor(Request $request){
        $title = "CSS Editor";
        $customCssFilePath = public_path('assets/css/custom_style.css');
        $customCssContent = file_exists($customCssFilePath) ? file_get_contents($customCssFilePath) : '';
        return view('admin.settings.cms.css_editor', compact('title','customCssContent'));
    }

    public function headFoot(Request $request){
        if($request->has('head_section')){
            settings()->set('head_section', $request->input('head_section'));
            settings()->set('foot_section', $request->input('foot_section'));
        }
        return view('admin.settings.cms.head_foot');
    }
    public function menuSetup(Request $request){
        if($request->has('frontpage_menu')){
            $validatedData = $request->validate([
                'frontpage_menu' => 'required|json',
            ]);

            settings()->set('frontpage_menu', $validatedData['frontpage_menu']);

            return redirect()->back()->with('success', 'Menu successfully updated');

        }
        return view('admin.settings.cms.menu_setup');
    }

    public function cssEditorSave(Request $request){
        $customCssFilePath = public_path('assets/css/custom_style.css');
        $customCssContent = $request->input('custom_css');

        // Save the updated CSS to the custom.css file
        file_put_contents($customCssFilePath, $customCssContent);

        return redirect()->back()->with('success', 'Custom CSS updated successfully.');
    }


    public function editComponents($id){
        $component = ThemeComponent::findOrFail($id);
        $content = $component->content;
        $type = "component";
        $title = $component->title;
        return view('admin.settings.cms.component_editor', compact('title','type','id','component','content'));
    }

    public function duplicateComponent($id){
        $component = ThemeComponent::findOrFail($id);
        $newComponent = $component->replicate();
        $newComponent->title = $component->title." duplicated";
        $newComponent->save();
        return redirect()->back()->with('success', 'Component successfully duplicated');
    }
    public function deleteComponent($id){
        $component = ThemeComponent::findOrFail($id);
        $component->delete();
        return redirect()->back()->with('success', 'Component successfully deleted');
    }

    public function destroyPage($id){
        $page = Page::findOrFail($id);
        $page->delete();
        return redirect()->back()->with('success', 'Page successfully deleted');
    }

    public function destroyPageContent($id){
        $page = PageContent::findOrFail($id);
        $page->delete();
        return redirect()->back()->with('success', 'Page content successfully deleted');
    }

    public function saveContent(Request $request){

        $type = $request->input('type');
        $id = $request->input('id');

        if($type == 'component'){
            $content = ThemeComponent::find($id);
            $content->content = $request->input('content');
            $content->title = $request->input('title');

            $content->save();
        }else{
            $page = $this->updatePage($request->input('content'), $id);
        }

        return $this->successResponse('content successfully saved', []);

    }

    public function editPage($id)
    {
        $page = Page::findOrFail($id);
        $delimiter = '&nbsp;&nbsp;&nbsp;'; // Adjust the delimiter based on your needs
        $type = "page";
        $title = $page->title;
        $content = $page->contents->pluck('content')->implode($delimiter);


        return view('admin.settings.cms.component_editor', compact('title','type','id','content'));
  }

    public function updatePage($content, $id)
    {
        $page = Page::findOrFail($id);
        $editedContent = $content;


        $delimiter = '&nbsp;&nbsp;&nbsp;';

        // Use a regular expression to extract the title from the comment
        $pattern = '/<!--\<title\>(.*?)\<\/title\>-->/s';
        preg_match_all($pattern, $editedContent, $matches);

        $titles = $matches[1]; // Extracted titles
        $contents = explode($delimiter, $editedContent); // Split the edited content


        // Delete existing contents associated with the page
        $page->contents()->delete();

        // Create new Content model instances for each individual content
        foreach ($contents as $index => $content) {
            $title = isset($titles[$index]) ? $titles[$index] : ''; // Assign empty string if title not found

            $page->contents()->create([
                'title' => $title,
                'content' => $content
            ]);
        }

        // Other logic...

        return $page;
//        return redirect()->back()->with('success', 'Page updated successfully.');
    }


    public function toggle($modelId): JsonResponse
    {

        if(request('model') == 'Setting'){
            return $this->toggleSetting(request());
        }

        $modelClass = 'App\\Models\\' . request('model');

        if (!class_exists($modelClass)) {
            return response()->json(['success' => false]);
        }

        $model = $modelClass::find($modelId);

        if ($model) {
            $field = request('field');
            $value = request('value');
            // Update the model field value here
            $model->$field = $value;
            $model->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    public function toggleSetting($request): JsonResponse
    {
        $value = $request->get('value') ? 'yes' : 'no';
        settings()->set($request->get('field'), $value);
        return response()->json(['success' => true, 'data' => $value]);
    }

}
