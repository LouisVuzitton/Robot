<?php
namespace lib\Network;
class Http
{
    private $resource;
    private $userAgent = "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:28.0) Gecko/20100101 Firefox/28.0";
    private $reqHeader = ['Expect:'];

    public function __construct()
    {
        $this->resource = curl_init();
    }

    public function __destruct()
    {
        curl_close($this->resource);
    }

    /**
     * Set custom cookie
     * @param string $cookie
     * @access public
     */
    function setCookie($cookie)
    {
        curl_setopt ($this->resource, CURLOPT_COOKIE, $cookie);
    }

    /**
     * Set referrer
     * @param string $referrer_url
     * @access public
     */
    function setReferrer($referrer_url)
    {
        curl_setopt($this->resource, CURLOPT_REFERER, $referrer_url);
    }

    /**
     * Set client's useragent
     * @param string $userAgent
     * @access public
     */
    function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    }

    function addHeaders(array $header)
    {
        $this->reqHeader = array_merge($this->reqHeader, $header);
    }

    /**
     * 请求数据
     * @param string $url
     * @param string $method
     * @param null $args
     * @return mixed|null
     * @throws
     */
    private function request(string $url, string $method, $args = null)
    {
        // Apply Method
        if($method == 'GET')
        {
            if($args != null)
            {
                if(is_array($args))
                {
                    $args = http_build_query($args);
                }
                $url .= (strpos($url, '?') === false) ? '?' : '&';
                $url .= $args;
            }
            curl_setopt($this->resource, CURLOPT_HTTPGET, true);
        }
        if($method == 'POST')
        {
                $json = json_encode($args,JSON_UNESCAPED_UNICODE);
            curl_setopt($this->resource, CURLOPT_POST, true);
            curl_setopt($this->resource, CURLOPT_POSTFIELDS, $json);
        }

        curl_setopt($this->resource, CURLOPT_URL, $url);
        curl_setopt($this->resource, CURLOPT_TIMEOUT, 30);
        curl_setopt($this->resource, CURLOPT_FAILONERROR, true);
        curl_setopt($this->resource, CURLOPT_FOLLOWLOCATION, true);

        // Header & UserAgent
        curl_setopt($this->resource, CURLOPT_HTTPHEADER, $this->reqHeader);
        curl_setopt($this->resource, CURLOPT_USERAGENT, $this->userAgent);

        // Response do not contains Headers
        curl_setopt($this->resource, CURLOPT_HEADER, false);
        curl_setopt($this->resource, CURLINFO_HEADER_OUT, true);
        curl_setopt($this->resource, CURLOPT_RETURNTRANSFER, true);

        // HTTPS do not verify Certificate and HOST
        curl_setopt($this->resource, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->resource, CURLOPT_SSL_VERIFYHOST, false);

        // Execute
        $result = @curl_exec($this->resource);

        //返回
        return $result;
    }

    /**
     * 表单提交数据
     * @param string $url
     * @param $args
     * @return mixed|null
     * @throws
     */
    public function post(string $url, $args)
    {
        return $this->request($url, 'POST', $args);
    }

    /**
     * GET请求数据
     * @param string $url
     * @param $args
     * @return mixed|null
     * @throws
     */
    public function get(string $url, $args = null)
    {
        return $this->request($url, 'GET', $args);
    }
}
