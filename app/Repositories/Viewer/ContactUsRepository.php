<?php

namespace App\Repositories\Viewer;

use App\Models\BannerContact;
use App\Models\Config;
use App\Models\ContactUs;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\File;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactUsRepository extends BaseRepository {
    public function model()
    {
        return BannerContact::class;
    }

    public function index() {
        $query = $this->model->where('status', 1);
        $bannerContact = $query->first();
        return view('viewer.pages.contact_us', compact('bannerContact'));
    }

    public function sendMail($params) {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer();
        try {
            $mail->isSMTP();
            $mail->Host = env('PHPMAILER_HOST');
            $mail->SMTPAuth   = env('PHPMAILER_SMTPAUTH');
            $mail->Username   = env('PHPMAILER_USERNAME');
            $mail->Password   = env('PHPMAILER_PASSWORD');
            $mail->SMTPSecure = env('PHPMAILER_SMTPSECURE');
            $mail->Port = env('PHPMAILER_PORT');

            $config = Config::first();
            $toMail = $config ? $config->email_admin : "dtuan5161@gmail.com";
            $mail->addAddress($toMail);

            $mail->isHTML(true);  // Set email content format to HTML

            $this->store($params);

            $mail->Subject = $params['name'];
            $html = "<b>Info:</b><br><br>";
            $html .= "Name: " . $params['name'] . "<br>";
            $html .= "Email: " . $params['email'] . "<br>";

            if (isset($params['message'])) {
                $html .= "Message: ";
                $html .= "<br><br>";
                $html .= $params['message'];
            }

            $html .= "<br>" . "Link: " . $params['link'] . "<br>";

            $mail->Body = $html;
            $mail->CharSet = "UTF-8";

            if( !$mail->send() ) {
                return false;
            }
            else {
                return true;
            }

        } catch (Exception $e) {
            return "error,Message could not be sent.";
        }
    }

    public function store($params) {
        if (isset($params['contact_id'])){
            ContactUs::whereIn('id', $params['contact_id'])
                ->update([
                    'name'=> $params['name'],
                    'email'=> $params['email'],
                    'message'=> isset($params['message']) ? $params['message'] : null,
                    'link'=> isset($params['link']) ? $params['link'] : null,
                    'is_submit'=> 1,
                    'created_at'=> date('Y-m-d H:i:s')
                ]);
        } else { // Khong Upload file
            $contact = new ContactUs;
            $contact->created_at = date('Y-m-d H:i:s');
            $contact->is_submit = 1;
            $contact->fill($params);
            $contact->save();
        }
        if (isset($params['contact_id_remove'])) { // remove file
            ContactUs::whereIn('id', $params['contact_id_remove'])->delete();
            foreach ($params['contact_file_remove'] as $item) {
                File::delete('upload/viewer/contact_us/' . $item);
            }
        }
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
