<?php 
namespace Vuravel\Menu\MenuItems\Traits;
use Illuminate\Support\Str;

trait Clickable {

    /**
     * The element's href.
     *
     * @var string
     */
    public $href = 'javascript:void(0)';

    /**
     * The element's hash, if any.
     *
     * @var string
     */
    protected $hash;

    /**
     * The parent's href, if applicable.
     *
     * @var string
     */
    public $parentsHref = 'javascript:void(0)';

    /**
     * The element's Html target attribute.
     *
     * @var string
     */
    public $target;

    /**
     * The element's active class.
     *
     * @var string
     */
    public $activeClass;

    /**
     * Flag for loading an element like turbolinks
     *
     * @var Boolean
     */
    public $turbo = false;

    /**
     * Flag for disabling turbo links
     *
     * @var Boolean
     */
    protected $activeTurbo = true;

    /**
     * Sets the href attribute of a link.
     *
     * @param  string  $route The route name or uri.
     * @param  array|null  $parameters  The route parameters (optional).
     * 
     * @return self
     */
    public function href($route, $parameters = null)
    {
        if($this->activeTurbo)
            $this->checkTurbo($route, $parameters);

        if (filter_var($route, FILTER_VALIDATE_URL) !== false || $route === 'javascript:void(0)') {
            $this->href = $route;
        } else {
            $this->setRoute($route, $parameters);
            $this->href = $this->getRoute();
        }
        $this->prepareClickable();
        return $this;
    }

    /**
     * Sets the url of an Element using the Laravel `url()` helper function.
     *
     * @param  string  $url The route uri.
     * @param  array|null  $parameters The route parameters (optional).
     * 
     * @return self
     */
    public function url($url, $parameters = null)
    {
        return $this->href(url($url), $parameters);
    }

    //parent has to have href called before submenu
    public function addHash($hash = null)
    {
        $this->hash = $hash ? : Str::slug($this->label, '-');

        if($this->href != 'javascript:void(0)')
            $this->href .= '#'.$this->hash;

        return $this;
    }

    public function getHash()
    {
        return $this->hash;
    }

    public function target($target)
    {
        $this->target = $target;
        return $this;
    }

    /**
     * Opens the link in a new tab, i.e. it sets target="_blank".
     *
     * @return     self
     */
    public function inNewTab()
    {
        return $this->target('_blank');
    }

	public function prepareClickable()
	{

        if($this->href == \Request::getSchemeAndHttpHost()){
            $this->data(['active' => \Request::url() == $this->href ? 
                $this->activeClass() : '' ]);
        }else{
            $this->data(['active' => substr(\Request::url(), 0, strlen($this->href)) == $this->href ? 
                $this->activeClass() : '' ]);
        }
	}

    public function hasRoute()
    {
        return $this->href != 'javascript:void(0)';
    }

    public function activeClass($class = null)
    {
        if($class){
            $this->activeClass = $class;
            return $this;
        }else{
            return 'vlActive'.($this->activeClass ? ' '.$this->activeClass : '');
        }
    }

    /**
     * Verifies if the href link should be loaded like turbolinks (no full page reload)
     * @param  string $route [description]
     * @param  array $parameters      [description]
     * @return void            
     */
    public function checkTurbo($route, $parameters = null)
    {
        if(is_null($this->routeObject = $this->getRouteByName($route)))
            $this->routeObject = $this->getMatchedRoute($route, $parameters);

        if( ($this->routeObject->action['extends'] ?? '') === (request()->route()->action['extends'] ?? false ) )
            $this->turbo = true;
    }

    public function noTurbo()
    {
        $this->activeTurbo = false;
        return $this;
    }

}