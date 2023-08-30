<?php

namespace App\Repositories\Admin;

use App\Models\EmailSignUp;
use App\Repositories\BaseRepository;

class EmailSignUpRepository extends BaseRepository {

    public function model()
    {
        return EmailSignUp::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        if (isset($searchParams['search'])) {
            $search = $searchParams['search'];
            $query->where('email', 'like', "$search%");
        }

        $query->orderBy('created_at', 'desc');
        $emails = $query->paginate(10);

        return view('admin.pages.email-sign-up.index', compact('emails'));
    }
}
