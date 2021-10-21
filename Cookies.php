<?php
/**
 * @package Cookies
 * @link    ''
 * @author  Zaqueu Alves <zaqueu.alves01@gmail.com>
 * @license http://www.gnu.org/licenses/gpl-3.0.html
 * @version 1.0
 */
namespace application\libraries\Cookies;

class Cookies 
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