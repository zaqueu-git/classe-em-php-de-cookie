<?php
namespace application\libraries\Cookies;

class Cookie
{
    /**
     * path
     *
     * @var string
     */
    private $path;    
    /**
     * domain
     *
     * @var string
     */
    private $domain = "/";    
    /**
     * secure
     *
     * @var bool
     */
    private $secure = false;    
    /**
     * httponly
     *
     * @var bool
     */
    private $httponly = false;
    
    /**
     * delete
     *
     * @param  string $name
     * @return void
     */
    public function delete($name = null) 
    {
        if (isset($_COOKIE[$name])) {
            setcookie($name, "", time() - 3600);
            return 1;
        }
        return 0;
    }
    
    /**
     * update
     *
     * @param  string $name
     * @param  string $value
     * @param  string $expire
     * @return void
     */
    public function update($name, $value, $expire) 
    {
        $this->create($name, $value, $expire);
    }
    
    /**
     * read
     *
     * @param  string $name
     * @return void
     */
    public function read($name) 
    {
        if (isset($_COOKIE[$name])) {
            return $_COOKIE[$name];
        }
        return "";
    }
    
    /**
     * create
     *
     * @param  string $name
     * @param  string $value
     * @param  string $expire
     * @return void
     */
    public function create($name, $value, $expire) 
    {
        if (setcookie($name, $value, $expire, $this->path, $this->domain, $this->secure, $this->httponly)) {
            return true;
        }
        return false;
    }
}
?>
