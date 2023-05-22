<?php
require_once 'vendor/autoload.php';

use App\Lib\GoogleAuthenticator;
use App\Lib\SendSms;
use App\Models\EmailTemplate;
use App\Models\Extension;
use App\Models\Frontend;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Redis;
use App\Models\Role;
use App\Models\SmsTemplate;
use App\Models\EmailLog;
use App\Models\SystemCredential;
use App\Models\SystemMailConfiguration;
use App\Models\User;
use App\Models\Rank;
use App\Models\Advertise;
use App\Models\BannerBackground;
use App\Models\Contract;
use App\Models\DayPlanning;
use App\Models\Degree;
use App\Models\Job;
use App\Models\Language;
use App\Models\LanguageLevel;
use App\Models\ModuleBanner;
use App\Models\ModuleOffer;
use App\Models\Proposal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Khsing\World\Models\Language as ModelsLanguage;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;

function sidebarVariation()
{
    /// for sidebar
    $variation['sidebar'] = 'bg_img';

    //for selector
    $variation['selector'] = 'capsule--rounded';

    //for overlay
    $variation['overlay'] = 'overlay--indigo';

    //Opacity
    $variation['opacity'] = 'overlay--opacity-8'; // 1-10
    return $variation;

}

function systemDetails()
{
    $system['name'] = 'viserlance';
    $system['version'] = '1.0';
    return $system;
}

function getLatestVersion()
{
    $param['purchasecode'] = env("PURCHASECODE");
    $param['website'] = @$_SERVER['HTTP_HOST'] . @$_SERVER['REQUEST_URI'] . ' - ' . env("APP_URL");
    $url = 'https://license.viserlab.com/updates/version/' . systemDetails()['name'];
    $result = curlPostContent($url, $param);
    if ($result) {
        return $result;
    } else {
        return null;
    }
}


function slug($string)
{
    return Illuminate\Support\Str::slug($string);
}


function shortDescription($string, $length = 120)
{
    return Illuminate\Support\Str::limit($string, $length);
}


function shortCodeReplacer($shortCode, $replace_with, $template_string)
{
    return str_replace($shortCode, $replace_with, $template_string);
}


function verificationCode($length)
{
    if ($length == 0) return 0;
    $min = pow(10, $length - 1);
    $max = 0;
    while ($length > 0 && $length--) {
        $max = ($max * 10) + 9;
    }
    return random_int($min, $max);
}

function getNumber($length = 8)
{
    $characters = '1234567890';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

//moveable
function uploadImage($file, $location, $size = null, $old = null, $thumb = null)
{

    $filename = '';
    try {

        $connectionString = getenv('AZURE_STORAGE_SAS_URL');
        $blobClient = BlobRestProxy::createBlobService($connectionString);

        if ($old) {
            removeFile($location . '/' . $old);
            removeFile($location . '/thumb_' . $old);
        }
        $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
        $image = Image::make($file);
        if ($size) {
            $size = explode('x', strtolower($size));
            $image->resize($size[0], $size[1]);
        }

        $locations = explode('/', $location);
        $container = end($locations);
        $createContainerOptions = new CreateContainerOptions();
        $createContainerOptions->setPublicAccess(PublicAccessType::CONTAINER_AND_BLOBS);
        try {

            $properties = $blobClient->GetContainerProperties($container);

        } catch (ServiceException $e) {
            error($e);
            $blobClient->createContainer($container, $createContainerOptions);
        }

        $content = fopen($file, "r");
        $blobClient->createBlockBlob($container, $filename, $content);


        if ($thumb) {
            $thumb = explode('x', $thumb);
            $thumbImage = Image::make($file)->resize($thumb[0], $thumb[1]);
            $thumbImage->save($location . '/thumb_' . $filename);
            $thumbcontent = fopen($thumbImage, "r");
            $blobClient->createBlockBlob($container, '/thumb_' . $filename, $thumbcontent);
        }
    } catch (ServiceException $e) {
        error($e);
    }
    return $filename;

}

function uploadFile($file, $location, $size = null, $old = null)
{
    $path = makeDirectory($location);
    if (!$path) throw new Exception('File could not been created.');

    if ($old) {
        removeFile($location . '/' . $old);
    }

    $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
    $file->move($location, $filename);
    return $filename;
}


function uploadAttachments($file, $location, $size = null, $old = null, $thumb = null)
{
    $filename = '';
//    $connectionString = env('AZURE_STORAGE_SAS_URL');
    $connectionString = Config('filesystems.disks.azure.sas_url');
//    dd($connectionString);
    \Illuminate\Support\Facades\Log::info(env('APP_DEBUG'));
    \Illuminate\Support\Facades\Log::info(env('APP_DEBUG'));
    \Illuminate\Support\Facades\Log::info($connectionString);

    try {

//        $connectionString = getenv('AZURE_STORAGE_SAS_URL');
        //"DefaultEndpointsProtocol=https;AccountName=".getenv('AZURE_STORAGE_NAME').";AccountKey=".getenv('AZURE_STORAGE_KEY');
        $blobClient = BlobRestProxy::createBlobService($connectionString);

        if ($old) {
            removeFile($location . '/' . $old);
            removeFile($location . '/thumb_' . $old);
        }
        $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();


        $locations = explode('/', $location);
        $container = end($locations);
        $createContainerOptions = new CreateContainerOptions();
        $createContainerOptions->setPublicAccess(PublicAccessType::CONTAINER_AND_BLOBS);
        try {
            $properties = $blobClient->GetContainerProperties($container);
        } catch (ServiceException $e) {

            $blobClient->createContainer($container, $createContainerOptions);
        }

        $content = fopen($file, "r");
        $blobClient->createBlockBlob($container, $filename, $content);


        if ($thumb) {
            $thumb = explode('x', $thumb);
            $thumbImage = Image::make($file)->resize($thumb[0], $thumb[1]);
            $thumbImage->save($location . '/thumb_' . $filename);
            $thumbcontent = fopen($thumbImage, "r");
            $blobClient->createBlockBlob($container, '/thumb_' . $filename, $thumbcontent);
        }
    } catch (\Exception $e) {
        errorLogMessage($e);
//        error($obj);
    }
    return $filename;

}

function addTechnologyLogos($model,$logos){
    $banner=$model->banner;
    $model->technologyLogos()->createMany(
        collect($logos)->map(function($item) use ($banner){

            $banner_logo=
                [
                    'module_banner_id' => $banner->id,
                    'banner_background_id' => $item
                ];
            return $banner_logo;
        })->toArray()
    );
}

function getBannerType($model){
    if($model){
        if($model->banner){
            return $model->banner->banner_type;
        }
    }
    return ModuleBanner::$Static;
}

function isStaticBanner($model){
    if($model){
        if($model->banner){
            return  $model->banner->banner_type == ModuleBanner::$Static ? 'block' : 'none';
        }
    }
    return 'block';
}

function isDynamicBanner($model){
    if($model){
        if($model->banner){
            return  $model->banner->banner_type == ModuleBanner::$Dynamic ? 'block' : 'none';
        }
    }
    return 'none';
}

function isVideoBanner($model){
    if($model){
        if($model->banner){
            return  $model->banner->banner_type == ModuleBanner::$Video ? 'block' : 'none';
        }
    }
    return 'none';
}

function previewServiceRoute($service){
    if($service){
        if($service->uuid){
            return route('service.view',$service->uuid);
        }
    }
    return '#';
}

function bannerTypeStatic($model){
    if($model){
        if($model->banner){
            return  $model->banner->banner_type == ModuleBanner::$Static ? true : false;
        }
    }
    return false;
}

function bannerTypeDynamic($model){
    if($model){
        if($model->banner){
            return  $model->banner->banner_type == ModuleBanner::$Dynamic ? true : false;
        }
    }
    return false;
}

function getFile($model){
    if($model){
        if($model->banner){
            if(!$model->banner->default_lead_image_id)
                return  $model->banner->url;
        }
    }
    return '';
}

function getYoutubeIdFromUrl($url) {
    $parts = parse_url($url);
    if(isset($parts['query'])){
        parse_str($parts['query'], $qs);
        if(isset($qs['v'])){
            return $qs['v'];
        }else if(isset($qs['vi'])){
            return $qs['vi'];
        }
    }
    if(isset($parts['path'])){
        $path = explode('/', trim($parts['path'], '/'));
        return $path[count($path)-1];
    }
    return false;
}

function portfolioVideoUrl($portfolio_video_url){

    $youtube_id=getYoutubeIdFromUrl($portfolio_video_url);
    $url="https://www.youtube.com/embed/".$youtube_id;
    return $url;
}

function getVideoBannerURL($model,$type='preview_video'){
    $url="";
    if($model){
        if($model->banner){
            $url=$model->banner->video_url;
            if($type == 'preview_video' ){
                $youtube_id=getYoutubeIdFromUrl($url);
                $url="https://www.youtube.com/embed/".$youtube_id;
            }
        }
    }
    return $url;

}
function getServiceFee($software){
    if($software){
        if($software->modules){
            return $software->modules->sum('start_price')*0.20;
        }
    }
    return '';
}
function getSoftwareFee($software){
    if($software){
        if($software->modules){
            return $software->modules->sum('start_price')*0.80;
        }
    }
    return '';
}

function getImagesByCategory($model, $type=BannerBackground::BACKGROUND_TYPES['TECHNOLOGY_LOGO']){

    $query=BannerBackground::where('document_type',$type)->where('is_active',true);

    if($model->category_id){

        $query= $query->where('category_id',$model->category_id);
    }

    if($model->sub_category_id){
        $query= $query->where('sub_category_id',$model->sub_category_id);
    }

    return $query->latest()->get();
}

function selectedBackgroundImage($model,$banner_background_id,$column){
    if($model){
        if($model->banner){
            return $model->banner->$column == $banner_background_id ? 'checked' : '';
        }
    }
    return '';
}

function getLeadImageUrl($model){
    if($model){
        if($model->banner){
            if($model->banner->defaultLeadImage)
                return $model->banner->defaultLeadImage->url;
            else
                return $model->banner->url;
        }
    }
}

function IsDefaultLeadImage($model,$type){
    if($model){
        if($model->banner){
            if($model->banner->lead_image_type==$type ){
                return  'block';
            }

        }

    }
    return 'none';
}

function getServiceProposalData($model){
    $proposal['hourly_bid_rate']   = '';
    $proposal['amount_receive']    = '';
    $proposal['start_hour_limit']  = '';
    $proposal['end_hour_limit']    = '';
    $proposal['delivery_mode_id']  = '';
    $proposal['cover_letter']      = '';
    $proposal['attachments']       = [];

    if($model && $model->defaultProposal){
        $proposal['hourly_bid_rate']   = $model->defaultProposal->hourly_bid_rate;
        $proposal['amount_receive']    = $model->defaultProposal->amount_receive;
        $proposal['start_hour_limit']  = $model->defaultProposal->start_hour_limit;
        $proposal['end_hour_limit']    = $model->defaultProposal->end_hour_limit;
        $proposal['delivery_mode_id']  = $model->defaultProposal->delivery_mode_id;
        $proposal['cover_letter']      = $model->defaultProposal->cover_letter;
        $proposal['attachments']       = $model->defaultProposal->attachments;

    }
    return $proposal;
}

function getSoftwareProposalData($model){

    $proposal['fixed_bid_amount']   = '';
    $proposal['amount_receive']    = '';
    $proposal['project_start_date']  = '';
    $proposal['project_end_date']    = '';
    $proposal['delivery_mode_id']  = '';
    $proposal['cover_letter']      = '';
    $proposal['attachments']       = [];

    if($model && $model->defaultProposal){
        $proposal['fixed_bid_amount']    = $model->defaultProposal->fixed_bid_amount;
        $proposal['amount_receive']      = $model->defaultProposal->amount_receive;
        $proposal['project_start_date']  = $model->defaultProposal->project_start_date;
        $proposal['project_end_date']    = $model->defaultProposal->project_end_date;
        $proposal['delivery_mode_id']  = $model->defaultProposal->delivery_mode_id;
        $proposal['cover_letter']      = $model->defaultProposal->cover_letter;
        $proposal['attachments']       = $model->defaultProposal->attachments;

    }
    return $proposal;
}

function isCustomSelected($model,$type){
    if($model){
        if($model->banner){
            if($model->banner->lead_image_type==$type ){
                return  'selected';
            }

        }

    }
    return '';
}

function selectedLogoImage($model,$banner_background_id){
    if($model){
        if($model->technologyLogos){
            $logos=$model->technologyLogos()->pluck('banner_background_id')->toArray();
            return  in_array($banner_background_id,$logos) ? 'checked' : '';
        }
    }
    return '';
}

function makeDirectory($path)
{
    if (file_exists($path)) return true;
    return mkdir($path, 0755, true);
}

function removeFile($path)
{
    try {

        $imagePath = explode('/', $path);
        $container = $imagePath[0];
        $filename = end($imagePath);

        $connectionString = getenv('AZURE_STORAGE_SAS_URL');
        $blobClient = BlobRestProxy::createBlobService($connectionString);

        $blob = $blobClient->getBlob($container, $filename);

        if ($blob) {

            $blobClient->deleteBlob($container, $filename);
            return true;
        } else {
            return false;
        }
    } catch (\Exception $e) {

        return false;

    }
}

function activeTemplate($asset = false)
{
    $general = GeneralSetting::first(['active_template']);
    $template = $general->active_template;
    $sess = session()->get('template');
    if (trim($sess)) {
        $template = $sess;
    }
    if ($asset) return 'assets/templates/' . $template . '/';
    return 'templates.' . $template . '.';
}

function activeTemplateName()
{
    $general = GeneralSetting::first(['active_template']);
    $template = $general->active_template;
    $sess = session()->get('template');
    if (trim($sess)) {
        $template = $sess;
    }
    return $template;
}

function loadReCaptcha()
{
    $reCaptcha = Extension::where('act', 'google-recaptcha2')->where('status', 1)->first();
    return $reCaptcha ? $reCaptcha->generateScript() : '';
}

function loadAnalytics()
{
    $analytics = Extension::where('act', 'google-analytics')->where('status', 1)->first();
    return $analytics ? $analytics->generateScript() : '';
}

function loadTawkto()
{
    $tawkto = Extension::where('act', 'tawk-chat')->where('status', 1)->first();
    return $tawkto ? $tawkto->generateScript() : '';
}

function loadFbComment()
{
    $comment = Extension::where('act', 'fb-comment')->where('status', 1)->first();
    return $comment ? $comment->generateScript() : '';
}

function loadCustomCaptcha($height = 46, $width = '100%', $bgcolor = '#003', $textcolor = '#abc')
{
    $textcolor = '#' . GeneralSetting::first()->base_color;
    $captcha = Extension::where('act', 'custom-captcha')->where('status', 1)->first();
    if (!$captcha) {
        return 0;
    }
    $code = rand(100000, 999999);
    $char = str_split($code);
    $ret = '<link href="https://fonts.googleapis.com/css?family=Henny+Penny&display=swap" rel="stylesheet">';
    $ret .= '<div style="height: ' . $height . 'px; line-height: ' . $height . 'px; width:' . $width . '; text-align: center; background-color: ' . $bgcolor . '; color: ' . $textcolor . '; font-size: ' . ($height - 20) . 'px; font-weight: bold; letter-spacing: 20px; font-family: \'Henny Penny\', cursive;  -webkit-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none;  display: flex; justify-content: center;">';
    foreach ($char as $value) {
        $ret .= '<span style="    float:left;     -webkit-transform: rotate(' . rand(-60, 60) . 'deg);">' . $value . '</span>';
    }
    $ret .= '</div>';
    $captchaSecret = hash_hmac('sha256', $code, $captcha->shortcode->random_key->value);
    $ret .= '<input type="hidden" name="captcha_secret" value="' . $captchaSecret . '">';
    return $ret;
}

function captchaVerify($code, $secret)
{
    $captcha = Extension::where('act', 'custom-captcha')->where('status', 1)->first();
    $captchaSecret = hash_hmac('sha256', $code, $captcha->shortcode->random_key->value);
    if ($captchaSecret == $secret) {
        return true;
    }
    return false;
}

function getTrx($length = 12)
{
    $characters = 'ABCDEFGHJKMNOPQRSTUVWXYZ123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getAmount($amount, $length = 0)
{
    if (0 < $length) {
        $amount = round($amount, $length);
    } else {
        $amount = round($amount, 2);
    }
    return $amount + 0;
}

function showAmount($amount, $decimal = 2, $separate = true, $exceptZeros = false)
{
    $separator = '';
    if ($separate) {
        $separator = ',';
    }
    $printAmount = number_format($amount, $decimal, '.', $separator);
    if ($exceptZeros) {
        $exp = explode('.', $printAmount);
        if ($exp[1] * 1 == 0) {
            $printAmount = $exp[0];
        }
    }
    return $printAmount;
}

function removeElement($array, $value)
{
    return array_diff($array, (is_array($value) ? $value : array($value)));
}

function cryptoQR($wallet)
{

    return "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$wallet&choe=UTF-8";
}

//moveable
function curlContent($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

//moveable
function curlPostContent($url, $arr = null)
{
    if ($arr) {
        $params = http_build_query($arr);
    } else {
        $params = '';
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function inputTitle($text)
{
    return ucfirst(preg_replace("/[^A-Za-z0-9 ]/", ' ', $text));
}

function titleToKey($text)
{
    return strtolower(str_replace(' ', '_', $text));
}

function str_limit($title = null, $length = 10)
{
    return \Illuminate\Support\Str::limit($title, $length);
}

//moveable
function getIpInfo()
{
    $ip = $_SERVER["REMOTE_ADDR"];

    //Deep detect ip
    if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }


    $xml = @simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=" . $ip);


    $country = @$xml->geoplugin_countryName;
    $city = @$xml->geoplugin_city;
    $area = @$xml->geoplugin_areaCode;
    $code = @$xml->geoplugin_countryCode;
    $long = @$xml->geoplugin_longitude;
    $lat = @$xml->geoplugin_latitude;

    $data['country'] = $country;
    $data['city'] = $city;
    $data['area'] = $area;
    $data['code'] = $code;
    $data['long'] = $long;
    $data['lat'] = $lat;
    $data['ip'] = request()->ip();
    $data['time'] = date('d-m-Y h:i:s A');


    return $data;
}

//moveable
function osBrowser()
{
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $osPlatform = "Unknown OS Platform";
    $osArray = array(
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i' => 'Windows XP',
        '/windows xp/i' => 'Windows XP',
        '/windows nt 5.0/i' => 'Windows 2000',
        '/windows me/i' => 'Windows ME',
        '/win98/i' => 'Windows 98',
        '/win95/i' => 'Windows 95',
        '/win16/i' => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i' => 'Mac OS 9',
        '/linux/i' => 'Linux',
        '/ubuntu/i' => 'Ubuntu',
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );
    foreach ($osArray as $regex => $value) {
        if (preg_match($regex, $userAgent)) {
            $osPlatform = $value;
        }
    }
    $browser = "Unknown Browser";
    $browserArray = array(
        '/msie/i' => 'Internet Explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
        '/opera/i' => 'Opera',
        '/netscape/i' => 'Netscape',
        '/maxthon/i' => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/mobile/i' => 'Handheld Browser'
    );
    foreach ($browserArray as $regex => $value) {
        if (preg_match($regex, $userAgent)) {
            $browser = $value;
        }
    }

    $data['os_platform'] = $osPlatform;
    $data['browser'] = $browser;

    return $data;
}

function siteName()
{
    $general = GeneralSetting::first();
    $sitname = str_word_count($general->sitename);
    $sitnameArr = explode(' ', $general->sitename);
    if ($sitname > 1) {
        $title = "<span>$sitnameArr[0] </span> " . str_replace($sitnameArr[0], '', $general->sitename);
    } else {
        $title = "<span>$general->sitename</span>";
    }

    return $title;
}

function isSelectedTag($tag_id,$service_tags){
    $service_tags=$service_tags->pluck('id')->toArray();
    if(in_array($tag_id,$service_tags)){

        return "selected";
    }
    else{
        return '';
    }

}

//moveable
function getTemplates()
{
    $param['purchasecode'] = env("PURCHASECODE");
    $param['website'] = @$_SERVER['HTTP_HOST'] . @$_SERVER['REQUEST_URI'] . ' - ' . env("APP_URL");
    $url = 'https://license.viserlab.com/updates/templates/' . systemDetails()['name'];
    $result = curlPostContent($url, $param);
    if ($result) {
        return $result;
    } else {
        return null;
    }
}


function getPageSections($arr = false)
{

    $jsonUrl = resource_path('views/') . str_replace('.', '/', activeTemplate()) . 'sections.json';
    $sections = json_decode(file_get_contents($jsonUrl));
    if ($arr) {
        $sections = json_decode(file_get_contents($jsonUrl), true);
        ksort($sections);
    }
    return $sections;
}


function getImage($image, $size = null)
{
    $clean = '';
    if (file_exists($image) && is_file($image)) {
        return asset($image) . $clean;
    }
    if ($size) {
        return route('placeholder.image', $size);
    }
    return asset('assets/images/default.png');
}

function getAzureImage($image, $size = null)
{
    $imagePath = explode('/', $image);
    $container = $imagePath[0];
    $filename = end($imagePath);
    $url = getenv('AZURE_STORAGE_URL');
    $imageUrl = $url . '/' . $container . '/' . $filename;
    info("Image path:" . $image);
    if ($filename != "" && $container != "") {
        return $imageUrl;
    }
    if ($size) {
        return route('placeholder.image', $size);
    }
    return asset('assets/images/default.png');
}

function azure_file_exists($image, $container)
{
    $connectionString = "DefaultEndpointsProtocol=https;AccountName=" . getenv('AZURE_STORAGE_NAME') . ";AccountKey=" . getenv('AZURE_STORAGE_KEY');
    $blobClient = BlobRestProxy::createBlobService($connectionString);
    $blob = $blobClient->getBlob($container, $image);
    if ($blob) {
        return true;
    } else
        return false;
}

function notify($user, $type, $shortCodes = null)
{

    sendEmail($user, $type, $shortCodes);
    sendPasswordResetEmail($user, $type, $shortCodes);
    sendSms($user, $type, $shortCodes);
}


function sendSms($user, $type, $shortCodes = [])
{
    $general = GeneralSetting::first();
    $smsTemplate = SmsTemplate::where('act', $type)->where('sms_status', 1)->first();
    $gateway = $general->sms_config->name;
    $sendSms = new SendSms;
    if ($general->sn == 1 && $smsTemplate) {
        $template = $smsTemplate->sms_body;
        foreach ($shortCodes as $code => $value) {
            $template = shortCodeReplacer('{{' . $code . '}}', $value, $template);
        }
        $message = shortCodeReplacer("{{message}}", $template, $general->sms_api);
        $message = shortCodeReplacer("{{name}}", $user->username, $message);
        $sendSms->$gateway($user->mobile, $general->sitename, $message, $general->sms_config);
    }
}

function decodeOrEncodeFields($val, $decode = true)
{
    return $decode ? json_decode($val) : json_encode($val);
}


function sendEmail($user, $type = null, $shortCodes = [])
{
    $general = GeneralSetting::first();

    $emailTemplate = EmailTemplate::where('act', $type)->where('email_status', 1)->first();

//    if ($general->en != 1 || !$emailTemplate) {
//        dd($emailTemplate);
//        return;
//    }


    $message = shortCodeReplacer("{{fullname}}", $user->fullname, $general->email_template);
    $message = shortCodeReplacer("{{username}}", $user->username, $message);
    $message = shortCodeReplacer("{{message}}", $emailTemplate->email_body, $message);

    if (empty($message)) {
        $message = $emailTemplate->email_body;
    }

    foreach ($shortCodes as $code => $value) {
        $message = shortCodeReplacer('{{' . $code . '}}', $value, $message);
    }

    $config = $general->mail_config;

    $emailLog = new EmailLog();
    $emailLog->user_id = $user->id;
    $emailLog->mail_sender = $config->name;
    $emailLog->email_from = $general->sitename . ' ' . $general->email_from;
    $emailLog->email_to = $user->email;
    $emailLog->subject = $emailTemplate->subj;
    $emailLog->message = $message;
    $emailLog->save();


    if ($config->name == 'php') {
        sendPhpMail($user->email, $user->username, $emailTemplate->subj, $message, $general);
    } else if ($config->name == 'smtp') {
        \Mail::to($user->email)->send(new \App\Mail\SendSmtpMail($config, $user->email, $user->username, $emailTemplate->subj, $message, $general));
        //sendSmtpMail($config, $user->email, $user->username, $emailTemplate->subj, $message, $general);
    } else if ($config->name == 'sendgrid') {
        sendSendGridMail($config, $user->email, $user->username, $emailTemplate->subj, $message, $general);
    } else if ($config->name == 'mailjet') {
        sendMailjetMail($config, $user->email, $user->username, $emailTemplate->subj, $message, $general);
    }
}

function sendPasswordResetEmail($user, $type = null, $shortCodes = [])
{
    $general = GeneralSetting::first();

    $emailTemplate = SmsTemplate::where('act', $type)->where('email_status', 1)->first();

//    if ($general->en != 1 || !$emailTemplate) {
//        dd($emailTemplate);
//        return;
//    }


    $message = shortCodeReplacer("{{fullname}}", $user->fullname, $general->email_template);
    $message = shortCodeReplacer("{{username}}", $user->username, $message);
    $message = shortCodeReplacer("{{message}}", $emailTemplate->email_body, $message);

    if (empty($message)) {
        $message = $emailTemplate->email_body;
    }

    foreach ($shortCodes as $code => $value) {
        $message = shortCodeReplacer('{{' . $code . '}}', $value, $message);
    }

    $config = $general->mail_config;

    $emailLog = new EmailLog();
    $emailLog->user_id = $user->id;
    $emailLog->mail_sender = $config->name;
    $emailLog->email_from = $general->sitename . ' ' . $general->email_from;
    $emailLog->email_to = $user->email;
    $emailLog->subject = $emailTemplate->subj;
    $emailLog->message = $message;
    $emailLog->save();


    if ($config->name == 'php') {
        sendPhpMail($user->email, $user->username, $emailTemplate->subj, $message, $general);
    } else if ($config->name == 'smtp') {
        \Mail::to($user->email)->send(new \App\Mail\SendSmtpMail($config, $user->email, $user->username, $emailTemplate->subj, $message, $general));
        //sendSmtpMail($config, $user->email, $user->username, $emailTemplate->subj, $message, $general);
    } else if ($config->name == 'sendgrid') {
        sendSendGridMail($config, $user->email, $user->username, $emailTemplate->subj, $message, $general);
    } else if ($config->name == 'mailjet') {
        sendMailjetMail($config, $user->email, $user->username, $emailTemplate->subj, $message, $general);
    }
}


function sendPhpMail($receiver_email, $receiver_name, $subject, $message, $general)
{
    $headers = "From: $general->sitename <$general->email_from> \r\n";
    $headers .= "Reply-To: $general->sitename <$general->email_from> \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    @mail($receiver_email, $subject, $message, $headers);
}


function sendSmtpMail($config, $receiver_email, $receiver_name, $subject, $message, $general)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings

        $mail->isSMTP();
        $mail->Host = $config->host;
        $mail->SMTPAuth = true;
        $mail->Username = $config->username;
        $mail->Password = $config->password;
        if ($config->enc == 'ssl') {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        } else if ($config->enc == 'tls') {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        }
        $mail->Port = $config->port;
        $mail->CharSet = 'UTF-8';
        //Recipients
        $mail->setFrom($general->email_from, $general->sitename);
        $mail->addAddress($receiver_email, $receiver_name);
        $mail->addReplyTo($general->email_from, $general->sitename);
        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->send();
    } catch (Exception $e) {
        throw new Exception($e);
    }
}


function sendSendGridMail($config, $receiver_email, $receiver_name, $subject, $message, $general)
{
    $sendgridMail = new \SendGrid\Mail\Mail();
    $sendgridMail->setFrom($general->email_from, $general->sitename);
    $sendgridMail->setSubject($subject);
    $sendgridMail->addTo($receiver_email, $receiver_name);
    $sendgridMail->addContent("text/html", $message);
    $sendgrid = new \SendGrid($config->appkey);
    try {
        $response = $sendgrid->send($sendgridMail);
    } catch (Exception $e) {
        throw new Exception($e);
    }
}


function sendMailjetMail($config, $receiver_email, $receiver_name, $subject, $message, $general)
{
    $mj = new \Mailjet\Client($config->public_key, $config->secret_key, true, ['version' => 'v3.1']);
    $body = [
        'Messages' => [
            [
                'From' => [
                    'Email' => $general->email_from,
                    'Name' => $general->sitename,
                ],
                'To' => [
                    [
                        'Email' => $receiver_email,
                        'Name' => $receiver_name,
                    ]
                ],
                'Subject' => $subject,
                'TextPart' => "",
                'HTMLPart' => $message,
            ]
        ]
    ];
    $response = $mj->post(\Mailjet\Resources::$Email, ['body' => $body]);
}


function getPaginate($paginate = 20)
{
    return $paginate;
}

function paginateLinks($data, $design = 'admin.partials.paginate')
{
    return $data->appends(request()->all())->links($design);
}


function menuActive($routeName, $type = null)
{
    if ($type == 3) {
        $class = 'side-menu--open';
    } elseif ($type == 2) {
        $class = 'sidebar-submenu__open';
    } else {
        $class = 'active';
    }
    if (is_array($routeName)) {
        foreach ($routeName as $key => $value) {
            if (request()->routeIs($value)) {
                return $class;
            }
        }
    } elseif (request()->routeIs($routeName)) {
        return $class;
    }
}


function imagePath()
{
//    $url = getenv('AZURE_STORAGE_URL');
    $url = Config('filesystems.disks.azure.url');
    $data['message'] = [
        'path' => 'assets/images/job',
        'size' => '590x300',
    ];
    $data['job'] = [
        'path' => 'assets/images/job',
        'size' => '920x468',
    ];
    $data['advertisement'] = [
        'path' => 'assets/images/advertisement',
    ];
    $data['attachments'] = [
        'path' => $url . '/attachments',
    ];

    $data['optionalService'] = [
        'path' => 'assets/images/optionalService',
        'size' => '920x468',
    ];
    $data['document'] = [
        'path' => 'assets/software/document',
    ];
    $data['workFile'] = [
        'path' => 'assets/workFile',
    ];
    $data['uploadSoftware'] = [
        'path' => 'assets/software',
    ];
    $data['screenshot'] = [
        'path' => 'assets/images/screenshot',
        'size' => '920x468',
    ];
    $data['software_old'] = [
        'path' => 'assets/images/software',
        'size' => '920x468',
    ];
    $data['software'] = [
        'path' => 'assets/images/software',
        'size' => '1280x959',
    ];
    $data['service_old'] = [
        'path' => $url . '/service',
        'size' => '920x468',
    ];
    $data['service'] = [
        'path' => $url . '/service',
        'size' => '1280x959',
    ];
    $data['subcategory'] = [
        'path' => 'assets/images/subcategory',
        'size' => '590x300',
    ];
    $data['gateway'] = [
        'path' => 'assets/images/gateway',
        'size' => '800x800',
    ];
    $data['verify'] = [
        'withdraw' => [
            'path' => 'assets/images/verify/withdraw'
        ],
        'deposit' => [
            'path' => 'assets/images/verify/deposit'
        ]
    ];
    $data['image'] = [
        'default' => 'assets/images/default.png',
    ];
    $data['withdraw'] = [
        'method' => [
            'path' => 'assets/images/withdraw/method',
            'size' => '800x800',
        ]
    ];
    $data['ticket'] = [
        'path' => 'assets/support',
    ];
    $data['language'] = [
        'path' => 'assets/images/lang',
        'size' => '64x64'
    ];
    $data['logoIcon'] = [
        'path' => 'assets/images/logoIcon',
    ];
    $data['favicon'] = [
        'size' => '128x128',
    ];
    $data['extensions'] = [
        'path' => 'assets/images/extensions',
        'size' => '36x36',
    ];
    $data['seo'] = [
        'path' => 'assets/images/seo',
        'size' => '600x315'
    ];
    $data['profile'] = [
        'user' => [
            'path' => 'assets/images/user_profile',
            'size' => '590x300'
        ],
        'user_bg' => [
            'path' => 'assets/images/user_profile',
            'size' => '590x300'
        ],
        'admin' => [
            'path' => 'assets/admin/images/profile',
            'size' => '400x400'
        ]
    ];
    return $data;
}

function diffForHumans($date)
{
    $lang = session()->get('lang');
    Carbon::setlocale($lang);
    return Carbon::parse($date)->diffForHumans();
}

function showDateTime($date, $format = 'Y-m-d h:i A')
{
    $lang = session()->get('lang');
    Carbon::setlocale($lang);
    return Carbon::parse($date)->translatedFormat($format);
}

function systemDateTimeFormat($date)
{
    return $date->format('d M Y h:i:A');
}

//moveable
function sendGeneralEmail($email, $subject, $message, $receiver_name = '')
{

    $general = GeneralSetting::first();


    if ($general->en != 1 || !$general->email_from) {
        return;
    }


    $message = shortCodeReplacer("{{message}}", $message, $general->email_template);
    $message = shortCodeReplacer("{{name}}", $receiver_name, $message);

    $config = $general->mail_config;

    if ($config->name == 'php') {
        sendPhpMail($email, $receiver_name, $general->email_from, $subject, $message, $general);
    } else if ($config->name == 'smtp') {
        sendSmtpMail($config, $email, $receiver_name, $subject, $message, $general);
    } else if ($config->name == 'sendgrid') {
        sendSendGridMail($config, $email, $receiver_name, $subject, $message, $general);
    } else if ($config->name == 'mailjet') {
        sendMailjetMail($config, $email, $receiver_name, $subject, $message, $general);
    }
}

function getContent($data_keys, $singleQuery = false, $limit = null, $orderById = false)
{
    if ($singleQuery) {
        $content = Frontend::where('data_keys', $data_keys)->orderBy('id', 'desc')->first();
    } else {
        $article = Frontend::query();
        $article->when($limit != null, function ($q) use ($limit) {
            return $q->limit($limit);
        });
        if ($orderById) {
            $content = $article->where('data_keys', $data_keys)->orderBy('id')->get();
        } else {
            $content = $article->where('data_keys', $data_keys)->orderBy('id', 'desc')->get();
        }
    }
    return $content;
}


function gatewayRedirectUrl($type = false)
{
    if ($type) {
        return 'user.deposit.history';
    } else {
        return 'user.deposit';
    }
}

function verifyG2fa($user, $code, $secret = null)
{
    $ga = new GoogleAuthenticator();
    if (!$secret) {
        $secret = $user->tsc;
    }
    $oneCode = $ga->getCode($secret);
    $userCode = $code;
    if ($oneCode == $userCode) {
        $user->tv = 1;
        $user->save();
        return true;
    } else {
        return false;
    }
}

function urlPath($routeName, $routeParam = null)
{
    if ($routeParam == null) {
        $url = route($routeName);
    } else {
        $url = route($routeName, $routeParam);
    }
    $basePath = route('home');
    $path = str_replace($basePath, '', $url);
    return $path;
}

function rankUser($userId)
{
    $user = User::find($userId);
    if ($user) {
        $rank = Rank::where('status', 1)->where('amount', '<=', $user->income)->orderBy('amount', 'DESC')->first();
        if ($rank) {
            $user->rank_id = $rank->id;
            $user->save();
        }
    }
}

function impressionCount($id)
{
    $item = Advertise::where('id', $id)->first();
    $item->impression += 1;
    $item->save();
}

function advertisements($size)
{
    $ad = Advertise::where('status', 1)->where('size', $size)->inRandomOrder()->first();
    if ($ad) {
        if ($ad->type == 1) {
            impressionCount($ad->id);
            return '<a  target="_blank" href="' . route('add.clicked', encrypt($ad->id)) . '"><img src="' . getImage('assets/images/advertisement/' . $ad->adimage) . '" alt="image"></a>';
        }
        if ($ad->type == 2) {
            impressionCount($ad->id);
            return "<div class='dynamicScript' data-id=" . encrypt($ad->id) . ">" . $ad->script . "</div>";
        }
    } else {
        return '';
    }
}

function userDefaultImage($image, $type = null)
{
    $clean = '';
    if (file_exists($image) && is_file($image)) {
        return asset($image) . $clean;
    }
    if ($type == "profile_image") {
        return asset('assets/images/default.png');
    } else if ($type == "background_image") {
        return asset('assets/images/default.png');
    } else {
        return asset('assets/images/default.png');
    }
}

function authorizeAdmin($user)
{
    $access = $user;
    if (in_array(1, $access)) {
        return redirect()->route('admin.dashboard');
    } elseif (in_array(2, $access)) {
        return redirect()->route('admin.booking.service.index');
    } elseif (in_array(3, $access)) {
        return redirect()->route('admin.sales.software.index');
    } elseif (in_array(4, $access)) {
        return redirect()->route('admin.hire.index');
    } elseif (in_array(5, $access)) {
        return redirect()->route('admin.service.index');
    } elseif (in_array(6, $access)) {
        return redirect()->route('admin.software.index');
    } elseif (in_array(7, $access)) {
        return redirect()->route('admin.job.index');
    } elseif (in_array(8, $access)) {
        return redirect()->route('admin.ads.index');
    } elseif (in_array(9, $access)) {
        return redirect()->route('admin.users.all');
    } elseif (in_array(10, $access)) {
        return redirect()->route('admin.coupon.index');
    } elseif (in_array(11, $access)) {
        return redirect()->route('admin.category.index');
    } elseif (in_array(12, $access)) {
        return redirect()->route('admin.features.index');
    } elseif (in_array(13, $access)) {
        return redirect()->route('admin.gateway.automatic.index');
    } elseif (in_array(14, $access)) {
        return redirect()->route('admin.deposit.list');
    } elseif (in_array(15, $access)) {
        return redirect()->route('admin.withdraw.log');
    } elseif (in_array(16, $access)) {
        return redirect()->route('admin.ticket');
    } elseif (in_array(17, $access)) {
        return redirect()->route('admin.report.transaction');
    } elseif (in_array(18, $access)) {
        return redirect()->route('admin.subscriber.index');
    } elseif (in_array(19, $access)) {
        return redirect()->route('admin.setting.index');
    } elseif (in_array(20, $access)) {
        return redirect()->route('admin.setting.logo.icon');
    } elseif (in_array(21, $access)) {
        return redirect()->route('admin.extensions.index');
    } elseif (in_array(22, $access)) {
        return redirect()->route('admin.language.manage');
    } elseif (in_array(23, $access)) {
        return redirect()->route('admin.seo');
    } elseif (in_array(24, $access)) {
        return redirect()->route('admin.email.template.index');
    } elseif (in_array(25, $access)) {
        return redirect()->route('admin.sms.template.index');
    } elseif (in_array(26, $access)) {
        return redirect()->route('admin.setting.cookie');
    } elseif (in_array(27, $access)) {
        return redirect()->route('admin.frontend.templates');
    } elseif (in_array(28, $access)) {
        return redirect()->route('admin.frontend.sections');
    } elseif (in_array(29, $access)) {
        return redirect()->route('admin.system.info');
    } elseif (in_array(30, $access)) {
        return redirect()->route('admin.setting.custom.css');
    } elseif (in_array(31, $access)) {
        return redirect()->route('admin.setting.optimize');
    } elseif (in_array(32, $access)) {
        return redirect()->route('admin.request.report');
    } elseif (in_array(33, $access)) {
        return redirect()->route('admin.rank.index');
    } elseif (in_array(34, $access)) {
        return redirect()->route('admin.staff.index');
    } else {
        return redirect()->route('admin.profile');
    }
}


function getFileExtension($file)
{

    $extension = strtolower($file->getClientOriginalExtension());
    return $extension;

}


function getMailCredentials()
{
    try {
        $system_mail_config = SystemMailConfiguration::where('is_active', true)->first();
        return $system_mail_config;
    } catch (\Exception $exp) {
        return response()->json(["error" => $exp->getMessage()]);
    }

}
function getPusherCredentials()
{
    try {
        $system_pusher_config = SystemCredential::where('is_active', true)->where('type', 'pusher')->first();
        return $system_pusher_config;
    } catch (\Exception $exp) {
        return response()->json(["error" => $exp->getMessage()]);
    }

}
function getStorageCredentials()
{
    try {
        $system_pusher_config = SystemCredential::where('is_active', true)->where('type', SystemCredential::Type_Storage)->first();
        return $system_pusher_config;
    } catch (\Exception $exp) {
        return response()->json(["error" => $exp->getMessage()]);
    }

}
function getRedisCacheCredentials()
{
    try {
        $system_redis_config = SystemCredential::where('is_active', true)->where('type', 'redis')->first();
        return $system_redis_config;
    } catch (\Exception $exp) {
        Log::error(["redis cache error"=>$exp->getMessage()]);
        return response()->json(["error" => $exp->getMessage()]);
    }

}

function getUserRoleId()
{
    if (auth()->user()) {
        if (in_array(Role::$FreelancerName, auth()->user()->getRoleNames()->toArray())) {
            return Role::$Freelancer;
        } elseif (in_array(Role::$ClientName, auth()->user()->getRoleNames()->toArray())) {

            return Role::$Client;
        } else {
            return null;
        }

    }
    else {
        return null;
    }

}

function getLastLoginRoleId()
{
    $user=auth()->user();
    return $user->last_role_activity;
}
function getLastLoginRoleName()
{
    $user=auth()->user();
    $last_role=$user->last_role_activity;
    if($last_role==Role::$Freelancer)
        return Role::$FreelancerName;
    elseif($last_role==Role::$Client)
        return Role::$ClientName;
    elseif($last_role==Role::$Admin)
        return Role::$AdminName;
    else
        return '';

}

function getNumberOfPropsals($uuid)
{
    $job=Job::where('uuid',$uuid)->first();
    return $job->proposal()->count();
}

function getClientJobsCount($id)
{
    $job_count = Job::where('user_id',$id)->count();
    if ($job_count){
        return $job_count;
    }
    else{
        return 0;
    }

}
function getClientOpenJobsCount($id)
{
    $job_count = Job::where('user_id',$id)->where('status_id',Job::$Approved)->count();
    if ($job_count){
        return $job_count;
    }
    else{
        return 0;
    }

}

function getLanaguageName($id)
{
    return ModelsLanguage::where('id',$id)->first()->iso_language_name;
}

function getProficiencyLevelName($id)
{
    return LanguageLevel::where('id',$id)->first()->name;

}

function getUserEducation($obj)
{
    $degree_title=Degree::find($obj->degree_id)->first()->title;
    $education= $obj->school_name.'  '. $degree_title.', '. $obj->field_of_study.' '.Carbon::parse($obj->start_date)->format('Y') ;
    if(!$obj->is_enrolled)
        $education.='-'.Carbon::parse($obj->end_date)->format('Y');
    else
        $education.='-PRESENT';
    return $education.'</br>';
}

function getDegreeSession($obj)
{
    $session= Carbon::parse($obj->start_date)->format(config('settings.date_format','m/d/Y')) ;
    if(!$obj->is_enrolled)
        $session.=' - '.Carbon::parse($obj->end_date)->format(config('settings.date_format','m/d/Y'));
    else
        $session.=' - PRESENT';
    return $session;
}

function getExperienceSession($obj)
{
    $session= Carbon::parse($obj->start_date)->format(config('settings.date_format','m/d/Y')) ;
    if(!$obj->is_working)
        $session.=' - '.Carbon::parse($obj->end_date)->format(config('settings.date_format','m/d/Y'));
    else
        $session.=' - PRESENT';
    return $session;
}

function getDegreetitle($obj)
{
    $degree_title=Degree::find($obj->degree_id)->title;
    return $degree_title;

}

function getProposelBid($proposal,$job)
{
    $propsal_amount='';
    $propsal_amount=$job->budget_type_id == \App\Models\BudgetType::$hourly ?  $proposal->hourly_bid_rate.'/hr' : $proposal->fixed_bid_amount;
    return '$'.$propsal_amount;


}
function generateUniqueRandomNumber(){
    $min = 100000;
    $max = 999999;
    $timestamp = time();
    mt_srand($timestamp);
    $random_number = mt_rand($min,$max);
    return $random_number;
}
function getFormattedDate($date,$format)
{
    return Carbon::parse($date)->format($format);
}
function getUserContracts($uuid=null){

    $user=Auth::user();
    $contracts=Contract::select('id','contract_title');
    if($uuid){

        $contracts=$contracts->where('uuid',$uuid);
    }

    $contracts=$contracts->whereHas('offer',function ($query) use ($user){

        $last_role_id=getLastLoginRoleId();
        if ( $last_role_id  == Role::$Freelancer ) {
            $query->where('offer_send_to_id','=',$user->id);
        }
        else if( $last_role_id == Role::$Client ){
            $query->where('offer_send_by_id','=',$user->id);
        }
        $query->where('payment_type','=',ModuleOffer::PAYMENT_TYPE['HOURLY']);

    })->get();

    return $contracts;
}
function IsSendDayPlanningApproval($dayPlanning){
    if($dayPlanning->status_id != DayPlanning::STATUSES['ApprovalRequested'] && $dayPlanning->status_id != DayPlanning::STATUSES['Approved']){
        return true;
    }
    return false;
}
function IsDayPlanningNotApproved($dayPlanningtask){
    if($dayPlanningtask->status_id == DayPlanning::STATUSES['Draft']){
        return true;
    }
    return false;
}

function isApprovalRequired($day_planning){

    $approval_statuses=[DayPlanning::STATUSES['ApprovalRequested'],DayPlanning::STATUSES['ResendForApproval']];
    if(in_array($day_planning->status_id,$approval_statuses)){
        return true;
    }
    return false;

}
function isApproved($day_planning){

    $approval_statuses=[DayPlanning::STATUSES['Approved']];
    if(in_array($day_planning->status_id,$approval_statuses)){
        return true;
    }
    return false;
    
}
function isHourlyContract($contract){
    if($contract->offer->payment_type== ModuleOffer::PAYMENT_TYPE['HOURLY']){
        return true;
    }
    return false;
}

function getDaysHoursMinutesSeconds($timestamp){

    $end = Carbon::parse($timestamp);
    $current = Carbon::now();
    $days = $end->diffInDays($current);
    $hours = $end->diffInHours($current);
    $minutes = $end->diffInMinutes($current);
    $seconds = $end->diffInSeconds($current);
    if ($days>0){
        return $days." days ago";
    }
    elseif ($hours>0){
        return $hours." hours ago";
    }
    elseif ($minutes>0){
        return $minutes." minutes ago";
    }
    elseif ($seconds>0){
        return $seconds." seconds ago";
    }

}

function getYearMonthDays($timestamp){

    $date = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp);
    $month_name = $date->format('M');
    $year = $date->year;
    $day = $date->day;

    return $month_name.' '. $day.', '. $year;

}
function dateDiffInDays($date1, $date2)
{
    // Calculating the difference in timestamps
    $diff = strtotime($date2) - strtotime($date1);

    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    return abs(round($diff / 86400));
}


function getRedisData($model,$key,$condition=null){

    try {

        $redis_data =  json_decode(Redis::get($key));
        if ($redis_data){
            return $redis_data;
        }
        else{

            $query = $model::query();

            $query->when(($condition!=null), function ($q) use ($condition) {
                return $q->where('is_active', $condition);
            });
            $model_data = $query->get();
            Redis::set($key, json_encode($model_data));
            return $model_data;
        }

    } catch (\Exception $e) {
        $query = $model::query();

        $query->when(($condition!=null), function ($q) use ($condition) {
            return $q->where('is_active', $condition);
        });
        $model_data = $query->get();

        return $model_data;
    }

}

function storeRedisData($model,$key,$condition=null){

    try{
        $query = $model::query();

        $query->when(($condition!=null), function ($q) use ($condition) {
            return $q->where('is_active', $condition);
        });
        $model_data = $query->get();

        if ($model_data){
            Redis::set($key, json_encode($model_data));
            return true;
        }
        else{
            return false;
        }

    }
    catch (\Exception $e){
        return false;
    }


}

function getBaseUrl(){
    try {
        $baseUrl = request()->getSchemeAndHttpHost() . '/';
        return $baseUrl;
    }
    catch (\Exception $e){
        return "www.dureforce.com/";
    }

}

function errorLogMessage($exception){
    try {
        $errorMsg = 'Error on line '.$exception->getLine().' in '.$exception->getFile()." ".$exception->getMessage();
        Log::error($errorMsg);
        return true;
    }
    catch (\Exception $e){
        return $exception;
    }

}