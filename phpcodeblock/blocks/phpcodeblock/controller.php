<?php  
namespace Concrete\Package\Phpcodeblock\Block\Phpcodeblock;

defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Block\BlockController;
use Loader;
use Package;
use Page;
use User;

class Controller extends BlockController
{
    protected $btTable = 'btPhpCodeBlockContent';
    protected $btInterfaceWidth = "600";
    protected $btWrapperClass = 'ccm-ui';
    protected $btInterfaceHeight = "550";
	protected $btDefaultSet 						= 'basic';
	protected $btCacheBlockOutput 					= false;
	protected $btCacheBlockOutputOnPost 			= false;
	protected $btCacheBlockOutputForRegisteredUsers = false;
    protected $btIgnorePageThemeGridFrameworkContainer = true;

    public $content = "";
	public $themeace = "";

    public function getBlockTypeDescription()
    {
        return t("For adding HTML+PHP by hand.");
    }

    public function getBlockTypeName()
    {
        return t("PHP");
    }
	
	public function view()
	{
		$this->set('content', $this->content);
		$this->set( 'activated', Package::getByHandle( 'phpcodeblock')->isActivated() );
		$this->set( 'interpreted', Package::getByHandle( 'phpcodeblock')->isInterpreted() );
		$c = Page::getCurrentPage();
		$this->set( 'editMode', $editMode = $c->isEditMode() );
		$this->set('controller', $this );
	}

    public function add()
    {
        $this->edit();
    }

    public function edit()
    {
		$this->set( 'themeace', Package::getByHandle( 'phpcodeblock')->getThemeAce() );
        $this->requireAsset('ace');
    }

    public function getSearchableContent()
    {
        return $this->content;
    }

    public function save($data)
    {
		Package::getByHandle('phpcodeblock')->setThemeAce( $this->get('themeace'));
        $args['content'] = isset($data['content']) ? $data['content'] : '';
        parent::save($args);
    }
}
