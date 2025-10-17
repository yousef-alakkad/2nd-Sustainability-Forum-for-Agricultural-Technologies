<?php



namespace App\Helpers;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsappHelper
{

    public static $INSTANCE = '';
    public static $TOKEN = '';

    public static function sendMessage(string $to, string $text)
    {
        $req = Http::withHeaders(([
            'Content-type' => ' application/x-www-form-urlencoded',
        ]))->post('https://api.ultramsg.com/' . WhatsappHelper::$INSTANCE . '/messages/chat?token=' . WhatsappHelper::$TOKEN . '&to=' . $to . '&body=' . $text);
        if (isset($req->json()['sent']) && $req->json()['sent'] == 'true') {
            return true;
        }
        return false;
    }

    public static function sendImage(string $to, string $img, string $cap)
    {
        $req = Http::withHeaders(([
            'Content-type' => ' application/x-www-form-urlencoded',
        ]))->post('https://api.ultramsg.com/' . WhatsappHelper::$INSTANCE . '/messages/image?token=' . WhatsappHelper::$TOKEN . '&to=' . $to . '&image=' . $img . '&caption=' . $cap);
        if (isset($req->json()['sent']) && $req->json()['sent'] == 'true') {
            return true;
        }
        return false;
    }

    public static function sendDocument(string $to, string $filename, string $document, string $cap)
    {
        $req = Http::withHeaders(([
            'Content-type' => ' application/x-www-form-urlencoded',
        ]))->post('https://api.ultramsg.com/' . WhatsappHelper::$INSTANCE . '/messages/document?token=' . WhatsappHelper::$TOKEN . '&to=' . $to . '&filename=' . $filename . '&document=' . $document . '&caption=' . $cap);
        if (isset($req->json()['sent']) && $req->json()['sent'] == 'true') {
            return true;
        }
        return false;
    }

    public static function welcome($member, $link)
    {
        try {
            $text = 'Dear ' . $member->first_name . ' ' . $member->last_name . ' \n \n' .
                'Thank you for registering to the 3rd SAAM Conference and Exhibition to be held at Fairmont Hotel Riyadh.\n \n' .
                'The Pre-conference Workshop will be held on 31st October 2024 while the Conference and Exhibition will be on 01 & 02 November 2024. \n \n' .
                'The venue location is at,\n \n' .
                'https://maps.app.goo.gl/Z2z1or1Xcm6LJVdP8?g_st=ic   \n \n' .
                'Below is your badge number,  \n \n' .
                $link . ' \n \n On arrival, Kindly proceed to the Registration Counter to collect your badge then proceed to the Lecture Hall. \n \n' .
                'If you have any inquiries about the conference or your registration you may reach us through, \n  \n' .
                'ðŸ“§ registration@infotechs.co \n \n ðŸ“ž 966535140007  \n';
            $encodedText = urlencode($text);

            $req = Http::withHeaders(([
                'Content-type' => ' application/x-www-form-urlencoded',
            ]))->post('https://api.ultramsg.com/' . WhatsappHelper::$INSTANCE . '/messages/chat?token=' . WhatsappHelper::$TOKEN . '&to=' . $member->mobile . '&body=' . $encodedText);
            Log::info($req->json());
            if (isset($req->json()['sent']) && $req->json()['sent'] == 'true') {
                return true;
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return false;
        }
        return false;
    }
    public static function publicWelcome($member)
    {
        try {
            $text = 'Dear ' . ($member->title ? $member->title : '') . ' ' . $member->first_name . ' ' . $member->last_name . ' \n \n' .
                'Thank you for registering in the 3rd Scientific Academy of Aesthetic Medicine Conference and exhibition..\n \n' .
                'Please find below:  \n \n' .
                'Link to program Agenda \n' .
                'https://saam.academy/agenda/ \n \n' .
                'We hope you enjoy the scientific content provided in these sessions and aspire you utilize the tips and tricks to complement your aesthetic practice.  \n \n' .
                'For more inquiries: \n  \n' .
                'Whatâ€™s App: +966535140007 \n \n Email: secretary@infotechs.co  \n \n' .
                'SAAM Team';
            $req = Http::withHeaders(([
                'Content-type' => ' application/x-www-form-urlencoded',
            ]))->post('https://api.ultramsg.com/' . WhatsappHelper::$INSTANCE . '/messages/chat?token=' . WhatsappHelper::$TOKEN . '&to=' . $member->mobile . '&body=' . $text);
            Log::info($req->json());
            if (isset($req->json()['sent']) && $req->json()['sent'] == 'true') {
                return true;
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return false;
        }
        return false;
    }
    public static function publicWelcome2($mob)
    {
        try {
            $text = 'Dear Rabeea \n \n' .
                'Thank you for registering in the 3rd Scientific Academy of Aesthetic Medicine Conference and exhibition..\n \n' .
                'Please find below:  \n \n' .
                'Link to program Agenda \n' .
                'https://saam.academy/agenda/ \n \n' .
                'We hope you enjoy the scientific content provided in these sessions and aspire you utilize the tips and tricks to complement your aesthetic practice.  \n \n' .
                'For more inquiries: \n  \n' .
                'Whatâ€™s App: +966535140007 \n \n Email: secretary@infotechs.co  \n \n' .
                'SAAM Team';
            $req = Http::withHeaders(([
                'Content-type' => ' application/x-www-form-urlencoded',
            ]))->post('https://api.ultramsg.com/' . WhatsappHelper::$INSTANCE . '/messages/chat?token=' . WhatsappHelper::$TOKEN . '&to=' . $mob . '&body=' . $text);
            Log::info($req->json());
            if (isset($req->json()['sent']) && $req->json()['sent'] == 'true') {
                return true;
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return false;
        }
        return false;
    }
    public static function special($member, $link)
    {
        try {
            $text = 'Dear ' . $member->first_name . ' ' . $member->last_name . ' \n \n' .
                'Your registration to the 3rd Scientific Academy of Aesthetic Medicine Conference has been confirmed.  \n' .
                'The Pre-conference Workshop will be held on 31st October 2024 and the \n \n Conference and Exhibition will be on 1-2 November 2024 \n \n' .
                'The venue location is at,\n \n' .
                'https://maps.app.goo.gl/Z2z1or1Xcm6LJVdP8?g_st=ic  \n \n' .
                'Below is your badge number,  \n \n' .
                $link . ' \n \n On arrival, Kindly proceed to the Registration Counter to collect your badge. \n \n' .
                'If you have any inquiries about the conference or your registration Please contact us through \n  \n' .
                'ðŸ“§ registration@infotechs.co \n \n ðŸ“ž 966535140007  \n';
            //        dd($text);
            $req = Http::withHeaders(([
                'Content-type' => ' application/x-www-form-urlencoded',
            ]))->post('https://api.ultramsg.com/' . WhatsappHelper::$INSTANCE . '/messages/chat?token=' . WhatsappHelper::$TOKEN . '&to=' . $member->mobile . '&body=' . $text);
            if (isset($req->json()['sent']) && $req->json()['sent'] == 'true') {
                return true;
            }
        } catch (\Exception $exception) {
        }
        return false;
    }
    public static function sendPaymentLink($member, $link)
    {
        try {
            $text = 'Dear ' . $member->first_name . ' ' . $member->last_name . ' \n \n' .
                'Your registration to the 3rd SAAM Conference is successfully processed.\n \n' .
                'To complete the payment, kindly click the link below, \n \n' .
                $link . ' \n \n' .
                'If you have any inquiries about the conference or your registration Please contact us through \n  \n' .
                'ðŸ“§ registration@infotechs.co \n \n ðŸ“ž 966535140007  \n';

            $req = Http::withHeaders(([
                'Content-type' => ' application/x-www-form-urlencoded',
            ]))->post('https://api.ultramsg.com/' . WhatsappHelper::$INSTANCE . '/messages/chat?token=' . WhatsappHelper::$TOKEN . '&to=' . $member->mobile . '&body=' . $text);
            if (isset($req->json()['sent']) && $req->json()['sent'] == 'true') {
                return true;
            }
        } catch (\Exception $exception) {
        }
        return false;
    }
    public static function sendPaymentReminder($member, $link)
    {
        try {
            $text = 'Dear ' . $member->first_name . ' ' . $member->last_name . ' \n \n' .
                'Your registration to the 3rd SAAM Conference is successfully processed.\n \n' .
                'To avoid cancellation of your registration, please complete the payment before October 1st.\n \n' .
                ' Click the link below to complete your payment: \n \n' .
                $link . ' \n \n' .
                'If you have any inquiries about the conference or your registration Please contact us through \n  \n' .
                'ðŸ“§ registration@infotechs.co \n \n ðŸ“ž 966535140007  \n';

            $req = Http::withHeaders(([
                'Content-type' => ' application/x-www-form-urlencoded',
            ]))->post('https://api.ultramsg.com/' . WhatsappHelper::$INSTANCE . '/messages/chat?token=' . WhatsappHelper::$TOKEN . '&to=' . $member->mobile . '&body=' . $text);
            if (isset($req->json()['sent']) && $req->json()['sent'] == 'true') {
                return true;
            }
        } catch (\Exception $exception) {
        }
        return false;
    }
    public static function sendWorkshopRegistrationLink($member, $link)
    {
        try {
            $text = "Dear " . $member->first_name . " " . $member->last_name . "\n\n" .
                "You can use the link below to register in workshops:\n\n" .
                $link . "\n\n" .
                "If you have any inquiries about the conference or your registration, please contact us through:\n\n" .
                "ðŸ“§ registration@infotechs.co\n\nðŸ“ž 966535140007\n\n" .
                "We look forward to seeing you at the workshops!\n\nSAAM Team";

            $req = Http::withHeaders([
                'Content-type' => ' application/x-www-form-urlencoded',
            ])->post('https://api.ultramsg.com/' . WhatsappHelper::$INSTANCE . '/messages/chat?token=' . WhatsappHelper::$TOKEN . '&to=' . $member->mobile . '&body=' . urlencode($text));

            if (isset($req->json()['sent']) && $req->json()['sent'] == 'true') {
                return true;
            }
        } catch (\Exception $exception) {
        }
        return false;
    }

    public static function sendBankLink($member, $link)
    {
        try {
            $text = 'Dear ' . $member->first_name . ' ' . $member->last_name . ' \n \n' .
                'There is some error in your payment please upload a valid file.  \n
             to upload the payment file click the link below \n' .
                $link . ' \n' .
                'If you have any inquiries about the conference or your registration Please contact us through \n  \n' .
                'ðŸ“§ registration@infotechs.co \n \n ðŸ“ž 966535140007  \n';
            //        dd($text);
            $req = Http::withHeaders(([
                'Content-type' => ' application/x-www-form-urlencoded',
            ]))->post('https://api.ultramsg.com/' . WhatsappHelper::$INSTANCE . '/messages/chat?token=' . WhatsappHelper::$TOKEN . '&to=' . $member->mobile . '&body=' . $text);
            if (isset($req->json()['sent']) && $req->json()['sent'] == 'true') {
                return true;
            }
        } catch (\Exception $exception) {
        }
        return false;
    }
    public static function regBeforePay($member, $link)
    {
        $text = 'Dear ' . $member->first_name . ' ' . $member->last_name . ' \n \n' .
            'Thank you for registering to the 3rd SAAM Conference 2024. \n \n The Pre-conference workshop on 31st October 2024 and the Main Conference will be on 1-2 November 2024. \n \n If you have any inquiries about the conference or your registration Please contact us through \n  \n' .
            'ðŸ“§ Payment Link \n  ' . 'https://saam.infotechsevents.com/complete-payment/' . encrypt($member->id) . ' \n \n' .
            'ðŸ“§ registration@infotechs.co \n \n ðŸ“ž 966535140007  \n';
        $encodedText = urlencode($text);
        $req = Http::withHeaders(([
            'Content-type' => ' application/x-www-form-urlencoded',
        ]))->post('https://api.ultramsg.com/' . WhatsappHelper::$INSTANCE . '/messages/chat?token=' . WhatsappHelper::$TOKEN . '&to=' . $member->mobile . '&body=' . $encodedText);
        if (isset($req->json()['sent']) && $req->json()['sent'] == 'true') {
            return true;
        }

        return false;
    }
    public static function sendWorkshopRegistrationEmail($member, $link)
    {
        $text = 'Dear ' . $member->first_name . ' ' . $member->last_name . ' \n \n' .
            'Thank you for registering to the WorkShops. \n \n If you have any inquiries about the conference or your registration Please contact us through \n  \n' .
            'ðŸ“§ Payment Link \n  ' . 'https://saam.infotechsevents.com/complete-payment/' . encrypt($member->id) . ' \n \n' .
            'ðŸ“§ registration@infotechs.co \n \n ðŸ“ž 966535140007  \n';
        $encodedText = urlencode($text);
        $req = Http::withHeaders(([
            'Content-type' => ' application/x-www-form-urlencoded',
        ]))->post('https://api.ultramsg.com/' . WhatsappHelper::$INSTANCE . '/messages/chat?token=' . WhatsappHelper::$TOKEN . '&to=' . $member->mobile . '&body=' . $encodedText);
        if (isset($req->json()['sent']) && $req->json()['sent'] == 'true') {
            return true;
        }

        return false;
    }
    public static function rejectDoc($member, $link)
    {
        try {
            $text = 'Dear ' . $member->first_name . ' ' . $member->last_name . ' \n \n' .
                'Sorry your Documents has been rejected  \n Please Use the link below to update your documents:   \n
                ' . $link . '
                If you have any inquiries about the conference or your registration Please contact us through \n  \n' .
                'ðŸ“§ registration@infotechs.co \n \n ðŸ“ž 966535140007  \n';
            $req = Http::withHeaders(([
                'Content-type' => ' application/x-www-form-urlencoded',
            ]))->post('https://api.ultramsg.com/' . WhatsappHelper::$INSTANCE . '/messages/chat?token=' . WhatsappHelper::$TOKEN . '&to=' . $member->mobile . '&body=' . $text);
            if (isset($req->json()['sent']) && $req->json()['sent'] == 'true') {
                return true;
            }
        } catch (\Exception $exception) {
        }
        return false;
    }
    public static function sendAddWorkshopLink($member, $link)
    {
        try {
            $text = 'Dear ' . $member->first_name . ' ' . $member->last_name . ' \n \n' .

                'To add workshops, kindly click the link below, \n \n' .
                $link . ' \n \n' .
                'If you have any inquiries about the conference or your registration Please contact us through \n  \n' .
                'ðŸ“§ registration@infotechs.co \n \n ðŸ“ž 966535140007  \n';

            $req = Http::withHeaders(([
                'Content-type' => ' application/x-www-form-urlencoded',
            ]))->post('https://api.ultramsg.com/' . WhatsappHelper::$INSTANCE . '/messages/chat?token=' . WhatsappHelper::$TOKEN . '&to=' . $member->mobile . '&body=' . $text);
            if (isset($req->json()['sent']) && $req->json()['sent'] == 'true') {
                return true;
            }
        } catch (\Exception $exception) {
        }
        return false;
    }
}
