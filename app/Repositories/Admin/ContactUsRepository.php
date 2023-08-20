<?php

namespace App\Repositories\Admin;

use App\Models\ContactUs;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ContactUsRepository extends BaseRepository {
    public function model()
    {
        return ContactUs::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        if (isset($searchParams['name'])) {
            $search = $searchParams['name'];
            $query->where('name', 'like', "$search%");
        }
        if (isset($searchParams['email'])) {
            $search = $searchParams['email'];
            $query->where('email', 'like', "$search%");
        }
        $query->orderBy('id', 'desc');
        $contacts = $query->paginate(10);
        return view('admin.pages.contact-us.index', compact('contacts'));
    }

    public function deleteFile($id) {
        $contact = $this->model->find($id);
        if ($contact) {
            File::delete('upload/viewer/contact_us/' . $contact->file_name);
            $this->model->where('id', $id)->delete();
        }
    }

    public function deleteFiles($params) {
        if (isset($params['contact-check'])) {
            $contacts = $this->model->whereIn('id', $params['contact-check'])->get();
            foreach ($contacts as $contact) {
                File::delete('upload/viewer/contact_us/' . $contact->file_name);
            }
            $this->model->whereIn('id', $params['contact-check'])->delete();
        }
    }

    public function downloadFile($id) {
        $contact = $this->model->find($id);
        return Storage::disk('s3')->download('contact-us/' . $contact->file_name, $contact->file);
    }
}
