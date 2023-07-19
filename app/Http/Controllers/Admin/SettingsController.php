<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageContent;
use App\Models\ThemeComponent;
use Database\Seeders\ThemeComponentSeeder;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class SettingsController extends Controller
{
    public function privacyPolicy(){
        return view('admin.settings.cms.privacy');
    }

    public function pages(){
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

    public function pageContentStore(Request $request){
        $id = $request->input('component_id');
        $page_id = $request->input('page_id');

        $com = ThemeComponent::findOrFail($id);

        PageContent::create([
            'page_id' => $page_id,
            'content' => $com->content,
            'title' => $com->title
        ]);

        return redirect()->back()->with('success', 'Page content successfully added');

    }

    public function components(){
        $title = "Page Components";
        $data = ThemeComponent::latest()->get();
        return view('admin.settings.cms.components', compact('title','data'));
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
}
