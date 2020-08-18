<?php
class University{
    public $webPage;
    public $country;
    public $domain;
    public $name;
    public function __construct($webPage, $country, $domain, $name){
        $this->webPage = $webPage;
        $this->country = $country;
        $this->domain = $domain;
        $this->name = $name;
    }

    public static function fromArray($array){
        $universities = [];
        foreach($array as $el){
            $universities[] = new University($el['web_pages'], $el['country'], $el['domains'], $el['name']);
        }
        return $universities;
    }
}
class API
{
    public function getUniversities()
    {
        $curl_opt = array(
            CURLOPT_URL => "http://universities.hipolabs.com/search?country=Canada",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
        );
        $data = $this->fetchData($curl_opt); //getting canadian universities
        $curl_opt = array(
            CURLOPT_URL => "http://universities.hipolabs.com/search?country=USA",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
        );
        $data = array_merge($data, $this->fetchData($curl_opt)); //merging USA universities to original array
        // print_r($data);
        return University::fromArray($data);
     }

    

    private function fetchData($curl_opt)
    {
        $curl = curl_init();

        curl_setopt_array($curl, $curl_opt);
        $response = curl_exec($curl);
        $err = curl_error($curl);

        $data = json_decode($response, true);
        return $data;
    }
}
