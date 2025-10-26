<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
     //  Show all services
     public function service()
    {
        $services = Service::latest()->get();
        return view('backend.service.service', compact('services'));
    }

    // 🔹 Store new service
    public function store(Request $request)
    {
        $service = new Service();

        $service->icon = $request->icon;
        $service->title = $request->title;
        $service->description = $request->description;

        // 🔸 Image Upload
        if ($request->hasFile('image')) {
            $imageName = rand() . '-service-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('backend/images/service/'), $imageName);
            $service->image = $imageName;
        }

        $service->starting_price = $request->starting_price;

        // 🔸 What You Get
        $service->get_icon = $request->get_icon;
        $service->get_title = $request->get_title;
        $service->get_description = $request->get_description;

        // 🔸 Workflow
        $service->workflow_title = $request->workflow_title;
        $service->workflow_description = $request->workflow_description;
        $service->workflow_deadline = $request->workflow_deadline;

        // 🔸 Technologies (converted from comma-separated input)
        $service->frontend = $this->cleanTechInput($request->frontend);
        $service->backend = $this->cleanTechInput($request->backend);
        $service->database = $this->cleanTechInput($request->database);

        $service->save();

        return redirect()->back()->with('success', '✅ Service Added Successfully!');
    }

    // 🔹 Update existing service
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $service->icon = $request->icon;
        $service->title = $request->title;
        $service->description = $request->description;

        // 🔸 Replace image if new one is uploaded
        if ($request->hasFile('image')) {
            if ($service->image && file_exists(public_path('backend/images/service/' . $service->image))) {
                unlink(public_path('backend/images/service/' . $service->image));
            }
            $imageName = rand() . '-serviceup-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('backend/images/service/'), $imageName);
            $service->image = $imageName;
        }

        $service->starting_price = $request->starting_price;

        // 🔸 What You Get
        $service->get_icon = $request->get_icon;
        $service->get_title = $request->get_title;
        $service->get_description = $request->get_description;

        // 🔸 Workflow
        $service->workflow_title = $request->workflow_title;
        $service->workflow_description = $request->workflow_description;
        $service->workflow_deadline = $request->workflow_deadline;

        // 🔸 Technologies (cleaned)
        $service->frontend = $this->cleanTechInput($request->frontend);
        $service->backend = $this->cleanTechInput($request->backend);
        $service->database = $this->cleanTechInput($request->database);

        $service->update();

        return redirect()->back()->with('success', '✅ Service Updated Successfully!');
    }

    // 🔹 Delete service
    public function delete($id)
    {
        $service = Service::findOrFail($id);

        if ($service->image && file_exists(public_path('backend/images/service/' . $service->image))) {
            unlink(public_path('backend/images/service/' . $service->image));
        }

        $service->delete();

        return redirect()->back()->with('success', '🗑️ Service Deleted Successfully!');
    }

    // 🧩 Helper: Clean technology input (remove null, brackets, quotes)
    private function cleanTechInput($value)
    {
        if (is_array($value)) {
            $value = array_filter($value, fn($v) => !empty($v) && strtolower($v) !== 'null');
            return implode(', ', $value);
        }
        return $value ? trim($value) : null;
    }
}
